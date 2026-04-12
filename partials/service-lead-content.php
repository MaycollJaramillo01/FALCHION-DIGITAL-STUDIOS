<?php
@session_start();
if (!isset($ServicePages)) {
    include_once __DIR__ . '/../text.php';
}
$serviceLeadCtaUrl = $PrimaryCTAUrl ?? 'contact.php';

$serviceKey = isset($serviceKey) ? (string)$serviceKey : '';
$serviceData = isset($ServicePages[$serviceKey]) ? $ServicePages[$serviceKey] : null;
if (!$serviceData) {
    echo '<section style="padding:60px 0;background:var(--brand-primary);color:var(--brand-accent);"><div class="container"><h2>Servicio no encontrado</h2></div></section>';
    return;
}

$serviceIndexMap = [
    'website_creation' => 1,
    'website_redesign' => 2,
    'landing_pages' => 3,
    'logo_redesign' => 4,
    'digital_presence_setup' => 5
];

$serviceIndex = $serviceIndexMap[$serviceKey] ?? null;
$serviceSummary = '';
if ($serviceIndex !== null && !empty($SD[$serviceIndex])) {
    $serviceSummary = trim((string)$SD[$serviceIndex]);
    $serviceSummary = preg_replace('/\s+/', ' ', $serviceSummary);
    $serviceSummary = preg_replace('/\s*(?:Focus|Enfoque):\s*[^\.]+\.?/i', '', $serviceSummary);
    $serviceSummary = preg_replace('/\s*(?:Delivery|Entrega):\s*[^\.]+\.?/i', '', $serviceSummary);
    $serviceSummary = trim($serviceSummary);
}
if ($serviceSummary === '') {
    $serviceSummary = (string)$serviceData['hero_lead'];
}

$serviceImage = 'assets/img/service/' . ((int)$serviceIndex) . '.jpg';
if ($serviceIndex === null || !file_exists(__DIR__ . '/../' . $serviceImage)) {
    $serviceImage = 'assets/img/service/3.jpg';
}

$pageUrl = rtrim((string)($BaseURL ?? ''), '/') . '/' . ltrim(i18n_localized_url((string)($serviceData['file'] ?? 'services.php')), '/');
$faqList = isset($serviceData['faq']) && is_array($serviceData['faq']) ? $serviceData['faq'] : [];

$serviceJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => (string)$serviceData['hero_title'],
    'serviceType' => (string)$serviceData['hero_title'],
    'description' => (string)$serviceData['meta_description'],
    'provider' => [
        '@type' => 'Organization',
        'name' => (string)($Company ?? 'BrandBoost Marketing'),
        'url' => rtrim((string)($BaseURL ?? ''), '/')
    ],
    'areaServed' => !empty($Areas) ? array_values($Areas) : [$Locality . ', ' . $Region],
    'url' => $pageUrl
];

$breadcrumbJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Inicio',
            'item' => rtrim((string)($BaseURL ?? ''), '/') . '/' . ltrim(i18n_localized_url('index.php'), '/')
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Servicios',
            'item' => rtrim((string)($BaseURL ?? ''), '/') . '/' . ltrim(i18n_localized_url('services.php'), '/')
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => (string)$serviceData['hero_title'],
            'item' => $pageUrl
        ]
    ]
];

$faqJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(static function ($faq) {
        return [
            '@type' => 'Question',
            'name' => (string)($faq['q'] ?? ''),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => (string)($faq['a'] ?? '')
            ]
        ];
    }, $faqList)
];
?>

<section class="sld-hero" id="service-lead-hero">
    <div class="container sld-hero__wrap">
        <div class="sld-hero__content">
            <p class="sld-kicker"><i class="fa-solid fa-asterisk"></i> SERVICIO ESTRATEGICO</p>
            <h1><?= htmlspecialchars((string)$serviceData['hero_title'], ENT_QUOTES, 'UTF-8') ?>
                <span><?= htmlspecialchars((string)$serviceData['hero_highlight'], ENT_QUOTES, 'UTF-8') ?></span>
            </h1>
            <p class="sld-lead"><?= htmlspecialchars((string)$serviceData['hero_lead'], ENT_QUOTES, 'UTF-8') ?></p>

            <div class="sld-cta-row">
                <a href="#contact" class="sld-btn sld-btn--primary">Iniciar estrategia</a>
                <a href="<?= htmlspecialchars((string)$serviceLeadCtaUrl, ENT_QUOTES, 'UTF-8') ?>" class="sld-btn sld-btn--ghost">Contacto</a>
            </div>

            <ul class="sld-intent-points">
                <?php foreach ((array)$serviceData['intent_points'] as $point): ?>
                    <li><i class="fa-solid fa-circle-check"></i><span><?= htmlspecialchars((string)$point, ENT_QUOTES, 'UTF-8') ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <aside class="sld-hero__media">
            <img src="<?= htmlspecialchars($serviceImage, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars((string)$serviceData['hero_title'], ENT_QUOTES, 'UTF-8') ?>">
            <div class="sld-summary">
                <strong>Resumen</strong>
                <p><?= htmlspecialchars($serviceSummary, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </aside>
    </div>
</section>

<section class="sld-value">
    <div class="container">
        <div class="sld-grid">
            <article class="sld-box">
                <h2>Entregables incluidos</h2>
                <ul>
                    <?php foreach ((array)$serviceData['deliverables'] as $item): ?>
                        <li><i class="fa-solid fa-arrow-right"></i><span><?= htmlspecialchars((string)$item, ENT_QUOTES, 'UTF-8') ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="sld-box">
                <h2>Resultados de negocio</h2>
                <ul>
                    <?php foreach ((array)$serviceData['outcomes'] as $item): ?>
                        <li><i class="fa-solid fa-bolt"></i><span><?= htmlspecialchars((string)$item, ENT_QUOTES, 'UTF-8') ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </div>
    </div>
</section>

<?php if ($faqList): ?>
<section class="sld-faq" id="service-faq">
    <div class="container">
        <header class="sld-faq__head">
            <p>PREGUNTAS FRECUENTES DEL SERVICIO</p>
            <h2>Preguntas antes de contratar este servicio</h2>
        </header>

        <div class="sld-faq__items">
            <?php foreach ($faqList as $idx => $faq): ?>
                <details class="sld-faq__item" <?= $idx === 0 ? 'open' : '' ?>>
                    <summary><?= htmlspecialchars((string)($faq['q'] ?? ''), ENT_QUOTES, 'UTF-8') ?></summary>
                    <p><?= htmlspecialchars((string)($faq['a'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script type="application/ld+json"><?= json_encode($serviceJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<script type="application/ld+json"><?= json_encode($breadcrumbJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<?php if ($faqList): ?>
<script type="application/ld+json"><?= json_encode($faqJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<?php endif; ?>

<style>
.sld-hero {
    padding: 84px 0 52px;
    background:
      radial-gradient(560px 280px at 14% 6%, color-mix(in srgb, var(--brand-secondary) 16%, transparent), transparent 75%),
      linear-gradient(180deg, var(--brand-primary) 0%, color-mix(in srgb, var(--brand-primary) 88%, #000 12%) 100%);
}

.sld-hero__wrap {
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    gap: 24px;
    align-items: start;
}

.sld-kicker {
    margin: 0 0 12px;
    color: var(--brand-secondary);
    font-size: 0.82rem;
    letter-spacing: 0.08em;
    font-weight: 700;
    text-transform: uppercase;
}

.sld-kicker i { margin-right: 8px; }

.sld-hero h1 {
    margin: 0 0 16px;
    color: var(--brand-accent);
    font-size: clamp(2rem, 4.5vw, 3.6rem);
    font-weight: 800;
    line-height: 1.08;
}

.sld-hero h1 span {
    display: block;
    color: var(--brand-secondary);
    font-weight: 700;
}

.sld-lead {
    margin: 0;
    color: color-mix(in srgb, var(--brand-accent) 80%, var(--brand-primary) 20%);
    line-height: 1.7;
    font-size: 1rem;
}

.sld-cta-row {
    margin-top: 18px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.sld-btn {
    border-radius: 999px;
    padding: 10px 18px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.92rem;
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.sld-btn:hover { transform: translateY(-2px); }

.sld-btn--primary {
    background: var(--brand-accent);
    color: var(--brand-primary);
}

.sld-btn--ghost {
    background: color-mix(in srgb, var(--brand-accent) 8%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 22%, transparent);
    color: var(--brand-accent);
}

.sld-intent-points {
    list-style: none;
    margin: 18px 0 0;
    padding: 0;
    display: grid;
    gap: 8px;
}

.sld-intent-points li {
    display: grid;
    grid-template-columns: 18px 1fr;
    gap: 10px;
    color: color-mix(in srgb, var(--brand-accent) 82%, var(--brand-primary) 18%);
    font-size: 0.92rem;
}

.sld-intent-points i { color: var(--brand-secondary); margin-top: 2px; }

.sld-hero__media {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    border-radius: 16px;
    overflow: hidden;
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
}

.sld-hero__media img {
    display: block;
    width: 100%;
    height: 270px;
    object-fit: cover;
}

.sld-summary {
    padding: 14px 14px 16px;
}

.sld-summary strong {
    color: var(--brand-secondary);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.sld-summary p {
    margin: 8px 0 0;
    color: color-mix(in srgb, var(--brand-accent) 78%, var(--brand-primary) 22%);
    font-size: 0.92rem;
    line-height: 1.65;
}

.sld-value {
    padding: 12px 0 46px;
    background: color-mix(in srgb, var(--brand-primary) 94%, #000 6%);
}

.sld-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.sld-box {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    border-radius: 16px;
    padding: 18px 16px;
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
}

.sld-box h2 {
    margin: 0 0 12px;
    color: var(--brand-accent);
    font-size: 1.28rem;
}

.sld-box ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: grid;
    gap: 8px;
}

.sld-box li {
    display: grid;
    grid-template-columns: 16px 1fr;
    gap: 10px;
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    font-size: 0.92rem;
    line-height: 1.55;
}

.sld-box li i {
    color: var(--brand-secondary);
    margin-top: 2px;
    font-size: 0.76rem;
}

.sld-faq {
    padding: 0 0 36px;
    background: color-mix(in srgb, var(--brand-primary) 94%, #000 6%);
}

.sld-faq__head p {
    margin: 0 0 10px;
    color: var(--brand-secondary);
    font-size: 0.8rem;
    letter-spacing: 0.08em;
    font-weight: 700;
}

.sld-faq__head h2 {
    margin: 0 0 14px;
    color: var(--brand-accent);
    font-size: clamp(1.5rem, 3.2vw, 2.2rem);
}

.sld-faq__items {
    display: grid;
    gap: 10px;
}

.sld-faq__item {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    border-radius: 12px;
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    padding: 12px 14px;
}

.sld-faq__item summary {
    cursor: pointer;
    color: var(--brand-accent);
    font-weight: 700;
    font-size: 0.95rem;
    list-style: none;
}

.sld-faq__item summary::-webkit-details-marker { display: none; }
.sld-faq__item p {
    margin: 10px 0 0;
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    font-size: 0.9rem;
    line-height: 1.6;
}

@media (max-width: 991px) {
    .sld-hero__wrap { grid-template-columns: 1fr; }
    .sld-grid { grid-template-columns: 1fr; }
}
</style>
