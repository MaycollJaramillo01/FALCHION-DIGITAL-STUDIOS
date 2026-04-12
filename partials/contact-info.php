<?php
@session_start();
if (!isset($BrandColors)) {
    include_once __DIR__ . '/../text.php';
}

$mapsHref = !empty($GoogleMap)
    ? (string)$GoogleMap
    : 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode((string)($Address ?? 'Miami, FL'));
$contactInfoPhoneUrl = $PrimaryCTAUrl ?? 'contact.php';
$contactInfoPhoneLabel = !empty($Phone) ? (string)$Phone : 'Solicitar asesoria';
?>

<section class="contact-info-v2" id="contact-info">
    <div class="container">
        <header class="contact-info-v2__head">
            <p data-anim="up"><i class="fa-solid fa-asterisk"></i> CANALES DIRECTOS</p>
            <h2 data-anim="up" data-delay="1">Habla con el equipo por el canal que prefieras</h2>
            <span data-anim="up" data-delay="2">Cada canal se conecta con nuestro escritorio interno para que tu solicitud reciba seguimiento rapido y ordenado.</span>
        </header>

        <div class="contact-info-v2__grid">
            <article class="contact-info-v2__card" data-anim="up" data-delay="1">
                <div class="contact-info-v2__icon">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <h3>Atencion telefonica</h3>
                <a href="<?= htmlspecialchars($contactInfoPhoneUrl, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($contactInfoPhoneLabel, ENT_QUOTES, 'UTF-8') ?></a>
                <?php if (!empty($Phone2Ref) && !empty($Phone2)): ?>
                    <a href="<?= htmlspecialchars($Phone2Ref, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener"><?= htmlspecialchars($Phone2, ENT_QUOTES, 'UTF-8') ?></a>
                <?php endif; ?>
            </article>

            <article class="contact-info-v2__card" data-anim="up" data-delay="2">
                <div class="contact-info-v2__icon">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <h3>Canal de correo</h3>
                <a href="<?= htmlspecialchars($MailRef ?? '#', ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($Mail ?? '', ENT_QUOTES, 'UTF-8') ?></a>
                <p><?= htmlspecialchars($Estimates ?? 'Respuesta en 1 dia habil', ENT_QUOTES, 'UTF-8') ?></p>
            </article>

            <article class="contact-info-v2__card" data-anim="up" data-delay="3">
                <div class="contact-info-v2__icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h3>Direccion</h3>
                <p><?= htmlspecialchars($Address ?? 'Laurel, MD', ENT_QUOTES, 'UTF-8') ?></p>
                <a href="<?= htmlspecialchars($mapsHref, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">Abrir en Google Maps</a>
            </article>

            <article class="contact-info-v2__card" data-anim="up" data-delay="4">
                <div class="contact-info-v2__icon">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
                <h3>Disponibilidad</h3>
                <p><?= htmlspecialchars($Schedule ?? 'Lun-Vie 9am-6pm EST', ENT_QUOTES, 'UTF-8') ?></p>
                <p><?= htmlspecialchars($Bilingual ?? 'Espanol / Ingles', ENT_QUOTES, 'UTF-8') ?></p>
            </article>
        </div>
    </div>
</section>

<style>
.contact-info-v2 {
    padding: 76px 0 34px;
    background:
      radial-gradient(640px 320px at 89% 0%, color-mix(in srgb, var(--brand-secondary) 12%, transparent), transparent 68%),
      linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 98%, #000 2%) 0%, color-mix(in srgb, var(--brand-primary) 96%, #000 4%) 100%);
}

.contact-info-v2__head {
    max-width: 820px;
    margin: 0 auto 24px;
    text-align: center;
}

.contact-info-v2__head p {
    margin: 0 0 10px;
    color: var(--brand-secondary);
    font-size: 0.8rem;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    font-weight: 700;
}

.contact-info-v2__head p i {
    margin-right: 6px;
}

.contact-info-v2__head h2 {
    margin: 0;
    color: var(--brand-accent);
    font-size: clamp(1.7rem, 3vw, 2.5rem);
    line-height: 1.16;
}

.contact-info-v2__head span {
    margin-top: 11px;
    display: block;
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    font-size: 0.96rem;
    line-height: 1.65;
}

.contact-info-v2__grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
}

.contact-info-v2__card {
    border-radius: 16px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 13%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    padding: 18px 16px;
    min-height: 188px;
}

.contact-info-v2__icon {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: color-mix(in srgb, var(--brand-secondary) 18%, transparent);
    color: var(--brand-secondary);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.06rem;
}

.contact-info-v2__card h3 {
    margin: 10px 0 8px;
    color: var(--brand-accent);
    font-size: 1.06rem;
}

.contact-info-v2__card p {
    margin: 0 0 7px;
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    line-height: 1.52;
    font-size: 0.89rem;
}

.contact-info-v2__card a {
    color: var(--brand-accent);
    text-decoration: none;
    font-size: 0.9rem;
    line-height: 1.6;
    display: block;
}

.contact-info-v2__card a:hover {
    color: var(--brand-secondary);
}

@media (max-width: 1199px) {
    .contact-info-v2__grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 575px) {
    .contact-info-v2 {
        padding-top: 62px;
    }

    .contact-info-v2__grid {
        grid-template-columns: 1fr;
    }
}
</style>
