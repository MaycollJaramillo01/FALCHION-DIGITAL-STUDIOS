<?php
require_once __DIR__ . '/falchion-content.php';

$slug = trim((string) ($_GET['slug'] ?? ''));
$post = null;
$postIndex = null;
foreach ($BlogPosts as $idx => $item) {
    if ($item['slug'] === $slug) {
        $post = $item;
        $postIndex = $idx;
        break;
    }
}

if ($post === null) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$prevPost = $postIndex > 0 ? $BlogPosts[$postIndex - 1] : null;
$nextPost = isset($BlogPosts[$postIndex + 1]) ? $BlogPosts[$postIndex + 1] : null;
$related  = array_filter($BlogPosts, fn($p) => $p['slug'] !== $post['slug']);
$related  = array_values(array_slice($related, 0, 2));

$pageTitle = $post['title'];
$metaTitleOverride = $Company . ' | ' . $post['title'];
$metaDescriptionOverride = $post['excerpt'];
?>
<?php include 'header.php'; ?>

<!-- Hero -->
<section class="art-hero">
    <div class="art-hero__bg">
        <img src="<?= htmlspecialchars($BaseURL . $post['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="art-hero__overlay"></div>
    </div>
    <div class="container art-hero__inner">
        <a class="art-hero__back" href="<?= htmlspecialchars(falchion_url('blog.php'), ENT_QUOTES, 'UTF-8') ?>">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            All Articles
        </a>
        <div class="art-hero__meta">
            <span><?= htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8') ?></span>
            <span class="art-hero__dot"></span>
            <span><?= htmlspecialchars($post['read_time'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>
        <h1 class="art-hero__title"><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="art-hero__excerpt"><?= htmlspecialchars($post['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
</section>

<!-- Article Body + Sidebar -->
<div class="art-layout">
    <div class="container art-layout__wrap">

        <!-- Article -->
        <article class="art-body">
            <?php foreach ($post['sections'] as $i => $section): ?>
            <div class="art-section" data-aos="fade-up" data-aos-delay="<?= $i * 60 ?>">
                <h2 class="art-section__title"><?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                <?php foreach ($section['paragraphs'] as $paragraph): ?>
                <p class="art-section__p"><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>

            <!-- Post Navigation -->
            <?php if ($prevPost || $nextPost): ?>
            <nav class="art-nav">
                <?php if ($prevPost): ?>
                <a class="art-nav__item art-nav__item--prev" href="<?= htmlspecialchars(falchion_url('blog-post.php?slug=' . urlencode($prevPost['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                    <span class="art-nav__dir">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Previous
                    </span>
                    <span class="art-nav__title"><?= htmlspecialchars($prevPost['title'], ENT_QUOTES, 'UTF-8') ?></span>
                </a>
                <?php endif; ?>
                <?php if ($nextPost): ?>
                <a class="art-nav__item art-nav__item--next" href="<?= htmlspecialchars(falchion_url('blog-post.php?slug=' . urlencode($nextPost['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                    <span class="art-nav__dir">
                        Next
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                    <span class="art-nav__title"><?= htmlspecialchars($nextPost['title'], ENT_QUOTES, 'UTF-8') ?></span>
                </a>
                <?php endif; ?>
            </nav>
            <?php endif; ?>
        </article>

        <!-- Sidebar -->
        <aside class="art-sidebar">

            <!-- CTA Card -->
            <div class="art-sidebar__card" data-aos="fade-left">
                <span class="art-sidebar__eyebrow">Need support?</span>
                <h3 class="art-sidebar__title">Turn insights into action</h3>
                <p class="art-sidebar__desc">Falchion helps brands translate strategy into visual systems, websites, campaigns and content.</p>
                <a class="art-sidebar__btn" href="<?= htmlspecialchars(falchion_url('contact.php#contact-form'), ENT_QUOTES, 'UTF-8') ?>">
                    Book a Call
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <!-- Services List -->
            <div class="art-sidebar__services" data-aos="fade-left" data-aos-delay="80">
                <span class="art-sidebar__eyebrow">Our Services</span>
                <ul>
                    <?php foreach ($Services as $svc): ?>
                    <li>
                        <a href="<?= htmlspecialchars(falchion_url('service/' . $svc['slug'] . '.php'), ENT_QUOTES, 'UTF-8') ?>">
                            <?= $svc['icon'] ?>
                            <?= htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8') ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </aside>
    </div>
</div>

<!-- Related Articles -->
<?php if (!empty($related)): ?>
<section class="art-related">
    <div class="container">
        <span class="art-related__eyebrow">Keep Reading</span>
        <div class="art-related__grid">
            <?php foreach ($related as $i => $rel): ?>
            <article class="blog-card" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <a class="blog-card__media" href="<?= htmlspecialchars(falchion_url('blog-post.php?slug=' . urlencode($rel['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                    <img src="<?= htmlspecialchars($BaseURL . $rel['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($rel['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                    <div class="blog-card__hover">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </div>
                </a>
                <div class="blog-card__body">
                    <div class="blog-card__meta">
                        <span><?= htmlspecialchars($rel['date'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="blog-card__dot"></span>
                        <span><?= htmlspecialchars($rel['read_time'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <h2 class="blog-card__title">
                        <a href="<?= htmlspecialchars(falchion_url('blog-post.php?slug=' . urlencode($rel['slug'])), ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($rel['title'], ENT_QUOTES, 'UTF-8') ?>
                        </a>
                    </h2>
                    <p class="blog-card__excerpt"><?= htmlspecialchars($rel['excerpt'], ENT_QUOTES, 'UTF-8') ?></p>
                    <a class="blog-card__link" href="<?= htmlspecialchars(falchion_url('blog-post.php?slug=' . urlencode($rel['slug'])), ENT_QUOTES, 'UTF-8') ?>">
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
.art-hero {
    position: relative;
    min-height: 580px;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.art-hero__bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.art-hero__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.art-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(2,9,66,0.35) 0%, rgba(2,9,66,0.75) 50%, rgba(2,9,66,0.97) 100%);
}
.art-hero__inner {
    position: relative;
    z-index: 2;
    padding-top: 140px;
    padding-bottom: 80px;
    max-width: 780px;
}
.art-hero__back {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    margin-bottom: 28px;
    transition: color 0.2s ease;
}
.art-hero__back:hover { color: #FFF100; }
.art-hero__meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
}
.art-hero__meta span {
    font-size: 0.72rem;
    font-weight: 600;
    color: rgba(255,255,255,0.55);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.art-hero__dot {
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background: rgba(255,255,255,0.4);
    display: block !important;
    flex-shrink: 0;
}
.art-hero__title {
    font-size: clamp(1.8rem, 4vw, 3.2rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.1;
    letter-spacing: -0.02em;
    margin: 0 0 18px;
}
.art-hero__excerpt {
    font-size: 0.92rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.8;
    margin: 0;
    max-width: 600px;
}

/* ── Layout ── */
.art-layout {
    padding: 80px 0 100px;
    background: #fff;
}
.art-layout__wrap {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 64px;
    align-items: start;
}

/* ── Article Body ── */
.art-body { min-width: 0; }
.art-section {
    margin-bottom: 48px;
    padding-bottom: 48px;
    border-bottom: 1px solid var(--line);
}
.art-section:last-of-type { border-bottom: none; }
.art-section__title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--ink);
    letter-spacing: -0.02em;
    margin: 0 0 16px;
}
.art-section__p {
    font-size: 0.92rem;
    color: var(--muted);
    line-height: 1.85;
    margin: 0 0 14px;
}
.art-section__p:last-child { margin: 0; }

/* ── Post Nav ── */
.art-nav {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-top: 56px;
    padding-top: 40px;
    border-top: 1px solid var(--line);
}
.art-nav__item {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding: 20px;
    border: 1.5px solid var(--line);
    border-radius: 12px;
    text-decoration: none;
    transition: border-color 0.2s ease, background 0.2s ease;
}
.art-nav__item:hover { border-color: #020942; background: rgba(2,9,66,0.02); }
.art-nav__item--next { text-align: right; }
.art-nav__dir {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--muted);
}
.art-nav__title {
    font-size: 0.84rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1.3;
}

/* ── Sidebar ── */
.art-sidebar {
    position: sticky;
    top: 100px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}
.art-sidebar__card {
    background: #020942;
    border-radius: 16px;
    padding: 28px 24px;
}
.art-sidebar__eyebrow {
    display: block;
    font-size: 0.6rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: #FFF100;
    margin-bottom: 12px;
}
.art-sidebar__title {
    font-size: 1.05rem;
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin: 0 0 12px;
}
.art-sidebar__desc {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.55);
    line-height: 1.75;
    margin: 0 0 20px;
}
.art-sidebar__btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #FFF100;
    color: #020942;
    font-size: 0.76rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 11px 20px;
    border-radius: 8px;
    text-decoration: none;
    transition: opacity 0.2s ease;
}
.art-sidebar__btn:hover { opacity: 0.88; }
.art-sidebar__services {
    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 24px;
}
.art-sidebar__services .art-sidebar__eyebrow { color: var(--muted); margin-bottom: 14px; }
.art-sidebar__services ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
}
.art-sidebar__services li { border-bottom: 1px solid var(--line); }
.art-sidebar__services li:last-child { border-bottom: none; }
.art-sidebar__services a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 0;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--ink);
    text-decoration: none;
    transition: color 0.2s ease;
}
.art-sidebar__services a i { font-size: 0.75rem; color: #020942; }
.art-sidebar__services a:hover { color: #020942; }

/* ── Related ── */
.art-related {
    padding: 80px 0 100px;
    background: var(--surface);
    border-top: 1px solid var(--line);
}
.art-related__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: var(--muted);
    margin-bottom: 36px;
}
.art-related__eyebrow::before {
    content: "";
    width: 20px;
    height: 1.5px;
    background: #020942;
}
.art-related__grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

/* ── Blog card (shared with blog.php) ── */
.blog-card {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: box-shadow 0.25s ease, transform 0.25s ease;
}
.blog-card:hover { box-shadow: 0 12px 36px rgba(2,9,66,0.09); transform: translateY(-4px); }
.blog-card__media {
    position: relative;
    display: block;
    aspect-ratio: 16/10;
    overflow: hidden;
    background: #f3f4f6;
}
.blog-card__media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s ease; }
.blog-card:hover .blog-card__media img { transform: scale(1.04); }
.blog-card__hover {
    position: absolute; inset: 0;
    background: rgba(2,9,66,0.65);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.25s ease; color: #FFF100;
}
.blog-card:hover .blog-card__hover { opacity: 1; }
.blog-card__body { padding: 22px 22px 24px; display: flex; flex-direction: column; flex: 1; }
.blog-card__meta { display: flex; align-items: center; gap: 8px; margin-bottom: 12px; }
.blog-card__meta span { font-size: 0.7rem; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; }
.blog-card__dot { width: 3px; height: 3px; border-radius: 50%; background: var(--muted); flex-shrink: 0; display: block !important; }
.blog-card__title { font-size: 0.95rem; font-weight: 700; color: var(--ink); line-height: 1.35; margin: 0 0 10px; }
.blog-card__title a { color: inherit; text-decoration: none; transition: color 0.2s ease; }
.blog-card__title a:hover { color: #020942; }
.blog-card__excerpt { font-size: 0.82rem; color: var(--muted); line-height: 1.75; margin: 0 0 20px; flex: 1; }
.blog-card__link { display: inline-flex; align-items: center; gap: 6px; font-size: 0.75rem; font-weight: 700; color: #020942; text-decoration: none; text-transform: uppercase; letter-spacing: 0.08em; margin-top: auto; transition: gap 0.2s ease; }
.blog-card__link:hover { gap: 10px; }

@media (max-width: 960px) {
    .art-layout__wrap { grid-template-columns: 1fr; }
    .art-sidebar { position: static; }
    .art-related__grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 600px) {
    .art-nav { grid-template-columns: 1fr; }
    .art-related__grid { grid-template-columns: 1fr; }
    .art-layout { padding: 56px 0 72px; }
    .art-hero { min-height: 480px; }
}
</style>

<?php include 'footer.php'; ?>
