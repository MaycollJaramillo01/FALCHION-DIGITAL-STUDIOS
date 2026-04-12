<?php
require_once __DIR__ . '/falchion-content.php';
$pageTitle = 'Portfolio';
$metaTitleOverride = $Company . ' | Portfolio';
$metaDescriptionOverride = 'A selection of projects created for brands, businesses and content creators.';
$totalProjects = count($PortfolioItems);
?>
<?php include 'header.php'; ?>

<!-- Hero -->
<section class="port-hero">
    <div class="port-hero__bg">
        <img src="<?= $BaseURL ?>assets/img/hero/Paid Media Campaigns.webp" alt="Falchion Portfolio">
        <div class="port-hero__overlay"></div>
    </div>
    <div class="container port-hero__inner">
        <div class="port-hero__eyebrow"><span></span>Our Work<span></span></div>
        <h1 class="port-hero__title">Selected<br>Projects</h1>
        <p class="port-hero__desc">A curated selection of work created for brands, businesses and content creators across Europe and the Americas.</p>
        <div class="port-hero__stats">
            <div class="port-hero__stat">
                <strong><?= $totalProjects ?>+</strong>
                <span>Projects delivered</span>
            </div>
            <div class="port-hero__stat-divider"></div>
            <div class="port-hero__stat">
                <strong>5</strong>
                <span>Service areas</span>
            </div>
            <div class="port-hero__stat-divider"></div>
            <div class="port-hero__stat">
                <strong>10+</strong>
                <span>Years experience</span>
            </div>
        </div>
    </div>
</section>

<!-- Filter + Grid -->
<section class="port-section">
    <div class="container">

        <!-- Filter bar -->
        <div class="port-filters" data-filter-group>
            <?php foreach ($PortfolioFilters as $key => $label): ?>
            <button type="button"
                class="port-filter<?= $key === 'all' ? ' is-active' : '' ?>"
                data-filter="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>">
                <?php if ($key !== 'all'): ?>
                <?php foreach ($Services as $svc): if ($svc['slug'] === $key): echo $svc['icon']; break; endif; endforeach; ?>
                <?php endif; ?>
                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Grid -->
        <div class="port-grid" data-filter-grid>
            <?php foreach ($PortfolioItems as $i => $item): ?>
            <article class="port-card" data-category="<?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?>" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 80 ?>">
                <a class="port-card__media" href="<?= htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                    <img src="<?= htmlspecialchars($BaseURL . $item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                    <div class="port-card__overlay">
                        <span class="port-card__view">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            View Project
                        </span>
                    </div>
                </a>
                <div class="port-card__body">
                    <div class="port-card__top">
                        <span class="port-card__client"><?= htmlspecialchars($item['client'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="port-card__cat"><?= htmlspecialchars($PortfolioFilters[$item['category']] ?? $item['category'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h2 class="port-card__title"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="port-card__desc"><?= htmlspecialchars($item['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                    <ul class="port-card__tags">
                        <?php foreach ($item['services'] as $tag): ?>
                        <li><?= htmlspecialchars($tag, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- CTA -->
<?php include __DIR__ . '/partials/home/cta-band.php'; ?>

<style>
/* ── Hero ── */
.port-hero {
    position: relative;
    min-height: 560px;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.port-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.port-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.port-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(2,9,66,0.55) 0%, rgba(2,9,66,0.82) 60%, rgba(2,9,66,0.96) 100%);
}
.port-hero__inner {
    position: relative;
    z-index: 2;
    padding-top: 140px;
    padding-bottom: 72px;
}
.port-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: #FFF100;
    margin-bottom: 20px;
}
.port-hero__eyebrow span {
    display: block;
    width: 28px;
    height: 1.5px;
    background: #FFF100;
    opacity: 0.7;
}
.port-hero__title {
    font-size: clamp(3rem, 7vw, 6rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.0;
    letter-spacing: -0.03em;
    text-transform: uppercase;
    margin: 0 0 20px;
}
.port-hero__desc {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.8;
    max-width: 500px;
    margin: 0 0 40px;
}
.port-hero__stats {
    display: flex;
    align-items: center;
    gap: 32px;
}
.port-hero__stat strong {
    display: block;
    font-size: 1.6rem;
    font-weight: 800;
    color: #FFF100;
    line-height: 1;
    letter-spacing: -0.03em;
}
.port-hero__stat span {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.12em;
    font-weight: 600;
    margin-top: 4px;
    display: block;
}
.port-hero__stat-divider {
    width: 1px;
    height: 36px;
    background: rgba(255,255,255,0.15);
}
@media (max-width: 600px) {
    .port-hero__stats { gap: 20px; }
    .port-hero__title { font-size: clamp(2.4rem, 10vw, 4rem); }
}

/* ── Section ── */
.port-section {
    padding: 80px 0 110px;
    background: #fff;
}

/* ── Filters ── */
.port-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 48px;
}
.port-filter {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 18px;
    border-radius: 99px;
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--muted);
    background: var(--surface);
    border: 1.5px solid var(--line);
    cursor: pointer;
    transition: all 0.2s ease;
    font-family: inherit;
}
.port-filter i { font-size: 0.72rem; }
.port-filter:hover { color: #020942; border-color: #020942; background: rgba(2,9,66,0.04); }
.port-filter.is-active { background: #020942; color: #FFF100; border-color: #020942; }

/* ── Grid ── */
.port-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.port-card {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    overflow: hidden;
    transition: box-shadow 0.25s ease, transform 0.25s ease;
    display: flex;
    flex-direction: column;
}
.port-card:hover {
    box-shadow: 0 16px 40px rgba(2,9,66,0.1);
    transform: translateY(-4px);
}
.port-card__media {
    position: relative;
    display: block;
    aspect-ratio: 16/10;
    overflow: hidden;
    background: #f3f4f6;
}
.port-card__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.port-card:hover .port-card__media img { transform: scale(1.04); }
.port-card__overlay {
    position: absolute;
    inset: 0;
    background: rgba(2,9,66,0.72);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.25s ease;
}
.port-card:hover .port-card__overlay { opacity: 1; }
.port-card__view {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #FFF100;
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    border: 1.5px solid #FFF100;
    padding: 10px 18px;
    border-radius: 8px;
}
.port-card__body {
    padding: 22px 24px 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.port-card__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
}
.port-card__client {
    font-size: 0.7rem;
    font-weight: 700;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 0.1em;
}
.port-card__cat {
    font-size: 0.65rem;
    font-weight: 700;
    color: #020942;
    background: rgba(2,9,66,0.07);
    border-radius: 99px;
    padding: 3px 10px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    white-space: nowrap;
}
.port-card__title {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1.3;
    margin: 0 0 10px;
}
.port-card__desc {
    font-size: 0.82rem;
    color: var(--muted);
    line-height: 1.7;
    margin: 0 0 16px;
    flex: 1;
}
.port-card__tags {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}
.port-card__tags li {
    font-size: 0.67rem;
    font-weight: 600;
    color: var(--muted);
    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: 4px;
    padding: 3px 9px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}
/* hide filtered cards */
.port-card[style*="display: none"] { display: none !important; }

@media (max-width: 960px) { .port-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 600px) { .port-grid { grid-template-columns: 1fr; } .port-section { padding: 56px 0 80px; } }
</style>

<?php include 'footer.php'; ?>
