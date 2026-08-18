<?php
/**
 * Work gallery for a single service page.
 * Pulls straight from $PortfolioItems, filtered to this service's category,
 * so adding a project to the portfolio also adds it here.
 */
$workItems = array_values(array_filter(
    $PortfolioItems ?? [],
    static fn(array $item): bool => ($item['category'] ?? '') === ($service['slug'] ?? '')
));

if (!$workItems) {
    return;
}
?>

<section class="svc-work" data-aos="fade-up">
    <div class="container">
        <div class="svc-work__head">
            <span class="svc-work__eyebrow">Our Work</span>
            <h2 class="svc-work__title"><strong><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></strong> projects</h2>
            <p class="svc-work__desc">A selection of <?= count($workItems) ?> pieces produced for clients across Europe and the Americas.</p>
        </div>

        <div class="svc-work__grid">
            <?php foreach ($workItems as $i => $item):
                $isFile    = empty($item['url']);
                $isVideo   = ($item['media_type'] ?? '') === 'video';
                $mediaHref = $BaseURL . ($item['media'] ?? $item['image']);
            ?>
            <a class="svc-work__card<?= $isFile ? ' glightbox' : '' ?>"
               href="<?= htmlspecialchars($isFile ? $mediaHref : $item['url'], ENT_QUOTES, 'UTF-8') ?>"
               <?php if ($isFile): ?>data-gallery="service-work" data-type="<?= $isVideo ? 'video' : 'image' ?>" data-title="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"<?php else: ?>target="_blank" rel="noopener"<?php endif; ?>
               data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 60 ?>">
                <span class="svc-work__media">
                    <img src="<?= htmlspecialchars($BaseURL . $item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                    <?php if ($isVideo): ?>
                    <span class="svc-work__play" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    </span>
                    <?php endif; ?>
                </span>
                <span class="svc-work__body">
                    <span class="svc-work__client"><?= htmlspecialchars($item['client'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="svc-work__name"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></span>
                </span>
            </a>
            <?php endforeach; ?>
        </div>

        <div class="svc-work__more">
            <a href="<?= htmlspecialchars(falchion_url('portfolio.php'), ENT_QUOTES, 'UTF-8') ?>">See the full portfolio →</a>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    GLightbox({ selector: '.svc-work__card.glightbox', touchNavigation: true, loop: true });
});
</script>

<style>
.svc-work {
    padding: 90px 0 96px;
    background: var(--surface);
    border-top: 1px solid var(--line);
}
.svc-work__head { text-align: center; max-width: 680px; margin: 0 auto 40px; }
.svc-work__eyebrow {
    display: inline-block;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 14px;
}
.svc-work__title {
    font-family: var(--title-font);
    font-size: clamp(1.8rem, 3.6vw, 2.6rem);
    font-weight: 400;
    color: #020942;
    line-height: 1.15;
    margin: 0 0 12px;
}
.svc-work__title strong { font-weight: 800; }
.svc-work__desc { color: var(--muted); font-size: 0.88rem; margin: 0; }

.svc-work__grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
}
.svc-work__card {
    display: flex;
    flex-direction: column;
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 14px;
    overflow: hidden;
    text-decoration: none;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.svc-work__card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(2,9,66,0.12); }
.svc-work__media {
    position: relative;
    display: block;
    aspect-ratio: 4 / 5;
    overflow: hidden;
    background: #020942;
}
.svc-work__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.svc-work__card:hover .svc-work__media img { transform: scale(1.05); }
.svc-work__play {
    position: absolute;
    inset: 0;
    margin: auto;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #FFF100;
    color: #020942;
    box-shadow: 0 8px 22px rgba(0,0,0,0.35);
}
.svc-work__body { display: block; padding: 13px 15px 16px; }
.svc-work__client {
    display: block;
    font-size: 0.58rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: var(--muted);
    margin-bottom: 4px;
}
.svc-work__name { display: block; font-size: 0.88rem; font-weight: 700; color: #020942; line-height: 1.35; }
.svc-work__more { text-align: center; margin-top: 34px; }
.svc-work__more a {
    font-size: 0.8rem;
    font-weight: 700;
    color: #020942;
    text-decoration: none;
    border-bottom: 2px solid #FFF100;
    padding-bottom: 3px;
}
@media (max-width: 640px) {
    .svc-work { padding: 64px 0 68px; }
    .svc-work__grid { grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 14px; }
}
</style>
