<?php
@session_start();
if (!isset($Company)) {
    include_once __DIR__ . '/../text.php';
}

$companyName = $Company ?? 'BrandBoost Marketing';

$seoPillars = [
    [
        'icon' => 'fa-magnifying-glass-chart',
        'title' => 'Mapeo de intencion de busqueda',
        'desc' => 'Mapeamos palabras clave transaccionales y locales hacia paginas especificas para que cada servicio apunte a busquedas con potencial de conversion.'
    ],
    [
        'icon' => 'fa-gauge-high',
        'title' => 'Rendimiento Core Web Vitals',
        'desc' => 'Cada pagina se optimiza para velocidad, estabilidad visual y calidad de interaccion para fortalecer posicionamiento y reducir rebote.'
    ],
    [
        'icon' => 'fa-code',
        'title' => 'Arquitectura On-Page + Schema',
        'desc' => 'Implementamos encabezados estructurados, metadata, enlaces internos y schema markup para que los buscadores entiendan mejor el sitio.'
    ],
    [
        'icon' => 'fa-map-location-dot',
        'title' => 'Señales de SEO local',
        'desc' => 'Alineamos relevancia geografica, consistencia NAP, visibilidad en mapas y puntos de conversion para captar trafico local con alta intencion.'
    ]
];

$seoOutcomes = [
    ['icon' => 'fa-sitemap', 'label' => 'Estructura limpia y rastreable'],
    ['icon' => 'fa-ranking-star', 'label' => 'Mayor relevancia tematica'],
    ['icon' => 'fa-filter-circle-dollar', 'label' => 'Mejor calidad de leads'],
    ['icon' => 'fa-chart-line', 'label' => 'Metricas de crecimiento medibles']
];

$serviceHighlights = [];
if (isset($SN) && is_array($SN)) {
    foreach ($SN as $item) {
        if (is_string($item) && trim($item) !== '') {
            $serviceHighlights[] = trim($item);
        }
    }
}
if (!$serviceHighlights) {
    $serviceHighlights = ['Creacion de Sitios Web', 'Rediseño Web', 'Paginas de Aterrizaje', 'Presencia Digital'];
}
?>

<section class="seo-intro" id="services-intro">
    <canvas class="seo-intro__canvas" id="seo-intro-canvas" aria-hidden="true"></canvas>
    <div class="seo-intro__overlay" aria-hidden="true"></div>

    <div class="container seo-intro__container">
        <header class="seo-intro__head">
            <span class="seo-intro__kicker"><i class="fa-solid fa-asterisk"></i> <?= htmlspecialchars(t('ESTRUCTURA DE SERVICIOS CON ENFOQUE SEO', 'SEO-FOCUSED SERVICE STRUCTURE'), ENT_QUOTES, 'UTF-8') ?></span>
            <h2 class="seo-intro__title"><?= htmlspecialchars(t('Servicios diseñados para ', 'Services designed for '), ENT_QUOTES, 'UTF-8') ?><span><?= htmlspecialchars(t('visibilidad en buscadores', 'search visibility'), ENT_QUOTES, 'UTF-8') ?></span> <?= htmlspecialchars(t('y crecimiento en conversion', 'and conversion growth'), ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="seo-intro__lead">
                <?= htmlspecialchars(t('En ', 'At '), ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars(t('cada servicio se construye con estrategia SEO desde el primer dia: intencion de busqueda, rendimiento tecnico, estructura on-page y descubrimiento local que produce resultados de negocio medibles.', 'every service is built with SEO strategy from day one: search intent, technical performance, on-page structure, and local discovery that drive measurable business results.'), ENT_QUOTES, 'UTF-8') ?>
            </p>

            <div class="seo-intro__chips">
                <?php foreach ($serviceHighlights as $highlight): ?>
                    <span><?= htmlspecialchars($highlight, ENT_QUOTES, 'UTF-8') ?></span>
                <?php endforeach; ?>
            </div>
        </header>

        <div class="seo-intro__pillars">
            <?php foreach ($seoPillars as $pillar): ?>
                <article class="seo-intro__pillar">
                    <div class="seo-intro__pillar-head">
                        <span class="seo-intro__icon"><i class="fa-solid <?= htmlspecialchars($pillar['icon'], ENT_QUOTES, 'UTF-8') ?>"></i></span>
                        <h3><?= htmlspecialchars($pillar['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                    </div>
                    <p><?= htmlspecialchars($pillar['desc'], ENT_QUOTES, 'UTF-8') ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="seo-intro__outcomes">
            <?php foreach ($seoOutcomes as $outcome): ?>
                <div class="seo-intro__outcome">
                    <i class="fa-solid <?= htmlspecialchars($outcome['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>
                    <span><?= htmlspecialchars($outcome['label'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.seo-intro {
    position: relative;
    overflow: hidden;
    padding: 96px 0 92px;
    background:
        radial-gradient(780px 340px at 8% 10%, color-mix(in srgb, var(--brand-secondary) 16%, transparent), transparent 72%),
        linear-gradient(180deg, var(--brand-primary) 0%, color-mix(in srgb, var(--brand-primary) 90%, #000 10%) 100%);
}

.seo-intro__canvas {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
    opacity: 0.34;
}

.seo-intro__overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    pointer-events: none;
    background:
        linear-gradient(90deg, color-mix(in srgb, var(--brand-primary) 66%, transparent), transparent 42%, color-mix(in srgb, var(--brand-primary) 66%, transparent)),
        radial-gradient(circle at 82% 18%, color-mix(in srgb, var(--brand-accent) 7%, transparent), transparent 52%);
}

.seo-intro__container {
    position: relative;
    z-index: 3;
}

.seo-intro__head {
    max-width: 960px;
    margin: 0 auto 44px;
    text-align: center;
}

.seo-intro__kicker {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--brand-secondary);
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.seo-intro__title {
    margin: 14px 0 14px;
    color: var(--brand-accent);
    font-size: clamp(2rem, 4.3vw, 3.35rem);
    line-height: 1.1;
    font-weight: 800;
}

.seo-intro__title span {
    color: var(--brand-secondary);
    text-shadow: 0 0 15px color-mix(in srgb, var(--brand-secondary) 45%, transparent);
}

.seo-intro__lead {
    margin: 0 auto;
    max-width: 900px;
    color: color-mix(in srgb, var(--brand-accent) 78%, var(--brand-primary) 22%);
    font-size: 1.03rem;
    line-height: 1.72;
}

.seo-intro__chips {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
}

.seo-intro__chips span {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 16%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 6%, transparent);
    color: var(--brand-accent);
    font-size: 0.86rem;
    font-weight: 600;
    padding: 7px 12px;
}

.seo-intro__pillars {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.seo-intro__pillar {
    border-radius: 16px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 15%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 4%, transparent);
    backdrop-filter: blur(8px);
    padding: 18px 16px 16px;
}

.seo-intro__pillar-head {
    display: grid;
    grid-template-columns: 40px 1fr;
    gap: 12px;
    align-items: center;
    margin-bottom: 10px;
}

.seo-intro__icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 20%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 8%, transparent);
}

.seo-intro__icon i {
    color: var(--brand-accent);
    font-size: 0.95rem;
}

.seo-intro__pillar h3 {
    margin: 0;
    color: var(--brand-accent);
    font-size: 1.12rem;
    line-height: 1.2;
    font-weight: 700;
}

.seo-intro__pillar p {
    margin: 0;
    color: color-mix(in srgb, var(--brand-accent) 68%, var(--brand-primary) 32%);
    font-size: 0.93rem;
    line-height: 1.62;
}

.seo-intro__outcomes {
    margin-top: 18px;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 10px;
}

.seo-intro__outcome {
    display: flex;
    align-items: center;
    gap: 8px;
    border-radius: 12px;
    padding: 10px 12px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 14%, transparent);
    background: color-mix(in srgb, var(--brand-accent) 3%, transparent);
}

.seo-intro__outcome i {
    color: var(--brand-secondary);
    font-size: 0.92rem;
}

.seo-intro__outcome span {
    color: var(--brand-accent);
    font-size: 0.84rem;
    font-weight: 600;
    line-height: 1.2;
}

@media (max-width: 991px) {
    .seo-intro {
        padding: 84px 0 78px;
    }

    .seo-intro__pillars {
        grid-template-columns: 1fr;
    }

    .seo-intro__outcomes {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 575px) {
    .seo-intro__outcomes {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
(function () {
    var section = document.getElementById('services-intro');
    var canvas = document.getElementById('seo-intro-canvas');
    if (!section || !canvas) return;

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    var started = false;
    var running = false;
    var rafId = 0;
    var renderer;
    var scene;
    var camera;
    var cloud;

    function startThree() {
        if (started || typeof THREE === 'undefined') return;
        started = true;

        try {
            var width = section.clientWidth;
            var height = section.clientHeight;

            scene = new THREE.Scene();
            camera = new THREE.PerspectiveCamera(56, width / Math.max(height, 1), 0.1, 100);
            camera.position.z = 16;

            renderer = new THREE.WebGLRenderer({
                canvas: canvas,
                alpha: true,
                antialias: false,
                powerPreference: 'low-power'
            });
            renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.35));
            renderer.setSize(width, height, false);

            var pointsCount = 120;
            var positions = new Float32Array(pointsCount * 3);
            for (var i = 0; i < pointsCount; i++) {
                positions[i * 3] = (Math.random() - 0.5) * 24;
                positions[i * 3 + 1] = (Math.random() - 0.5) * 12;
                positions[i * 3 + 2] = (Math.random() - 0.5) * 8;
            }

            var geometry = new THREE.BufferGeometry();
            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

            var cssSecondary = getComputedStyle(document.documentElement).getPropertyValue('--brand-secondary').trim() || '#D9D0C1';
            var material = new THREE.PointsMaterial({
                color: new THREE.Color(cssSecondary),
                size: 0.09,
                transparent: true,
                opacity: 0.85,
                depthWrite: false
            });

            cloud = new THREE.Points(geometry, material);
            scene.add(cloud);

            window.addEventListener('resize', onResize);
        } catch (error) {
            running = false;
        }
    }

    function onResize() {
        if (!renderer || !camera || !section) return;
        var width = section.clientWidth;
        var height = section.clientHeight;
        camera.aspect = width / Math.max(height, 1);
        camera.updateProjectionMatrix();
        renderer.setSize(width, height, false);
    }

    function loop() {
        if (!running || !renderer || !scene || !camera || !cloud) return;
        cloud.rotation.y += 0.0009;
        cloud.rotation.x += 0.00035;
        renderer.render(scene, camera);
        rafId = window.requestAnimationFrame(loop);
    }

    function setRunning(nextState) {
        if (nextState && !running) {
            running = true;
            loop();
            return;
        }
        if (!nextState && running) {
            running = false;
            if (rafId) window.cancelAnimationFrame(rafId);
        }
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                if (window.__bpDeps && typeof window.__bpDeps.ensure === 'function') {
                    window.__bpDeps.ensure('three', [
                        'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js',
                        'https://cdn.jsdelivr.net/npm/three@0.128.0/build/three.min.js'
                    ]).then(function () {
                        startThree();
                        setRunning(true);
                    }).catch(function () {});
                } else {
                    startThree();
                    setRunning(true);
                }
            } else {
                setRunning(false);
            }
        });
    }, { threshold: 0.12 });

    observer.observe(section);
})();
</script>
