<?php
$testimonials = [
    [
        'name'   => 'Valeria Sotelo',
        'rating' => 5,
        'time'   => '2 months ago',
        'text'   => 'As a new company, it may raise some doubts at first, but the experience was very good. You can clearly see the commitment to quality and attention to detail. It\'s a well-organized project with a lot of potential. Highly recommended.',
    ],
    [
        'name'   => 'Olga Reyes',
        'rating' => 5,
        'time'   => '2 months ago',
        'text'   => 'I received excellent guidance from this company. They helped me clarify my business ideas and provided practical, realistic strategies to develop my project. Their advice was clear, professional, and tailored to my needs.',
    ],
    [
        'name'   => 'Arthur Rodríguez',
        'rating' => 5,
        'time'   => '2 months ago',
        'text'   => 'Guys are incredible, they are super professional and get the job done on time.',
    ],
    [
        'name'   => 'Lawn Care Services LLC',
        'rating' => 5,
        'time'   => '2 months ago',
        'text'   => 'More than grateful for the guidance and marketing solutions provided by Falchion Studios. The attention is personalised and the support in promoting our company has been outstanding.',
    ],
    [
        'name'   => 'Tres Tiempos',
        'rating' => 5,
        'time'   => '1 month ago',
        'text'   => 'I am extremely satisfied with this company\'s service and highly recommend them. I gave them the opportunity to create my logo and I am extremely satisfied with their punctuality, price, and especially the fact that they speak my language. I recommend Falchion Digital Studio 100%.',
    ],
];
$googleUrl = 'https://maps.app.goo.gl/fv1ooN659jBSmfaB6';
?>

<section class="testimonials-section">
    <div class="container">

        <div class="testimonials-section__head" data-aos="fade-up">
            <div>
                <span class="testimonials-section__eyebrow">Client Reviews</span>
                <h2 class="testimonials-section__title">What Our <strong>Clients Say</strong></h2>
                <p class="testimonials-section__desc">Real feedback from businesses we have worked with.</p>
            </div>
            <a class="testimonials-section__cta" href="<?= htmlspecialchars($googleUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                View on Google
            </a>
        </div>

        <div class="testimonials-section__rating-bar" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonials-section__score">
                <span class="testimonials-section__score-num">5.0</span>
                <div class="testimonials-section__stars">
                    <?php for ($s = 0; $s < 5; $s++): ?>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="#FFC107"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <?php endfor; ?>
                </div>
                <span class="testimonials-section__review-count"><?= count($testimonials) ?> reviews on Google</span>
            </div>
        </div>

        <div class="testimonials-track-wrap">
            <div class="testimonials-track" id="testimonialsTrack">
                <?php foreach (array_merge($testimonials, $testimonials) as $t): ?>
                <article class="tcard">
                    <div class="tcard__stars">
                        <?php for ($s = 0; $s < $t['rating']; $s++): ?>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFC107"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <?php endfor; ?>
                    </div>
                    <p class="tcard__text">"<?= htmlspecialchars($t['text'], ENT_QUOTES, 'UTF-8') ?>"</p>
                    <div class="tcard__footer">
                        <div class="tcard__avatar"><?= htmlspecialchars(substr($t['name'], 0, 1), ENT_QUOTES, 'UTF-8') ?></div>
                        <div>
                            <strong class="tcard__name"><?= htmlspecialchars($t['name'], ENT_QUOTES, 'UTF-8') ?></strong>
                            <span class="tcard__time"><?= htmlspecialchars($t['time'], ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <svg class="tcard__google" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

<script>
(function () {
    const track = document.getElementById('testimonialsTrack');
    if (!track) return;
    const total = <?= count($testimonials) ?>;
    let isPaused = false;
    let pos = 0;
    let raf;

    function getCardWidth() {
        const card = track.querySelector('.tcard');
        if (!card) return 300;
        const gap = parseInt(getComputedStyle(track).gap) || 16;
        return card.offsetWidth + gap;
    }

    function animate() {
        if (!isPaused) {
            pos += 0.5;
            const resetAt = getCardWidth() * total;
            if (pos >= resetAt) pos = 0;
            track.style.transform = 'translateX(-' + pos + 'px)';
        }
        raf = requestAnimationFrame(animate);
    }

    track.addEventListener('mouseenter', () => { isPaused = true; });
    track.addEventListener('mouseleave', () => { isPaused = false; });
    track.addEventListener('touchstart', () => { isPaused = true; }, { passive: true });
    track.addEventListener('touchend',   () => { setTimeout(() => { isPaused = false; }, 2000); }, { passive: true });

    raf = requestAnimationFrame(animate);
})();
</script>

    </div>
</section>
