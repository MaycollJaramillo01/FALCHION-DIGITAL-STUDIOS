<?php
require_once __DIR__ . '/falchion-content.php';
$pageTitle = 'Services';
$metaTitleOverride = $Company . ' | Services';
$metaDescriptionOverride = 'Creative and technical services for branding, web, video, animation and digital marketing.';
?>
<?php include 'header.php'; ?>

<!-- Hero -->
<section class="svcs-hero">
    <div class="svcs-hero__bg">
        <div class="svcs-hero__overlay"></div>
    </div>
    <div class="container svcs-hero__inner">
        <div class="svcs-hero__eyebrow">
            <span></span>
            Our Services
            <span></span>
        </div>
        <h1 class="svcs-hero__title">What We Do</h1>
        <p class="svcs-hero__desc">Creative and technical solutions for branding, web, video, animation and digital marketing — all under one studio.</p>
    </div>
</section>

<!-- Service Nav Marquee -->
<div class="svcs-marquee-wrap">
    <div class="svcs-marquee">
        <div class="svcs-marquee__track">
            <?php for ($r = 0; $r < 4; $r++): ?>
            <?php foreach ($Services as $service): ?>
            <a class="svcs-marquee__item" href="#<?= htmlspecialchars($service['slug'], ENT_QUOTES, 'UTF-8') ?>">
                <?= $service['icon'] ?>
                <?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>
            </a>
            <span class="svcs-marquee__sep" aria-hidden="true">—</span>
            <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>

<!-- Services List -->
<?php foreach ($Services as $index => $service): ?>
<section class="svcs-item" id="<?= htmlspecialchars($service['slug'], ENT_QUOTES, 'UTF-8') ?>">
    <div class="container svcs-item__wrap <?= $index % 2 !== 0 ? 'svcs-item__wrap--reverse' : '' ?>">

        <!-- Media -->
        <div class="svcs-item__media" data-aos="<?= $index % 2 !== 0 ? 'fade-left' : 'fade-right' ?>">
            <?php if (!empty($service['video'])): ?>
            <video class="svcs-item__video" autoplay muted loop playsinline>
                <source src="<?= htmlspecialchars($BaseURL . $service['video'], ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
            </video>
            <?php else: ?>
            <img src="<?= htmlspecialchars($BaseURL . $service['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>">
            <?php endif; ?>
            <div class="svcs-item__badge">
                <?= $service['icon'] ?>
                <div>
                    <strong><?= htmlspecialchars($service['badge_label'] ?? $service['title'], ENT_QUOTES, 'UTF-8') ?></strong>
                    <span><?= htmlspecialchars($service['badge_sub'] ?? $service['short'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="svcs-item__content" data-aos="<?= $index % 2 !== 0 ? 'fade-right' : 'fade-left' ?>" data-aos-delay="100">
            <span class="svcs-item__num"><?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?></span>
            <span class="svcs-item__eyebrow">Service</span>
            <h2 class="svcs-item__title"><?= htmlspecialchars($service['headline'] ?? $service['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="svcs-item__desc"><?= htmlspecialchars($service['overview_text'] ?? $service['description'], ENT_QUOTES, 'UTF-8') ?></p>
            <ul class="svcs-item__list">
                <?php foreach ($service['items'] as $item): ?>
                <li>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="svcs-item__actions">
                <a class="svcs-item__btn svcs-item__btn--primary" href="<?= htmlspecialchars(falchion_url('service/' . $service['slug'] . '.php'), ENT_QUOTES, 'UTF-8') ?>">
                    Learn More
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a class="svcs-item__btn svcs-item__btn--ghost" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Book a Call</a>
            </div>
        </div>

    </div>
</section>
<?php endforeach; ?>

<!-- CTA -->
<?php include __DIR__ . '/partials/home/cta-band.php'; ?>

<style>
/* ── Hero ── */
.svcs-hero {
    position: relative;
    min-height: 480px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #020942;
}
.svcs-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.svcs-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #020942 0%, #0a1560 60%, #020942 100%);
    opacity: 0.97;
}
.svcs-hero__inner {
    position: relative;
    z-index: 2;
    text-align: center;
    padding-top: 140px;
    padding-bottom: 90px;
}
.svcs-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: #FFF100;
    margin-bottom: 20px;
}
.svcs-hero__eyebrow span {
    display: block;
    width: 28px;
    height: 1.5px;
    background: #FFF100;
    opacity: 0.7;
}
.svcs-hero__title {
    font-size: clamp(2.8rem, 6vw, 5rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.05;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    margin: 0 0 20px;
}
.svcs-hero__desc {
    font-size: 0.92rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.8;
    max-width: 540px;
    margin: 0 auto;
}

/* ── Marquee ── */
.svcs-marquee-wrap {
    background: #fff;
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
    overflow: hidden;
    padding: 0;
}
.svcs-marquee {
    overflow: hidden;
    padding: 18px 0;
    mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
}
.svcs-marquee__track {
    display: flex;
    align-items: center;
    gap: 0;
    width: max-content;
    animation: svcs-scroll 28s linear infinite;
}
.svcs-marquee__track:hover { animation-play-state: paused; }
@keyframes svcs-scroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}
.svcs-marquee__item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    padding: 6px 20px;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--ink);
    text-decoration: none;
    transition: color 0.2s ease;
    flex-shrink: 0;
}
.svcs-marquee__item i { font-size: 0.78rem; color: #020942; }
.svcs-marquee__item:hover { color: #020942; }
.svcs-marquee__sep {
    font-size: 0.65rem;
    color: var(--line);
    flex-shrink: 0;
    letter-spacing: 0;
    padding: 0 4px;
}

/* ── Service Items ── */
.svcs-item {
    padding: 100px 0;
    border-top: 1px solid var(--line);
}
.svcs-item:nth-child(odd) { background: #fff; }
.svcs-item:nth-child(even) { background: var(--surface); }
.svcs-item__wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 72px;
    align-items: center;
}
.svcs-item__wrap--reverse {
    direction: rtl;
}
.svcs-item__wrap--reverse > * {
    direction: ltr;
}
.svcs-item__media {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 4/3;
    background: #f3f4f6;
}
.svcs-item__video,
.svcs-item__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.svcs-item__badge {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: #020942;
    color: #fff;
    border-radius: 12px;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.svcs-item__badge i { color: #FFF100; font-size: 1rem; flex-shrink: 0; }
.svcs-item__badge strong {
    display: block;
    font-size: 0.8rem;
    font-weight: 700;
    color: #FFF100;
    line-height: 1.2;
}
.svcs-item__badge span {
    font-size: 0.68rem;
    color: rgba(255,255,255,0.6);
    line-height: 1;
}
.svcs-item__num {
    display: block;
    font-size: 3.5rem;
    font-weight: 800;
    color: rgba(2,9,66,0.07);
    line-height: 1;
    letter-spacing: -0.04em;
    margin-bottom: -8px;
}
.svcs-item__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 12px;
}
.svcs-item__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.svcs-item__title {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 800;
    color: var(--ink);
    line-height: 1.1;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    margin: 0 0 14px;
}
.svcs-item__desc {
    font-size: 0.88rem;
    color: var(--muted);
    line-height: 1.8;
    margin: 0 0 24px;
}
.svcs-item__list {
    list-style: none;
    padding: 0;
    margin: 0 0 32px;
    display: flex;
    flex-direction: column;
}
.svcs-item__list li {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 0;
    font-size: 0.83rem;
    color: var(--ink);
    font-weight: 500;
    border-bottom: 1px solid var(--line);
}
.svcs-item__list li:first-child { border-top: 1px solid var(--line); }
.svcs-item__list li svg { flex-shrink: 0; color: #020942; }
.svcs-item__actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}
.svcs-item__btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s ease;
}
.svcs-item__btn--primary {
    background: #020942;
    color: #FFF100;
}
.svcs-item__btn--primary:hover { background: #06091f; }
.svcs-item__btn--ghost {
    background: transparent;
    color: var(--ink);
    border: 1.5px solid var(--line);
}
.svcs-item__btn--ghost:hover {
    border-color: #020942;
    color: #020942;
}
@media (max-width: 900px) {
    .svcs-item__wrap { grid-template-columns: 1fr; gap: 40px; direction: ltr; }
    .svcs-item__wrap--reverse { direction: ltr; }
    .svcs-item { padding: 68px 0; }
    .svcs-hero__inner { padding-top: 110px; padding-bottom: 70px; }
}
</style>

<?php include 'footer.php'; ?>
