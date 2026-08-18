<?php
// Home shows a cross-section — up to 3 per service — with the full set on portfolio.php.
$galPerCategory = 3;
$galItems = [];
$galSeen  = [];
foreach ($PortfolioItems ?? [] as $item) {
    $cat = $item['category'] ?? 'work';
    $galSeen[$cat] = ($galSeen[$cat] ?? 0) + 1;
    if ($galSeen[$cat] <= $galPerCategory) {
        $galItems[] = $item;
    }
}

$galFilters = ['all' => 'All'];
foreach ($PortfolioFilters ?? [] as $slug => $label) {
    if ($slug === 'all') continue;
    foreach ($galItems as $item) {
        if (($item['category'] ?? '') === $slug) { $galFilters[$slug] = $label; break; }
    }
}

$defaultCat = 'all';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

<section class="pf-gallery" id="work">
    <div class="container">

        <div class="pf-gallery__header">
            <div>
                <span class="pf-gallery__eyebrow">Our Work</span>
                <h2 class="pf-gallery__title">Selected <strong>Projects</strong></h2>
                <p class="pf-gallery__desc">A cross-section of our creative output — web design, graphic design, video, animation and marketing.</p>
            </div>
            <a class="pf-gallery__all" href="<?= htmlspecialchars(falchion_url('portfolio.php'), ENT_QUOTES, 'UTF-8') ?>">
                View all projects →
            </a>
        </div>

        <nav class="pf-gallery__filters" aria-label="Filter projects">
            <?php foreach ($galFilters as $slug => $label):
                $count = $slug === 'all'
                    ? count($galItems)
                    : count(array_filter($galItems, fn($it) => ($it['category'] ?? '') === $slug));
            ?>
            <button class="pf-filter-btn <?= $slug === $defaultCat ? 'is-active' : '' ?>"
                    data-filter="<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>">
                <span class="pf-filter-btn__label"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></span>
                <span class="pf-filter-btn__count"><?= $count ?></span>
            </button>
            <?php endforeach; ?>
        </nav>

        <div class="pf-gallery__grid">
            <?php foreach ($galItems as $i => $item):
                $cat      = $item['category'] ?? 'work';
                $imgSrc   = $item['image'] ?? '';
                $hasImg   = $imgSrc !== '';
                $isFeat   = $i === 0;
                $catLabel = $galFilters[$cat] ?? ucwords(str_replace('-', ' ', $cat));
                $isVideo  = ($item['media_type'] ?? '') === 'video';
                $boxSrc   = $item['media'] ?? $imgSrc;
            ?>
            <article class="pf-card <?= $isFeat ? 'pf-card--feat' : '' ?> is-visible"
                     data-category="<?= htmlspecialchars($cat, ENT_QUOTES, 'UTF-8') ?>">

                <div class="pf-card__thumb">
                    <?php if ($hasImg): ?>
                        <img src="<?= htmlspecialchars($imgSrc, ENT_QUOTES, 'UTF-8') ?>"
                             alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                             loading="lazy">
                    <?php else: ?>
                        <div class="pf-card__placeholder"></div>
                    <?php endif; ?>

                    <div class="pf-card__overlay">
                        <span class="pf-card__cat"><?= htmlspecialchars($catLabel, ENT_QUOTES, 'UTF-8') ?></span>
                        <h3 class="pf-card__overlay-title"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                    </div>

                    <?php if ($hasImg): ?>
                    <a class="glightbox pf-card__zoom"
                       href="<?= htmlspecialchars($boxSrc, ENT_QUOTES, 'UTF-8') ?>"
                       data-gallery="portfolio"
                       data-type="<?= $isVideo ? 'video' : 'image' ?>"
                       data-title="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                       aria-label="<?= $isVideo ? 'Play' : 'Expand' ?> <?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>">
                        <?php if ($isVideo): ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                        <?php else: ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 3 21 3 21 9"/><polyline points="9 21 3 21 3 15"/><line x1="21" y1="3" x2="14" y2="10"/><line x1="3" y1="21" x2="10" y2="14"/></svg>
                        <?php endif; ?>
                    </a>
                    <?php endif; ?>
                </div>

                <div class="pf-card__body">
                    <h3><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars($item['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                    <div class="pf-card__tags">
                        <?php foreach (array_slice($item['services'] ?? [], 0, 3) as $tag): ?>
                        <span><?= htmlspecialchars($tag, ENT_QUOTES, 'UTF-8') ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    GLightbox({ selector: '.glightbox', touchNavigation: true, loop: true });

    const filterBtns = document.querySelectorAll('.pf-filter-btn');
    const cards      = document.querySelectorAll('.pf-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            filterBtns.forEach(b => b.classList.remove('is-active'));
            btn.classList.add('is-active');

            cards.forEach(card => {
                const match = filter === 'all' || card.dataset.category === filter;
                card.classList.toggle('is-hidden', !match);
                card.classList.toggle('is-visible', match);
            });
        });
    });
});
</script>
