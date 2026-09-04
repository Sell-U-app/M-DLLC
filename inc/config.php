<?php
/**
 * M&D Buildings LLC — configuración única del sitio.
 * Cambia AQUÍ textos, colores y datos de contacto. No toques las plantillas.
 *
 * TODO (datos reales pendientes): teléfono, email, dirección, número de licencia, redes.
 */

$SITE = [
    'name'       => 'M&D Buildings LLC',
    'tagline'    => 'Construimos y remodelamos con precio claro y avance a la vista.',
    'lang'       => 'es',
    'base_url'   => getenv('SITE_URL') ?: 'https://mdbuildingsllc.com',

    // --- Contacto (REEMPLAZAR con los datos reales) ---
    'email'      => 'info@mdbuildingsllc.com',
    'phone'      => '+1 (000) 000-0000',
    'phone_tel'  => '+10000000000',
    'whatsapp'   => '10000000000',
    'address'    => 'Estados Unidos',
    'hours'      => 'Lunes a sábado, 7:00 am – 6:00 pm',
    'license'    => 'Licenciados y asegurados',

    'form_to'     => 'info@mdbuildingsllc.com',
    'og_default'  => 'logo-stacked.png',
    'logo'        => 'logo-horizontal-light.png', // version clara para el header oscuro
    'logo_footer' => 'logo-stacked-light.png',
    'cta_label'   => 'Estimado gratis',
    'cta_url'     => 'contacto.php',
];

/** Paleta tomada del logo: azul noche #13273D + ámbar #F0A21B */
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
    'home'      => ['label' => 'Inicio',    'url' => 'index.php'],
    'servicios' => ['label' => 'Servicios', 'url' => 'servicios.php'],
    'proyectos' => ['label' => 'Proyectos', 'url' => 'proyectos.php'],
    'contacto'  => ['label' => 'Contacto',  'url' => 'contacto.php'],
];

/** Servicios: [título, descripción, trabajos[]] */
$SERVICIOS = [
    ['Construcción residencial', 'Casas nuevas y unidades multifamiliares, desde la cimentación hasta la entrega.',
        ['Cimentación y estructura', 'Framing y cubierta', 'Instalaciones y acabados', 'Permisos e inspecciones']],
    ['Remodelación integral', 'Renovamos cocinas, baños y espacios completos sin dejarte la casa parada.',
        ['Cocinas y baños', 'Pisos y carpintería', 'Iluminación y eléctrico', 'Plomería']],
    ['Ampliaciones y adiciones', 'Metros extra bien construidos: cuartos, garajes, decks y segundos pisos.',
        ['Cuartos adicionales', 'Garajes y bodegas', 'Decks y patios', 'Segundos pisos']],
    ['Techos y exteriores', 'Protegemos la casa por fuera: cubierta, fachada y drenajes.',
        ['Roofing y reparaciones', 'Siding y fachadas', 'Canales y drenajes', 'Impermeabilización']],
    ['Concreto y obra civil', 'Bases firmes, bien niveladas y con acabado parejo.',
        ['Driveways y andenes', 'Losas y cimentaciones', 'Muros de contención', 'Concreto estampado']],
    ['Drywall, pintura y acabados', 'El detalle final que hace que el trabajo se vea profesional.',
        ['Drywall y texturas', 'Pintura interior y exterior', 'Molduras y trim', 'Puertas y clósets']],
];

/** Cómo trabajamos (tabs del home): [título, texto] */
$TABS = [
    ['Estimado claro',    'Visitamos la obra, medimos y te entregamos un presupuesto detallado por partidas. Sabes qué incluye, qué no incluye y cuánto cuesta antes de firmar.'],
    ['Permisos',          'Nos encargamos de planos, permisos e inspecciones con la ciudad. Tú no persigues trámites.'],
    ['Avance a la vista', 'Cada semana recibes fotos, porcentaje de avance y lo que sigue. Nada de “vamos bien” sin evidencia.'],
    ['Entrega y garantía','Revisión final punto por punto contigo y garantía escrita sobre la mano de obra.'],
];

/** Proceso: [número, título, texto] */
$PROCESO = [
    ['01', 'Visita y medición',       'Vamos al sitio, entendemos el alcance y tomamos medidas reales.'],
    ['02', 'Presupuesto por partidas','Recibes el estimado desglosado en 48 a 72 horas, sin costo.'],
    ['03', 'Permisos y cronograma',   'Tramitamos permisos y fijamos fechas de inicio y entrega.'],
    ['04', 'Ejecución con reportes',  'Equipo propio en obra y reporte semanal con fotos y avance.'],
    ['05', 'Entrega y garantía',      'Walkthrough final, lista de pendientes en cero y garantía escrita.'],
];

/** Cifras: [número, etiqueta] */
$STATS = [
    ['+150',  'proyectos entregados'],
    ['12',    'años de experiencia'],
    ['100%',  'licenciados y asegurados'],
    ['1 año', 'de garantía en mano de obra'],
];

/** Proyectos: [título, tipo, resumen, estado, avance] */
$PROYECTOS = [
    ['Remodelación de cocina',  'Residencial', 'Cocina completa: gabinetes, isla, quartz, eléctrico y pisos.', 'Entregado', '100%'],
    ['Adición de segundo piso', 'Residencial', 'Dos habitaciones y un baño sobre estructura existente.',       'Entregado', '100%'],
    ['Local comercial',         'Comercial',   'Build-out completo con baños ADA y fachada nueva.',            'Entregado', '100%'],
    ['Casa nueva 2.400 sq ft',  'Obra nueva',  'Llave en mano, desde cimentación hasta acabados.',             'En obra',   '68%'],
    ['Driveway y patio',        'Concreto',    'Concreto estampado con drenaje y muro bajo.',                  'Entregado', '100%'],
    ['Techo y siding',          'Exteriores',  'Cambio total de cubierta y fachada tras daño por tormenta.',   'Entregado', '100%'],
];

/** Tipos de proyecto: [título, para quién, incluye[], destacado, precio] */
$TIPOS = [
    ['Reparaciones', 'Trabajos puntuales',
        ['Diagnóstico en sitio', 'Materiales incluidos', 'Ejecución en 1 a 5 días', 'Garantía escrita'], false, 'Estimado gratis'],
    ['Remodelación', 'Cocinas, baños y ampliaciones',
        ['Diseño y selección de materiales', 'Permisos incluidos', 'Cronograma por semanas', 'Reporte de avance con fotos', 'Garantía 1 año'], true, 'Estimado gratis'],
    ['Obra nueva', 'Casas y locales llave en mano',
        ['Planos y permisos', 'Gerencia de obra completa', 'Equipo propio en sitio', 'Reporte semanal', 'Garantía extendida'], false, 'Estimado gratis'],
];

/** Especialidades para el ticker */
$TICKER = ['Roofing', 'Framing', 'Drywall', 'Concreto', 'Remodelación', 'Pintura', 'Siding', 'Decks', 'Permisos', 'Obra nueva'];

/** Testimonios: [texto, nombre, contexto] */
$TESTIMONIOS = [
    ['Nos dieron el estimado desglosado y lo respetaron. La cocina quedó lista una semana antes.', 'Familia R.', 'Remodelación de cocina'],
    ['Lo que más valoro es el reporte semanal con fotos. Nunca tuve que llamar a preguntar cómo iba.', 'Carlos M.', 'Adición de segundo piso'],
    ['Trabajo limpio y equipo serio. Ya los contratamos para el segundo local.', 'Andrea P.', 'Local comercial'],
];

$FAQ = [
    ['¿El estimado tiene costo?', 'No. La visita y el presupuesto por partidas son gratis y sin compromiso.'],
    ['¿Manejan los permisos?', 'Sí. Tramitamos planos, permisos e inspecciones con la ciudad como parte del contrato.'],
    ['¿Cómo se paga la obra?', 'Por avance: un anticipo para arrancar y pagos parciales contra hitos cumplidos y verificados.'],
    ['¿Cuánto se demora un proyecto?', 'Un baño toma de 1 a 3 semanas, una cocina de 3 a 6 y una adición de 8 a 16. La fecha queda por escrito en el estimado.'],
    ['¿Dan garantía?', 'Sí, garantía escrita de 1 año sobre la mano de obra, además de la garantía del fabricante en materiales.'],
    ['¿Trabajan con aseguradoras?', 'Sí. Documentamos daños y trabajamos con la aseguradora en casos de tormenta, agua o fuego.'],
];
