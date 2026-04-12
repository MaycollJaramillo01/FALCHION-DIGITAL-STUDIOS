<?php
@session_start();
if (!isset($Company)) {
    include_once __DIR__ . '/../text.php';
}

$currentPage = trim((string)($namepage ?? 'Nosotros'));
if ($currentPage === '') {
    $currentPage = 'Nosotros';
}

$titleParts = preg_split('/\s+/', $currentPage, 2);
$titleMain = $titleParts[0] ?? 'Sobre';
$titleAccent = $titleParts[1] ?? 'Nosotros';

$heroKeywords = [
    'Investigacion de palabras clave',
    'Optimizacion de contenido',
    'Optimizacion movil',
    'Analitica y seguimiento'
];
?>

<section class="about-hero-v3" id="about-hero">
    <div class="about-hero-v3__bg" aria-hidden="true">
        <img src="assets/img/hero/3.jpg" alt="Fondo de nosotros">
        <div class="about-hero-v3__overlay"></div>
    </div>

    <div class="about-hero-v3__inner container">
        <span class="about-hero-v3__dot" aria-hidden="true"></span>
        <h1 class="about-hero-v3__title">
            <span><?= htmlspecialchars($titleMain, ENT_QUOTES, 'UTF-8') ?></span>
            <strong><?= htmlspecialchars($titleAccent, ENT_QUOTES, 'UTF-8') ?></strong>
        </h1>

        <nav class="about-hero-v3__crumbs" aria-label="breadcrumb">
            <a href="index.php">Inicio</a>
            <span class="about-hero-v3__sep">*</span>
            <span aria-current="page"><?= htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') ?></span>
        </nav>
    </div>

    <div class="about-hero-v3__ticker" aria-hidden="true">
        <div class="about-hero-v3__ticker-track">
            <?php for ($group = 0; $group < 2; $group++): ?>
                <div class="about-hero-v3__ticker-line" <?= $group === 1 ? 'aria-hidden="true"' : '' ?>>
                    <?php for ($repeat = 0; $repeat < 3; $repeat++): ?>
                    <?php foreach ($heroKeywords as $keyword): ?>
                        <span><?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?></span>
                        <i class="fa-solid fa-asterisk"></i>
                    <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<style>
.about-hero-v3 {
    position: relative;
    min-height: 440px;
    padding: 145px 0 94px;
    overflow: hidden;
    background: var(--brand-primary);
    isolation: isolate;
    display: flex;
    align-items: center;
}

.about-hero-v3__bg {
    position: absolute;
    inset: 0;
    z-index: -2;
}

.about-hero-v3__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transform: scale(1.03);
}

.about-hero-v3__overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 82%, transparent) 0%, color-mix(in srgb, var(--brand-primary) 90%, transparent) 68%, var(--brand-primary) 100%),
        radial-gradient(circle at 50% 36%, color-mix(in srgb, var(--brand-accent) 8%, transparent), transparent 55%);
}

.about-hero-v3__inner {
    text-align: center;
    position: relative;
    z-index: 3;
}

.about-hero-v3__dot {
    position: absolute;
    top: 58%;
    left: 33%;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--brand-secondary);
    box-shadow: 0 0 16px color-mix(in srgb, var(--brand-secondary) 55%, transparent);
}

.about-hero-v3__title {
    margin: 0;
    color: var(--brand-accent);
    font-family: var(--title-font, "Inter", sans-serif);
    font-size: clamp(2.5rem, 6vw, 4.7rem);
    line-height: 1;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.about-hero-v3__title strong {
    color: var(--brand-secondary);
    font-weight: 800;
}

.about-hero-v3__crumbs {
    margin-top: 20px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 1.15rem;
    font-weight: 600;
    color: color-mix(in srgb, var(--brand-accent) 78%, var(--brand-primary) 22%);
}

.about-hero-v3__crumbs a {
    color: color-mix(in srgb, var(--brand-accent) 90%, var(--brand-primary) 10%);
    text-decoration: none;
}

.about-hero-v3__crumbs a:hover {
    color: var(--brand-secondary);
}

.about-hero-v3__sep {
    color: var(--brand-accent);
    font-size: 0.92rem;
}

.about-hero-v3__crumbs [aria-current="page"] {
    color: var(--brand-secondary);
}

.about-hero-v3__ticker {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--brand-secondary);
    border-top: 1px solid color-mix(in srgb, var(--brand-accent) 18%, transparent);
    transform: none;
    z-index: 4;
    overflow: hidden;
}

.about-hero-v3__ticker-track {
    display: flex;
    width: max-content;
    animation: aboutTicker 24s linear infinite;
    will-change: transform;
}

.about-hero-v3__ticker-line {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    white-space: nowrap;
    padding: 12px 18px;
    color: var(--brand-primary);
    font-weight: 800;
    font-size: 0.96rem;
    text-transform: none;
    flex-shrink: 0;
    min-width: max-content;
}

.about-hero-v3__ticker-line i {
    font-size: 0.8rem;
}

@keyframes aboutTicker {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@media (max-width: 991px) {
    .about-hero-v3 {
        min-height: 360px;
        padding: 130px 0 84px;
    }

    .about-hero-v3__dot {
        left: 20%;
        top: 63%;
    }

    .about-hero-v3__crumbs {
        font-size: 1rem;
    }
}

@media (max-width: 575px) {
    .about-hero-v3 {
        min-height: 320px;
        padding: 116px 0 78px;
    }

    .about-hero-v3__dot {
        width: 8px;
        height: 8px;
        left: 14%;
        top: 66%;
    }

    .about-hero-v3__crumbs {
        font-size: 0.92rem;
        gap: 8px;
    }

    .about-hero-v3__ticker-line {
        font-size: 0.82rem;
        gap: 10px;
        padding: 10px 12px;
    }
}
</style>
