<?php
$pricingCtaUrl = isset($PrimaryCTAUrl) ? i18n_localized_url($PrimaryCTAUrl) : i18n_localized_url('contact.php');
$Pricing_Plans = [
    "basic" => [
        "name" => t("Plan Esencial", "Essential Plan"),
        "badge" => t("Ideal para empezar", "Ideal to start"),
        "tag" => t("Ideal para tu primera presencia online", "Ideal for your first online presence"),
        "price" => 600,
        "old_price" => 850,
        "type" => t("Configuracion unica", "One-time setup"),
        "maintenance" => 150,
        "icon" => "fa-paper-plane",
        "features" => [
            t("Diseno web", "Website design"),
            t("Hosting", "Hosting"),
            t("Hasta 5 secciones", "Up to 5 sections"),
            t("Diseno de logo", "Logo design"),
            t("Registro local del sitio", "Local site listing"),
            t("Vinculacion con redes sociales", "Social media linking")
        ],
        "highlight" => false
    ],
    "advanced" => [
        "name" => t("Plan Avanzado", "Advanced Plan"),
        "badge" => t("Oferta especial", "Special offer"),
        "tag" => t("Base solida para crecimiento local", "Strong foundation for local growth"),
        "price" => 1200,
        "old_price" => 1600,
        "type" => t("Configuracion unica", "One-time setup"),
        "maintenance" => 150,
        "icon" => "fa-rocket",
        "features" => [
            t("Diseno web", "Website design"),
            t("Dominio incluido", "Domain included"),
            t("Certificado SSL", "SSL certificate"),
            t("Hosting", "Hosting"),
            t("Hasta 6 secciones", "Up to 6 sections"),
            t("Diseno de logo", "Logo design"),
            t("Configuracion de blog", "Blog setup"),
            t("Configuracion de publicaciones organicas", "Organic content setup"),
            t("Creacion de presencia local", "Local presence setup"),
            t("Configuracion de redes sociales", "Social media setup"),
            t("Video promocional", "Promotional video")
        ],
        "highlight" => true
    ],
    "premium" => [
        "name" => t("Plan Premium", "Premium Plan"),
        "badge" => t("Mejor valor", "Best value"),
        "tag" => t("Tecnologia WordPress y crecimiento", "WordPress technology and growth"),
        "price" => 1800,
        "old_price" => 2500,
        "type" => t("Configuracion unica", "One-time setup"),
        "maintenance" => 150,
        "icon" => "fa-crown",
        "features" => [
            t("Tecnologia WordPress", "WordPress technology"),
            t("Diseno web", "Website design"),
            t("Hosting", "Hosting"),
            t("Secciones ilimitadas", "Unlimited sections"),
            t("Certificado SSL", "SSL certificate"),
            t("Correo corporativo", "Corporate email"),
            t("Diseno de logo", "Logo design"),
            t("Configuracion de presencia local", "Local presence setup"),
            t("Gestion de redes", "Social media management"),
            t("Video promocional", "Promotional video"),
            t("Perfil de Google Business", "Google Business profile"),
            t("Boton de WhatsApp", "WhatsApp button"),
            t("Codigo QR", "QR code")
        ],
        "highlight" => false
    ]
];
?>
<section class="pricing-ultra-section" id="pricing">
    <div class="pricing-ultra-noise" aria-hidden="true"></div>
    <div class="pricing-ultra-orb pricing-ultra-orb--left" aria-hidden="true"></div>
    <div class="pricing-ultra-orb pricing-ultra-orb--right" aria-hidden="true"></div>

    <div class="pricing-ultra-container">
        <div class="pricing-ultra-head" data-aos="fade-up">
            <span class="pricing-ultra-kicker"><i class="fa-solid fa-bolt-lightning"></i> <?= htmlspecialchars(t('Estructura de Precios', 'Pricing Structure'), ENT_QUOTES, 'UTF-8') ?></span>
            <h2 class="pricing-ultra-title"><?= htmlspecialchars(t('Planes de crecimiento disenados para', 'Growth plans designed for'), ENT_QUOTES, 'UTF-8') ?> <span><?= htmlspecialchars(t('resultados reales', 'real results'), ENT_QUOTES, 'UTF-8') ?></span></h2>
            <p class="pricing-ultra-copy">
                <?= htmlspecialchars(t('Precios transparentes, lanzamiento rapido y ejecucion escalable para tus objetivos digitales.', 'Transparent pricing, fast launch, and scalable execution for your digital goals.'), ENT_QUOTES, 'UTF-8') ?>
            </p>
        </div>

        <div class="pricing-ultra-grid">
            <?php $delay = 0; ?>
            <?php foreach ($Pricing_Plans as $plan): ?>
                <?php
                $delay += 80;
                $saving = max(0, (int)$plan['old_price'] - (int)$plan['price']);
                ?>
                <article
                    class="pricing-ultra-card <?= $plan['highlight'] ? 'is-featured' : '' ?>"
                    data-aos="fade-up"
                    data-aos-delay="<?= $delay ?>"
                >
                    <div class="pricing-ultra-card-topline" aria-hidden="true"></div>

                    <?php if ($plan['highlight']): ?>
                        <div class="pricing-ultra-popular"><?= htmlspecialchars(t('Mas popular', 'Most popular'), ENT_QUOTES, 'UTF-8') ?></div>
                    <?php endif; ?>

                    <header class="pricing-ultra-card-head">
                        <div class="pricing-ultra-icon">
                            <i class="fa-solid <?= htmlspecialchars($plan['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>
                        </div>
                        <div>
                            <span class="pricing-ultra-badge"><?= htmlspecialchars($plan['badge'], ENT_QUOTES, 'UTF-8') ?></span>
                            <h3><?= htmlspecialchars($plan['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <p><?= htmlspecialchars($plan['tag'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </header>

                    <div class="pricing-ultra-price-wrap">
                        <div class="pricing-ultra-discount">
                            <span class="pricing-ultra-old">$<?= number_format((int)$plan['old_price']) ?></span>
                            <span class="pricing-ultra-save"><?= htmlspecialchars(t('Ahorra', 'Save'), ENT_QUOTES, 'UTF-8') ?> $<?= number_format($saving) ?></span>
                        </div>
                        <div class="pricing-ultra-price">
                            <span class="pricing-ultra-currency">$</span>
                            <span class="pricing-ultra-amount"><?= number_format((int)$plan['price']) ?></span>
                        </div>
                        <span class="pricing-ultra-type"><?= htmlspecialchars($plan['type'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>

                    <div class="pricing-ultra-maintenance">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <span><?= htmlspecialchars(t('Mantenimiento', 'Maintenance'), ENT_QUOTES, 'UTF-8') ?>: <strong>$<?= number_format((int)$plan['maintenance']) ?>/<?= htmlspecialchars(t('mes', 'month'), ENT_QUOTES, 'UTF-8') ?></strong></span>
                    </div>

                    <ul class="pricing-ultra-features">
                        <?php foreach ($plan['features'] as $feature): ?>
                            <li>
                                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                                <span><?= htmlspecialchars($feature, ENT_QUOTES, 'UTF-8') ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?= htmlspecialchars($pricingCtaUrl, ENT_QUOTES, 'UTF-8') ?>" class="pricing-ultra-cta">
                        <span><?= htmlspecialchars(t('Elegir este plan', 'Choose this plan'), ENT_QUOTES, 'UTF-8') ?></span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.pricing-ultra-section {
    --pricing-bg: var(--brand-primary, #0A1628);
    --pricing-surface: color-mix(in srgb, var(--brand-primary, #0A1628) 84%, #000 16%);
    --pricing-card: color-mix(in srgb, var(--brand-primary, #0A1628) 78%, var(--brand-neutral, #1E293B) 22%);
    --pricing-border: color-mix(in srgb, var(--brand-accent, #FFFFFF) 14%, transparent);
    --pricing-border-strong: color-mix(in srgb, var(--brand-accent, #FFFFFF) 28%, transparent);
    --pricing-copy: color-mix(in srgb, var(--brand-accent, #FFFFFF) 70%, var(--brand-primary, #0A1628) 30%);
    --pricing-copy-soft: color-mix(in srgb, var(--brand-accent, #FFFFFF) 52%, var(--brand-primary, #0A1628) 48%);
    --pricing-emphasis: var(--brand-secondary, #D9D0C1);
    --pricing-white: var(--brand-accent, #FFFFFF);
    position: relative;
    overflow: hidden;
    padding: 120px 0;
    background:
        radial-gradient(1300px 420px at 50% -50%, color-mix(in srgb, var(--pricing-emphasis) 20%, transparent), transparent 72%),
        linear-gradient(180deg, var(--pricing-bg) 0%, var(--pricing-surface) 100%);
}

.pricing-ultra-noise {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(color-mix(in srgb, var(--pricing-white) 3%, transparent) 1px, transparent 1px),
        linear-gradient(90deg, color-mix(in srgb, var(--pricing-white) 3%, transparent) 1px, transparent 1px);
    background-size: 56px 56px;
    mask-image: radial-gradient(circle at center, #000 20%, transparent 92%);
    pointer-events: none;
}

.pricing-ultra-orb {
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    filter: blur(68px);
    pointer-events: none;
    opacity: 0.36;
}

.pricing-ultra-orb--left {
    top: -120px;
    left: -140px;
    background: color-mix(in srgb, var(--pricing-emphasis) 28%, transparent);
}

.pricing-ultra-orb--right {
    right: -140px;
    bottom: -180px;
    background: color-mix(in srgb, var(--pricing-white) 20%, transparent);
}

.pricing-ultra-container {
    width: min(1240px, calc(100% - 40px));
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.pricing-ultra-head {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
    max-width: 760px;
    margin-bottom: 60px;
}

.pricing-ultra-kicker {
    color: var(--pricing-emphasis);
    font-size: 0.84rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.pricing-ultra-title {
    margin: 0;
    font-size: clamp(2rem, 4.6vw, 3.8rem);
    line-height: 1.02;
    color: var(--pricing-white);
    font-weight: 800;
    letter-spacing: -0.03em;
}

.pricing-ultra-title span {
    color: var(--pricing-emphasis);
    text-shadow: 0 0 24px color-mix(in srgb, var(--pricing-emphasis) 40%, transparent);
}

.pricing-ultra-copy {
    margin: 0;
    max-width: 640px;
    color: var(--pricing-copy);
    font-size: 1.05rem;
    line-height: 1.7;
}

.pricing-ultra-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
}

.pricing-ultra-card {
    position: relative;
    background: linear-gradient(160deg, color-mix(in srgb, var(--pricing-card) 92%, #000 8%), color-mix(in srgb, var(--pricing-bg) 92%, #000 8%));
    border: 1px solid var(--pricing-border);
    border-radius: 26px;
    padding: 28px 24px 24px;
    display: flex;
    flex-direction: column;
    min-height: 100%;
    transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
    overflow: hidden;
}

.pricing-ultra-card:hover {
    transform: translateY(-8px);
    border-color: var(--pricing-border-strong);
    box-shadow: 0 18px 36px rgba(0, 0, 0, 0.28);
}

.pricing-ultra-card-topline {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent 0%, color-mix(in srgb, var(--pricing-emphasis) 70%, transparent) 36%, transparent 100%);
}

.pricing-ultra-popular {
    position: absolute;
    top: 14px;
    right: 14px;
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    background: color-mix(in srgb, var(--pricing-white) 12%, transparent);
    border: 1px solid color-mix(in srgb, var(--pricing-white) 24%, transparent);
}

.pricing-ultra-card-head {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: 14px;
    align-items: start;
    margin-bottom: 18px;
}

.pricing-ultra-icon {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    display: grid;
    place-items: center;
    color: var(--pricing-emphasis);
    font-size: 1.16rem;
    border: 1px solid var(--pricing-border);
    background: color-mix(in srgb, var(--pricing-white) 8%, transparent);
}

.pricing-ultra-badge {
    display: inline-block;
    margin-bottom: 6px;
    color: var(--pricing-copy-soft);
    text-transform: uppercase;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.08em;
}

.pricing-ultra-card h3 {
    margin: 0;
    color: var(--pricing-white);
    font-size: 1.52rem;
    line-height: 1.15;
}

.pricing-ultra-card-head p {
    margin: 8px 0 0;
    color: var(--pricing-copy);
    font-size: 0.95rem;
    line-height: 1.5;
}

.pricing-ultra-price-wrap {
    margin-bottom: 18px;
}

.pricing-ultra-discount {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 6px;
}

.pricing-ultra-old {
    color: var(--pricing-copy-soft);
    font-size: 0.96rem;
    text-decoration: line-through;
}

.pricing-ultra-save {
    font-size: 0.72rem;
    font-weight: 800;
    color: var(--pricing-emphasis);
    background: color-mix(in srgb, var(--pricing-emphasis) 14%, transparent);
    border: 1px solid color-mix(in srgb, var(--pricing-emphasis) 28%, transparent);
    border-radius: 999px;
    padding: 4px 9px;
}

.pricing-ultra-price {
    display: inline-flex;
    align-items: flex-end;
    line-height: 1;
    color: var(--pricing-white);
}

.pricing-ultra-currency {
    font-size: 1.55rem;
    font-weight: 700;
    transform: translateY(-8px);
}

.pricing-ultra-amount {
    font-size: clamp(2.6rem, 4vw, 3.8rem);
    font-weight: 800;
    letter-spacing: -0.03em;
}

.pricing-ultra-type {
    display: block;
    color: var(--pricing-copy-soft);
    font-size: 0.82rem;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    margin-top: 6px;
}

.pricing-ultra-maintenance {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    border-radius: 12px;
    padding: 10px 12px;
    border: 1px solid var(--pricing-border);
    background: color-mix(in srgb, var(--pricing-white) 6%, transparent);
    color: var(--pricing-copy);
    font-size: 0.9rem;
}

.pricing-ultra-maintenance i {
    color: var(--pricing-emphasis);
}

.pricing-ultra-features {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 10px;
    min-height: 260px;
}

.pricing-ultra-features li {
    display: grid;
    grid-template-columns: 18px 1fr;
    gap: 10px;
    align-items: start;
    color: var(--pricing-copy);
    font-size: 0.92rem;
    line-height: 1.4;
}

.pricing-ultra-features i {
    color: var(--pricing-emphasis);
    margin-top: 2px;
    font-size: 0.9rem;
}

.pricing-ultra-cta {
    margin-top: 22px;
    border-radius: 12px;
    border: 1px solid transparent;
    background: var(--pricing-white);
    color: var(--pricing-bg);
    text-decoration: none;
    padding: 12px 14px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: transform 0.22s ease, box-shadow 0.22s ease, background-color 0.22s ease;
}

.pricing-ultra-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
    background: var(--pricing-emphasis);
    color: var(--pricing-bg);
}

.pricing-ultra-card.is-featured {
    background: linear-gradient(170deg, color-mix(in srgb, var(--pricing-emphasis) 93%, #fff 7%), color-mix(in srgb, var(--pricing-emphasis) 82%, var(--pricing-bg) 18%));
    border-color: color-mix(in srgb, var(--pricing-emphasis) 58%, transparent);
}

.pricing-ultra-card.is-featured .pricing-ultra-card-topline {
    background: linear-gradient(90deg, transparent 0%, color-mix(in srgb, var(--pricing-bg) 44%, transparent) 45%, transparent 100%);
}

.pricing-ultra-card.is-featured .pricing-ultra-popular {
    background: color-mix(in srgb, var(--pricing-bg) 16%, transparent);
    border-color: color-mix(in srgb, var(--pricing-bg) 28%, transparent);
    color: var(--pricing-bg);
}

.pricing-ultra-card.is-featured .pricing-ultra-icon {
    color: var(--pricing-bg);
    border-color: color-mix(in srgb, var(--pricing-bg) 26%, transparent);
    background: color-mix(in srgb, var(--pricing-bg) 12%, transparent);
}

.pricing-ultra-card.is-featured .pricing-ultra-badge,
.pricing-ultra-card.is-featured .pricing-ultra-old,
.pricing-ultra-card.is-featured .pricing-ultra-type,
.pricing-ultra-card.is-featured .pricing-ultra-card-head p,
.pricing-ultra-card.is-featured .pricing-ultra-features li,
.pricing-ultra-card.is-featured .pricing-ultra-maintenance {
    color: color-mix(in srgb, var(--pricing-bg) 84%, #000 16%);
}

.pricing-ultra-card.is-featured h3,
.pricing-ultra-card.is-featured .pricing-ultra-price,
.pricing-ultra-card.is-featured .pricing-ultra-maintenance strong {
    color: var(--pricing-bg);
}

.pricing-ultra-card.is-featured .pricing-ultra-save {
    color: var(--pricing-bg);
    background: color-mix(in srgb, var(--pricing-bg) 12%, transparent);
    border-color: color-mix(in srgb, var(--pricing-bg) 20%, transparent);
}

.pricing-ultra-card.is-featured .pricing-ultra-features i,
.pricing-ultra-card.is-featured .pricing-ultra-maintenance i {
    color: var(--pricing-bg);
}

.pricing-ultra-card.is-featured .pricing-ultra-cta {
    background: var(--pricing-bg);
    color: var(--pricing-white);
}

.pricing-ultra-card.is-featured .pricing-ultra-cta:hover {
    background: color-mix(in srgb, var(--pricing-bg) 86%, #000 14%);
}

@media (max-width: 1100px) {
    .pricing-ultra-section {
        padding: 92px 0;
    }

    .pricing-ultra-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .pricing-ultra-container {
        width: min(1240px, calc(100% - 24px));
    }

    .pricing-ultra-title {
        font-size: clamp(1.8rem, 9vw, 2.6rem);
    }

    .pricing-ultra-grid {
        grid-template-columns: 1fr;
    }

    .pricing-ultra-card {
        border-radius: 20px;
        padding: 22px 18px 18px;
    }

    .pricing-ultra-features {
        min-height: auto;
    }
}
</style>

