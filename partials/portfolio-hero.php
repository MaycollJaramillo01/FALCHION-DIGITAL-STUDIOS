<?php
@session_start();
if (!isset($PortfolioHero_Title)) {
    include_once __DIR__ . '/../text.php';
}

$portfolioTitle = $PortfolioHero_Title ?? 'Portafolio';
$portfolioHighlight = $PortfolioHero_Highlight ?? 'Resultados por Servicio';
$portfolioLead = $PortfolioHero_Lead ?? 'Proyectos reales, ejecucion clara y resultados medibles.';
$portfolioTicker = isset($PortfolioTicker) && is_array($PortfolioTicker) ? $PortfolioTicker : ['Crecimiento de Leads', 'Mejora de Conversion', 'Visibilidad SEO'];
?>

<section class="pf-hero" id="portfolio-hero">
    <div class="pf-hero__bg" aria-hidden="true">
        <img src="assets/img/hero/3.jpg" alt="Fondo de portafolio">
        <div class="pf-hero__overlay"></div>
    </div>

    <div class="container pf-hero__inner">
        <h1>
            <?= htmlspecialchars((string)$portfolioTitle, ENT_QUOTES, 'UTF-8') ?>
            <span><?= htmlspecialchars((string)$portfolioHighlight, ENT_QUOTES, 'UTF-8') ?></span>
        </h1>
        <p><?= htmlspecialchars((string)$portfolioLead, ENT_QUOTES, 'UTF-8') ?></p>
        <nav aria-label="breadcrumb">
            <a href="<?= htmlspecialchars(falchion_url('index.php'), ENT_QUOTES, 'UTF-8') ?>">Home</a>
            <span>*</span>
            <span aria-current="page">Portafolio</span>
        </nav>
    </div>

    <div class="pf-hero__ticker" aria-hidden="true">
        <div class="pf-hero__track">
            <?php for ($g = 0; $g < 2; $g++): ?>
                <div class="pf-hero__line" <?= $g === 1 ? 'aria-hidden="true"' : '' ?>>
                    <?php for ($r = 0; $r < 3; $r++): ?>
                        <?php foreach ($portfolioTicker as $item): ?>
                            <span><?= htmlspecialchars((string)$item, ENT_QUOTES, 'UTF-8') ?></span>
                            <i class="fa-solid fa-asterisk"></i>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<style>
.pf-hero {
    position: relative;
    min-height: 410px;
    padding: 140px 0 92px;
    overflow: hidden;
    background: var(--brand-primary);
}

.pf-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.pf-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transform: scale(1.03);
}

.pf-hero__overlay {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 84%, transparent) 0%, color-mix(in srgb, var(--brand-primary) 92%, transparent) 72%, var(--brand-primary) 100%),
        radial-gradient(circle at 48% 34%, color-mix(in srgb, var(--brand-accent) 8%, transparent), transparent 58%);
}

.pf-hero__inner {
    position: relative;
    z-index: 3;
    text-align: center;
}

.pf-hero__inner h1 {
    margin: 0;
    color: var(--brand-accent);
    font-size: clamp(2.2rem, 5vw, 3.9rem);
    font-weight: 800;
    line-height: 1.06;
}

.pf-hero__inner h1 span {
    display: block;
    color: var(--brand-secondary);
    font-weight: 700;
}

.pf-hero__inner p {
    margin: 16px auto 0;
    max-width: 760px;
    color: color-mix(in srgb, var(--brand-accent) 80%, var(--brand-primary) 20%);
    font-size: 1.02rem;
    line-height: 1.7;
}

.pf-hero__inner nav {
    margin-top: 18px;
    display: inline-flex;
    align-items: center;
    gap: 9px;
    font-size: 0.95rem;
    font-weight: 600;
}

.pf-hero__inner nav a {
    color: color-mix(in srgb, var(--brand-accent) 90%, var(--brand-primary) 10%);
    text-decoration: none;
}

.pf-hero__inner nav a:hover {
    color: var(--brand-secondary);
}

.pf-hero__inner nav span[aria-current="page"] {
    color: var(--brand-secondary);
}

.pf-hero__ticker {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 4;
    overflow: hidden;
    background: var(--brand-secondary);
}

.pf-hero__track {
    display: flex;
    width: max-content;
    animation: pfTicker 24s linear infinite;
    will-change: transform;
}

.pf-hero__line {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    white-space: nowrap;
    min-width: max-content;
    color: var(--brand-primary);
    padding: 11px 14px;
    font-size: 0.88rem;
    font-weight: 800;
}

.pf-hero__line i { font-size: 0.74rem; }

@keyframes pfTicker {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@media (max-width: 575px) {
    .pf-hero { min-height: 340px; padding: 120px 0 76px; }
}
</style>
