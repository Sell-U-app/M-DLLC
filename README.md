# M&D Buildings LLC — sitio web

Sitio en PHP plano (sin framework, sin build) basado en la plantilla Sell-U
`construccion/10-timelapse-obra`. Corre igual en Railway (Docker) y en un
hosting compartido tipo NameCheap.

## Estructura

```
index.php        Home: hero con panel de avance, servicios, proceso, casos, FAQ
servicios.php    Detalle de los 6 servicios
proyectos.php    Grid de obras entregadas
contacto.php     Formulario de estimado (mail() + respaldo CSV)
inc/config.php   ÚNICO archivo a editar: textos, colores, contacto, listas
inc/head.php     <head>, mini design-system CSS, topbar y navegación
inc/footer.php   Footer, motor de animaciones y botón flotante de WhatsApp
inc/mailer.php   Validación, honeypot, envío y log de leads
uploads/         Logos y favicon
storage/         leads.csv (se crea solo, ignorado por git)
```

## Editar el contenido

Todo el contenido vive en `inc/config.php`:

- `$SITE` — nombre, teléfono, email, WhatsApp, dirección, horario
- `$THEME` — paleta (tomada del logo: `#13273D` azul noche, `#F0A21B` ámbar)
- `$SERVICIOS`, `$PROCESO`, `$STATS`, `$PROYECTOS`, `$TIPOS`, `$TESTIMONIOS`, `$FAQ`

**Pendiente antes de publicar:** reemplazar teléfono, email, WhatsApp y dirección
(hoy son placeholders `000`), y confirmar las cifras de `$STATS` y los testimonios.

## Fotos

Las áreas de imagen usan un patrón CSS tipo plano (`.blueprint`). Para poner
fotos reales, súbelas a `uploads/` y cambia el `<div class="im blueprint">`
por `<img src="uploads/mi-foto.jpg" alt="...">` en la página correspondiente.

## Correr en local

```bash
php -S localhost:8000
```

## Deploy en Railway

El repo trae `Dockerfile` y `railway.json`. En Railway:

1. New Project → Deploy from GitHub repo → este repo.
2. Railway detecta el Dockerfile y construye solo.
3. Variables (opcional): `SITE_URL=https://tudominio.com` para canonical y OG.
4. Settings → Networking → Generate Domain, o conecta el dominio propio.

Apache escucha en `$PORT`, que Railway inyecta automáticamente.

> `mail()` no funciona en el contenedor de Railway. El formulario guarda cada
> lead en `storage/leads.csv` y muestra confirmación al usuario. Para recibir
> los correos de verdad hay que conectar un SMTP (Resend, Brevo, SendGrid).
> El almacenamiento del contenedor es efímero: si vas a depender del CSV,
> monta un volumen en `/var/www/html/storage`.

## Deploy en NameCheap

Sube el contenido de la carpeta (sin `Dockerfile`, `railway.json`, `.dockerignore`)
a `public_html/`. Permisos: carpetas 755, archivos 644. Ahí `mail()` sí funciona.
