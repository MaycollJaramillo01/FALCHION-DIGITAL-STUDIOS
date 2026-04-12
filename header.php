<?php
@session_start();
require_once __DIR__ . '/falchion-content.php';

$currentFile = falchion_current_page();
$isHomePage = $currentFile === 'index.php';
$defaultMetaTitle = $Company . ' | ' . ($pageTitle ?? $SiteTagline);
$metaTitle = trim((string) ($metaTitleOverride ?? $defaultMetaTitle));
$metaDescription = trim((string) ($metaDescriptionOverride ?? $SiteDescription));
$canonicalPath = ltrim((string) ($currentFile !== '' ? $currentFile : 'index.php'), '/');
$canonicalUrl = rtrim($BaseURL, '/') . '/' . $canonicalPath;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:title" content="<?= htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="theme-color" content="#16130f">
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="icon" type="image/png" href="<?= htmlspecialchars($BaseURL . $FaviconPath, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="apple-touch-icon" href="<?= htmlspecialchars($BaseURL . $FaviconPath, ENT_QUOTES, 'UTF-8') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= htmlspecialchars($BaseURL, ENT_QUOTES, 'UTF-8') ?>assets/css/falchion-minimal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body class="site-body <?= $isHomePage ? 'is-home' : 'is-inner' ?>">
    <div class="site-shell">
        <header class="site-header">
            <div class="container site-header__inner">
                <a class="site-logo" href="<?= htmlspecialchars(falchion_url('index.php'), ENT_QUOTES, 'UTF-8') ?>" aria-label="<?= htmlspecialchars($Company, ENT_QUOTES, 'UTF-8') ?>">
                    <img src="<?= htmlspecialchars($BaseURL, ENT_QUOTES, 'UTF-8') ?>assets/img/logo.png" alt="<?= htmlspecialchars($Company, ENT_QUOTES, 'UTF-8') ?>" style="max-height: 60px;">
                </a>

                <button class="site-nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="site-nav" id="site-nav" aria-label="Primary">
                    <div class="mobile-nav-header">
                        <a class="site-logo" href="<?= htmlspecialchars(falchion_url('index.php'), ENT_QUOTES, 'UTF-8') ?>">
                            <img src="assets/img/logo.png" alt="<?= htmlspecialchars($Company, ENT_QUOTES, 'UTF-8') ?>" style="max-height: 50px;">
                        </a>
                        <button class="mobile-nav-close" type="button" aria-label="Close menu">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <ul>
                        <?php foreach ($NavItems as $item): ?>
                            <?php if (!empty($item['has_submenu'])): ?>
                            <li class="has-mega-menu">
                                <a href="<?= htmlspecialchars(falchion_url($item['path']), ENT_QUOTES, 'UTF-8') ?>" class="<?= falchion_is_active($item['path']) ? 'is-active' : '' ?>" aria-haspopup="true" aria-expanded="false">
                                    <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?>
                                    <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </a>
                                <div class="mega-menu">
                                    <div class="mega-menu__inner">
                                        <div class="mega-menu__services">
                                            <span class="mega-menu__label">Solutions &amp; Services</span>
                                            <div class="mega-menu__grid">
                                                <?php foreach ($Services as $svc): ?>
                                                <a class="mega-menu__item" href="<?= htmlspecialchars(falchion_url('service/' . $svc['slug'] . '.php'), ENT_QUOTES, 'UTF-8') ?>">
                                                    <span class="mega-menu__icon"><?= $svc['icon'] ?? '' ?></span>
                                                    <div>
                                                        <strong><?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?></strong>
                                                        <span><?= htmlspecialchars($svc['short'], ENT_QUOTES, 'UTF-8') ?></span>
                                                    </div>
                                                </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="mega-menu__side">
                                            <a class="mega-menu__side-link" href="<?= htmlspecialchars(falchion_url('services.php'), ENT_QUOTES, 'UTF-8') ?>">View All Services →</a>
                                            <a class="mega-menu__side-link" href="<?= htmlspecialchars(falchion_url('portfolio.php'), ENT_QUOTES, 'UTF-8') ?>">Our Portfolio →</a>
                                            <a class="mega-menu__side-link" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Book a Call →</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mobile submenu -->
                                <ul class="mobile-submenu">
                                    <?php foreach ($Services as $svc): ?>
                                    <li><a href="<?= htmlspecialchars(falchion_url('service/' . $svc['slug'] . '.php'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?></a></li>
                                    <?php endforeach; ?>
                                    <li><a href="<?= htmlspecialchars(falchion_url('services.php'), ENT_QUOTES, 'UTF-8') ?>"><strong>View All Services</strong></a></li>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li>
                                <a href="<?= htmlspecialchars(falchion_url($item['path']), ENT_QUOTES, 'UTF-8') ?>" class="<?= falchion_is_active($item['path']) ? 'is-active' : '' ?>">
                                    <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?>
                                </a>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mobile-nav-cta">
                        <a href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>" class="button button--yellow">Book a Call</a>
                    </div>
                </nav>

                <a class="button button--sm button--yellow desktop-cta" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">
                    Book a Call
                </a>
            </div>
        </header>

        <main>
