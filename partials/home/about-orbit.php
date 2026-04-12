<?php
$aboutEyebrow  = trim((string) ($HomeAboutCopy['eyebrow'] ?? 'About Us'));
$aboutTitle    = trim((string) ($HomeAboutCopy['title'] ?? ''));
$aboutTitleStr = trim((string) ($HomeAboutCopy['title_strong'] ?? ''));
$aboutDesc     = trim((string) ($HomeAboutCopy['description'] ?? ''));
$aboutCta      = trim((string) ($HomeAboutCopy['cta'] ?? 'Learn More'));

$imageMain = 'assets/img/hero/Paid Media Campaigns.webp';
$imageSec  = 'assets/img/hero/cro.webp';

$expYears    = 10;
$serviceCount = count($Services ?? []);
$companyName  = trim((string) ($Company ?? 'Falchion Digital Studios'));
$licenseLabel = trim((string) ($LicenseNote ?? 'Strategy-Led Performance Marketing'));

$features = $HomeAboutCopy['features'] ?? [];
if (!is_array($features) || empty($features)) {
    $features = [
        ['icon' => 'chart', 'title' => 'Growth Planning',        'text' => 'Clear priorities, milestones and KPI targets before execution.'],
        ['icon' => 'shield', 'title' => 'Performance Standards', 'text' => $LicenseNote ?? 'Performance-focused team'],
        ['icon' => 'chat',   'title' => 'Client Communication',  'text' => $BilingualNote ?? 'Bilingual support EN/ES'],
        ['icon' => 'globe',  'title' => 'Coverage',              'text' => $Coverage ?? 'Global delivery'],
    ];
}
if (count($features) > 4) $features = array_slice($features, 0, 4);

$iconSvgs = [
    'fa-magnifying-glass-chart' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><polyline points="11 8 11 12 13 14"/></svg>',
    'fa-shield-halved'          => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'fa-comments'               => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
    'fa-globe'                  => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'chart'  => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    'shield' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'chat'   => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
    'globe'  => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
];
?>

<section class="orbit-about" id="about">
    <div class="orbit-about__bg" aria-hidden="true"></div>
    <div class="container orbit-about__wrap">

        <div class="orbit-about__hero">
            <article class="orbit-about__story" data-aos="fade-right">
                <span class="orbit-about__eyebrow"><?= htmlspecialchars($aboutEyebrow, ENT_QUOTES, 'UTF-8') ?></span>
                <h2 class="orbit-about__title">
                    <?= htmlspecialchars($aboutTitle, ENT_QUOTES, 'UTF-8') ?>
                    <strong><?= htmlspecialchars($aboutTitleStr, ENT_QUOTES, 'UTF-8') ?></strong>
                </h2>
                <p class="orbit-about__lead"><?= htmlspecialchars($aboutDesc, ENT_QUOTES, 'UTF-8') ?></p>
                <div class="orbit-about__actions">
                    <a href="<?= htmlspecialchars(falchion_url('about.php'), ENT_QUOTES, 'UTF-8') ?>" class="orbit-about__btn">
                        <?= htmlspecialchars($aboutCta, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                    <a href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>" class="orbit-about__cta-ghost">
                        Book a Call →
                    </a>
                </div>
            </article>

            <article class="orbit-about__gallery" data-aos="fade-left" data-aos-delay="150">
                <figure class="orbit-about__photo orbit-about__photo--main orbit-about__photo--video">
                    <video autoplay muted loop playsinline preload="metadata">
                        <source src="assets/img/videos/hero2.mp4" type="video/mp4">
                    </video>
                </figure>
                <figure class="orbit-about__photo orbit-about__photo--secondary">
                    <img src="<?= htmlspecialchars($imageSec, ENT_QUOTES, 'UTF-8') ?>" alt="Strategy" loading="lazy">
                </figure>
                <div class="orbit-about__stamp">
                    <strong><?= $expYears ?>+</strong>
                    <span>Years in Creative</span>
                </div>
            </article>
        </div>

        <div class="orbit-about__lower">
            <div class="orbit-about__metrics" data-aos="fade-up" data-aos-delay="100">
                <article>
                    <strong><?= $expYears ?>+</strong>
                    <span>Years in Industry</span>
                </article>
                <article>
                    <strong><?= $serviceCount ?>+</strong>
                    <span>Creative Services</span>
                </article>
                <article>
                    <strong>2</strong>
                    <span>Regions Served</span>
                </article>
                <article>
                    <strong><?= htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8') ?></strong>
                    <span><?= htmlspecialchars($licenseLabel, ENT_QUOTES, 'UTF-8') ?></span>
                </article>
            </div>

            <div class="orbit-about__principles" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($features as $i => $feat): ?>
                <article class="orbit-about__principle">
                    <div class="orbit-about__idx"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
                    <div class="orbit-about__copy">
                        <h3>
                            <?= $iconSvgs[$feat['icon'] ?? 'chart'] ?? $iconSvgs['chart'] ?>
                            <?= htmlspecialchars($feat['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                        </h3>
                        <p><?= htmlspecialchars($feat['text'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
