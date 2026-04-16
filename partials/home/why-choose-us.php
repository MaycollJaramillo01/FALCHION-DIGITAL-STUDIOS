<?php
$wcuReasons = [
    [
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>',
        'title' => 'One Team, Every Skill',
        'desc'  => 'Design, video, marketing and development — no juggling agencies.',
    ],
    [
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
        'title' => 'End-to-End Production',
        'desc'  => 'From brief to delivery, we own the full pipeline in-house.',
    ],
    [
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
        'title' => 'International Reach',
        'desc'  => 'Clients across the UK and USA.',
    ],
    [
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        'title' => 'High Quality Output',
        'desc'  => '10+ years crafting work that is built to perform and built to last.',
    ],
    [
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
        'title' => 'Digital-First Mindset',
        'desc'  => 'Every asset is made to work across screens, platforms and formats.',
    ],
    [
        'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'title' => 'Reliable & Transparent',
        'desc'  => 'Clear timelines, honest pricing and consistent communication.',
    ],
];
?>

<section class="wcu-section" data-aos="fade-up">
    <div class="container">

        <div class="wcu-section__top">
            <div class="wcu-section__intro">
                <span class="wcu-section__eyebrow" data-aos="fade-up" data-aos-delay="80">Why Choose Us</span>
                <h2 class="wcu-section__title" data-aos="fade-up" data-aos-delay="160">Why work with<br><strong>Falchion Digital Studios</strong></h2>
                <p class="wcu-section__desc" data-aos="fade-up" data-aos-delay="240">We combine creative direction, production discipline and digital execution so brands work with one team instead of managing disconnected specialists.</p>
                <a class="wcu-section__cta" href="<?= htmlspecialchars(falchion_url('about.php'), ENT_QUOTES, 'UTF-8') ?>">
                    Meet the team →
                </a>
            </div>

            <div class="wcu-section__stats">
                <?php foreach ($HomeStats as $stat): ?>
                <div class="wcu-stat">
                    <span class="wcu-stat__value"><?= htmlspecialchars($stat['value'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="wcu-stat__label"><?= htmlspecialchars($stat['label'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="wcu-section__grid">
            <?php $idx = 0; foreach ($wcuReasons as $reason): ?>
            <div class="wcu-card" data-aos="fade-up" data-aos-delay="<?= $idx * 80 ?>">
                <div class="wcu-card__icon"><?= $reason['icon'] ?></div>
                <h3 class="wcu-card__title"><?= htmlspecialchars($reason['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p class="wcu-card__desc"><?= htmlspecialchars($reason['desc'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <?php $idx++; endforeach; ?>
        </div>

    </div>
</section>
