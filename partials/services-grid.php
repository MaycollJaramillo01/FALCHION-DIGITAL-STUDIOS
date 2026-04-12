<?php
@session_start();
if (!isset($SN) || !isset($SD)) {
    include_once __DIR__ . '/../text.php';
}

$serviceCards = [];
$servicePageByIndex = [
    1 => 'website-creation.php',
    2 => 'website-redesign.php',
    3 => 'landing-pages.php',
    4 => 'logo-redesign.php',
    5 => 'digital-presence-setup.php'
];
if (isset($SN) && is_array($SN)) {
    foreach ($SN as $i => $title) {
        if (!is_string($title) || trim($title) === '') {
            continue;
        }

        $description = isset($SD[$i]) ? trim((string)$SD[$i]) : '';
        $description = preg_replace('/\s+/', ' ', $description);

        $focus = '';
        $delivery = '';
        if (preg_match('/(?:Focus|Enfoque):\s*([^\.]+)\.?/i', $description, $mFocus)) {
            $focus = trim($mFocus[1]);
        }
        if (preg_match('/(?:Delivery|Entrega):\s*([^\.]+)\.?/i', $description, $mDelivery)) {
            $delivery = trim($mDelivery[1]);
        }

        $cleanDescription = preg_replace('/\s*(?:Focus|Enfoque):\s*[^\.]+\.?/i', '', $description);
        $cleanDescription = preg_replace('/\s*(?:Delivery|Entrega):\s*[^\.]+\.?/i', '', $cleanDescription);
        $cleanDescription = trim($cleanDescription);

        $imgPath = 'assets/img/service/' . (int)$i . '.jpg';
        if (!file_exists(__DIR__ . '/../' . $imgPath)) {
            $imgPath = 'assets/img/service/3.jpg';
        }

        $serviceCards[] = [
            'index' => (int)$i,
            'title' => trim($title),
            'desc' => $cleanDescription,
            'focus' => $focus,
            'delivery' => $delivery,
            'image' => $imgPath,
            'url' => $servicePageByIndex[(int)$i] ?? 'services.php'
        ];
    }
}

$totalCards = count($serviceCards);
$layoutMode = ($totalCards === 5) ? 'five' : 'default';
?>

<section class="sgr-section" id="services-grid">
    <div class="sgr-bg-grid" aria-hidden="true"></div>
    <div class="container sgr-container">
        <header class="sgr-head">
            <span class="sgr-kicker"><i class="fa-solid fa-asterisk"></i> STACK DE SERVICIOS</span>
            <h2 class="sgr-title">Marco completo de ejecucion para <span>crecimiento organico</span></h2>
            <p class="sgr-lead">
                Desde la arquitectura de paginas de servicio hasta activos de conversion para campañas, cada oferta se conecta con señales de posicionamiento,
                intencion de leads y resultados medibles de negocio.
            </p>
        </header>

        <div class="sgr-grid sgr-grid--<?= htmlspecialchars($layoutMode, ENT_QUOTES, 'UTF-8') ?>">
            <?php foreach ($serviceCards as $idx => $card): ?>
                <article class="sgr-card js-sgr-reveal">
                    <figure class="sgr-media">
                        <img src="<?= htmlspecialchars($card['image'], ENT_QUOTES, 'UTF-8') ?>"
                             alt="<?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?>">
                    </figure>

                    <div class="sgr-panel">
                        <div class="sgr-top">
                            <span class="sgr-number"><?= sprintf('%02d', (int)$card['index']) ?></span>
                            <div class="sgr-tags">
                                <?php if ($card['focus'] !== ''): ?>
                                    <span><?= htmlspecialchars($card['focus'], ENT_QUOTES, 'UTF-8') ?></span>
                                <?php endif; ?>
                                <?php if ($card['delivery'] !== ''): ?>
                                    <span><?= htmlspecialchars($card['delivery'], ENT_QUOTES, 'UTF-8') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <h3><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($card['desc'], ENT_QUOTES, 'UTF-8') ?></p>

                        <a class="sgr-link" href="<?= htmlspecialchars((string)$card['url'], ENT_QUOTES, 'UTF-8') ?>">
                            <span>Reservar llamada estrategica</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.sgr-section {
    position: relative;
    overflow: hidden;
    padding: 92px 0 88px;
    background:
        radial-gradient(640px 300px at 8% 8%, color-mix(in srgb, var(--brand-secondary) 16%, transparent), transparent 74%),
        linear-gradient(180deg, var(--brand-primary) 0%, color-mix(in srgb, var(--brand-primary) 90%, #000 10%) 100%);
}

.sgr-bg-grid {
    position: absolute;
    inset: 0;
    pointer-events: none;
    opacity: 0.38;
    background-image:
        linear-gradient(color-mix(in srgb, var(--brand-accent) 4%, transparent) 1px, transparent 1px),
        linear-gradient(90deg, color-mix(in srgb, var(--brand-accent) 4%, transparent) 1px, transparent 1px);
    background-size: 52px 52px;
    mask-image: radial-gradient(circle at center, #000 20%, transparent 86%);
}

.sgr-container {
    position: relative;
    z-index: 2;
}

.sgr-head {
    text-align: center;
    max-width: 860px;
    margin: 0 auto 40px;
}

.sgr-kicker {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--brand-secondary);
    font-size: 0.82rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 700;
}

.sgr-title {
    margin: 14px 0 12px;
    color: var(--brand-accent);
    font-size: clamp(2rem, 4.25vw, 3.3rem);
    line-height: 1.1;
    font-weight: 800;
}

.sgr-title span {
    color: var(--brand-secondary);
    text-shadow: 0 0 16px color-mix(in srgb, var(--brand-secondary) 50%, transparent);
}

.sgr-lead {
    margin: 0 auto;
    color: color-mix(in srgb, var(--brand-accent) 76%, var(--brand-primary) 24%);
    font-size: 1.03rem;
    line-height: 1.72;
}

.sgr-grid {
    display: grid;
    gap: 16px;
}

.sgr-grid--default {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.sgr-grid--five {
    grid-template-columns: repeat(6, minmax(0, 1fr));
}

.sgr-card {
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 15%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    backdrop-filter: blur(8px);
    transition: transform 0.26s ease, border-color 0.26s ease, box-shadow 0.26s ease;
    opacity: 0;
    transform: translateY(18px);
}

.sgr-card.is-visible {
    opacity: 1;
    transform: translateY(0);
}

.sgr-card:hover {
    transform: translateY(-5px);
    border-color: color-mix(in srgb, var(--brand-secondary) 45%, transparent);
    box-shadow: 0 14px 26px rgba(0, 0, 0, 0.24);
}

.sgr-grid--default .sgr-card {
    display: flex;
    flex-direction: column;
}

.sgr-grid--five .sgr-card {
    grid-column: span 2;
}

.sgr-grid--five .sgr-card:nth-child(4) {
    grid-column: 2 / span 2;
}

.sgr-grid--five .sgr-card:nth-child(5) {
    grid-column: 4 / span 2;
}

.sgr-media {
    margin: 0;
    position: relative;
    height: 210px;
    overflow: hidden;
}

.sgr-media::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 50%, color-mix(in srgb, var(--brand-primary) 74%, transparent) 100%);
}

.sgr-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.45s ease;
}

.sgr-card:hover .sgr-media img {
    transform: scale(1.07);
}

.sgr-panel {
    padding: 14px 14px 16px;
    display: flex;
    flex-direction: column;
    min-height: 255px;
}

.sgr-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 8px;
}

.sgr-number {
    color: color-mix(in srgb, var(--brand-accent) 38%, transparent);
    font-size: 1.6rem;
    font-weight: 800;
    line-height: 1;
}

.sgr-tags {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 6px;
}

.sgr-tags span {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 7%, transparent);
    color: var(--brand-accent);
    font-size: 0.7rem;
    font-weight: 600;
    line-height: 1;
    padding: 6px 9px;
}

.sgr-panel h3 {
    margin: 0 0 8px;
    color: var(--brand-accent);
    font-size: 1.26rem;
    line-height: 1.2;
    font-weight: 700;
}

.sgr-panel p {
    margin: 0;
    color: color-mix(in srgb, var(--brand-accent) 67%, var(--brand-primary) 33%);
    font-size: 0.93rem;
    line-height: 1.62;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.sgr-link {
    margin-top: auto;
    padding-top: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    color: var(--brand-secondary);
    font-size: 0.9rem;
    font-weight: 700;
    transition: gap 0.2s ease, color 0.2s ease;
}

.sgr-link:hover {
    gap: 12px;
    color: var(--brand-accent);
}

.sgr-link i {
    font-size: 0.82rem;
}

@media (max-width: 1100px) {
    .sgr-grid--default,
    .sgr-grid--five {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .sgr-grid--five .sgr-card,
    .sgr-grid--five .sgr-card:nth-child(4),
    .sgr-grid--five .sgr-card:nth-child(5) {
        grid-column: span 1;
    }
}

@media (max-width: 680px) {
    .sgr-section {
        padding: 76px 0 74px;
    }

    .sgr-grid--default,
    .sgr-grid--five {
        grid-template-columns: 1fr;
    }

    .sgr-media,
    .sgr-media { height: 210px; }
}
</style>

<script>
(function () {
    var cards = document.querySelectorAll('.js-sgr-reveal');
    if (!cards.length) return;

    var observer = new IntersectionObserver(function (entries, obs) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
        });
    }, { threshold: 0.12 });

    cards.forEach(function (card, index) {
        card.style.transitionDelay = (index * 70) + 'ms';
        observer.observe(card);
    });
})();
</script>
