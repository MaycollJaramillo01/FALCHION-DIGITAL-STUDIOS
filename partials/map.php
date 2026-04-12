<?php
@session_start();
if (!isset($BrandColors)) {
    include_once __DIR__ . '/../text.php';
}

$mapQueryRaw = trim((string)($google ?? ''));
if ($mapQueryRaw === '') {
    $mapQueryRaw = trim((string)($Address ?? 'Laurel, MD'));
}
$mapQuery = str_replace('+', ' ', $mapQueryRaw);
$mapQueryEncoded = rawurlencode($mapQuery);

$mapEmbedSrc = 'https://www.google.com/maps?q=' . $mapQueryEncoded . '&output=embed';
$mapOpenLink = !empty($GoogleMap)
    ? (string)$GoogleMap
    : 'https://www.google.com/maps/search/?api=1&query=' . $mapQueryEncoded;
$mapCtaUrl = $PrimaryCTAUrl ?? 'contact.php';
$mapCtaLabel = !empty($Phone2) ? 'WhatsApp' : 'Contacto';
$mapCtaIcon = !empty($Phone2) ? 'fa-brands fa-whatsapp' : 'fa-solid fa-envelope';
?>

<section class="map-v2" id="location">
    <div class="container">
        <div class="map-v2__grid">
            <div class="map-v2__frame" data-anim="up" data-delay="1">
                <iframe
                    src="<?= htmlspecialchars($mapEmbedSrc, ENT_QUOTES, 'UTF-8') ?>"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Mapa de ubicacion"></iframe>
            </div>

            <aside class="map-v2__card" data-anim="left" data-delay="2">
                <p class="map-v2__badge"><i class="fa-solid fa-location-dot"></i> UBICACION Y ACCESO</p>
                <h2>Ubicacion y acceso directo</h2>
                <p class="map-v2__lead">
                    Agenda una llamada, envia tu brief o visita este punto de referencia para una conversacion estrategica mas clara.
                </p>

                <ul class="map-v2__list">
                    <li>
                        <i class="fa-solid fa-map-pin"></i>
                        <span><?= htmlspecialchars($Address ?? 'Laurel, MD', ENT_QUOTES, 'UTF-8') ?></span>
                    </li>
                    <li>
                        <i class="fa-regular fa-clock"></i>
                        <span><?= htmlspecialchars($Schedule ?? 'Lun-Vie 9am-6pm EST', ENT_QUOTES, 'UTF-8') ?></span>
                    </li>
                    <?php if (!empty($Phone)): ?>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="<?= htmlspecialchars($PhoneRef ?? '#', ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($Phone, ENT_QUOTES, 'UTF-8') ?></a>
                    </li>
                    <?php endif; ?>
                </ul>

                <div class="map-v2__actions">
                    <a href="<?= htmlspecialchars($mapOpenLink, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                        Abrir Google Maps <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                    <a href="<?= htmlspecialchars($mapCtaUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                        <?= htmlspecialchars($mapCtaLabel, ENT_QUOTES, 'UTF-8') ?> <i class="<?= htmlspecialchars($mapCtaIcon, ENT_QUOTES, 'UTF-8') ?>"></i>
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

<style>
.map-v2 {
    padding: 24px 0 84px;
    background:
      radial-gradient(520px 260px at 12% 8%, color-mix(in srgb, var(--brand-secondary) 11%, transparent), transparent 72%),
      linear-gradient(180deg, color-mix(in srgb, var(--brand-primary) 98%, #000 2%) 0%, color-mix(in srgb, var(--brand-primary) 96%, #000 4%) 100%);
}

.map-v2__grid {
    display: grid;
    grid-template-columns: 1.3fr minmax(310px, 0.7fr);
    gap: 18px;
    align-items: stretch;
}

.map-v2__frame {
    border-radius: 18px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    overflow: hidden;
    min-height: 420px;
}

.map-v2__frame iframe {
    width: 100%;
    height: 100%;
    min-height: 420px;
    border: 0;
    filter: saturate(0.84) contrast(1.02);
}

.map-v2__card {
    border-radius: 18px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    padding: 22px 20px;
}

.map-v2__badge {
    margin: 0 0 8px;
    color: var(--brand-secondary);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.08em;
}

.map-v2__badge i {
    margin-right: 6px;
}

.map-v2__card h2 {
    margin: 0;
    color: var(--brand-accent);
    font-size: clamp(1.4rem, 2.2vw, 2rem);
    line-height: 1.2;
}

.map-v2__lead {
    margin: 12px 0 0;
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    font-size: 0.94rem;
    line-height: 1.65;
}

.map-v2__list {
    margin: 14px 0 0;
    padding: 0;
    list-style: none;
    display: grid;
    gap: 10px;
}

.map-v2__list li {
    min-height: 42px;
    border-radius: 10px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 12%, transparent);
    background: color-mix(in srgb, var(--brand-primary) 66%, transparent);
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 0 11px;
    color: color-mix(in srgb, var(--brand-accent) 86%, transparent);
    font-size: 0.9rem;
}

.map-v2__list li i {
    color: var(--brand-secondary);
}

.map-v2__list li a {
    color: var(--brand-accent);
    text-decoration: none;
}

.map-v2__list li a:hover {
    color: var(--brand-secondary);
}

.map-v2__actions {
    margin-top: 12px;
    display: grid;
    gap: 8px;
}

.map-v2__actions a {
    min-height: 42px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.86rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.25s ease;
}

.map-v2__actions a:first-child {
    background: var(--brand-secondary);
    color: var(--brand-primary);
}

.map-v2__actions a:first-child:hover {
    transform: translateY(-2px);
}

.map-v2__actions a:last-child {
    background: color-mix(in srgb, var(--brand-accent) 5%, transparent);
    color: var(--brand-accent);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
}

.map-v2__actions a:last-child:hover {
    background: color-mix(in srgb, var(--brand-accent) 10%, transparent);
}

@media (max-width: 991px) {
    .map-v2 {
        padding-top: 12px;
        padding-bottom: 70px;
    }

    .map-v2__grid {
        grid-template-columns: 1fr;
    }

    .map-v2__frame,
    .map-v2__frame iframe {
        min-height: 320px;
    }
}
</style>
