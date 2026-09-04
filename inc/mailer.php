<?php
/**
 * Helper de formularios reutilizable (mail() nativo — funciona en NameCheap).
 *
 * Uso típico en una página con formulario:
 *
 *   require_once __DIR__.'/inc/mailer.php';
 *   $sent = null; $old = ['nombre'=>'','email'=>'','mensaje'=>''];
 *   if ($_SERVER['REQUEST_METHOD']==='POST') {
 *       [$sent,$old] = handle_form([
 *           'Nombre'  => 'nombre',   // etiqueta => name del input (obligatorios abajo)
 *           'Email'   => 'email',
 *           'Teléfono'=> 'telefono',
 *           'Mensaje' => 'mensaje',
 *       ], ['nombre','email','mensaje']);
 *   }
 *
 * En el HTML del form: method="post", un honeypot <input name="website" class="hp">,
 * y muestra el estado con $sent (true/false/null).
 */
require_once __DIR__ . '/config.php';

function fclean($v){ return trim(htmlspecialchars(strip_tags((string)$v), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')); }

/**
 * @param array $fields  ['Etiqueta' => 'input_name', ...] en el orden del correo
 * @param array $required lista de input_name obligatorios
 * @return array [bool|null $sent, array $old]  ($sent=null si aún no válido)
 */
function handle_form(array $fields, array $required = []): array {
    global $SITE;

    // Repuebla valores (para no perder lo escrito si hay error)
    $old = [];
    foreach ($fields as $name) { $old[$name] = trim($_POST[$name] ?? ''); }

    // Honeypot: si el campo trampa viene lleno, es bot → simula éxito silencioso
    if (!empty($_POST['website'])) return [true, $old];

    // Validación mínima
    foreach ($required as $r) {
        if (($old[$r] ?? '') === '') return [null, $old];
    }
    if (isset($old['email']) && $old['email'] !== '' && !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        return [null, $old];
    }

    // Cuerpo
    $lines = ['New message from ' . ($SITE['name'] ?? 'the website'), str_repeat('-', 40)];
    foreach ($fields as $label => $name) {
        $val = fclean($old[$name] ?? '');
        if ($val !== '') $lines[] = "$label: $val";
    }
    $body = implode("\n", $lines);

    $to      = $SITE['form_to'] ?? ($SITE['email'] ?? '');
    $subject = '[' . ($SITE['name'] ?? 'Web') . '] New website form submission';
    $domain  = parse_url($SITE['base_url'] ?? 'https://example.com', PHP_URL_HOST) ?: 'example.com';
    $replyTo = filter_var($old['email'] ?? '', FILTER_VALIDATE_EMAIL) ?: $to;

    $headers  = 'From: ' . ($SITE['name'] ?? 'Web') . ' <no-reply@' . $domain . ">\r\n";
    $headers .= "Reply-To: $replyTo\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $ok = @mail($to, $subject, $body, $headers);

    // Respaldo: en Railway/Docker mail() no existe. Guardamos el lead en CSV
    // para no perder nunca un contacto, y damos el envio por bueno.
    $logged = log_lead($fields, $old);

    return [(bool)$ok || $logged, $old];
}

/** Guarda el lead en storage/leads.csv. Devuelve true si pudo escribir. */
function log_lead(array $fields, array $old): bool {
    $dir = __DIR__ . '/../storage';
    if (!is_dir($dir)) { @mkdir($dir, 0775, true); }
    $file = $dir . '/leads.csv';
    $isNew = !file_exists($file);

    $fh = @fopen($file, 'a');
    if (!$fh) return false;
    if ($isNew) {
        fputcsv($fh, array_merge(['date'], array_keys($fields)));
    }
    $row = [date('Y-m-d H:i:s')];
    foreach ($fields as $name) { $row[] = fclean($old[$name] ?? ''); }
    fputcsv($fh, $row);
    fclose($fh);
    return true;
}
