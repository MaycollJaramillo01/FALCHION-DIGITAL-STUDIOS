<section class="service-page-hero">
    <div class="service-page-hero__bg">
        <img src="<?= htmlspecialchars($BaseURL . $service['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="service-page-hero__overlay"></div>
    </div>
    <div class="container service-page-hero__inner">
        <div class="service-page-hero__eyebrow">
            <span></span>
            Services
            <span></span>
        </div>
        <h1 class="service-page-hero__title"><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="service-page-hero__desc"><?= htmlspecialchars($service['description'], ENT_QUOTES, 'UTF-8') ?></p>
        <div class="service-page-hero__actions">
            <a class="service-page-hero__btn service-page-hero__btn--primary" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Book a Call</a>
            <a class="service-page-hero__btn service-page-hero__btn--ghost" href="<?= htmlspecialchars(falchion_url('services.php'), ENT_QUOTES, 'UTF-8') ?>">All Services</a>
        </div>
    </div>
</section>

<style>
.service-page-hero {
    position: relative;
    min-height: 520px;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.service-page-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.service-page-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.service-page-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(2, 9, 66, 0.72) 0%,
        rgba(2, 9, 66, 0.82) 60%,
        rgba(2, 9, 66, 0.95) 100%
    );
}
.service-page-hero__inner {
    position: relative;
    z-index: 2;
    text-align: center;
    padding-top: 140px;
    padding-bottom: 90px;
}
.service-page-hero__eyebrow {
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
.service-page-hero__eyebrow span {
    display: block;
    width: 28px;
    height: 1.5px;
    background: #FFF100;
    opacity: 0.7;
}
.service-page-hero__title {
    font-size: clamp(2.8rem, 6vw, 5rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.05;
    letter-spacing: -0.02em;
    margin: 0 0 20px;
    text-transform: uppercase;
}
.service-page-hero__desc {
    font-size: 0.92rem;
    color: rgba(255,255,255,0.7);
    line-height: 1.75;
    max-width: 600px;
    margin: 0 auto 36px;
}
.service-page-hero__actions {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
}
.service-page-hero__btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s ease;
}
.service-page-hero__btn--primary {
    background: #FFF100;
    color: #020942;
}
.service-page-hero__btn--primary:hover {
    background: #fff;
    color: #020942;
}
.service-page-hero__btn--ghost {
    background: transparent;
    color: #fff;
    border: 1.5px solid rgba(255,255,255,0.35);
}
.service-page-hero__btn--ghost:hover {
    border-color: #fff;
    background: rgba(255,255,255,0.08);
}
@media (max-width: 768px) {
    .service-page-hero { min-height: 400px; }
    .service-page-hero__inner { padding-top: 110px; padding-bottom: 70px; }
    .service-page-hero__title { font-size: clamp(2rem, 8vw, 3rem); }
}
</style>
