<?php
/**
 * Policy content for every legal page.
 *
 * IMPORTANT: these are plain-language templates, not legal advice. Have counsel
 * licensed in your state review them, and fill in the placeholders in $SITE
 * ('state', 'legal_address', 'legal_email', 'legal_updated') before publishing.
 *
 * Shape: $LEGAL[key] = ['title', 'summary', 'sections' => [[heading, [paragraphs]]]]
 * A paragraph that is an array is rendered as a bulleted list.
 */
require_once __DIR__ . '/config.php';

$C = $SITE['legal_name'];
$E = $SITE['email'];
$LE = $SITE['legal_email'] ?? $SITE['email'];
$ST = $SITE['state'];
$AD = $SITE['legal_address'];
$SN = $SITE['name'];

$LEGAL = [

'privacy' => [
    'title'   => 'Privacy Policy',
    'summary' => "How $C collects, uses and protects the information you share through this website.",
    'sections' => [
        ['Who we are', [
            "$C (\"we\", \"us\", \"our\") operates this website. We are responsible for the personal information described in this policy. You can reach us at $LE.",
        ]],
        ['Information you give us', [
            'When you submit our contact form, we collect what you type into it:',
            ['Your name', 'Your email address', 'Your phone number', 'The details you write about your project or request', 'Any other information you choose to include'],
            'We ask only for what we need to respond to you. You are never required to use the form; you can email us instead.',
        ]],
        ['Information collected automatically', [
            'Our web server keeps standard access logs, which may include your IP address, browser type, the pages you request and the date and time of the request. These logs are used to keep the site running and secure, not to build a profile of you.',
            'This site does not run advertising trackers or third-party analytics by default. If that changes, this policy and our Cookie Policy will be updated first.',
        ]],
        ['Fonts and other third-party resources', [
            'The site loads typefaces from Google Fonts. When your browser requests those files, Google receives your IP address and standard request headers. We do not share your form submissions with Google or with any advertising network.',
        ]],
        ['How we use your information', [
            ['To answer your message and prepare an estimate or proposal', 'To schedule and carry out work you request', 'To keep records of our communications', 'To protect the site against abuse, spam and fraud', 'To comply with legal, tax and regulatory obligations'],
            'We do not sell your personal information, and we do not share it with third parties for their own marketing.',
        ]],
        ['Who we share it with', [
            'We share information only when we need to, and only with:',
            ['Service providers who host the site, deliver our email or store our records, bound to use it only on our instructions', 'Subcontractors and suppliers involved in your specific project, limited to what the job requires', 'Professional advisers such as our accountant, insurer or attorney', 'Authorities, when the law requires it or to protect our legal rights'],
        ]],
        ['How long we keep it', [
            'Inquiries that do not turn into a project are kept for up to 24 months and then deleted. Records tied to work we performed are kept for as long as our legal, tax, warranty and insurance obligations require.',
        ]],
        ['Security', [
            'The site is served over HTTPS and access to submissions is limited to the people who need it. No method of transmission or storage is completely secure, so we cannot guarantee absolute security. Please do not send sensitive information such as government ID numbers, bank account details or payment card numbers through the contact form.',
        ]],
        ['Your choices and rights', [
            'You can ask us to give you a copy of the personal information we hold about you, correct it, or delete it. Write to ' . $LE . ' and we will respond within a reasonable time.',
            'If you live in a state with a comprehensive privacy law, such as California, Colorado, Connecticut, Texas or Virginia, you may have additional rights, including the right not to be discriminated against for exercising them. We do not sell personal information or share it for cross-context behavioral advertising as those terms are defined in those laws.',
        ]],
        ['Children', [
            'This site is meant for adults. We do not knowingly collect personal information from anyone under 13. If you believe a child has sent us information, contact us and we will delete it.',
        ]],
        ['Links to other sites', [
            'Our site may link to third-party websites. We do not control them and are not responsible for their content or their privacy practices. Read their policies before sharing information with them.',
        ]],
        ['Changes to this policy', [
            'We may update this policy. The revised version takes effect when it is posted here, and the date below changes with it. If the change is significant, we will make that clear on the page.',
        ]],
        ['Contact', [
            "Questions about this policy? Email $LE" . ($AD !== '' ? " or write to $C, $AD" : '') . ".",
        ]],
    ],
],

'terms' => [
    'title'   => 'Terms of Use',
    'summary' => "The rules that apply when you use the $SN website.",
    'sections' => [
        ['Accepting these terms', [
            "By using this website you agree to these Terms of Use. If you do not agree, please do not use the site.",
        ]],
        ['What this website is', [
            'This site describes our services and lets you get in touch. It is general information, not a bid, a contract or professional advice for your specific property.',
            'Nothing here creates a contractor–client relationship. That relationship starts only when both parties sign a written contract for a specific scope of work.',
        ]],
        ['Estimates, prices and timelines', [
            'Any price range, duration or figure shown on this site is illustrative. Real pricing depends on the site conditions, the scope, the materials and the permits, and is only binding when it appears in a written estimate signed by both parties.',
            'Photos, renderings and progress figures shown on the site are illustrative of the type of work we do unless they are expressly identified as a specific completed project.',
        ]],
        ['Licensing', [
            "We hold the licenses and insurance required to perform the work we offer in the jurisdictions where we operate. Licensing requirements vary by state, county and municipality, and we do not perform work where we are not authorized to do so. Ask us for our current license and insurance certificates before signing anything.",
        ]],
        ['Acceptable use', [
            'You agree not to:',
            ['Use the site for anything unlawful', 'Try to gain unauthorized access to the site, its server or its data', 'Interfere with the site, overload it, or scrape it with automated tools', 'Submit false information, spam or malicious content through our forms', 'Copy, reuse or republish our content, photos or branding without written permission'],
        ]],
        ['Intellectual property', [
            "The content of this site, including text, layout, graphics, photographs and the $SN name and logo, belongs to $C or is used with permission. You may view and print pages for your own use. Any other use requires our written consent.",
        ]],
        ['Third-party links', [
            'We may link to other websites for convenience. We do not endorse them and we are not responsible for their content, products or practices.',
        ]],
        ['Disclaimer of warranties', [
            'The site is provided "as is" and "as available". To the fullest extent permitted by law, we disclaim all warranties, express or implied, including merchantability, fitness for a particular purpose and non-infringement. We do not warrant that the site will be uninterrupted, error-free or free of harmful components.',
            'This disclaimer applies to the website only. It does not affect the written warranty we give on work we actually perform under a signed contract.',
        ]],
        ['Limitation of liability', [
            "To the fullest extent permitted by law, $C and its owners, employees and contractors will not be liable for any indirect, incidental, special, consequential or punitive damages arising out of your use of this website, or for any loss of profits, revenue or data, even if we were advised such damages were possible. Our total liability arising from your use of the website will not exceed one hundred US dollars (US\$100).",
            'Some jurisdictions do not allow certain limitations, so parts of this section may not apply to you.',
        ]],
        ['Indemnification', [
            "You agree to indemnify and hold harmless $C from any claim, loss or expense, including reasonable attorneys' fees, arising from your misuse of the site or your breach of these terms.",
        ]],
        ['Governing law', [
            "These terms are governed by the laws of the State of $ST, without regard to its conflict-of-law rules. Any dispute will be brought exclusively in the state or federal courts located in $ST, and you consent to their jurisdiction.",
        ]],
        ['Changes', [
            'We may revise these terms at any time. The version posted here is the one that applies, and continuing to use the site after a change means you accept it.',
        ]],
        ['Contact', [
            "Questions about these terms? Email $LE" . ($AD !== '' ? " or write to $C, $AD" : '') . ".",
        ]],
    ],
],

'cookies' => [
    'title'   => 'Cookie Policy',
    'summary' => 'What this site stores in your browser, and how to control it.',
    'sections' => [
        ['What cookies are', [
            'A cookie is a small text file a website asks your browser to store. Similar technologies include local storage and pixels. They are used to remember preferences, keep sessions open or measure how a site is used.',
        ]],
        ['What this site uses', [
            'This website is deliberately light. As published, it does not set advertising or tracking cookies, and it does not run a third-party analytics tool.',
            'The only cookies that may be set are strictly necessary ones created by the web server or a security layer to serve pages correctly and protect the site against abuse. They do not identify you personally and they are not used for marketing.',
            'Your browser will also cache static files such as images, fonts and stylesheets. That is standard caching, not tracking.',
        ]],
        ['Third-party requests', [
            'Typefaces are loaded from Google Fonts, so your browser makes a request to Google servers when a page opens. That request carries your IP address and standard headers. It does not place an advertising cookie from us.',
        ]],
        ['If that changes', [
            'If we add analytics, remarketing or embedded third-party content that sets cookies, we will update this page and add a consent banner where the law requires one, before those cookies are set.',
        ]],
        ['How to control cookies', [
            'You can block or delete cookies from your browser settings:',
            ['Chrome: Settings → Privacy and security → Third-party cookies', 'Safari: Settings → Privacy', 'Firefox: Settings → Privacy & Security', 'Edge: Settings → Cookies and site permissions'],
            'Blocking strictly necessary cookies may break parts of the site.',
        ]],
        ['Contact', [
            "Questions about cookies? Email $LE.",
        ]],
    ],
],

'accessibility' => [
    'title'   => 'Accessibility Statement',
    'summary' => "How $SN works to keep this website usable by everyone.",
    'sections' => [
        ['Our commitment', [
            'We want this site to be usable by as many people as possible, including people who use screen readers, keyboard navigation, magnification or reduced-motion settings.',
        ]],
        ['The standard we aim for', [
            'We aim to conform to the Web Content Accessibility Guidelines (WCAG) 2.1 at Level AA. Conformance is an ongoing effort, not a one-time certification.',
        ]],
        ['What we have done', [
            ['Semantic HTML with real headings, lists and landmark regions', 'A "skip to content" link at the top of every page', 'Full keyboard operation, including the navigation menu, tabs and accordions, which work without JavaScript', 'Visible focus outlines on links, buttons and form fields', 'Form fields with associated labels and clear error messages', 'Text and interface colors chosen for contrast against the dark background', 'Layouts that reflow down to small screens without horizontal scrolling', 'Animation that is disabled automatically when your system requests reduced motion', 'Alternative text on meaningful images'],
        ]],
        ['Known limitations', [
            'We are aware of the following and are working on them:',
            ['Some decorative background patterns are rendered with CSS and are not described to assistive technology, by design', 'Documents we link to, such as PDFs, may not be fully tagged for accessibility', 'Third-party content, such as embedded maps or chat widgets added later, may not meet the same standard'],
        ]],
        ['Tell us if something does not work', [
            "If you hit a barrier on this site, email $LE with the page address and a short description of the problem. We will reply and tell you what we can do. If you need information from the site in another format, ask and we will provide it another way.",
        ]],
    ],
],

];
