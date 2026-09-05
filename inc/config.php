<?php
/**
 * M&D Buildings LLC — single source of truth for the site.
 * Edit copy, colors and contact details HERE. Do not touch the templates.
 *
 * TODO (real data still pending): phone, email, address, license number,
 * state of formation and the figures in $STATS.
 */

$SITE = [
    'name'       => 'M&D Buildings LLC',
    'legal_name' => 'M&D Buildings LLC',
    'tagline'    => 'We build and remodel with a clear price and the progress in plain sight.',
    'lang'       => 'en',
    'base_url'   => getenv('SITE_URL') ?: 'https://mdbuildingsllc.com',

    // --- Contact (REPLACE with the real details) ---
    'email'      => 'info@mdbuildingsllc.com',
    // Contacto solo por formulario y correo: sin telefono publico ni WhatsApp.
    // Para publicar un telefono, rellenar ambos campos con el numero real.
    'phone'      => '',
    'phone_tel'  => '',
    'address'    => 'United States',
    'hours'      => 'Monday to Saturday, 7:00 am – 6:00 pm',
    'license'    => 'Licensed and insured',

    // --- Legal (REPLACE before publishing) ---
    'state'         => 'Florida',            // state of formation and governing law
    'legal_address' => '[Street address, City, State ZIP]',
    'legal_email'   => 'legal@mdbuildingsllc.com',
    'legal_updated' => 'September 4, 2026',  // last updated date shown on policy pages

    'form_to'     => 'info@mdbuildingsllc.com',
    'og_default'  => 'logo-stacked.png',
    'logo'        => 'logo-horizontal-light.png', // light version for the dark header
    'logo_footer' => 'logo-stacked-light.png',
    'cta_label'   => 'Free estimate',
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
    'home'     => ['label' => 'Home',     'url' => 'index.php'],
    'services' => ['label' => 'Services', 'url' => 'services.php'],
    'projects' => ['label' => 'Projects', 'url' => 'projects.php'],
    'contact'  => ['label' => 'Contact',  'url' => 'contact.php'],
];

/** Policy pages, linked from the footer */
$LEGAL_NAV = [
    'privacy'       => ['label' => 'Privacy Policy',          'url' => 'privacy.php'],
    'terms'         => ['label' => 'Terms of Use',            'url' => 'terms.php'],
    'cookies'       => ['label' => 'Cookie Policy',           'url' => 'cookies.php'],
    'accessibility' => ['label' => 'Accessibility Statement', 'url' => 'accessibility.php'],
];

/** Services: [title, description, scope of work[]] */
$SERVICES = [
    ['Residential construction', 'New homes and small multifamily, from the foundation to the final walkthrough.',
        ['Foundation and structure', 'Framing and roofing', 'MEP rough-in and finishes', 'Permits and inspections']],
    ['Full remodels', 'Kitchens, bathrooms and whole spaces renovated without shutting your house down for months.',
        ['Kitchens and bathrooms', 'Flooring and carpentry', 'Lighting and electrical', 'Plumbing']],
    ['Additions', 'Extra square footage built right: rooms, garages, decks and second stories.',
        ['Room additions', 'Garages and shops', 'Decks and patios', 'Second stories']],
    ['Roofing and exteriors', 'We protect the house from the outside in: roof, facade and drainage.',
        ['Roofing and repairs', 'Siding and facades', 'Gutters and drainage', 'Waterproofing']],
    ['Concrete and sitework', 'Level, solid bases with an even finish.',
        ['Driveways and walkways', 'Slabs and footings', 'Retaining walls', 'Stamped concrete']],
    ['Drywall, paint and finishes', 'The last ten percent that makes the whole job look professional.',
        ['Drywall and texture', 'Interior and exterior paint', 'Trim and molding', 'Doors and closets']],
];

/** How we work (home tabs): [title, text] */
$TABS = [
    ['Clear estimate',   'We visit the site, take real measurements and hand you a line-item budget. You know what is included, what is not and what it costs before anything is signed.'],
    ['Permits',          'We handle plans, permits and inspections with the city. You do not chase paperwork.'],
    ['Visible progress', 'Every week you get photos, percent complete and what comes next. No "it is going well" without evidence.'],
    ['Handover',         'Final walkthrough item by item with you, and a written workmanship warranty.'],
];

/** Process: [number, title, text] */
$PROCESS = [
    ['01', 'Site visit',        'We come out, understand the scope and take real measurements.'],
    ['02', 'Line-item budget',  'You get the itemized estimate within 48 to 72 hours, at no cost.'],
    ['03', 'Permits and schedule', 'We pull the permits and lock in start and completion dates.'],
    ['04', 'Build and report',  'Our own crew on site, plus a weekly report with photos and progress.'],
    ['05', 'Handover',          'Final walkthrough, punch list at zero and a written warranty.'],
];

/** Figures: [number, label] */
$STATS = [
    ['150+',   'projects delivered'],
    ['12',     'years in business'],
    ['100%',   'licensed and insured'],
    ['1 year', 'workmanship warranty'],
];

/** Projects: [title, type, summary, status, progress] */
$PROJECTS = [
    ['Kitchen remodel',      'Residential', 'Full kitchen: cabinets, island, quartz, electrical and flooring.', 'Delivered', '100%'],
    ['Second-story addition','Residential', 'Two bedrooms and a bathroom over the existing structure.',         'Delivered', '100%'],
    ['Retail build-out',     'Commercial',  'Complete build-out with ADA restrooms and a new storefront.',      'Delivered', '100%'],
    ['New build, 2,400 sq ft','New construction', 'Turnkey, from footings to final finishes.',                  'In progress','68%'],
    ['Driveway and patio',   'Concrete',    'Stamped concrete with drainage and a low retaining wall.',         'Delivered', '100%'],
    ['Roof and siding',      'Exteriors',   'Full roof and facade replacement after storm damage.',             'Delivered', '100%'],
];

/** Project types: [title, who it is for, includes[], featured, price] */
$TYPES = [
    ['Repairs', 'One-off jobs',
        ['On-site diagnosis', 'Materials included', 'Done in 1 to 5 days', 'Written warranty'], false, 'Free estimate'],
    ['Remodel', 'Kitchens, bathrooms and additions',
        ['Design and material selection', 'Permits included', 'Week-by-week schedule', 'Progress report with photos', '1-year warranty'], true, 'Free estimate'],
    ['New construction', 'Turnkey homes and commercial spaces',
        ['Plans and permits', 'Full construction management', 'Our own crew on site', 'Weekly report', 'Extended warranty'], false, 'Free estimate'],
];

/** Trades for the ticker */
$TICKER = ['Roofing', 'Framing', 'Drywall', 'Concrete', 'Remodeling', 'Painting', 'Siding', 'Decks', 'Permits', 'New builds'];

/** Testimonials: [quote, name, context] */
$TESTIMONIALS = [
    ['They gave us an itemized estimate and stuck to it. The kitchen was finished a week early.', 'The R. family', 'Kitchen remodel'],
    ['What I valued most was the weekly photo report. I never had to call and ask how it was going.', 'Carlos M.', 'Second-story addition'],
    ['Clean work and a serious crew. We already hired them for the second location.', 'Andrea P.', 'Retail build-out'],
];

$FAQ = [
    ['Is the estimate free?', 'Yes. The site visit and the line-item budget are free and come with no obligation.'],
    ['Do you handle permits?', 'Yes. Plans, permits and inspections with the city are part of the contract.'],
    ['How is the work paid for?', 'By progress: a deposit to start and partial payments against verified milestones.'],
    ['How long does a project take?', 'A bathroom runs 1 to 3 weeks, a kitchen 3 to 6, an addition 8 to 16. The date is in writing on your estimate.'],
    ['Do you offer a warranty?', 'Yes, a written 1-year workmanship warranty, plus the manufacturer warranty on materials.'],
    ['Do you work with insurance claims?', 'Yes. We document the damage and work with the adjuster on storm, water and fire claims.'],
];
