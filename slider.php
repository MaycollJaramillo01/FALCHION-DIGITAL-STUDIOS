<?php
@session_start();
if (!isset($Company)) include_once __DIR__ . '/text.php';

// Mapeo de datos desde text.php
$heroTitlePart1 = t('Eleva tu negocio con nuestras', 'Elevate your business with our');
$heroTitleHighlight = t('soluciones de marketing digital', 'digital marketing solutions');
$heroDescription = $Home[0] ?? t('Eleva la presencia online de tu marca con soluciones digitales estrategicas.', 'Elevate your brand online with strategic digital solutions.');
$heroPrimaryUrl = i18n_localized_url('contact.php');
$heroVideoPlaylist = array_values(array_filter([
    'assets/img/hero/hero.mp4',
    'assets/img/hero/hero2.mp4',
], static function ($path) {
    return is_file(__DIR__ . '/' . $path);
}));
$heroVideoPoster = is_file(__DIR__ . '/assets/img/hero/1.jpg') ? 'assets/img/hero/1.jpg' : '';
$heroVideoPlaylistAttr = htmlspecialchars(json_encode($heroVideoPlaylist), ENT_QUOTES, 'UTF-8');
?>

<section class="hero-modern">
    <div class="hero-modern__video-container">
        <video
            muted
            playsinline
            preload="none"
            class="hero-modern__video"
            id="hero-main-video"
            aria-hidden="true"
            data-playlist="<?= $heroVideoPlaylistAttr ?>"
            <?php if ($heroVideoPoster !== ''): ?>poster="<?= htmlspecialchars($heroVideoPoster, ENT_QUOTES, 'UTF-8') ?>"<?php endif; ?>
        >
            <source data-src="<?= htmlspecialchars($heroVideoPlaylist[0] ?? '', ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
        </video>
        <div class="hero-modern__overlay-pattern"></div>
        <div class="hero-modern__overlay-dark"></div>
    </div>

    <div class="container hero-modern__container">
        <div class="hero-modern__content">
            <h1 class="hero-modern__title" data-aos="fade-up">
                <?= $heroTitlePart1 ?> <span class="text-highlight"><?= $heroTitleHighlight ?></span>
            </h1>

            <p class="hero-modern__desc" data-aos="fade-up" data-aos-delay="200">
                <?= $heroDescription ?>
            </p>

            <div class="hero-modern__actions" data-aos="fade-up" data-aos-delay="400">
                <a href="<?= htmlspecialchars($heroPrimaryUrl, ENT_QUOTES, 'UTF-8') ?>" class="btn-main">
                    <?= htmlspecialchars(t('Comenzar', 'Get started'), ENT_QUOTES, 'UTF-8') ?> <span class="btn-icon"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                </a>
            </div>
        </div>

        <div class="hero-modern__badge-circle" data-aos="zoom-in">
            <div class="circle-text">
                <svg viewBox="0 0 100 100">
                    <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="transparent"/>
                    <text>
                        <textPath xlink:href="#circlePath">
                           <?= htmlspecialchars(t('Agencia desde 2021', 'Agency since 2021'), ENT_QUOTES, 'UTF-8') ?> &#8226; <?= htmlspecialchars(t('Optimizacion para buscadores', 'Search optimization'), ENT_QUOTES, 'UTF-8') ?> &#8226;
                        </textPath>
                    </text>
                </svg>
                <div class="inner-arrow">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-modern__marquee">
        <div class="marquee-content">
            <?php
            for ($i = 0; $i < 3; $i++):
                foreach ($SN as $service): ?>
                    <span class="marquee-item">
                        <i class="fa-solid fa-asterisk"></i> <?= $service ?>
                    </span>
                <?php endforeach;
            endfor; ?>
        </div>
    </div>
</section>

<style>
:root {
    --brand-accent-neon: var(--brand-secondary);
    --hero-dark: var(--brand-primary);
    --hero-muted: color-mix(in srgb, var(--brand-accent) 70%, var(--brand-primary) 30%);
}

.hero-modern {
    position: relative;
    height: 100vh;
    min-height: 800px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background-color: var(--hero-dark);
    color: var(--brand-accent);
}

/* Fondo de video y patron */
.hero-modern__video-container {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.hero-modern__video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-modern__overlay-pattern {
    position: absolute;
    inset: 0;
    background:
      radial-gradient(circle at 20% 30%, color-mix(in srgb, var(--brand-accent) 8%, transparent) 0, transparent 38%),
      radial-gradient(circle at 80% 65%, color-mix(in srgb, var(--brand-accent) 7%, transparent) 0, transparent 34%);
    opacity: 0.32;
}

.hero-modern__overlay-dark {
    position: absolute;
    inset: 0;
    background: radial-gradient(
        circle at 20% 50%,
        color-mix(in srgb, var(--brand-primary) 40%, transparent) 0%,
        color-mix(in srgb, var(--brand-primary) 90%, transparent) 100%
    );
}

/* Contenido */
.hero-modern__container {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 96px;
}

.hero-modern__content {
    max-width: 800px;
}

.hero-modern__title {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 2rem;
    text-transform: capitalize;
    color: var(--brand-accent) !important;
    text-shadow: 0 6px 18px rgba(0, 0, 0, 0.35);
}

.hero-modern__title .text-highlight {
    color: var(--brand-accent-neon);
}

.hero-modern__desc {
    font-size: 1.1rem;
    max-width: 500px;
    color: var(--hero-muted);
    margin-bottom: 3rem;
}

/* Botones */
.hero-modern__actions {
    display: flex;
    gap: 2rem;
    align-items: center;
}

.btn-main {
    background: var(--brand-neutral);
    color: var(--brand-accent);
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 15px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-main .btn-icon {
    background: var(--brand-accent-neon);
    color: var(--brand-primary);
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: grid;
    place-items: center;
}

.btn-main:hover {
    background: color-mix(in srgb, var(--brand-neutral) 80%, var(--brand-accent) 20%);
    transform: translateY(-3px);
}

.btn-video {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--brand-accent);
    text-decoration: none;
    font-weight: 600;
}

.play-icon {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: var(--brand-accent-neon);
    color: var(--brand-primary);
    display: grid;
    place-items: center;
    font-size: 0.8rem;
}

/* Badge circular */
.hero-modern__badge-circle {
    position: relative;
    width: 180px;
    height: 180px;
}

.circle-text {
    width: 100%;
    height: 100%;
    animation: rotateText 20s linear infinite;
}

.circle-text svg {
    fill: var(--brand-accent);
    font-size: 8.5px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.inner-arrow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: var(--brand-accent-neon);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    color: var(--brand-primary);
    font-size: 1.5rem;
}

/* Marquee */
.hero-modern__marquee {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: var(--brand-accent-neon);
    padding: 15px 0;
    overflow: hidden;
    white-space: nowrap;
    z-index: 1;
    pointer-events: none;
}

.marquee-content {
    display: inline-block;
    animation: marquee 30s linear infinite;
}

.marquee-item {
    color: var(--brand-primary);
    font-weight: 800;
    text-transform: uppercase;
    font-size: 1rem;
    margin: 0 30px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

@keyframes marquee {
    from { transform: translateX(0); }
    to { transform: translateX(-33.33%); }
}

@keyframes rotateText {
    to { transform: rotate(360deg); }
}

@media (max-width: 991px) {
    .hero-modern {
        height: auto;
        min-height: 100vh;
        padding: 140px 0 110px;
    }
    .hero-modern__container {
        flex-direction: column;
        text-align: center;
        gap: 30px;
        padding-bottom: 72px;
    }
    .hero-modern__desc { margin: 0 auto 2rem; }
    .hero-modern__actions { justify-content: center; }
    .hero-modern__badge-circle { display: none; }
}

@media (max-width: 575px) {
    .hero-modern {
        padding: 126px 0 104px;
    }

    .hero-modern__container {
        padding-bottom: 64px;
    }

    .hero-modern__title {
        margin-bottom: 1.25rem;
        font-size: clamp(2.3rem, 11vw, 3.3rem);
    }

    .hero-modern__desc {
        max-width: 100%;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .hero-modern__actions {
        width: 100%;
    }

    .btn-main {
        width: min(100%, 320px);
        justify-content: center;
        padding: 14px 20px;
        gap: 12px;
    }

    .hero-modern__marquee {
        padding: 12px 0;
    }

    .marquee-item {
        margin: 0 18px;
        font-size: 0.85rem;
    }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var heroVideo = document.getElementById('hero-main-video');
    if (!heroVideo) {
        return;
    }
    var rawPlaylist = heroVideo.getAttribute('data-playlist') || '[]';
    var videoPlaylist = [];
    try {
        videoPlaylist = JSON.parse(rawPlaylist);
    } catch (error) {
        videoPlaylist = [];
    }
    videoPlaylist = Array.isArray(videoPlaylist) ? videoPlaylist.filter(Boolean) : [];
    if (!videoPlaylist.length) {
        return;
    }
    var sourceEl = heroVideo.querySelector('source[data-src]');
    var sourceLoaded = false;
    var currentVideoIndex = 0;
    var allowHeavyMedia = canUseHeavyMedia();
    var isVisible = false;

    function canUseHeavyMedia() {
        var reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reducedMotion) {
            return false;
        }
        var connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
        if (!connection) {
            return true;
        }
        var type = String(connection.effectiveType || '').toLowerCase();
        if (connection.saveData === true) {
            return false;
        }
        return type.indexOf('2g') === -1;
    }

    function loadVideoSource(index) {
        if (!sourceEl || !videoPlaylist.length) {
            return;
        }
        currentVideoIndex = typeof index === 'number' ? index : currentVideoIndex;
        if (currentVideoIndex < 0 || currentVideoIndex >= videoPlaylist.length) {
            currentVideoIndex = 0;
        }
        var deferredSrc = videoPlaylist[currentVideoIndex];
        if (!deferredSrc) {
            return;
        }
        if (sourceLoaded && sourceEl.src.indexOf(deferredSrc) !== -1) {
            return;
        }
        sourceEl.setAttribute('data-src', deferredSrc);
        sourceEl.src = deferredSrc;
        heroVideo.load();
        sourceLoaded = true;
    }

    function safePlay() {
        if (!sourceLoaded) {
            return;
        }
        var playPromise = heroVideo.play();
        if (playPromise && typeof playPromise.catch === 'function') {
            playPromise.catch(function () {});
        }
    }

    function playNextVideo() {
        if (!videoPlaylist.length) {
            return;
        }
        if (videoPlaylist.length === 1) {
            heroVideo.currentTime = 0;
            safePlay();
            return;
        }
        sourceLoaded = false;
        loadVideoSource((currentVideoIndex + 1) % videoPlaylist.length);
    }

    heroVideo.addEventListener('loadeddata', function () {
        if (isVisible && allowHeavyMedia) {
            safePlay();
        }
    });

    heroVideo.addEventListener('ended', function () {
        if (!allowHeavyMedia) {
            return;
        }
        playNextVideo();
    });

    if (allowHeavyMedia) {
        if (document.readyState === 'complete') {
            window.setTimeout(loadVideoSource, 900);
        } else {
            window.addEventListener('load', function () {
                window.setTimeout(loadVideoSource, 900);
            }, { once: true });
        }
    }

    if (!('IntersectionObserver' in window)) {
        loadVideoSource();
        safePlay();
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                isVisible = true;
                if (!allowHeavyMedia) {
                    return;
                }
                loadVideoSource();
                safePlay();
            } else {
                isVisible = false;
                heroVideo.pause();
            }
        });
    }, { threshold: 0.25 });

    observer.observe(heroVideo);
});
</script>
