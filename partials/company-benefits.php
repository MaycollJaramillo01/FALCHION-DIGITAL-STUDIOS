<?php
@session_start();
if (!isset($CompanyBenefits_Items)) {
    include_once __DIR__ . '/../text.php';
}

$cbBadge = $CompanyBenefits_Badge ?? 'BENEFICIOS DEL NEGOCIO';
$cbTitle = $CompanyBenefits_Title ?? 'Por que tu negocio necesita un sitio web profesional';
$cbLead  = $CompanyBenefits_Lead ?? 'Un sitio web estrategico ayuda a tu negocio a captar leads y generar confianza.';
$cbCta   = $CompanyBenefits_CTA ?? 'Quiero mi plan web';
$cbItems = $CompanyBenefits_Items ?? [];
$cbCtaUrl = $PrimaryCTAUrl ?? 'contact.php';
?>

<section class="cb-section" id="company-benefits">
    <div class="cb-glow cb-glow--left" aria-hidden="true"></div>
    <div class="cb-glow cb-glow--right" aria-hidden="true"></div>

    <div class="container cb-wrap">
        <header class="cb-head">
            <span class="cb-badge"><i class="fa-solid fa-asterisk"></i> <?= htmlspecialchars($cbBadge, ENT_QUOTES, 'UTF-8') ?></span>
            <h2 class="cb-title"><?= htmlspecialchars($cbTitle, ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="cb-lead"><?= htmlspecialchars($cbLead, ENT_QUOTES, 'UTF-8') ?></p>
        </header>

        <div class="cb-grid">
            <?php foreach ($cbItems as $item): ?>
                <article class="cb-card">
                    <span class="cb-icon">
                        <i class="fa-solid <?= htmlspecialchars($item['icon'] ?? 'fa-circle-check', ENT_QUOTES, 'UTF-8') ?>"></i>
                    </span>
                    <div class="cb-copy">
                        <h3><?= htmlspecialchars($item['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($item['desc'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="cb-actions">
            <a href="<?= htmlspecialchars($cbCtaUrl, ENT_QUOTES, 'UTF-8') ?>" class="cb-cta">
                <span><?= htmlspecialchars($cbCta, ENT_QUOTES, 'UTF-8') ?></span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<style>
.cb-section {
    position: relative;
    overflow: hidden;
    padding: 96px 0;
    background:
        radial-gradient(620px 280px at 8% 8%, color-mix(in srgb, var(--brand-secondary) 14%, transparent), transparent 72%),
        linear-gradient(180deg, var(--brand-primary) 0%, color-mix(in srgb, var(--brand-primary) 88%, #000 12%) 100%);
}

.cb-glow {
    position: absolute;
    width: 340px;
    height: 340px;
    border-radius: 50%;
    filter: blur(62px);
    pointer-events: none;
    opacity: 0.36;
}

.cb-glow--left {
    left: -120px;
    top: 18%;
    background: color-mix(in srgb, var(--brand-secondary) 24%, transparent);
}

.cb-glow--right {
    right: -150px;
    bottom: 8%;
    background: color-mix(in srgb, var(--brand-accent) 14%, transparent);
}

.cb-wrap {
    position: relative;
    z-index: 2;
}

.cb-head {
    max-width: 820px;
    margin: 0 auto 48px;
    text-align: center;
}

.cb-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--brand-secondary);
    font-size: 0.82rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    font-weight: 700;
}

.cb-title {
    margin: 12px 0 14px;
    color: var(--brand-accent);
    font-size: clamp(2rem, 4.2vw, 3.2rem);
    line-height: 1.1;
    font-weight: 800;
}

.cb-lead {
    margin: 0 auto;
    max-width: 760px;
    color: color-mix(in srgb, var(--brand-accent) 72%, var(--brand-primary) 28%);
    font-size: 1.04rem;
    line-height: 1.7;
}

.cb-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
}

.cb-card {
    display: grid;
    grid-template-columns: 48px 1fr;
    gap: 14px;
    align-items: start;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 5%, transparent);
    border-radius: 16px;
    padding: 18px 16px;
    transition: transform 0.25s ease, border-color 0.25s ease, background-color 0.25s ease;
}

.cb-card:hover {
    transform: translateY(-4px);
    border-color: color-mix(in srgb, var(--brand-secondary) 38%, transparent);
    background: color-mix(in srgb, var(--brand-secondary) 8%, transparent);
}

.cb-icon {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 18%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 8%, transparent);
}

.cb-icon i {
    color: var(--brand-accent);
    font-size: 1rem;
}

.cb-copy h3 {
    margin: 0 0 8px;
    color: var(--brand-accent);
    font-size: 1.08rem;
    line-height: 1.2;
    font-weight: 700;
}

.cb-copy p {
    margin: 0;
    color: color-mix(in srgb, var(--brand-accent) 66%, var(--brand-primary) 34%);
    font-size: 0.93rem;
    line-height: 1.6;
}

.cb-actions {
    margin-top: 30px;
    display: flex;
    justify-content: center;
}

.cb-cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    border-radius: 999px;
    background: var(--brand-accent);
    color: var(--brand-primary);
    border: 1px solid transparent;
    padding: 12px 22px;
    font-weight: 700;
    transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
}

.cb-cta:hover {
    transform: translateY(-2px);
    background: var(--brand-secondary);
    color: var(--brand-primary);
    box-shadow: 0 10px 18px rgba(0, 0, 0, 0.2);
}

@media (max-width: 1040px) {
    .cb-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 680px) {
    .cb-section {
        padding: 76px 0;
    }

    .cb-grid {
        grid-template-columns: 1fr;
    }
}
</style>
