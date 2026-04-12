<?php
@session_start();
if (!isset($Company)) {
    include_once __DIR__ . '/../text.php';
}

$currentPage = trim((string)($namepage ?? 'Servicios'));
if ($currentPage === '') {
    $currentPage = 'Servicios';
}

$titleMain = 'Nuestros';
$titleAccent = 'Servicios';

$servicesDesc = "Sitios web, landing pages y bases digitales enfocadas en conversion para aumentar confianza y flujo de leads para tu negocio.";

$servicesTicker = [];
for ($i = 1; $i <= 5; $i++) {
    if (!empty($SN[$i])) {
        $servicesTicker[] = $SN[$i];
    }
}
if (!$servicesTicker) {
    $servicesTicker = ['Creacion de Sitios Web', 'Rediseño Web', 'Paginas de Aterrizaje', 'Rediseño de Logo', 'Presencia Digital'];
}
?>

<section class="services-hero-v3" id="services-hero">
    <div class="services-hero-v3__bg" aria-hidden="true">
        <img src="assets/img/hero/2.jpg" alt="Fondo de servicios">
        <div class="services-hero-v3__overlay"></div>
    </div>

    <div class="services-hero-v3__inner container">
        <span class="services-hero-v3__dot" aria-hidden="true"></span>

        <h1 class="services-hero-v3__title">
            <span><?= htmlspecialchars($titleMain, ENT_QUOTES, 'UTF-8') ?></span>
            <strong><?= htmlspecialchars($titleAccent, ENT_QUOTES, 'UTF-8') ?></strong>
        </h1>

        <p class="services-hero-v3__desc"><?= htmlspecialchars($servicesDesc, ENT_QUOTES, 'UTF-8') ?></p>

        <nav class="services-hero-v3__crumbs" aria-label="breadcrumb">
            <a href="<?= htmlspecialchars(falchion_url('index.php'), ENT_QUOTES, 'UTF-8') ?>">Home</a>
            <span class="services-hero-v3__sep">*</span>
            <span aria-current="page"><?= htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') ?></span>
        </nav>
    </div>

    <div class="services-hero-v3__ticker" aria-hidden="true">
        <div class="services-hero-v3__ticker-track">
            <?php for ($i = 0; $i < 2; $i++): ?>
                <div class="services-hero-v3__ticker-line">
                    <?php foreach ($servicesTicker as $keyword): ?>
                        <span><?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?></span>
                        <i class="fa-solid fa-asterisk"></i>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<style>
.services-hero-v3 {
    position: relative;
    min-height: 470px;
    padding: 144px 0 104px;
    overflow: hidden;
    background: var(--brand-primary);
    isolation: isolate;
    display: flex;
    align-items: center;
}

.services-hero-v3__bg {
    position: absolute;
    inset: 0;
    z-index: -2;
}

.services-hero-v3__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transform: scale(1.04);
}

.services-hero-v3__overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 84%, transparent) 0%, color-mix(in srgb, var(--brand-primary) 92%, transparent) 70%, var(--brand-primary) 100%),
        radial-gradient(circle at 52% 32%, color-mix(in srgb, var(--brand-accent) 8%, transparent), transparent 56%);
}

.services-hero-v3__inner {
    text-align: center;
    position: relative;
    z-index: 3;
}

.services-hero-v3__dot {
    position: absolute;
    top: 34%;
    left: 29%;
    width: 11px;
    height: 11px;
    border-radius: 50%;
    background: var(--brand-secondary);
    box-shadow: 0 0 16px color-mix(in srgb, var(--brand-secondary) 55%, transparent);
}

.services-hero-v3__title {
    margin: 0;
    color: var(--brand-accent);
    font-family: var(--title-font, "Inter", sans-serif);
    font-size: clamp(2.5rem, 6vw, 4.7rem);
    line-height: 1;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.services-hero-v3__title strong {
    color: var(--brand-secondary);
    font-weight: 800;
}

.services-hero-v3__desc {
    margin: 22px auto 0;
    max-width: 760px;
    color: color-mix(in srgb, var(--brand-accent) 80%, var(--brand-primary) 20%);
    font-size: 1.08rem;
    line-height: 1.65;
}

.services-hero-v3__crumbs {
    margin-top: 18px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 1.05rem;
    font-weight: 600;
}

.services-hero-v3__crumbs a {
    color: color-mix(in srgb, var(--brand-accent) 90%, var(--brand-primary) 10%);
    text-decoration: none;
}

.services-hero-v3__crumbs a:hover {
    color: var(--brand-secondary);
}

.services-hero-v3__sep {
    color: var(--brand-accent);
    font-size: 0.92rem;
}

.services-hero-v3__crumbs [aria-current="page"] {
    color: var(--brand-secondary);
}

.services-hero-v3__ticker {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--brand-secondary);
    border-top: 1px solid color-mix(in srgb, var(--brand-accent) 18%, transparent);
    overflow: hidden;
    z-index: 4;
}

.services-hero-v3__ticker-track {
    display: flex;
    width: max-content;
    animation: servicesTicker 24s linear infinite;
}

.services-hero-v3__ticker-line {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    white-space: nowrap;
    padding: 12px 18px;
    color: var(--brand-primary);
    font-weight: 800;
    font-size: 0.95rem;
    flex-shrink: 0;
}

.services-hero-v3__ticker-line i {
    font-size: 0.8rem;
}

@keyframes servicesTicker {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@media (max-width: 991px) {
    .services-hero-v3 {
        min-height: 390px;
        padding: 128px 0 84px;
    }

    .services-hero-v3__dot {
        left: 18%;
        top: 37%;
    }

    .services-hero-v3__desc {
        font-size: 1rem;
    }
}

@media (max-width: 575px) {
    .services-hero-v3 {
        min-height: 340px;
        padding: 114px 0 78px;
    }

    .services-hero-v3__dot {
        width: 8px;
        height: 8px;
        left: 12%;
        top: 39%;
    }

    .services-hero-v3__crumbs {
        font-size: 0.9rem;
        gap: 8px;
    }

    .services-hero-v3__ticker-line {
        font-size: 0.82rem;
        gap: 10px;
        padding: 10px 12px;
    }
}
</style>
