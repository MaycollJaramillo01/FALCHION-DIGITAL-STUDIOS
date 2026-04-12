<?php
if (!isset($Testimonials_Items)) {
    include_once __DIR__ . '/../text.php';
}
$testimonialsCtaUrl = isset($PrimaryCTAUrl) ? i18n_localized_url($PrimaryCTAUrl) : i18n_localized_url('contact.php');
$testimonialsAllUrl = i18n_localized_url('testimonials.php');
?>
<section class="testimonials-section" id="testimonials">
    <div class="container">
        
        <div class="testimonials-header">
            <div class="header-left">
                <span class="section-tag-alt"><i class="fa-solid fa-asterisk"></i> <?= $Testimonials_Badge ?></span>
                <h2 class="testimonials-main-title"><?= $Testimonials_Title ?></h2>
            </div>
            <div class="header-right">
                <a href="<?= htmlspecialchars($testimonialsAllUrl, ENT_QUOTES, 'UTF-8') ?>" class="btn-outline-neon">
                    <?= htmlspecialchars(t('Todos los testimonios', 'All testimonials'), ENT_QUOTES, 'UTF-8') ?> <span class="icon-circle"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                </a>
            </div>
        </div>

        <div class="testimonials-bento-grid">
            
            <div class="testimonial-card rating-summary-card">
                <div class="rating-big-number"><?= $Testimonials_Stats['score'] ?></div>
                <div class="rating-client-info">
                    <div class="client-avatars">
                        <img src="https://i.pravatar.cc/40?u=1" alt="<?= htmlspecialchars(t('cliente', 'client'), ENT_QUOTES, 'UTF-8') ?>" width="35" height="35" loading="lazy" decoding="async">
                        <img src="https://i.pravatar.cc/40?u=2" alt="<?= htmlspecialchars(t('cliente', 'client'), ENT_QUOTES, 'UTF-8') ?>" width="35" height="35" loading="lazy" decoding="async">
                        <img src="https://i.pravatar.cc/40?u=3" alt="<?= htmlspecialchars(t('cliente', 'client'), ENT_QUOTES, 'UTF-8') ?>" width="35" height="35" loading="lazy" decoding="async">
                    </div>
                    <div class="client-text">
                        Nuestros clientes<br><span>(<?= $Testimonials_Stats['count'] ?> reseñas)</span>
                    </div>
                </div>
                <p class="rating-desc"><?= $Testimonials_Stats['desc'] ?></p>
                <a href="<?= htmlspecialchars($testimonialsCtaUrl, ENT_QUOTES, 'UTF-8') ?>" class="btn-contact-now">
                    <?= htmlspecialchars(t('Contactar ahora', 'Contact now'), ENT_QUOTES, 'UTF-8') ?> <span class="icon-circle-small"><i class="fa-solid fa-arrow-right"></i></span>
                </a>
            </div>

   <?php foreach($Testimonials_Items as $item): ?>
<div class="testimonial-card review-card">
    <div class="card-top">
        <div class="platform-badge">
            <i class="<?= $item['platform_icon'] ?>"></i> 
            <span><?= $item['platform'] ?></span>
        </div>
        <div class="quote-icon"><i class="fa-solid fa-quote-right"></i></div>
    </div>
    
    <p class="review-text">"<?= $item['text'] ?>"</p>
    
    <div class="card-bottom">
        <div class="user-info">
            <div class="user-details">
                <strong><?= $item['name'] ?></strong>
                <span><?= $item['position'] ?></span>
            </div>
        </div>
        <div class="stars">
            <?php for($i=0; $i<$item['rating']; $i++): ?>
                <i class="fa-solid fa-star"></i>
            <?php endfor; ?>
        </div>
    </div>
</div>
<?php endforeach; ?>
        </div>

        <div class="partners-marquee">
            <?php foreach($Partners as $partner): ?>
            <div class="partner-item">
                <i class="<?= $partner['icon'] ?>"></i>
                <span><?= $partner['name'] ?></span>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<style>
:root {
    --neon: var(--brand-secondary);
    --dark-card: var(--brand-neutral);
}

.testimonials-section {
    background: var(--brand-primary);
    color: var(--brand-accent);
    padding: 100px 0;
    font-family: 'Inter', sans-serif;
}

/* Header */
.testimonials-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 60px;
}
.section-tag-alt {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--neon);
    font-weight: 700;
    font-size: 0.82rem;
    letter-spacing: 0.11em;
    text-transform: uppercase;
}
.section-tag-alt i { color: var(--neon); }
.testimonials-main-title {
    font-size: 3rem;
    font-weight: 700;
    margin-top: 15px;
    color: var(--brand-accent);
}

.btn-outline-neon {
    background: var(--brand-neutral);
    padding: 8px 8px 8px 20px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 15px;
    color: var(--brand-accent);
    text-decoration: none;
    font-weight: 600;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 10%, transparent);
}

/* Bento Grid Testimonials */
.testimonials-bento-grid {
    display: grid;
    grid-template-columns: 0.8fr 1fr 1fr;
    gap: 25px;
    margin-bottom: 80px;
}

.testimonial-card {
    background: var(--dark-card);
    border-radius: 30px;
    padding: 40px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 5%, transparent);
    display: flex;
    flex-direction: column;
}

/* Rating Summary Card */
.rating-summary-card { background: var(--brand-primary); }
.rating-big-number { font-size: 5rem; font-weight: 800; line-height: 1; margin-bottom: 20px; }
.rating-client-info { display: flex; align-items: center; gap: 15px; margin-bottom: 25px; }
.client-avatars { display: flex; }
.client-avatars img { width: 35px; height: 35px; border-radius: 50%; border: 2px solid var(--brand-primary); margin-right: -10px; }
.client-text { font-size: 0.85rem; line-height: 1.2; color: var(--brand-accent); }
.client-text span { color: color-mix(in srgb, var(--brand-accent) 45%, var(--brand-primary) 55%); }
.rating-desc { color: color-mix(in srgb, var(--brand-accent) 55%, var(--brand-primary) 45%); font-size: 0.95rem; margin-bottom: 30px; }

.btn-contact-now {
    background: var(--neon);
    color: var(--brand-primary);
    padding: 12px 25px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: auto;
}

/* Review Cards */
.card-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
.company-logo { font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 8px; }
.platform-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: color-mix(in srgb, var(--brand-accent) 8%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 12%, transparent);
    color: var(--brand-accent);
    border-radius: 999px;
    padding: 6px 12px;
    font-size: 0.82rem;
    font-weight: 700;
}
.quote-icon { color: var(--neon); font-size: 1.5rem; opacity: 0.5; }
.review-text { color: color-mix(in srgb, var(--brand-accent) 65%, var(--brand-primary) 35%); font-size: 1.05rem; line-height: 1.6; margin-bottom: 40px; font-style: italic; }
.card-bottom { display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto; }
.user-info strong { display: block; font-size: 1.1rem; color: var(--brand-accent); }
.user-info span { color: color-mix(in srgb, var(--brand-accent) 45%, var(--brand-primary) 55%); font-size: 0.85rem; }
.stars { color: var(--neon); font-size: 0.8rem; display: flex; gap: 3px; }

/* Partners Marquee */
.partners-marquee {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: var(--brand-primary);
    padding: 30px;
    border-radius: 20px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 3%, transparent);
}
.partner-item {
    display: flex;
    align-items: center;
    gap: 10px;
    opacity: 0.4;
    filter: grayscale(1);
    transition: 0.3s;
}
.partner-item:hover { opacity: 1; filter: grayscale(0); }
.partner-item i { font-size: 1.5rem; }
.partner-item span { font-weight: 700; text-transform: lowercase; font-size: 1.1rem; color: var(--brand-accent); }

/* Responsive */
@media (max-width: 991px) {
    .testimonials-bento-grid { grid-template-columns: 1fr; }
    .testimonials-header { flex-direction: column; align-items: flex-start; gap: 20px; }
    .partners-marquee { flex-wrap: wrap; justify-content: center; gap: 30px; }
}
</style>
