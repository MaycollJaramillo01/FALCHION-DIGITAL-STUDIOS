<?php
require_once __DIR__ . '/falchion-content.php';
$pageTitle = 'About Us';
$metaTitleOverride = $Company . ' | About Us';
$metaDescriptionOverride = $AboutContent['who_we_are'];
?>
<?php include 'header.php'; ?>

<section class="about-page-hero">
    <div class="about-page-hero__bg">
        <img src="assets/img/hero/Brand Strategy & Positioning.webp" alt="About Falchion Digital Studios">
        <div class="about-page-hero__overlay"></div>
    </div>
    <div class="container about-page-hero__inner">
        <div class="about-page-hero__eyebrow">
            <span></span>
            About Us
            <span></span>
        </div>
        <h1 class="about-page-hero__title">Who We Are</h1>
    </div>
</section>

<style>
.about-page-hero {
    position: relative;
    min-height: 480px;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.about-page-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.about-page-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.about-page-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(2, 9, 66, 0.72) 0%,
        rgba(2, 9, 66, 0.82) 60%,
        rgba(2, 9, 66, 0.92) 100%
    );
}
.about-page-hero__inner {
    position: relative;
    z-index: 2;
    text-align: center;
    padding-top: 120px;
    padding-bottom: 80px;
}
.about-page-hero__eyebrow {
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
.about-page-hero__eyebrow span {
    display: block;
    width: 28px;
    height: 1.5px;
    background: #FFF100;
    opacity: 0.7;
}
.about-page-hero__title {
    font-size: clamp(2.8rem, 6vw, 5rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.05;
    letter-spacing: -0.02em;
    margin: 0 0 20px;
    text-transform: uppercase;
}
.about-page-hero__desc {
    font-size: 0.92rem;
    color: rgba(255,255,255,0.7);
    line-height: 1.75;
    max-width: 560px;
    margin: 0 auto;
}
@media (max-width: 768px) {
    .about-page-hero { min-height: 360px; }
    .about-page-hero__inner { padding-top: 100px; padding-bottom: 60px; }
    .about-page-hero__title { font-size: clamp(2rem, 8vw, 3rem); }
}
</style>

<section class="our-story">
    <div class="container our-story__wrap">

        <div class="our-story__left" data-aos="fade-right">
            <span class="our-story__eyebrow">Our Story</span>
            <h2 class="our-story__title">More than a studio.<br><strong>A creative alliance.</strong></h2>
            <div class="our-story__divider"></div>
            <p class="our-story__body"><?= htmlspecialchars($AboutContent['who_we_are'], ENT_QUOTES, 'UTF-8') ?></p>
            <p class="our-story__body"><?= htmlspecialchars($AboutContent['history'], ENT_QUOTES, 'UTF-8') ?></p>
            <a class="our-story__cta" href="<?= htmlspecialchars(falchion_url('contact.php'), ENT_QUOTES, 'UTF-8') ?>">
                Work with us
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="our-story__right" data-aos="fade-left" data-aos-delay="150">
            <div class="our-story__img-wrap">
                <img src="assets/img/hero/Paid Media Campaigns.webp" alt="Falchion Digital Studios team" loading="lazy">
                <div class="our-story__badge">
                    <strong>10+</strong>
                    <span>Years in<br>Creative</span>
                </div>
            </div>
            <div class="our-story__stats">
                <div class="our-story__stat">
                    <strong>5+</strong>
                    <span>Services</span>
                </div>
                <div class="our-story__stat">
                    <strong>4+</strong>
                    <span>Countries</span>
                </div>
                <div class="our-story__stat">
                    <strong>100%</strong>
                    <span>Bilingual</span>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
.our-story {
    padding: 100px 0 110px;
    background: #fff;
    border-top: 1px solid var(--line);
}
.our-story__wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 72px;
    align-items: center;
}
.our-story__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 18px;
}
.our-story__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #FFF100;
    flex-shrink: 0;
    filter: brightness(0.75);
}
.our-story__title {
    font-size: clamp(1.9rem, 3.5vw, 2.8rem);
    font-weight: 300;
    color: var(--ink);
    line-height: 1.15;
    letter-spacing: -0.02em;
    margin: 0 0 24px;
}
.our-story__title strong { font-weight: 800; }
.our-story__divider {
    width: 48px;
    height: 3px;
    background: #020942;
    border-radius: 2px;
    margin-bottom: 24px;
}
.our-story__body {
    font-size: 0.86rem;
    color: var(--muted);
    line-height: 1.85;
    margin: 0 0 16px;
}
.our-story__cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
    font-size: 0.8rem;
    font-weight: 700;
    color: #020942;
    text-decoration: none;
    border-bottom: 1.5px solid #020942;
    padding-bottom: 2px;
    transition: opacity 0.2s ease;
}
.our-story__cta:hover { opacity: 0.6; }

/* Right col */
.our-story__img-wrap {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 4/3;
}
.our-story__img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.our-story__badge {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: #020942;
    color: #fff;
    border-radius: 14px;
    padding: 14px 20px;
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}
.our-story__badge strong {
    font-size: 1.6rem;
    font-weight: 800;
    color: #FFF100;
    line-height: 1;
}
.our-story__badge span {
    font-size: 0.68rem;
    color: rgba(255,255,255,0.65);
    margin-top: 2px;
}
.our-story__stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-top: 14px;
}
.our-story__stat {
    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: 14px;
    padding: 18px 14px;
    text-align: center;
}
.our-story__stat strong {
    display: block;
    font-size: 1.4rem;
    font-weight: 800;
    color: #020942;
    line-height: 1;
    margin-bottom: 4px;
}
.our-story__stat span {
    font-size: 0.68rem;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
@media (max-width: 900px) {
    .our-story__wrap { grid-template-columns: 1fr; gap: 48px; }
    .our-story__right { order: -1; }
}
@media (max-width: 600px) {
    .our-story { padding: 68px 0; }
}
</style>

<section class="mv-section">
    <div class="container">
        <div class="mv-grid">

            <div class="mv-connector" aria-hidden="true">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#020942" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.93 4.93l2.12 2.12M16.95 16.95l2.12 2.12M4.93 19.07l2.12-2.12M16.95 7.05l2.12-2.12"/></svg>
            </div>

            <div class="mv-card mv-card--dark" data-aos="fade-right">
                <div class="mv-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <h2 class="mv-card__label">Mission</h2>
                <h3 class="mv-card__title">What We're<br><strong>Built to Do</strong></h3>
                <p class="mv-card__text"><?= htmlspecialchars($AboutContent['mission'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>

            <div class="mv-card mv-card--light" data-aos="fade-left" data-aos-delay="150">
                <div class="mv-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>
                </div>
                <h2 class="mv-card__label">Vision</h2>
                <h3 class="mv-card__title">Where We're<br><strong>Going</strong></h3>
                <p class="mv-card__text"><?= htmlspecialchars($AboutContent['vision'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>

        </div>
    </div>
</section>

<style>
.mv-section {
    padding: 100px 0;
    background: var(--surface);
    border-top: 1px solid var(--line);
}
.mv-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
    position: relative;
}
.mv-connector {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 72px;
    height: 72px;
    background: #fff;
    border: 1.5px solid var(--line);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    box-shadow: 0 8px 24px rgba(2,9,66,0.08);
}
.mv-card {
    border-radius: 28px;
    padding: 52px 44px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.mv-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 24px 52px rgba(2,9,66,0.12);
}
.mv-card--dark {
    background: linear-gradient(145deg, #020942, #06091f);
    border-bottom-right-radius: 0;
}
.mv-card--light {
    background: #fff;
    border: 1px solid var(--line);
    border-top-left-radius: 0;
    margin-top: 40px;
    box-shadow: 0 12px 32px rgba(2,9,66,0.06);
}
.mv-card__icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.mv-card--dark .mv-card__icon {
    background: rgba(255,241,0,0.12);
    color: #FFF100;
}
.mv-card--light .mv-card__icon {
    background: rgba(2,9,66,0.07);
    color: #020942;
}
.mv-card__label {
    font-size: 0.6rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    margin: 0;
}
.mv-card--dark .mv-card__label { color: rgba(255,255,255,0.4); }
.mv-card--light .mv-card__label { color: var(--muted); }
.mv-card__title {
    font-size: clamp(1.5rem, 2.5vw, 2rem);
    font-weight: 300;
    line-height: 1.15;
    margin: 0;
    letter-spacing: -0.01em;
}
.mv-card__title strong { font-weight: 800; }
.mv-card--dark .mv-card__title { color: #fff; }
.mv-card--dark .mv-card__title strong { color: #FFF100; }
.mv-card--light .mv-card__title { color: #020942; }
.mv-card__text {
    font-size: 0.84rem;
    line-height: 1.8;
    margin: 0;
}
.mv-card--dark .mv-card__text { color: rgba(255,255,255,0.6); }
.mv-card--light .mv-card__text { color: var(--muted); }
@media (max-width: 860px) {
    .mv-grid { grid-template-columns: 1fr; }
    .mv-connector { display: none; }
    .mv-card--dark { border-radius: 24px; }
    .mv-card--light { border-radius: 24px; margin-top: 0; }
    .mv-card { padding: 36px 28px; }
}
</style>

<section class="about-values">
    <div class="container">
        <div class="about-values__head" data-aos="fade-up">
            <span class="about-values__eyebrow">Our Values</span>
            <h2 class="about-values__title">Built on <strong>Trust, Discipline</strong><br>and Creativity</h2>
        </div>
        <div class="about-values__grid">
            <?php
            $valIcons = [
                '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
                '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
                '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>',
            ];
            foreach ($Values as $i => $value): ?>
            <article class="about-values__card" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <div class="about-values__icon"><?= $valIcons[$i % 3] ?></div>
                <div class="about-values__num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
                <h3 class="about-values__name"><?= htmlspecialchars($value['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p class="about-values__text"><?= htmlspecialchars($value['text'], ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.about-values {
    padding: 100px 0 110px;
    background: #020942;
}
.about-values__head {
    text-align: center;
    margin-bottom: 56px;
}
.about-values__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: rgba(255,255,255,0.4);
    margin-bottom: 14px;
}
.about-values__eyebrow::before, .about-values__eyebrow::after {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #FFF100;
    opacity: 0.6;
}
.about-values__title {
    font-size: clamp(1.9rem, 3.5vw, 2.8rem);
    font-weight: 300;
    color: #fff;
    line-height: 1.15;
    letter-spacing: -0.02em;
    margin: 0;
}
.about-values__title strong { font-weight: 800; color: #FFF100; }
.about-values__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.about-values__card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    padding: 36px 32px;
    position: relative;
    transition: background 0.25s ease, transform 0.25s ease;
}
.about-values__card:hover {
    background: rgba(255,255,255,0.07);
    transform: translateY(-4px);
}
.about-values__icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(255,241,0,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFF100;
    margin-bottom: 20px;
}
.about-values__num {
    position: absolute;
    top: 28px;
    right: 28px;
    font-size: 0.62rem;
    font-weight: 800;
    color: rgba(255,255,255,0.15);
    letter-spacing: 0.1em;
}
.about-values__name {
    font-size: 1.05rem;
    font-weight: 700;
    color: #fff;
    margin: 0 0 10px;
}
.about-values__text {
    font-size: 0.82rem;
    color: rgba(255,255,255,0.5);
    line-height: 1.75;
    margin: 0;
}
@media (max-width: 860px) {
    .about-values__grid { grid-template-columns: 1fr; }
    .about-values { padding: 68px 0; }
}
</style>

<!-- By the Numbers -->
<section class="about-numbers">
    <div class="container">
        <div class="about-numbers__head" data-aos="fade-up">
            <span class="about-numbers__eyebrow">By the Numbers</span>
            <h2 class="about-numbers__title">The work <strong>speaks for itself</strong></h2>
        </div>
        <div class="about-numbers__grid" data-aos="fade-up" data-aos-delay="100">
            <div class="about-numbers__item">
                <strong>10+</strong>
                <span>Years in the Industry</span>
            </div>
            <div class="about-numbers__item">
                <strong>5+</strong>
                <span>Creative Services</span>
            </div>
            <div class="about-numbers__item">
                <strong>4+</strong>
                <span>Countries Served</span>
            </div>
            <div class="about-numbers__item">
                <strong>100%</strong>
                <span>Bilingual EN / ES</span>
            </div>
            <div class="about-numbers__item">
                <strong>∞</strong>
                <span>Ideas Delivered</span>
            </div>
        </div>
    </div>
</section>

<style>
.about-numbers {
    padding: 100px 0 110px;
    background: var(--surface);
    border-top: 1px solid var(--line);
}
.about-numbers__head {
    text-align: center;
    margin-bottom: 56px;
}
.about-numbers__eyebrow {
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
.about-numbers__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
    flex-shrink: 0;
}
.about-numbers__title {
    font-size: clamp(1.9rem, 3.5vw, 2.8rem);
    font-weight: 300;
    color: var(--ink);
    line-height: 1.1;
    letter-spacing: -0.02em;
    margin: 0;
}
.about-numbers__title strong { font-weight: 800; }
.about-numbers__grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 1px;
    background: var(--line);
    border: 1px solid var(--line);
    border-radius: 20px;
    overflow: hidden;
}
.about-numbers__item {
    background: #fff;
    padding: 44px 28px;
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 8px;
    transition: background 0.2s ease;
}
.about-numbers__item:hover { background: #020942; }
.about-numbers__item strong {
    font-size: clamp(2.2rem, 4vw, 3.2rem);
    font-weight: 800;
    color: #020942;
    line-height: 1;
    transition: color 0.2s ease;
}
.about-numbers__item:hover strong { color: #FFF100; }
.about-numbers__item span {
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--muted);
    transition: color 0.2s ease;
}
.about-numbers__item:hover span { color: rgba(255,255,255,0.6); }
@media (max-width: 900px) {
    .about-numbers__grid { grid-template-columns: repeat(3, 1fr); border-radius: 16px; }
}
@media (max-width: 580px) {
    .about-numbers__grid { grid-template-columns: repeat(2, 1fr); }
    .about-numbers { padding: 68px 0; }
}
</style>

<?php include __DIR__ . '/partials/home/cta-band.php'; ?>

<?php include 'footer.php'; ?>
