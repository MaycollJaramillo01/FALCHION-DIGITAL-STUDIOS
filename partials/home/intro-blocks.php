<section class="intro-statement">
    <div class="container">
        <div class="intro-statement__grid">
            <div class="intro-statement__text" data-aos="fade-right">
                <span class="intro-statement__eyebrow">Who we are</span>
                <h2 class="intro-statement__title"><?= htmlspecialchars($Phrase[0] ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
                <p class="intro-statement__lead"><?= htmlspecialchars($Home[0] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                <p class="intro-statement__body"><?= htmlspecialchars($Home[1] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                <a class="button button--pill" href="<?= htmlspecialchars(falchion_url('about.php'), ENT_QUOTES, 'UTF-8') ?>">About us</a>
            </div>
            <div class="intro-statement__visual" data-aos="fade-left" data-aos-delay="150">
                <img src="assets/img/hero/Paid Media Campaigns.webp" alt="<?= htmlspecialchars($Company, ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
            </div>
        </div>
    </div>
</section>
