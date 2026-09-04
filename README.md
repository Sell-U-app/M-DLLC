# M&D Buildings LLC — website

Plain PHP site (no framework, no build step) based on the Sell-U template
`construccion/10-timelapse-obra`. Runs the same on Railway (Docker) and on
shared hosting such as NameCheap. Content is in English.

## Structure

```
index.php           Home: hero with progress panel, services, process, cases, FAQ
services.php        The six services in detail
projects.php        Grid of delivered work
contact.php         Estimate request form (mail() + CSV fallback)
privacy.php         ┐
terms.php           │ Policy pages. Each one is three lines; the content
cookies.php         │ lives in inc/legal.php and is rendered by inc/legal-view.php
accessibility.php   ┘
inc/config.php      THE file to edit: copy, colors, contact details, lists
inc/legal.php       Policy copy for all four legal pages
inc/legal-view.php  Shared renderer for policy pages (table of contents, anchors)
inc/head.php        <head>, mini design system, top bar and navigation
inc/footer.php      Footer, reveal/carousel engine and floating WhatsApp button
inc/mailer.php      Validation, honeypot, mail() and lead log
uploads/            Logos and favicon
storage/            leads.csv (created automatically, git-ignored)
```

## Editing content

Everything lives in `inc/config.php`:

- `$SITE` — name, phone, email, WhatsApp, address, hours
- `$THEME` — palette (from the logo: `#13273D` night navy, `#F0A21B` amber)
- `$NAV`, `$LEGAL_NAV` — menus
- `$SERVICES`, `$PROCESS`, `$STATS`, `$PROJECTS`, `$TYPES`, `$TESTIMONIALS`, `$FAQ`

## Before publishing

**Contact:** phone, email, WhatsApp and address are placeholders (`000`).

**Legal:** `inc/legal.php` holds plain-language policy templates, not legal
advice. Have counsel licensed in your state review them, and fill in these
`$SITE` keys first:

| Key | What it is |
|---|---|
| `state` | State of formation and governing law (currently `Florida`) |
| `legal_address` | Full mailing address shown in the policies |
| `legal_email` | Address for privacy and legal requests |
| `legal_updated` | "Last updated" date on every policy page |

The Cookie Policy states the site sets no advertising or analytics cookies.
That is true as published. **If you add Google Analytics, Meta Pixel or any
embed, update that page and add a consent banner before the tags go live.**

**Content:** the figures in `$STATS` (150+ projects, 12 years), the
testimonials and the project list are filler written to populate the layout.
Replace them with real ones. The Terms of Use say figures on the site are
illustrative, which covers you while they are placeholders, but do not leave
invented testimonials on a live site.

## Photos

Image areas use a CSS blueprint pattern (`.blueprint`). For real photos, drop
them in `uploads/` and replace `<div class="im blueprint">` with
`<img src="uploads/my-photo.jpg" alt="...">`.

## Run locally

```bash
php -S localhost:8000
```

## Deploy on Railway

The repo ships `Dockerfile` and `railway.json`. New Project → Deploy from
GitHub repo; Railway builds the Dockerfile on its own. Optionally set
`SITE_URL=https://yourdomain.com` so canonical and OG tags are correct.

Apache listens on `$PORT`. The `CMD` disables `mpm_event`/`mpm_worker` **at
runtime**: on Railway the `php:*-apache` image starts with two MPMs loaded and
Apache aborts with `More than one MPM loaded` if this is not fixed there.

> `mail()` does not work inside the container. The form stores every lead in
> `storage/leads.csv` and confirms to the user. To actually receive email,
> connect an SMTP provider (Resend, Brevo, SendGrid). Container storage is
> ephemeral: if you rely on the CSV, mount a volume at
> `/var/www/html/storage`.

## Deploy on NameCheap

Upload the folder contents (minus `Dockerfile`, `railway.json`,
`.dockerignore`) to `public_html/`. Directories 755, files 644. `mail()` works
there.
