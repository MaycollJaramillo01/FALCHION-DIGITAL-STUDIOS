<?php
$svcVideoMap = [
    'graphic-design'    => 'assets/video/placeholder/Graphic Design.mp4',
    'web-design'        => 'assets/video/placeholder/Web Design.mp4',
    'video-production'  => 'assets/video/placeholder/Video Production.mp4',
    'motion-graphics'   => 'assets/video/placeholder/Motion Graphics.mp4',
    'digital-marketing' => 'assets/video/placeholder/Digital Marketing.mp4',
];
?>

<section class="svc-showcase">
    <div class="container">

        <div class="svc-showcase__head" data-aos="fade-up">
            <div>
                <span class="svc-showcase__eyebrow">What We Do</span>
                <h2 class="svc-showcase__title">One dedicated team.<br><em>Every creative possibility.</em></h2>
                <p class="svc-showcase__desc">Everything your team needs to produce and launch.<br>No need to hire multiple roles — we cover it all.</p>
            </div>
            <div class="svc-showcase__nav" aria-label="Scroll services">
                <button class="svc-nav-btn" id="svcPrev" aria-label="Previous">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="svc-nav-btn" id="svcNext" aria-label="Next">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg>
                </button>
            </div>
        </div>

        <div class="svc-showcase__track-wrap">
            <div class="svc-showcase__track" id="svcTrack">
                <?php foreach ($Services as $index => $service):
                    $videoSrc = $svcVideoMap[$service['slug']] ?? '';
                    $hasVideo = $videoSrc && file_exists(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . parse_url($BaseURL, PHP_URL_PATH) . $videoSrc);
                ?>
                <article class="svc-card">
                    <div class="svc-card__media">
                        <?php if ($hasVideo): ?>
                            <video class="svc-card__video" muted loop playsinline preload="none"
                                   data-src="<?= htmlspecialchars($BaseURL . $videoSrc, ENT_QUOTES, 'UTF-8') ?>">
                            </video>
                        <?php else: ?>
                            <div class="svc-card__media-placeholder"></div>
                        <?php endif; ?>
                        <span class="svc-card__num"><?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    </div>
                    <div class="svc-card__body">
                        <h3><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($service['short'], ENT_QUOTES, 'UTF-8') ?></p>
                        <a class="svc-card__link" href="<?= htmlspecialchars(falchion_url('service/' . $service['slug'] . '.php'), ENT_QUOTES, 'UTF-8') ?>">
                            Learn More
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<script>
(function () {
    const track    = document.getElementById('svcTrack');
    const btnPrev  = document.getElementById('svcPrev');
    const btnNext  = document.getElementById('svcNext');
    if (!track) return;

    const getCardWidth = () => {
        const card = track.querySelector('.svc-card');
        if (!card) return 320;
        const gap = parseInt(getComputedStyle(track).gap) || 20;
        return card.offsetWidth + gap;
    };

    btnNext && btnNext.addEventListener('click', () => {
        track.scrollBy({ left: getCardWidth(), behavior: 'smooth' });
    });
    btnPrev && btnPrev.addEventListener('click', () => {
        track.scrollBy({ left: -getCardWidth(), behavior: 'smooth' });
    });

    const videos = track.querySelectorAll('.svc-card__video[data-src]');

    function loadAndPlay(vid) {
        if (vid.dataset.src) {
            vid.src = vid.dataset.src;
            delete vid.dataset.src;
        }
        vid.play().catch(() => {});
    }

    function pauseAll() {
        videos.forEach(v => v.pause());
    }

    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const vid = entry.target;
            if (entry.isIntersecting) {
                loadAndPlay(vid);
            } else {
                vid.pause();
            }
        });
    }, { threshold: 0.3 });

    videos.forEach(v => io.observe(v));

    window.addEventListener('pageshow', (e) => {
        if (e.persisted) {
            videos.forEach(v => {
                if (v.getBoundingClientRect().top < window.innerHeight && v.getBoundingClientRect().bottom > 0) {
                    loadAndPlay(v);
                }
            });
        }
    });
})();
</script>
