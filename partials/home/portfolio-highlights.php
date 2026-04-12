<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">Selected Work</span>
            <h2>Highlights from our portfolio</h2>
            <p>A focused selection of work across branding, web, video and digital campaigns.</p>
        </div>
        <div class="portfolio-grid">
            <?php foreach ($featuredPortfolio as $item): ?>
                <article class="portfolio-card" data-category="<?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?>">
                    <div class="portfolio-card__media">
                        <img src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                    </div>
                    <div class="portfolio-card__body">
                        <span class="portfolio-card__meta"><?= htmlspecialchars($item['client'], ENT_QUOTES, 'UTF-8') ?></span>
                        <h3><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($item['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
