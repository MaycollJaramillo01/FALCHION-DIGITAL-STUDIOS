<?php require_once __DIR__ . '/falchion-content.php'; ?>
        </main>

        <footer class="site-footer">
            <div class="container site-footer__grid">

                <!-- Brand col -->
                <div class="sf-brand">
                    <a href="<?= htmlspecialchars(falchion_url('index.php'), ENT_QUOTES, 'UTF-8') ?>">
                        <img src="<?= htmlspecialchars($BaseURL, ENT_QUOTES, 'UTF-8') ?>assets/img/logo.png" alt="<?= htmlspecialchars($Company, ENT_QUOTES, 'UTF-8') ?>" class="sf-brand__logo">
                    </a>
                    <p class="sf-brand__desc"><?= htmlspecialchars($SiteDescription, ENT_QUOTES, 'UTF-8') ?></p>
                    <div class="sf-socials">
                        <?php
                        $socialIcons = [
                            'YouTube'   => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6A3 3 0 0 0 .5 6.2 31 31 0 0 0 0 12a31 31 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 0 0 2.1-2.1A31 31 0 0 0 24 12a31 31 0 0 0-.5-5.8zM9.7 15.5V8.5l6.3 3.5-6.3 3.5z"/></svg>',
                            'Instagram'  => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 3.2.1 4.7 1.7 4.8 4.8.1 1.2.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 3.1-1.6 4.7-4.8 4.8-1.2.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-3.2-.1-4.7-1.7-4.8-4.8C2.3 15.6 2.2 15.2 2.2 12s0-3.6.1-4.8C2.4 3.9 3.9 2.3 7.2 2.3 8.4 2.2 8.8 2.2 12 2.2zm0-2.2C8.7 0 8.3 0 7.1.1 2.7.3.3 2.7.1 7.1 0 8.3 0 8.7 0 12s0 3.7.1 4.9c.2 4.4 2.6 6.8 7 7C8.3 24 8.7 24 12 24s3.7 0 4.9-.1c4.4-.2 6.8-2.6 7-7 .1-1.2.1-1.6.1-4.9s0-3.7-.1-4.9c-.2-4.4-2.6-6.8-7-7C15.7 0 15.3 0 12 0zm0 5.8a6.2 6.2 0 1 0 0 12.4A6.2 6.2 0 0 0 12 5.8zm0 10.2a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-11.8a1.4 1.4 0 1 0 0 2.8 1.4 1.4 0 0 0 0-2.8z"/></svg>',
                            'Facebook'   => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.1C24 5.4 18.6 0 12 0S0 5.4 0 12.1c0 6 4.4 11 10.1 11.9v-8.4H7.1v-3.5h3V9.4c0-3 1.8-4.6 4.5-4.6 1.3 0 2.7.2 2.7.2v2.9h-1.5c-1.5 0-1.9.9-1.9 1.9v2.2h3.3l-.5 3.5h-2.7V24C19.6 23.1 24 18.1 24 12.1z"/></svg>',
                            'LinkedIn'   => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.4 20.4h-3.4v-5.3c0-1.3 0-2.9-1.8-2.9s-2 1.4-2 2.8v5.4H9.8V9h3.3v1.6h.1c.5-.9 1.6-1.8 3.3-1.8 3.5 0 4.1 2.3 4.1 5.3v6.3zM5.3 7.4a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm1.7 13H3.6V9h3.4v11.4zM22.2 0H1.8C.8 0 0 .8 0 1.7v20.6C0 23.2.8 24 1.8 24h20.4c1 0 1.8-.8 1.8-1.7V1.7C24 .8 23.2 0 22.2 0z"/></svg>',
                            'TikTok'     => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19.6 3a5.6 5.6 0 0 1-5.6-5.6h-3.7v15.5a2.6 2.6 0 1 1-2.5-2.8c.2 0 .5 0 .7.1V6.4a6.4 6.4 0 0 0-.7 0 6.3 6.3 0 1 0 6.3 6.3V8.5a9.2 9.2 0 0 0 5.5 1.8V6.6A5.6 5.6 0 0 1 19.6 3z"/></svg>',
                        ];
                        foreach ($SocialLinks as $social):
                            $icon = $socialIcons[$social['label']] ?? '';
                        ?>
                        <a class="sf-socials__link" href="<?= htmlspecialchars($social['url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= htmlspecialchars($social['label'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= $icon ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Company col -->
                <div class="sf-col">
                    <h4 class="sf-col__title">Company</h4>
                    <ul class="sf-col__links">
                        <?php foreach ($NavItems as $item): ?>
                        <li><a href="<?= htmlspecialchars(falchion_url($item['path']), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Services col -->
                <div class="sf-col">
                    <h4 class="sf-col__title">Services</h4>
                    <ul class="sf-col__links">
                        <?php foreach ($FooterServices as $item): ?>
                        <li><a href="<?= htmlspecialchars(falchion_url($item['path']), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contact col -->
                <div class="sf-col">
                    <h4 class="sf-col__title">Contact Us</h4>
                    <ul class="sf-contact">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            <span><?= htmlspecialchars($LocationShort, ENT_QUOTES, 'UTF-8') ?></span>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FFF100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7 12.8 12.8 0 0 0 .7 2.8 2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4 12.8 12.8 0 0 0 2.8.7A2 2 0 0 1 22 16.9z"/></svg>
                            <a href="tel:+442039962449">+44 020 3996 2449</a>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FFF100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <a href="mailto:contact@falchionstudios.co.uk">contact@falchionstudios.co.uk</a>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFF100"><path d="M17.5 14.4c-.3-.1-1.8-.9-2-.9-.3-.1-.5-.2-.7.1-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1a7.6 7.6 0 0 1-3.8-3.3c-.3-.5.3-.5.8-1.5.1-.2 0-.4 0-.5-.1-.2-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4C7 7.5 6 8.5 6 10.4s1.4 3.7 1.5 3.9c.2.2 2.7 4.1 6.5 5.7 3.8 1.5 3.8 1 4.5 1 .7 0 2.1-.9 2.4-1.7.3-.8.3-1.5.2-1.7-.1-.1-.3-.2-.6-.3z"/><path d="M20 3.3A11.9 11.9 0 0 0 12 0a12 12 0 0 0-10.4 18L0 24l6.2-1.6A12 12 0 0 0 24 12c0-3.2-1.3-6.2-3.4-8.5-.2-.1-.4-.2-.6-.2zm-8 21.4a9.9 9.9 0 0 1-5-1.4l-.4-.2-3.7 1 1-3.6-.2-.4A9.9 9.9 0 0 1 2.2 12 9.9 9.9 0 0 1 12 2.1 9.9 9.9 0 0 1 21.9 12 9.9 9.9 0 0 1 12 21.9v.8z"/></svg>
                            <a href="https://wa.me/447915631536" target="_blank" rel="noopener">+44 7915 631536</a>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <span><?= htmlspecialchars($BusinessHours, ENT_QUOTES, 'UTF-8') ?></span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="container site-footer__bottom">
                <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($Company, ENT_QUOTES, 'UTF-8') ?>. All rights reserved.</p>
                <p><?= htmlspecialchars($CoverageLabel, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </footer>
    </div>

    <script src="<?= htmlspecialchars($BaseURL, ENT_QUOTES, 'UTF-8') ?>assets/js/falchion-site.js"></script>
    <script src="<?= htmlspecialchars($BaseURL, ENT_QUOTES, 'UTF-8') ?>assets/js/cursor-glow.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 700,
        easing: 'ease-out-cubic',
        once: true,
        offset: 60,
        delay: 0,
    });
    </script>
</body>
</html>
