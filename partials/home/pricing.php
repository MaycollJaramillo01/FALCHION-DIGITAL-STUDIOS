<?php
$catalog = require __DIR__ . '/../../data/i18n/en/catalog.php';
$webPlans = $catalog['WebCollectionPremium'] ?? [];
$socialMedia = $catalog['SocialMediaManagement'] ?? [];
$adServices = $catalog['AdServices'] ?? [];
$logoBranding = $catalog['LogoBrandingServices'] ?? [];
$addons = $catalog['PremiumAddOns'] ?? [];
$optionalAddons = $catalog['OptionalAddons'] ?? [];
?>

<section class="section pricing-section">
    <div class="container">
        <div class="pricing-header">
            <span class="pricing-eyebrow">Pricing</span>
            <h2 class="pricing-header__title">Plans built for every stage of growth</h2>
            <p class="pricing-header__desc">Transparent pricing with no hidden fees. Choose the web package that fits your goals, or add standalone creative services.</p>
        </div>

        <div class="pricing-grid">
            <?php foreach ($webPlans as $i => $plan): ?>
            <div class="pricing-card <?= $i === 1 ? 'pricing-card--featured' : '' ?>">
                <?php if ($i === 1): ?><span class="pricing-card__badge">Most Popular</span><?php endif; ?>
                <div class="pricing-card__header">
                    <h3><?= htmlspecialchars($plan['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p class="pricing-card__tagline"><?= htmlspecialchars($plan['tagline'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="pricing-card__price"><?= htmlspecialchars($plan['price'], ENT_QUOTES, 'UTF-8') ?></div>
                <p class="pricing-card__desc"><?= htmlspecialchars($plan['description'], ENT_QUOTES, 'UTF-8') ?></p>
                <ul class="pricing-card__list">
                    <?php foreach ($plan['includes'] as $item): ?>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="pricing-card__footer">
                    <span class="pricing-card__delivery">Delivery: <?= htmlspecialchars($plan['delivery'], ENT_QUOTES, 'UTF-8') ?></span>
                    <a class="button <?= $i === 1 ? 'button--yellow' : 'button--ghost' ?>" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Get Started</a>
                </div>
                <p class="pricing-card__ideal"><?= htmlspecialchars($plan['ideal'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($optionalAddons)): ?>
        <div class="pricing-addons-note">
            <?php foreach ($optionalAddons as $addon): ?>
            <span><?= htmlspecialchars($addon, ENT_QUOTES, 'UTF-8') ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="pricing-header" style="margin-top: 80px;">
            <span class="pricing-eyebrow">Additional Services</span>
            <h2 class="pricing-header__title">Standalone creative services</h2>
            <p class="pricing-header__desc">Complement your web presence with branding, social media management, and paid advertising.</p>
        </div>

        <div class="service-addon-grid">
            <div class="service-addon-card">
                <div class="service-addon-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                </div>
                <h3>Logo & Branding</h3>
                <ul>
                    <?php foreach ($logoBranding as $item): ?>
                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="button button--sm button--ghost" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Request Quote</a>
            </div>

            <div class="service-addon-card">
                <div class="service-addon-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <h3>Social Media Management</h3>
                <ul>
                    <?php foreach ($socialMedia as $item): ?>
                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="button button--sm button--ghost" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Request Quote</a>
            </div>

            <div class="service-addon-card">
                <div class="service-addon-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/></svg>
                </div>
                <h3>Paid Advertising</h3>
                <ul>
                    <?php foreach ($adServices as $item): ?>
                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="button button--sm button--ghost" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Request Quote</a>
            </div>

            <?php if (!empty($addons)): ?>
            <div class="service-addon-card">
                <div class="service-addon-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                </div>
                <h3>Premium Add-Ons</h3>
                <ul>
                    <?php foreach ($addons as $item): ?>
                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="button button--sm button--ghost" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">Request Quote</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
