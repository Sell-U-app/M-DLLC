<?php
/**
 * M&D Buildings LLC — single source of truth for the site.
 * Edit copy and contact details HERE. Do not touch the templates.
 *
 * PENDIENTE (dato real que falta): $SITE['address'] y $SITE['legal_address'],
 * la direccion operativa de la empresa; y $TEAM, los perfiles reales de las
 * personas responsables. Mientras esten vacios el sitio simplemente no los
 * muestra, en vez de inventarlos.
 */

$SITE = [
    'name'       => 'M&D Buildings LLC',
    'legal_name' => 'M&D Buildings LLC',
    'entity'     => 'A Pennsylvania limited liability company',
    'tagline'    => 'Residential real estate investment in Pennsylvania.',
    'lang'       => 'en',
    'base_url'   => getenv('SITE_URL') ?: 'https://mdbuildings.us',

    // --- Contact: the form is the only channel. No phone, no WhatsApp. ---
    'email'      => 'info@mdbuildings.us',
    'phone'      => '',
    'phone_tel'  => '',
    'address'    => '502 W 7th St Ste 100, Erie, PA 16502',   // oficina registrada
    'hours'      => '',
    'license'    => '',

    // --- Legal ---
    'state'         => 'Pennsylvania',   // state of formation and governing law
    'legal_address' => '502 W 7th St Ste 100, Erie, PA 16502',
    'legal_email'   => 'legal@mdbuildings.us',
    'legal_updated' => 'September 4, 2026',

    'form_to'     => getenv('MAIL_TO') ?: 'amml4225@hotmail.com',   // destino del formulario
    'og_default'  => 'logo-stacked.png',
    'logo'        => 'logo-horizontal-light.png',
    'logo_footer' => 'logo-stacked-light.png',
    'cta_label'   => 'Get in touch',
    'cta_url'     => 'contact.php',
];

/** Palette taken from the logo: night navy #13273D + amber #F0A21B */
$THEME = [
    'bg'          => '#0C1522',
    'surface'     => '#13273D',
    'ink'         => '#EAF1FA',
    'muted'       => '#93A4BA',
    'primary'     => '#F0A21B',
    'primary_ink' => '#13273D',
    'accent'      => '#F0A21B',
    'border'      => '#20344F',
    'radius'      => '14px',
    'maxw'        => '1200px',
    'google_fonts'=> 'family=Montserrat:wght@600;700;800&family=Inter:wght@400;500;600',
    'font_head'   => "'Montserrat',sans-serif",
    'font_body'   => "'Inter',sans-serif",
];

$NAV = [
    'home'       => ['label' => 'Home',       'url' => 'index.php'],
    'properties' => ['label' => 'Properties', 'url' => 'properties.php'],
    'contact'    => ['label' => 'Contact',    'url' => 'contact.php'],
];

/** Policy pages, linked from the footer */
$LEGAL_NAV = [
    'privacy'       => ['label' => 'Privacy Policy',          'url' => 'privacy.php'],
    'terms'         => ['label' => 'Terms of Use',            'url' => 'terms.php'],
    'cookies'       => ['label' => 'Cookie Policy',           'url' => 'cookies.php'],
    'accessibility' => ['label' => 'Accessibility Statement', 'url' => 'accessibility.php'],
];

/** Our approach: [number, title, text] */
$APPROACH = [
    ['01', 'Location before price',
        'We buy in neighborhoods we understand, where the value of a well-finished home is supported by the street it sits on.'],
    ['02', 'Work that shows',
        'We take on properties that need real work — structure, systems, layout — not a coat of paint over a problem.'],
    ['03', 'A finished product that holds',
        'The house has to make sense to the person who ends up living in it. That is the standard we underwrite to.'],
];

/** Our standard: the three points under "How the work gets done" */
$STANDARD = [
    'Licensed trades in every discipline',
    'Permitted and inspected work',
    'Scope defined before the first day on site',
];

/**
 * Properties. Empty until there is a real acquisition to show.
 * Shape: ['location' => '', 'type' => '', 'scope' => '', 'status' => '']
 * No purchase price, sale price or margin goes on a property card.
 */
$PROPERTIES = [];

/** Who we work with: [audience, text] */
$AUDIENCES = [
    ['Property owners',
        'If you own a home in Pennsylvania and are thinking about selling, we may be the buyer. We purchase directly and on our own timeline, which means the house never goes on the market, there are no showings and there is no commission — we are the buyer, not an agent. The sale closes at a title company like any other transaction.'],
    ['Brokers and agents',
        'We are a straightforward counterparty. We look at what you bring, we answer quickly, and we do not renegotiate after diligence.'],
    ['Contractors and trades',
        'We work with licensed trades in the counties where we buy. If you run a crew and do careful work, we would like to know you.'],
];

/**
 * The people responsible, with their role. Left empty on purpose: no invented
 * profiles. Shape: ['name' => '', 'role' => '']
 */
$TEAM = [];

/** Contact form subjects: [value, label] */
$SUBJECTS = [
    ['property',  'A property'],
    ['brokerage', 'Brokerage'],
    ['trade',     'Trade or contractor'],
    ['other',     'Other'],
];
