<?php
require_once __DIR__ . '/falchion-content.php';
$pageTitle = 'Contact Us';
$metaTitleOverride = $Company . ' | Contact Us';
$metaDescriptionOverride = 'Contact Falchion Digital Studios for web, video, design, animation or digital marketing support.';
$contactSuccess = $_SESSION['contact_success'] ?? '';
$contactError   = $_SESSION['contact_error'] ?? '';
unset($_SESSION['contact_success'], $_SESSION['contact_error']);
?>
<?php include 'header.php'; ?>

<!-- Hero -->
<section class="ct-hero">
    <div class="ct-hero__bg">
        <img src="<?= $BaseURL ?>assets/img/hero/seo.webp" alt="Contact Falchion Digital Studios">
        <div class="ct-hero__overlay"></div>
    </div>
    <div class="container ct-hero__inner">
        <div class="ct-hero__eyebrow"><span></span>Contact Us<span></span></div>
        <h1 class="ct-hero__title">Let's Work<br>Together</h1>
        <p class="ct-hero__desc">Tell us about your project and we'll get back to you within one business day.</p>
        <div class="ct-hero__pills">
            <a class="ct-hero__pill" href="<?= htmlspecialchars($MailRef, ENT_QUOTES, 'UTF-8') ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <?= htmlspecialchars($Mail, ENT_QUOTES, 'UTF-8') ?>
            </a>
            <a class="ct-hero__pill" href="<?= htmlspecialchars($WhatsAppRef, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp
            </a>
            <a class="ct-hero__pill" href="<?= htmlspecialchars($PhoneRef, ENT_QUOTES, 'UTF-8') ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.5 2 2 0 0 1 3.6 1.32h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16.92z"/></svg>
                <?= htmlspecialchars($Phone, ENT_QUOTES, 'UTF-8') ?>
            </a>
        </div>
    </div>
</section>

<!-- Quick Info Bar -->
<div class="ct-infobar">
    <div class="container ct-infobar__inner">
        <div class="ct-infobar__item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <div><strong>Response Time</strong><span>Within 1 business day</span></div>
        </div>
        <div class="ct-infobar__divider"></div>
        <div class="ct-infobar__item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <div><strong>Based in</strong><span><?= htmlspecialchars($LocationShort, ENT_QUOTES, 'UTF-8') ?></span></div>
        </div>
        <div class="ct-infobar__divider"></div>
        <div class="ct-infobar__item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            <div><strong>Services</strong><span>Remote & On-location</span></div>
        </div>
        <div class="ct-infobar__divider"></div>
        <div class="ct-infobar__item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            <div><strong>Coverage</strong><span>Europe & the Americas</span></div>
        </div>
    </div>
</div>

<!-- Form + Sidebar -->
<section class="ct-main" id="contact-form">
    <div class="container ct-main__wrap">

        <!-- Form -->
        <div class="ct-form-wrap" data-aos="fade-right">
            <span class="ct-eyebrow">Send a Message</span>
            <h2 class="ct-form__title">Start the<br><strong>conversation</strong></h2>
            <?php if ($contactSuccess !== ''): ?>
            <div class="ct-notice ct-notice--success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                <?= htmlspecialchars($contactSuccess, ENT_QUOTES, 'UTF-8') ?>
            </div>
            <?php endif; ?>
            <?php if ($contactError !== ''): ?>
            <div class="ct-notice ct-notice--error">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <?= htmlspecialchars($contactError, ENT_QUOTES, 'UTF-8') ?>
            </div>
            <?php endif; ?>
            <form class="ct-form" method="post" action="send-mail.php">
                <div class="ct-form__grid">
                    <label class="ct-field">
                        <span>Full Name <em>*</em></span>
                        <input type="text" name="name" placeholder="John Smith" required>
                    </label>
                    <label class="ct-field">
                        <span>Email Address <em>*</em></span>
                        <input type="email" name="email" placeholder="john@company.com" required>
                    </label>
                    <label class="ct-field">
                        <span>Company / Brand</span>
                        <input type="text" name="company" placeholder="Your company (optional)">
                    </label>
                    <label class="ct-field">
                        <span>Service Interested In <em>*</em></span>
                        <select name="service" required>
                            <option value="">Select a service…</option>
                            <?php foreach ($Services as $svc): ?>
                            <option value="<?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="ct-field ct-field--full">
                        <span>Your Message <em>*</em></span>
                        <textarea name="message" rows="6" placeholder="Tell us about your project, goals, timeline and budget…" required></textarea>
                    </label>
                </div>
                <input type="text" name="lastname" value="" style="display:none" tabindex="-1" autocomplete="off">
                <input type="text" name="phone"    value="" style="display:none" tabindex="-1" autocomplete="off">
                <button class="ct-submit" type="submit">
                    Send Message
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
            </form>
        </div>

        <!-- Sidebar -->
        <aside class="ct-sidebar" data-aos="fade-left" data-aos-delay="100">

            <!-- Contact Methods -->
            <div class="ct-sidebar__block">
                <span class="ct-eyebrow">Reach Us Directly</span>
                <ul class="ct-contacts">
                    <li>
                        <div class="ct-contacts__icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <strong>Email</strong>
                            <a href="<?= htmlspecialchars($MailRef, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($Mail, ENT_QUOTES, 'UTF-8') ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="ct-contacts__icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.5 2 2 0 0 1 3.6 1.32h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16.92z"/></svg>
                        </div>
                        <div>
                            <strong>Phone</strong>
                            <a href="<?= htmlspecialchars($PhoneRef, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($Phone, ENT_QUOTES, 'UTF-8') ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="ct-contacts__icon ct-contacts__icon--wa">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <strong>WhatsApp</strong>
                            <a href="<?= htmlspecialchars($WhatsAppRef, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener"><?= htmlspecialchars($WhatsApp, ENT_QUOTES, 'UTF-8') ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="ct-contacts__icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <strong>Business Hours</strong>
                            <span>Mon – Fri: 8:00 AM – 8:00 PM (UK)</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Address -->
            <div class="ct-sidebar__block ct-sidebar__block--dark">
                <span class="ct-eyebrow ct-eyebrow--light">Our Office</span>
                <h3 class="ct-sidebar__office-title">Liverpool Studio</h3>
                <address class="ct-address">
                    <?= nl2br(htmlspecialchars($Address, ENT_QUOTES, 'UTF-8')) ?>
                </address>
                <a class="ct-sidebar__map-link" href="https://maps.google.com/?q=68-76+Kempston+Street+Liverpool+L3+8HL" target="_blank" rel="noopener">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    View on Google Maps
                </a>
            </div>

            <!-- Services quick links -->
            <div class="ct-sidebar__block">
                <span class="ct-eyebrow">What We Offer</span>
                <ul class="ct-service-links">
                    <?php foreach ($Services as $svc): ?>
                    <li>
                        <a href="<?= htmlspecialchars(falchion_url('service/' . $svc['slug'] . '.php'), ENT_QUOTES, 'UTF-8') ?>">
                            <?= $svc['icon'] ?>
                            <?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?>
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </aside>
    </div>
</section>

<!-- Why Contact Us / Trust Strip -->
<section class="ct-trust">
    <div class="container ct-trust__inner">
        <div class="ct-trust__item">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <div><strong>No commitment required</strong><span>Free initial consultation</span></div>
        </div>
        <div class="ct-trust__item">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <div><strong>Fast turnaround</strong><span>Reply within 24 hours</span></div>
        </div>
        <div class="ct-trust__item">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <div><strong>Confidential</strong><span>Your project details stay private</span></div>
        </div>
        <div class="ct-trust__item">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            <div><strong>Remote friendly</strong><span>We work with clients worldwide</span></div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/home/cta-band.php'; ?>

<style>
/* ── Hero ── */
.ct-hero {
    position: relative;
    min-height: 540px;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.ct-hero__bg { position: absolute; inset: 0; z-index: 0; }
.ct-hero__bg img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }
.ct-hero__overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to bottom, rgba(2,9,66,0.5) 0%, rgba(2,9,66,0.82) 55%, rgba(2,9,66,0.97) 100%);
}
.ct-hero__inner { position: relative; z-index: 2; padding-top: 140px; padding-bottom: 72px; }
.ct-hero__eyebrow {
    display: inline-flex; align-items: center; gap: 12px;
    font-size: 0.62rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.22em; color: #FFF100; margin-bottom: 20px;
}
.ct-hero__eyebrow span { display: block; width: 28px; height: 1.5px; background: #FFF100; opacity: 0.7; }
.ct-hero__title {
    font-size: clamp(2.8rem, 6vw, 5rem); font-weight: 800; color: #fff;
    line-height: 1.0; letter-spacing: -0.03em; text-transform: uppercase; margin: 0 0 18px;
}
.ct-hero__desc { font-size: 0.9rem; color: rgba(255,255,255,0.6); line-height: 1.8; max-width: 440px; margin: 0 0 32px; }
.ct-hero__pills { display: flex; flex-wrap: wrap; gap: 10px; }
.ct-hero__pill {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 16px; border-radius: 99px;
    background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
    color: #fff; font-size: 0.78rem; font-weight: 600;
    text-decoration: none; backdrop-filter: blur(6px);
    transition: background 0.2s ease, border-color 0.2s ease;
}
.ct-hero__pill:hover { background: rgba(255,241,0,0.15); border-color: #FFF100; color: #FFF100; }

/* ── Info Bar ── */
.ct-infobar {
    background: #020942;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    padding: 0;
}
.ct-infobar__inner {
    display: flex; align-items: stretch;
    overflow-x: auto; scrollbar-width: none;
}
.ct-infobar__inner::-webkit-scrollbar { display: none; }
.ct-infobar__item {
    display: flex; align-items: center; gap: 12px;
    padding: 20px 32px; flex-shrink: 0;
}
.ct-infobar__item svg { color: #FFF100; flex-shrink: 0; }
.ct-infobar__item strong { display: block; font-size: 0.78rem; font-weight: 700; color: #fff; line-height: 1.2; }
.ct-infobar__item span  { font-size: 0.7rem; color: rgba(255,255,255,0.5); }
.ct-infobar__divider { width: 1px; background: rgba(255,255,255,0.08); flex-shrink: 0; margin: 12px 0; }

/* ── Main Layout ── */
.ct-main { padding: 88px 0 100px; background: #fff; }
.ct-main__wrap {
    display: grid; grid-template-columns: 1fr 360px;
    gap: 64px; align-items: start;
}
.ct-eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    font-size: 0.62rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.22em; color: var(--muted); margin-bottom: 14px;
}
.ct-eyebrow::before { content: ""; width: 20px; height: 1.5px; background: #020942; }
.ct-eyebrow--light::before { background: #FFF100; }
.ct-form__title {
    font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 300;
    color: var(--ink); line-height: 1.15; letter-spacing: -0.02em; margin: 0 0 28px;
}
.ct-form__title strong { font-weight: 800; }

/* Notices */
.ct-notice {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 14px 16px; border-radius: 10px;
    font-size: 0.84rem; font-weight: 500; margin-bottom: 20px;
}
.ct-notice--success { background: #e8f8f0; color: #1a7a4a; border: 1px solid #b2e4cc; }
.ct-notice--error   { background: #fff0f0; color: #c0392b; border: 1px solid #f5b8b8; }

/* Form */
.ct-form { display: flex; flex-direction: column; gap: 0; }
.ct-form__grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; }
.ct-field { display: flex; flex-direction: column; gap: 6px; }
.ct-field--full { grid-column: 1 / -1; }
.ct-field span { font-size: 0.78rem; font-weight: 600; color: var(--ink); }
.ct-field em { color: #020942; font-style: normal; }
.ct-field input,
.ct-field select,
.ct-field textarea {
    width: 100%; padding: 12px 14px;
    border: 1.5px solid var(--line); border-radius: 10px;
    font-size: 0.84rem; color: var(--ink); font-family: inherit;
    background: #fff; transition: border-color 0.2s ease, box-shadow 0.2s ease;
    outline: none;
}
.ct-field input::placeholder,
.ct-field textarea::placeholder { color: var(--muted); opacity: 0.6; }
.ct-field input:focus,
.ct-field select:focus,
.ct-field textarea:focus {
    border-color: #020942;
    box-shadow: 0 0 0 3px rgba(2,9,66,0.08);
}
.ct-field textarea { resize: vertical; min-height: 140px; }
.ct-submit {
    display: inline-flex; align-items: center; gap: 10px;
    background: #020942; color: #FFF100;
    font-size: 0.82rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.08em; padding: 15px 32px; border-radius: 10px;
    border: none; cursor: pointer; font-family: inherit;
    transition: background 0.2s ease; align-self: flex-start;
}
.ct-submit:hover { background: #06091f; }

/* Sidebar */
.ct-sidebar { display: flex; flex-direction: column; gap: 20px; position: sticky; top: 100px; }
.ct-sidebar__block {
    border: 1px solid var(--line); border-radius: 16px;
    padding: 24px; background: #fff;
}
.ct-sidebar__block--dark {
    background: #020942; border-color: #020942;
}
.ct-sidebar__block--dark .ct-eyebrow { color: rgba(255,255,255,0.5); }
.ct-sidebar__block--dark .ct-eyebrow::before { background: #FFF100; }
.ct-sidebar__office-title {
    font-size: 1rem; font-weight: 800; color: #fff;
    margin: 0 0 14px;
}
.ct-address {
    font-size: 0.82rem; color: rgba(255,255,255,0.6);
    line-height: 1.8; font-style: normal; margin-bottom: 16px;
}
.ct-sidebar__map-link {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 0.74rem; font-weight: 700; color: #FFF100;
    text-decoration: none; text-transform: uppercase; letter-spacing: 0.08em;
    transition: opacity 0.2s ease;
}
.ct-sidebar__map-link:hover { opacity: 0.75; }
.ct-contacts { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0; }
.ct-contacts li {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 0; border-bottom: 1px solid var(--line);
}
.ct-contacts li:last-child { border-bottom: none; }
.ct-contacts__icon {
    width: 36px; height: 36px; border-radius: 10px;
    background: rgba(2,9,66,0.07);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; color: #020942;
}
.ct-contacts__icon--wa { background: #e8f8f0; color: #25D366; }
.ct-contacts li strong { display: block; font-size: 0.72rem; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: 0.08em; }
.ct-contacts li a,
.ct-contacts li span { font-size: 0.82rem; color: var(--ink); text-decoration: none; font-weight: 500; }
.ct-contacts li a:hover { color: #020942; text-decoration: underline; }
.ct-service-links { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; }
.ct-service-links li { border-bottom: 1px solid var(--line); }
.ct-service-links li:last-child { border-bottom: none; }
.ct-service-links a {
    display: flex; align-items: center; gap: 10px;
    padding: 11px 0; font-size: 0.82rem; font-weight: 600;
    color: var(--ink); text-decoration: none;
    transition: color 0.2s ease;
}
.ct-service-links a i { font-size: 0.75rem; color: #020942; }
.ct-service-links a svg:last-child { margin-left: auto; color: var(--muted); }
.ct-service-links a:hover { color: #020942; }

/* Trust Strip */
.ct-trust {
    background: var(--surface);
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
    padding: 0;
}
.ct-trust__inner {
    display: grid; grid-template-columns: repeat(4, 1fr);
}
.ct-trust__item {
    display: flex; align-items: center; gap: 16px;
    padding: 32px 28px;
    border-right: 1px solid var(--line);
}
.ct-trust__item:last-child { border-right: none; }
.ct-trust__item svg { color: #020942; flex-shrink: 0; }
.ct-trust__item strong { display: block; font-size: 0.84rem; font-weight: 700; color: var(--ink); }
.ct-trust__item span  { font-size: 0.75rem; color: var(--muted); }

@media (max-width: 960px) {
    .ct-main__wrap { grid-template-columns: 1fr; }
    .ct-sidebar { position: static; }
    .ct-trust__inner { grid-template-columns: 1fr 1fr; }
    .ct-trust__item:nth-child(2) { border-right: none; }
    .ct-infobar__item { padding: 16px 20px; }
}
@media (max-width: 600px) {
    .ct-form__grid { grid-template-columns: 1fr; }
    .ct-trust__inner { grid-template-columns: 1fr; }
    .ct-trust__item { border-right: none; border-bottom: 1px solid var(--line); }
    .ct-trust__item:last-child { border-bottom: none; }
    .ct-main { padding: 56px 0 72px; }
    .ct-hero__title { font-size: clamp(2.2rem, 9vw, 3.5rem); }
}
</style>

<?php include 'footer.php'; ?>
