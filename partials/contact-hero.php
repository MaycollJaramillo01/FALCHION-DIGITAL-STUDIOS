<?php
@session_start();
if (!isset($BrandColors)) {
    include_once __DIR__ . '/../text.php';
}

$contactTitle = $namepage ?? 'Contacto';
$contactLead = 'Comparte tus objetivos, tus retos actuales y tu tiempo ideal. Te enviaremos un alcance practico con la ruta digital adecuada para tu negocio.';
$contactHighlight = $Estimates ?? 'Respuesta en 1 dia habil';
$contactCoverage = !empty($Areas) && is_array($Areas) ? implode(' | ', $Areas) : ($Locality ?? 'Miami');
$heroBg = 'assets/img/hero/2.jpg';
$contactHeroCtaUrl = $PrimaryCTAUrl ?? 'contact.php';
$contactPhoneLabel = !empty($Phone) ? 'Llamar al ' . $Phone : 'Solicitar asesoria';
$contactDirectLabel = !empty($Phone2) ? 'WhatsApp directo' : 'Enviar tu brief';
$contactDirectIcon = !empty($Phone2) ? 'fa-brands fa-whatsapp' : 'fa-solid fa-envelope';
?>

<section class="contact-hero-v2" id="contact-hero">
    <div class="contact-hero-v2__bg">
        <img src="<?= htmlspecialchars($heroBg, ENT_QUOTES, 'UTF-8') ?>" alt="Fondo de contacto">
    </div>
    <div class="contact-hero-v2__overlay"></div>

    <div class="container">
        <div class="contact-hero-v2__inner">
            <div class="contact-hero-v2__left">
                <p class="contact-hero-v2__badge" data-anim="up">
                    <i class="fa-solid fa-asterisk"></i> CONTACTO BRANDBOOST
                </p>

                <h1 class="contact-hero-v2__title" data-anim="up" data-delay="1">
                    Inicia tu proximo proyecto de <span>generacion de leads</span>
                </h1>

                <p class="contact-hero-v2__lead" data-anim="up" data-delay="2">
                    <?= htmlspecialchars($contactLead, ENT_QUOTES, 'UTF-8') ?>
                </p>

                <div class="contact-hero-v2__actions" data-anim="up" data-delay="3">
                    <a class="contact-hero-v2__btn is-solid" href="#contact">
                        Enviar brief del proyecto <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a class="contact-hero-v2__btn is-ghost" href="<?= htmlspecialchars($contactHeroCtaUrl, ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($contactPhoneLabel, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </div>

                <div class="contact-hero-v2__crumbs" data-anim="up" data-delay="4">
                    <a href="index.php">Inicio</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span><?= htmlspecialchars($contactTitle, ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            </div>

            <aside class="contact-hero-v2__card" data-anim="left" data-delay="2">
                <h2>Canal de respuesta rapida</h2>

                <div class="contact-hero-v2__meta">
                    <div class="contact-hero-v2__meta-item">
                        <span>Tiempo de respuesta</span>
                        <strong><?= htmlspecialchars($contactHighlight, ENT_QUOTES, 'UTF-8') ?></strong>
                    </div>
                    <div class="contact-hero-v2__meta-item">
                        <span>Horario</span>
                        <strong><?= htmlspecialchars($Schedule ?? 'Lun-Vie 9am-6pm', ENT_QUOTES, 'UTF-8') ?></strong>
                    </div>
                    <div class="contact-hero-v2__meta-item">
                        <span>Cobertura</span>
                        <strong><?= htmlspecialchars($contactCoverage, ENT_QUOTES, 'UTF-8') ?></strong>
                    </div>
                </div>

                <div class="contact-hero-v2__links">
                    <a href="<?= htmlspecialchars($MailRef ?? '#', ENT_QUOTES, 'UTF-8') ?>">
                        <i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($Mail ?? 'brandboostmarketingw@gmail.com', ENT_QUOTES, 'UTF-8') ?>
                    </a>
                    <a href="<?= htmlspecialchars($contactHeroCtaUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                        <i class="<?= htmlspecialchars($contactDirectIcon, ENT_QUOTES, 'UTF-8') ?>"></i> <?= htmlspecialchars($contactDirectLabel, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

<style>
.contact-hero-v2 {
    position: relative;
    padding: 138px 0 86px;
    background: var(--brand-primary);
    overflow: hidden;
}

.contact-hero-v2__bg {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.contact-hero-v2__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    opacity: 0.38;
}

.contact-hero-v2__overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background:
        radial-gradient(780px 380px at 12% 26%, color-mix(in srgb, var(--brand-secondary) 24%, transparent), transparent 72%),
        linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 74%, transparent) 0%, color-mix(in srgb, var(--brand-primary) 94%, transparent) 100%);
}

.contact-hero-v2 .container {
    position: relative;
    z-index: 3;
}

.contact-hero-v2__inner {
    display: grid;
    grid-template-columns: 1.15fr minmax(320px, 0.85fr);
    gap: 42px;
    align-items: center;
}

.contact-hero-v2__badge {
    margin: 0 0 16px;
    color: var(--brand-secondary);
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 0.09em;
    text-transform: uppercase;
}

.contact-hero-v2__badge i {
    margin-right: 6px;
}

.contact-hero-v2__title {
    margin: 0;
    color: var(--brand-accent);
    font-size: clamp(2rem, 5vw, 3.8rem);
    line-height: 1.08;
    letter-spacing: -0.02em;
    max-width: 720px;
}

.contact-hero-v2__title span {
    color: var(--brand-secondary);
}

.contact-hero-v2__lead {
    margin: 20px 0 0;
    color: color-mix(in srgb, var(--brand-accent) 78%, var(--brand-primary) 22%);
    font-size: 1.04rem;
    line-height: 1.78;
    max-width: 680px;
}

.contact-hero-v2__actions {
    margin-top: 30px;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.contact-hero-v2__btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 48px;
    border-radius: 999px;
    padding: 0 24px;
    font-size: 0.93rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.25s ease;
}

.contact-hero-v2__btn.is-solid {
    background: var(--brand-secondary);
    color: var(--brand-primary);
}

.contact-hero-v2__btn.is-solid:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 18px color-mix(in srgb, var(--brand-secondary) 40%, transparent);
}

.contact-hero-v2__btn.is-ghost {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 18%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    color: var(--brand-accent);
}

.contact-hero-v2__btn.is-ghost:hover {
    border-color: color-mix(in srgb, var(--brand-accent) 38%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 8%, transparent);
}

.contact-hero-v2__crumbs {
    margin-top: 22px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: color-mix(in srgb, var(--brand-accent) 66%, transparent);
    font-size: 0.84rem;
    font-weight: 600;
}

.contact-hero-v2__crumbs a {
    color: color-mix(in srgb, var(--brand-accent) 84%, transparent);
    text-decoration: none;
}

.contact-hero-v2__crumbs a:hover {
    color: var(--brand-secondary);
}

.contact-hero-v2__crumbs span {
    color: var(--brand-secondary);
}

.contact-hero-v2__card {
    border-radius: 20px;
    padding: 24px;
    background:
      linear-gradient(160deg, color-mix(in srgb, var(--brand-accent) 8%, transparent) 0%, color-mix(in srgb, var(--brand-accent) 3%, transparent) 100%);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    backdrop-filter: blur(6px);
}

.contact-hero-v2__card h2 {
    margin: 0;
    color: var(--brand-accent);
    font-size: 1.25rem;
}

.contact-hero-v2__meta {
    margin-top: 16px;
    display: grid;
    gap: 10px;
}

.contact-hero-v2__meta-item {
    border: 1px solid color-mix(in srgb, var(--brand-accent) 10%, transparent);
    background: color-mix(in srgb, var(--brand-primary) 72%, transparent);
    border-radius: 12px;
    padding: 10px 12px;
    display: grid;
    gap: 3px;
}

.contact-hero-v2__meta-item span {
    color: color-mix(in srgb, var(--brand-accent) 62%, transparent);
    font-size: 0.76rem;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    font-weight: 700;
}

.contact-hero-v2__meta-item strong {
    color: var(--brand-accent);
    font-size: 0.92rem;
    line-height: 1.35;
}

.contact-hero-v2__links {
    margin-top: 14px;
    display: grid;
    gap: 8px;
}

.contact-hero-v2__links a {
    color: var(--brand-accent);
    text-decoration: none;
    min-height: 42px;
    border-radius: 10px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 12%, transparent);
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 0 12px;
    font-size: 0.88rem;
    font-weight: 600;
}

.contact-hero-v2__links a:hover {
    color: var(--brand-primary);
    background: var(--brand-secondary);
    border-color: var(--brand-secondary);
}

@media (max-width: 991px) {
    .contact-hero-v2 {
        padding-top: 126px;
    }

    .contact-hero-v2__inner {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 575px) {
    .contact-hero-v2 {
        padding: 118px 0 74px;
    }

    .contact-hero-v2__lead {
        font-size: 0.96rem;
        line-height: 1.65;
    }

    .contact-hero-v2__btn {
        width: 100%;
    }
}
</style>
