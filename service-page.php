<?php
require_once __DIR__ . '/falchion-content.php';

$requestedSlug = trim((string) ($serviceSlug ?? ''));
$service = null;
foreach ($Services as $s) {
    if ($s['slug'] === $requestedSlug) {
        $service = $s;
        break;
    }
}

if ($service === null) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$pageTitle = $service['title'];
$metaTitleOverride = $Company . ' | ' . $service['title'];
$metaDescriptionOverride = $service['description'];
?>
<?php include __DIR__ . '/header.php'; ?>

<?php include __DIR__ . '/partials/service-hero.php'; ?>

<!-- ① Overview -->
<section class="svc-overview">
    <div class="container svc-overview__wrap">

        <div class="svc-overview__media" data-aos="fade-right">
            <?php if (!empty($service['video'])): ?>
            <video class="svc-overview__video" autoplay muted loop playsinline>
                <source src="<?= htmlspecialchars($BaseURL . $service['video'], ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
            </video>
            <?php else: ?>
            <img src="<?= htmlspecialchars($BaseURL . $service['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>">
            <?php endif; ?>
            <div class="svc-overview__badge">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg>
                <div>
                    <strong><?= htmlspecialchars($service['badge_label'] ?? 'Falchion Studios', ENT_QUOTES, 'UTF-8') ?></strong>
                    <span><?= htmlspecialchars($service['badge_sub'] ?? '10+ years of experience', ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            </div>
        </div>

        <div class="svc-overview__content" data-aos="fade-left" data-aos-delay="120">
            <span class="svc-overview__eyebrow"><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></span>
            <h2 class="svc-overview__title"><?= htmlspecialchars($service['headline'] ?? $service['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            <?php if (!empty($service['overview_text'])): ?>
            <p class="svc-overview__desc"><?= htmlspecialchars($service['overview_text'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
            <ul class="svc-overview__list">
                <?php foreach ($service['items'] as $item): ?>
                <li>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <a class="svc-overview__cta" href="#contact-form">
                Get a Free Quote
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

    </div>
</section>

<!-- ② What's Included -->
<section class="svc-included" data-aos="fade-up">
    <div class="container">
        <div class="svc-included__head">
            <span class="svc-included__eyebrow">What's Included</span>
            <h2 class="svc-included__title">Everything you get with <strong><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></strong></h2>
        </div>
        <div class="svc-included__grid">
            <?php foreach ($service['items'] as $i => $item): ?>
            <div class="svc-included__item" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                <span class="svc-included__num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                <p><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ② Process -->
<?php if (!empty($service['process'])): ?>
<section class="svc-process" data-aos="fade-up">
    <div class="container">
        <div class="svc-process__head">
            <span class="svc-process__eyebrow">How We Work</span>
            <h2 class="svc-process__title">Our <strong>process</strong></h2>
        </div>
        <div class="svc-process__steps">
            <?php foreach ($service['process'] as $i => $step): ?>
            <div class="svc-process__step" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <div class="svc-process__step-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
                <div class="svc-process__step-body">
                    <span class="svc-process__step-tag"><?= htmlspecialchars($step['step'], ENT_QUOTES, 'UTF-8') ?></span>
                    <h3><?= htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars($step['text'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <?php if ($i < count($service['process']) - 1): ?>
                <div class="svc-process__arrow" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ③ Why Choose Us (reused) -->
<?php include __DIR__ . '/partials/home/why-choose-us.php'; ?>

<!-- ④ FAQ -->
<?php if (!empty($service['faq'])): ?>
<section class="svc-faq" data-aos="fade-up">
    <div class="container svc-faq__wrap">
        <div class="svc-faq__head">
            <span class="svc-faq__eyebrow">FAQ</span>
            <h2 class="svc-faq__title">Common questions about<br><strong><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></strong></h2>
        </div>
        <div class="svc-faq__list">
            <?php foreach ($service['faq'] as $i => $item): ?>
            <details class="svc-faq__item" <?= $i === 0 ? 'open' : '' ?>>
                <summary class="svc-faq__q">
                    <?= htmlspecialchars($item['q'], ENT_QUOTES, 'UTF-8') ?>
                    <svg class="svc-faq__chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="svc-faq__a"><?= htmlspecialchars($item['a'], ENT_QUOTES, 'UTF-8') ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ⑤ Contact Form -->
<section class="svc-contact" id="contact-form" data-aos="fade-up">
    <div class="container svc-contact__wrap">

        <div class="svc-contact__left">
            <span class="svc-contact__eyebrow">Get Started</span>
            <h2 class="svc-contact__title">Let's talk about your<br><strong><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></strong> project</h2>
            <p class="svc-contact__body">Fill in the form and we'll get back to you within a few hours. No commitment — just a conversation.</p>
            <div class="svc-contact__info">
                <a href="tel:+442039962449">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.06 6.06l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16z"/></svg>
                    +44 020 3996 2449
                </a>
                <a href="mailto:contact@falchionstudios.co.uk">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    contact@falchionstudios.co.uk
                </a>
            </div>
        </div>

        <div class="svc-contact__right">
            <?php if (session_status() !== PHP_SESSION_ACTIVE) @session_start(); ?>
            <?php if (!empty($_SESSION['contact_ok'])): ?>
                <div class="svc-contact__success">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg>
                    <strong>Message sent!</strong>
                    <p>We'll get back to you shortly.</p>
                </div>
            <?php unset($_SESSION['contact_ok']); endif; ?>
            <?php if (!empty($_SESSION['contact_err'])): ?>
                <div class="svc-contact__error"><?= htmlspecialchars($_SESSION['contact_err'], ENT_QUOTES, 'UTF-8') ?></div>
            <?php unset($_SESSION['contact_err']); endif; ?>
            <form class="svc-form" method="post" action="<?= htmlspecialchars($BaseURL, ENT_QUOTES, 'UTF-8') ?>mail.php">
                <?php $_SESSION['csrf'] = bin2hex(random_bytes(16)); ?>
                <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf'], ENT_QUOTES, 'UTF-8') ?>">
                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
                <input type="hidden" name="services" value="<?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="svc-form__row">
                    <div class="svc-form__group">
                        <label>First Name</label>
                        <input type="text" name="name" placeholder="John" required>
                    </div>
                    <div class="svc-form__group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" placeholder="Smith" required>
                    </div>
                </div>
                <div class="svc-form__group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="john@company.com" required>
                </div>
                <div class="svc-form__group">
                    <label>Phone <span>(optional)</span></label>
                    <input type="tel" name="number" placeholder="+44 ...">
                </div>
                <div class="svc-form__group">
                    <label>Message</label>
                    <textarea name="message" rows="4" placeholder="Tell us about your project..." required></textarea>
                </div>
                <button type="submit" class="svc-form__submit">
                    Send Message
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
            </form>
        </div>

    </div>
</section>

<!-- ④ CTA Band -->
<?php include __DIR__ . '/partials/home/cta-band.php'; ?>

<style>
/* ── Overview ── */
.svc-overview {
    padding: 100px 0 110px;
    background: #fff;
}
.svc-overview__wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 56px;
    align-items: center;
}
.svc-overview__media {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 4/3;
    background: #f3f4f6;
}
.svc-overview__video,
.svc-overview__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.svc-overview__badge {
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
    backdrop-filter: blur(8px);
}
.svc-overview__badge svg { color: #FFF100; flex-shrink: 0; }
.svc-overview__badge strong {
    display: block;
    font-size: 0.82rem;
    font-weight: 700;
    color: #FFF100;
    line-height: 1.2;
}
.svc-overview__badge span {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.65);
    line-height: 1;
}
.svc-overview__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 16px;
}
.svc-overview__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.svc-overview__title {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 800;
    color: var(--ink);
    line-height: 1.1;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    margin: 0 0 16px;
}
.svc-overview__desc {
    font-size: 0.88rem;
    color: var(--muted);
    line-height: 1.8;
    margin: 0 0 24px;
}
.svc-overview__list {
    list-style: none;
    padding: 0;
    margin: 0 0 36px;
    display: flex;
    flex-direction: column;
    gap: 0;
}
.svc-overview__list li {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 0;
    font-size: 0.84rem;
    color: var(--ink);
    font-weight: 500;
    border-bottom: 1px solid var(--line);
}
.svc-overview__list li:first-child { border-top: 1px solid var(--line); }
.svc-overview__list li svg {
    flex-shrink: 0;
    color: #020942;
}
.svc-overview__cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #020942;
    color: #FFF100;
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 14px 28px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.2s ease;
}
.svc-overview__cta:hover { background: #06091f; }
@media (max-width: 860px) {
    .svc-overview__wrap { grid-template-columns: 1fr; gap: 48px; }
    .svc-overview { padding: 68px 0; }
    .svc-overview__media { aspect-ratio: 16/9; }
}

/* ── What's Included ── */
.svc-included {
    padding: 100px 0 110px;
    background: #fff;
    border-top: 1px solid var(--line);
}
.svc-included__head {
    text-align: center;
    margin-bottom: 56px;
}
.svc-included__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 14px;
}
.svc-included__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.svc-included__title {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 300;
    color: var(--ink);
    margin: 0;
    letter-spacing: -0.02em;
}
.svc-included__title strong { font-weight: 800; }
.svc-included__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}
.svc-included__item {
    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 28px 24px;
    display: flex;
    gap: 16px;
    align-items: flex-start;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.svc-included__item:hover {
    border-color: #020942;
    box-shadow: 0 8px 24px rgba(2,9,66,0.07);
}
.svc-included__num {
    font-size: 0.6rem;
    font-weight: 800;
    color: #FFF100;
    background: #020942;
    border-radius: 6px;
    padding: 3px 7px;
    flex-shrink: 0;
    letter-spacing: 0.06em;
    margin-top: 2px;
}
.svc-included__item p {
    font-size: 0.85rem;
    color: var(--muted);
    line-height: 1.6;
    margin: 0;
}
@media (max-width: 860px) { .svc-included__grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 580px) { .svc-included__grid { grid-template-columns: 1fr; } .svc-included { padding: 68px 0; } }

/* ── Process ── */
.svc-process {
    padding: 100px 0 110px;
    background: #020942;
    border-top: 1px solid rgba(255,255,255,0.06);
}
.svc-process__head {
    text-align: center;
    margin-bottom: 64px;
}
.svc-process__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: #FFF100;
    margin-bottom: 14px;
}
.svc-process__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #FFF100;
}
.svc-process__title {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 300;
    color: #fff;
    margin: 0;
    letter-spacing: -0.02em;
}
.svc-process__title strong { font-weight: 800; }
.svc-process__steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    position: relative;
}
.svc-process__step {
    position: relative;
    padding: 32px 24px;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    background: rgba(255,255,255,0.03);
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.svc-process__arrow {
    display: none;
}
.svc-process__step-num {
    font-size: 2rem;
    font-weight: 800;
    color: rgba(255,241,0,0.15);
    line-height: 1;
    letter-spacing: -0.04em;
}
.svc-process__step-tag {
    display: inline-block;
    font-size: 0.6rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.18em;
    color: #FFF100;
    background: rgba(255,241,0,0.1);
    border-radius: 4px;
    padding: 3px 8px;
    margin-bottom: 4px;
}
.svc-process__step-body h3 {
    font-size: 0.95rem;
    font-weight: 700;
    color: #fff;
    margin: 0 0 8px;
}
.svc-process__step-body p {
    font-size: 0.82rem;
    color: rgba(255,255,255,0.55);
    line-height: 1.7;
    margin: 0;
}
@media (max-width: 860px) { .svc-process__steps { grid-template-columns: 1fr 1fr; gap: 12px; } }
@media (max-width: 520px) { .svc-process__steps { grid-template-columns: 1fr; gap: 10px; } .svc-process { padding: 68px 0; } }

/* ── FAQ ── */
.svc-faq {
    padding: 100px 0 110px;
    background: #fff;
    border-top: 1px solid var(--line);
}
.svc-faq__wrap {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 72px;
    align-items: start;
}
.svc-faq__head {
    position: sticky;
    top: 100px;
}
.svc-faq__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 16px;
}
.svc-faq__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.svc-faq__title {
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 300;
    color: var(--ink);
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin: 0;
}
.svc-faq__title strong { font-weight: 800; }
.svc-faq__list {
    display: flex;
    flex-direction: column;
    gap: 0;
}
.svc-faq__item {
    border-bottom: 1px solid var(--line);
    overflow: hidden;
}
.svc-faq__item:first-child { border-top: 1px solid var(--line); }
.svc-faq__q {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 20px 0;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--ink);
    cursor: pointer;
    list-style: none;
    transition: color 0.2s ease;
}
.svc-faq__q::-webkit-details-marker { display: none; }
.svc-faq__q:hover { color: #020942; }
.svc-faq__chevron {
    flex-shrink: 0;
    transition: transform 0.25s ease;
    color: var(--muted);
}
.svc-faq__item[open] .svc-faq__chevron { transform: rotate(180deg); }
.svc-faq__item[open] .svc-faq__q { color: #020942; }
.svc-faq__a {
    font-size: 0.84rem;
    color: var(--muted);
    line-height: 1.8;
    margin: 0 0 20px;
    padding-right: 36px;
}
@media (max-width: 860px) {
    .svc-faq__wrap { grid-template-columns: 1fr; gap: 40px; }
    .svc-faq__head { position: static; }
    .svc-faq { padding: 68px 0; }
}

/* ── Contact Form ── */
.svc-contact {
    padding: 100px 0 110px;
    background: var(--surface);
    border-top: 1px solid var(--line);
}
.svc-contact__wrap {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 72px;
    align-items: start;
}
.svc-contact__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 16px;
}
.svc-contact__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.svc-contact__title {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    font-weight: 300;
    color: var(--ink);
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin: 0 0 16px;
}
.svc-contact__title strong { font-weight: 800; }
.svc-contact__body {
    font-size: 0.85rem;
    color: var(--muted);
    line-height: 1.8;
    margin: 0 0 28px;
}
.svc-contact__info {
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.svc-contact__info a {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.82rem;
    color: var(--ink);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}
.svc-contact__info a:hover { color: #020942; }
.svc-contact__info svg { color: #020942; flex-shrink: 0; }
.svc-contact__success {
    text-align: center;
    padding: 40px;
    background: #f0fdf4;
    border: 1px solid #86efac;
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}
.svc-contact__success strong { font-size: 1.1rem; color: #166534; }
.svc-contact__success p { font-size: 0.82rem; color: #166534; margin: 0; }
.svc-contact__error {
    background: #fef2f2;
    border: 1px solid #fca5a5;
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 0.82rem;
    color: #991b1b;
    margin-bottom: 16px;
}
.svc-form {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 20px;
    padding: 36px 32px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.svc-form__row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}
.svc-form__group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.svc-form__group label {
    font-size: 0.72rem;
    font-weight: 700;
    color: var(--ink);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.svc-form__group label span {
    font-weight: 400;
    color: var(--muted);
    text-transform: none;
    letter-spacing: 0;
}
.svc-form input,
.svc-form textarea {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid var(--line);
    border-radius: 8px;
    font-size: 0.84rem;
    color: var(--ink);
    background: var(--surface);
    outline: none;
    transition: border-color 0.2s ease;
    font-family: inherit;
    box-sizing: border-box;
}
.svc-form input:focus,
.svc-form textarea:focus {
    border-color: #020942;
}
.svc-form textarea { resize: vertical; min-height: 110px; }
.svc-form__submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 14px 28px;
    background: #020942;
    color: #FFF100;
    border: none;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s ease;
    font-family: inherit;
}
.svc-form__submit:hover { background: #06091f; }
@media (max-width: 900px) {
    .svc-contact__wrap { grid-template-columns: 1fr; gap: 48px; }
    .svc-contact { padding: 68px 0; }
}
@media (max-width: 480px) { .svc-form__row { grid-template-columns: 1fr; } }
</style>

<?php include __DIR__ . '/footer.php'; ?>
