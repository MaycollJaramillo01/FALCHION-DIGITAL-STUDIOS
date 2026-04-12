<?php
@session_start();
if (!isset($ServicePages)) {
    include_once __DIR__ . '/../text.php';
}

$projectBasePath = __DIR__ . '/../assets/img/projects/';
$projectBaseUrl = 'assets/img/projects/';

$portfolioCaseByService = [];
if (!empty($PortfolioCases) && is_array($PortfolioCases)) {
    foreach ($PortfolioCases as $entry) {
        if (!empty($entry['service_key'])) {
            $portfolioCaseByService[(string)$entry['service_key']] = $entry;
        }
    }
}

$tabs = [];
if (!empty($ServicePages) && is_array($ServicePages)) {
    foreach ($ServicePages as $serviceKey => $serviceData) {
        $folderSlug = str_replace('_', '-', (string)$serviceKey);
        $folderPath = $projectBasePath . $folderSlug;
        $folderUrl = $projectBaseUrl . $folderSlug . '/';

        $images = [];
        if (is_dir($folderPath)) {
            $images = glob($folderPath . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE) ?: [];
            natsort($images);
            $images = array_values($images);
        }

        $tabs[] = [
            'key' => (string)$serviceKey,
            'slug' => $folderSlug,
            'label' => (string)($serviceData['nav'] ?? ucwords(str_replace('-', ' ', $folderSlug))),
            'file' => (string)($serviceData['file'] ?? 'services.php'),
            'hero_lead' => (string)($serviceData['hero_lead'] ?? ''),
            'case' => $portfolioCaseByService[(string)$serviceKey] ?? null,
            'images' => $images,
            'url' => $folderUrl
        ];
    }
}

$firstTabSlug = !empty($tabs[0]['slug']) ? (string)$tabs[0]['slug'] : '';
?>

<section class="pft-section" id="portfolio-cases">
    <div class="container">
        <header class="pft-head">
            <p><i class="fa-solid fa-asterisk"></i> CASOS DE ESTUDIO POR SERVICIO</p>
            <h2>Portafolio segmentado por linea de servicio</h2>
            <span>Cambia de pestaña para revisar casos de exito por cada servicio.</span>
        </header>

        <div class="pft-tabs" role="tablist" aria-label="Pestañas de portafolio por servicio">
            <?php foreach ($tabs as $index => $tab): ?>
                <button
                    class="pft-tab <?= $index === 0 ? 'is-active' : '' ?>"
                    type="button"
                    role="tab"
                    aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
                    data-tab="<?= htmlspecialchars($tab['slug'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($tab['label'], ENT_QUOTES, 'UTF-8') ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="pft-grid" id="pft-grid">
            <?php foreach ($tabs as $tab): ?>
                <?php
                $caseTitle = !empty($tab['case']['title']) ? (string)$tab['case']['title'] : ($tab['label'] . ' - Caso de estudio');
                $caseText = !empty($tab['case']['execution']) ? (string)$tab['case']['execution'] : (string)$tab['hero_lead'];
                $caseTextShort = trim($caseText);
                if (strlen($caseTextShort) > 145) {
                    $caseTextShort = substr($caseTextShort, 0, 145) . '...';
                }
                ?>
                <?php foreach ($tab['images'] as $imgIndex => $imgPath): ?>
                    <?php
                    $imgName = basename($imgPath);
                    $cleanTitle = ucwords(str_replace(['-', '_'], ' ', pathinfo($imgName, PATHINFO_FILENAME)));
                    $cardTitle = ($imgIndex === 0) ? $caseTitle : ($tab['label'] . ' - ' . $cleanTitle);
                    $imgUrl = $tab['url'] . rawurlencode($imgName);
                    ?>
                    <article
                        class="pft-card js-pft-card <?= $tab['slug'] === $firstTabSlug ? 'is-visible' : '' ?>"
                        data-service="<?= htmlspecialchars($tab['slug'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="pft-card__image">
                            <img src="<?= htmlspecialchars($imgUrl, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($cardTitle, ENT_QUOTES, 'UTF-8') ?>">
                        </div>
                        <div class="pft-card__body">
                            <p class="pft-card__tag"><?= htmlspecialchars($tab['label'], ENT_QUOTES, 'UTF-8') ?></p>
                            <h3><?= htmlspecialchars($cardTitle, ENT_QUOTES, 'UTF-8') ?></h3>
                            <p class="pft-card__text"><?= htmlspecialchars($caseTextShort, ENT_QUOTES, 'UTF-8') ?></p>
                            <a href="<?= htmlspecialchars($tab['file'], ENT_QUOTES, 'UTF-8') ?>">Ver caso del servicio <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.pft-section {
    padding: 82px 0 30px;
    background:
      radial-gradient(520px 280px at 86% 12%, color-mix(in srgb, var(--brand-secondary) 14%, transparent), transparent 72%),
      linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 94%, #000 6%) 0%, color-mix(in srgb, var(--brand-primary) 96%, #000 4%) 100%);
}

.pft-head {
    text-align: center;
    max-width: 760px;
    margin: 0 auto 26px;
}

.pft-head p {
    margin: 0 0 9px;
    color: var(--brand-secondary);
    font-size: 0.82rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    font-weight: 700;
}

.pft-head p i { margin-right: 7px; }

.pft-head h2 {
    margin: 0 0 8px;
    color: var(--brand-accent);
    font-size: clamp(1.8rem, 4vw, 2.7rem);
    line-height: 1.15;
}

.pft-head span {
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    font-size: 0.95rem;
}

.pft-tabs {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 8px;
    margin-bottom: 20px;
}

.pft-tab {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 3%, transparent);
    color: var(--brand-accent);
    border-radius: 10px;
    padding: 7px 13px;
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
}

.pft-tab.is-active {
    background: var(--brand-secondary);
    border-color: var(--brand-secondary);
    color: var(--brand-primary);
}

.pft-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
}

.pft-card {
    display: none;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
}

.pft-card.is-visible {
    display: block;
}

.pft-card__image {
    height: 190px;
    overflow: hidden;
}

.pft-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.pft-card:hover .pft-card__image img {
    transform: scale(1.06);
}

.pft-card__body {
    padding: 12px 12px 14px;
}

.pft-card__tag {
    margin: 0 0 6px;
    color: var(--brand-secondary);
    font-size: 0.74rem;
    font-weight: 700;
}

.pft-card h3 {
    margin: 0 0 7px;
    color: var(--brand-accent);
    font-size: 1.08rem;
    line-height: 1.3;
}

.pft-card__text {
    margin: 0;
    color: color-mix(in srgb, var(--brand-accent) 72%, var(--brand-primary) 28%);
    font-size: 0.86rem;
    line-height: 1.55;
    min-height: 65px;
}

.pft-card a {
    margin-top: 11px;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    text-decoration: none;
    color: var(--brand-secondary);
    font-weight: 700;
    font-size: 0.84rem;
}

.pft-card a i { font-size: 0.72rem; }

@media (max-width: 991px) {
    .pft-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}

@media (max-width: 575px) {
    .pft-grid { grid-template-columns: 1fr; }
}
</style>

<script>
(function () {
    var tabs = document.querySelectorAll('.pft-tab');
    var cards = document.querySelectorAll('.js-pft-card');
    if (!tabs.length || !cards.length) return;

    function activateTab(slug) {
        tabs.forEach(function (btn) {
            var active = btn.getAttribute('data-tab') === slug;
            btn.classList.toggle('is-active', active);
            btn.setAttribute('aria-selected', active ? 'true' : 'false');
        });

        cards.forEach(function (card) {
            var show = card.getAttribute('data-service') === slug;
            card.classList.toggle('is-visible', show);
        });
    }

    tabs.forEach(function (btn) {
        btn.addEventListener('click', function () {
            activateTab(btn.getAttribute('data-tab'));
        });
    });

    activateTab(tabs[0].getAttribute('data-tab'));
})();
</script>
