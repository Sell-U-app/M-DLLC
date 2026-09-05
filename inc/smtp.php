<?php
/**
 * Envio de correo por SMTP autenticado, sin dependencias.
 *
 * Existe porque el contenedor de Railway no trae servidor de correo: mail()
 * siempre falla ahi y los mensajes del formulario se perdian. Se configura
 * SOLO por variables de entorno, para que ninguna credencial viva en el repo.
 *
 *   SMTP_HOST    host del proveedor (ej. smtp-relay.brevo.com, smtp.gmail.com)
 *   SMTP_PORT    587 con STARTTLS (por defecto) o 465 con SSL directo
 *   SMTP_USER    usuario / login
 *   SMTP_PASS    contrasena de aplicacion o API key
 *   SMTP_SECURE  tls (por defecto) | ssl | none
 *   SMTP_FROM    remitente; si falta se usa SMTP_USER
 *   SMTP_FROM_NAME  nombre visible del remitente
 *
 * Si SMTP_HOST no esta definido, smtp_configured() devuelve false y el
 * llamador cae al respaldo en CSV.
 */

function smtp_configured(): bool {
    return getenv('SMTP_HOST') !== false && getenv('SMTP_HOST') !== '';
}

/** Lee una linea de respuesta del servidor y devuelve [codigo, texto]. */
function smtp_read($fp): array {
    $out = '';
    while (($line = fgets($fp, 1024)) !== false) {
        $out .= $line;
        // La ultima linea de una respuesta multilinea lleva espacio, no guion.
        if (strlen($line) < 4 || $line[3] !== '-') break;
    }
    return [(int)substr($out, 0, 3), trim($out)];
}

/** Escribe un comando y verifica el codigo esperado. */
function smtp_cmd($fp, ?string $cmd, $expect, ?string &$err): bool {
    if ($cmd !== null) fwrite($fp, $cmd . "\r\n");
    [$code, $text] = smtp_read($fp);
    foreach ((array)$expect as $ok) {
        if ($code === $ok) return true;
    }
    $shown = $cmd === null ? 'greeting' : preg_replace('/^(AUTH|.*PASS).*/i', '$1 ***', $cmd);
    $err = "SMTP $shown -> $text";
    return false;
}

/**
 * @return bool true si el servidor acepto el mensaje.
 */
function smtp_send(string $to, string $subject, string $body, string $replyTo = '', ?string &$err = null): bool {
    $host   = (string)getenv('SMTP_HOST');
    $port   = (int)(getenv('SMTP_PORT') ?: 587);
    $user   = (string)getenv('SMTP_USER');
    $pass   = (string)getenv('SMTP_PASS');
    $secure = strtolower((string)(getenv('SMTP_SECURE') ?: 'tls'));
    $from   = (string)(getenv('SMTP_FROM') ?: $user);
    $fname  = (string)(getenv('SMTP_FROM_NAME') ?: 'M&D Buildings LLC');

    if ($host === '' || $from === '') { $err = 'SMTP sin configurar'; return false; }

    $transport = $secure === 'ssl' ? "ssl://$host:$port" : "tcp://$host:$port";
    $ctx = stream_context_create(['ssl' => ['verify_peer' => true, 'verify_peer_name' => true]]);
    $fp = @stream_socket_client($transport, $errno, $errstr, 15, STREAM_CLIENT_CONNECT, $ctx);
    if (!$fp) { $err = "SMTP conexion fallida: $errstr ($errno)"; return false; }
    stream_set_timeout($fp, 15);

    $ehlo = 'EHLO ' . (parse_url((string)getenv('SITE_URL') ?: 'https://mdbuildings.us', PHP_URL_HOST) ?: 'localhost');
    $ok = smtp_cmd($fp, null, 220, $err)
       && smtp_cmd($fp, $ehlo, 250, $err);

    if ($ok && $secure === 'tls') {
        $ok = smtp_cmd($fp, 'STARTTLS', 220, $err)
           && @stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)
           && smtp_cmd($fp, $ehlo, 250, $err);
        if (!$ok && $err === null) $err = 'SMTP no pudo negociar TLS';
    }

    if ($ok && $user !== '') {
        $ok = smtp_cmd($fp, 'AUTH LOGIN', 334, $err)
           && smtp_cmd($fp, base64_encode($user), 334, $err)
           && smtp_cmd($fp, base64_encode($pass), 235, $err);
    }

    if ($ok) {
        // El From va SIEMPRE con el dominio autenticado; el correo del visitante
        // viaja en Reply-To. Al reves, Outlook y Gmail lo marcan como spam.
        $headers = [
            'From: ' . smtp_header_word($fname) . ' <' . $from . '>',
            'To: ' . $to,
            'Subject: ' . smtp_header_word($subject),
            'Date: ' . date('r'),
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];
        if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $headers[] = 'Reply-To: ' . $replyTo;
        }
        // Punto al inicio de linea = fin de datos en SMTP; hay que escaparlo.
        $data = implode("\r\n", $headers) . "\r\n\r\n"
              . preg_replace('/^\./m', '..', str_replace("\n", "\r\n", $body));

        $ok = smtp_cmd($fp, "MAIL FROM:<$from>", 250, $err)
           && smtp_cmd($fp, "RCPT TO:<$to>", [250, 251], $err)
           && smtp_cmd($fp, 'DATA', 354, $err)
           && smtp_cmd($fp, $data . "\r\n.", 250, $err);
    }

    @fwrite($fp, "QUIT\r\n");
    @fclose($fp);
    return $ok;
}

/** Codifica cabeceras con acentos o caracteres no ASCII (RFC 2047). */
function smtp_header_word(string $s): string {
    return preg_match('/[^\x20-\x7E]/', $s)
        ? '=?UTF-8?B?' . base64_encode($s) . '?='
        : $s;
}
