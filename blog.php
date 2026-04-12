<?php
require_once __DIR__ . '/falchion-content.php';
$pageTitle = 'Blog';
$metaTitleOverride = $Company . ' | Blog';
$metaDescriptionOverride = 'Educational articles about websites, digital marketing, design and content production.';
$featured = $BlogPosts[0] ?? null;
$rest     = array_slice($BlogPosts, 1);
?>
<?php include 'header.php'; ?>

<!-- Hero -->
<section class="blog-hero">
    <div class="blog-hero__bg">
        <img src="<?= $BaseURL ?>assets/img/hero/Brand Strategy & Positioning.webp" alt="Falchion Blog">
        <div class="blog-hero__overlay"></div>
    </div>
    <div class="container blog-hero__inner">
        <div class="blog-hero__eyebrow"><span></span>Blog<span></span></div>
        <h1 class="blog-hero__title">Insights &<br>Ideas</h1>
        <p class="blog-hero__desc">Educational articles on branding, web design, video, animation and digital marketing — written for brands, businesses and creators.</p>
    </div>
</section>

<?php if ($featured): ?>
<!-- Featured Post -->
<section class="blog-featured">
    <div class="container blog-featured__wrap" data-aos="fade-up">
        <a class="blog-featured__media" href="<?= htmlspecialchars(falchion_url('blog/' . urlencode($featured['slug'])), ENT_QUOTES, 'UTF-8') ?>">
            <img src="<?= htmlspecialchars($BaseURL . $featured['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($featured['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
            <div class="blog-featured__badge">Featured</div>
        </a>
        <div class="blog-featured__body">
            <div class="blog-featured__meta">
                <span><?= htmlspecialchars($featured['date'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="blog-featured__dot"></span>
                <span><?= htmlspecialchars($featured['read_time'], ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <h2 class="blog-featured__title">
                <a href="<?= htmlspecialchars(falchion_url('blog/' . urlencode($featured['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($featured['title'], ENT_QUOTES, 'UTF-8') ?>
                </a>
            </h2>
            <p class="blog-featured__excerpt"><?= htmlspecialchars($featured['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>
            <a class="blog-featured__cta" href="<?= htmlspecialchars(falchion_url('blog/' . urlencode($featured['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                Read Article
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($rest)): ?>
<!-- More Posts -->
<section class="blog-posts">
    <div class="container">
        <div class="blog-posts__head">
            <span class="blog-posts__eyebrow">More Articles</span>
        </div>
        <div class="blog-posts__grid">
            <?php foreach ($rest as $i => $post): ?>
            <article class="blog-card" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <a class="blog-card__media" href="<?= htmlspecialchars(falchion_url('blog/' . urlencode($post['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                    <img src="<?= htmlspecialchars($BaseURL . $post['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                    <div class="blog-card__hover">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </div>
                </a>
                <div class="blog-card__body">
                    <div class="blog-card__meta">
                        <span><?= htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="blog-card__dot"></span>
                        <span><?= htmlspecialchars($post['read_time'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h2 class="blog-card__title">
                        <a href="<?= htmlspecialchars(falchion_url('blog/' . urlencode($post['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
                        </a>
                    </h2>
                    <p class="blog-card__excerpt"><?= htmlspecialchars($post['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>
                    <a class="blog-card__link" href="<?= htmlspecialchars(falchion_url('blog/' . urlencode($post['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                        Read Article
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA -->
<?php include __DIR__ . '/partials/home/cta-band.php'; ?>

<style>
/* ── Hero ── */
.blog-hero {
    position: relative;
    min-height: 520px;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.blog-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.blog-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
}
.blog-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(2,9,66,0.5) 0%, rgba(2,9,66,0.82) 55%, rgba(2,9,66,0.97) 100%);
}
.blog-hero__inner {
    position: relative;
    z-index: 2;
    padding-top: 140px;
    padding-bottom: 80px;
}
.blog-hero__eyebrow {
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
.blog-hero__eyebrow span {
    display: block;
    width: 28px;
    height: 1.5px;
    background: #FFF100;
    opacity: 0.7;
}
.blog-hero__title {
    font-size: clamp(3rem, 7vw, 5.5rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.0;
    letter-spacing: -0.03em;
    text-transform: uppercase;
    margin: 0 0 20px;
}
.blog-hero__desc {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.6);
    line-height: 1.8;
    max-width: 480px;
    margin: 0;
}

/* ── Featured ── */
.blog-featured {
    padding: 80px 0;
    background: #fff;
    border-bottom: 1px solid var(--line);
}
.blog-featured__wrap {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 64px;
    align-items: center;
}
.blog-featured__media {
    position: relative;
    display: block;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 16/10;
    background: #f3f4f6;
}
.blog-featured__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.blog-featured__media:hover img { transform: scale(1.03); }
.blog-featured__badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: #FFF100;
    color: #020942;
    font-size: 0.62rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    padding: 4px 12px;
    border-radius: 4px;
}
.blog-featured__meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
}
.blog-featured__meta span {
    font-size: 0.72rem;
    color: var(--muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.blog-featured__dot {
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background: var(--muted);
    display: block !important;
    flex-shrink: 0;
}
.blog-featured__title {
    font-size: clamp(1.4rem, 2.8vw, 2.2rem);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin: 0 0 16px;
}
.blog-featured__title a {
    color: var(--ink);
    text-decoration: none;
    transition: color 0.2s ease;
}
.blog-featured__title a:hover { color: #020942; }
.blog-featured__excerpt {
    font-size: 0.88rem;
    color: var(--muted);
    line-height: 1.8;
    margin: 0 0 28px;
}
.blog-featured__cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #020942;
    color: #FFF100;
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 13px 24px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.2s ease;
}
.blog-featured__cta:hover { background: #06091f; }
@media (max-width: 860px) {
    .blog-featured__wrap { grid-template-columns: 1fr; gap: 36px; }
    .blog-featured { padding: 60px 0; }
}

/* ── More Posts ── */
.blog-posts {
    padding: 80px 0 110px;
    background: var(--surface);
}
.blog-posts__head {
    margin-bottom: 40px;
}
.blog-posts__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
}
.blog-posts__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.blog-posts__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.blog-card {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: box-shadow 0.25s ease, transform 0.25s ease;
}
.blog-card:hover {
    box-shadow: 0 12px 36px rgba(2,9,66,0.09);
    transform: translateY(-4px);
}
.blog-card__media {
    position: relative;
    display: block;
    aspect-ratio: 16/10;
    overflow: hidden;
    background: #f3f4f6;
}
.blog-card__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.blog-card:hover .blog-card__media img { transform: scale(1.04); }
.blog-card__hover {
    position: absolute;
    inset: 0;
    background: rgba(2,9,66,0.65);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.25s ease;
    color: #FFF100;
}
.blog-card:hover .blog-card__hover { opacity: 1; }
.blog-card__body {
    padding: 22px 22px 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.blog-card__meta {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}
.blog-card__meta span {
    font-size: 0.7rem;
    color: var(--muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}
.blog-card__dot {
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background: var(--muted);
    flex-shrink: 0;
    display: block !important;
}
.blog-card__title {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1.35;
    margin: 0 0 10px;
}
.blog-card__title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
}
.blog-card__title a:hover { color: #020942; }
.blog-card__excerpt {
    font-size: 0.82rem;
    color: var(--muted);
    line-height: 1.75;
    margin: 0 0 20px;
    flex: 1;
}
.blog-card__link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    font-weight: 700;
    color: #020942;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-top: auto;
    transition: gap 0.2s ease;
}
.blog-card__link:hover { gap: 10px; }

@media (max-width: 860px) { .blog-posts__grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 560px) {
    .blog-posts__grid { grid-template-columns: 1fr; }
    .blog-posts { padding: 56px 0 80px; }
}
</style>

<?php include 'footer.php'; ?>
