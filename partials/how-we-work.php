<?php
// Vinculamos con la data de text.php
if (!isset($HW_Steps_Data)) include_once __DIR__ . '/../text.php';
?>

<section class="work-section" id="how-we-work">
    <div class="canvas-wrapper">
        <canvas id="work-canvas-3d" class="work-canvas"></canvas>
    </div>

    <div class="container">
        <div class="work-header">
            <span class="section-tag"><i class="fa-solid fa-gear"></i> <?= htmlspecialchars(t('NUESTRO PROCESO', 'OUR PROCESS'), ENT_QUOTES, 'UTF-8') ?></span>
            <h2 class="work-title"><?= $HW_Title ?></h2>
        </div>

        <div class="steps-grid">
            <?php foreach($HW_Steps_Data as $num => $step): ?>
            <div class="step-card" data-step="<?= $num ?>">
                <div class="step-card__number">0<?= $num ?></div>
                <div class="step-card__content">
                    <h3><?= $step['title'] ?></h3>
                    <p><?= $step['desc'] ?></p>
                </div>
                <?php if($num < 4): ?>
                    <div class="step-connector"></div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="work-marquee">
        <div class="marquee-track">
            <div class="marquee-content">
                <?php for($i=0; $i<10; $i++): ?>
                    <span><?= $MarqueeText ?></span>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* --- BASE & LAYOUT --- */
.work-section {
    position: relative;
    padding: clamp(24px, 4vh, 48px) 0 clamp(72px, 10vh, 120px);
    background: var(--brand-primary);
    color: var(--brand-accent);
    overflow: hidden;
    min-height: auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.work-section::before,
.work-section::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 340px;
    height: 340px;
    border-radius: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    z-index: 1;
    filter: blur(36px);
}

.work-section::before {
    left: -140px;
    background: color-mix(in srgb, var(--brand-secondary) 10%, transparent);
}

.work-section::after {
    right: -140px;
    background: color-mix(in srgb, var(--brand-accent) 6%, transparent);
}

.canvas-wrapper {
    position: absolute;
    inset: 0;
    z-index: 1;
    pointer-events: none;
}

.work-canvas {
    width: 100% !important;
    height: 100% !important;
    opacity: 0.28;
}

.container {
    position: relative;
    z-index: 2;
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* --- HEADER OPTIMIZADO --- */
.work-header {
    text-align: center;
    margin-bottom: clamp(40px, 8vh, 80px);
}

.work-title {
    font-size: clamp(2.2rem, 5vw, 4rem);
    font-weight: 800;
    line-height: 1.1;
    margin-top: 15px;
}

.text-neon {
    color: var(--brand-secondary);
    text-shadow: 0 0 20px color-mix(in srgb, var(--brand-secondary) 40%, transparent);
}

/* --- GRID MÃ“VIL FIRST --- */
.steps-grid {
    display: grid;
    grid-template-columns: 1fr; /* Una columna en mÃ³vil */
    gap: 20px;
}

@media (min-width: 768px) {
    .steps-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (min-width: 1024px) {
    .steps-grid { grid-template-columns: repeat(4, 1fr); }
}

.step-card {
    position: relative;
    background: color-mix(in srgb, var(--brand-accent) 2%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 8%, transparent);
    padding: 30px;
    border-radius: 24px;
    backdrop-filter: blur(12px);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.step-card:hover {
    border-color: var(--brand-secondary);
    transform: translateY(-10px);
    background: color-mix(in srgb, var(--brand-secondary) 4%, transparent);
}

.step-card__number {
    font-size: 2.5rem;
    font-weight: 900;
    color: color-mix(in srgb, var(--brand-secondary) 15%, transparent);
    line-height: 1;
    margin-bottom: 15px;
}

.step-card h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: var(--brand-accent);
}

.step-card p {
    color: color-mix(in srgb, var(--brand-accent) 60%, var(--brand-primary) 40%);
    font-size: 0.95rem;
    line-height: 1.5;
}

/* --- MARQUEE INFINITO REAL --- */
.work-marquee {
    position: relative;
    margin-top: 80px;
    background: var(--brand-secondary);
    padding: 15px 0;
    transform: rotate(-1.5deg) scale(1.02);
    z-index: 10;
    width: 120%;
    left: -10%;
}

.marquee-track {
    overflow: hidden;
    display: flex;
}

.marquee-content {
    display: flex;
    white-space: nowrap;
    animation: scroll-loop 40s linear infinite;
}

.marquee-content span {
    font-weight: 900;
    color: var(--brand-primary);
    font-size: 1.2rem;
    padding-right: 20px;
}

@keyframes scroll-loop {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); } /* Se mueve la mitad del contenido duplicado */
}

/* Optimizaciones para mÃ³vil extremo */
@media (max-width: 480px) {
    .work-section { padding: 16px 0 88px; }
    .step-card { padding: 25px; }
    .work-marquee { bottom: 20px; }
    .work-canvas { opacity: 0.12; }
}
</style>

<script>
(function () {
    var work3dStarted = false;
    var workAnimeStarted = false;

    function startWork3D() {
        if (work3dStarted || typeof THREE === 'undefined') {
            return;
        }
        work3dStarted = true;

        var canvas = document.querySelector('#work-canvas-3d');
        if (!canvas) {
            return;
        }

        var scene = new THREE.Scene();
        var camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.1, 1000);
        var renderer = new THREE.WebGLRenderer({ canvas: canvas, antialias: true, alpha: true });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.5));

        function resizeCanvas() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        camera.position.z = 10;

        var workRootStyles = getComputedStyle(document.documentElement);

        function workCssHexToThreeInt(value, fallback) {
            var hex = (value || '').trim().replace('#', '');
            if (/^[0-9a-fA-F]{3}$/.test(hex)) {
                var expanded = hex.split('').map(function (c) { return c + c; }).join('');
                return parseInt(expanded, 16);
            }
            if (/^[0-9a-fA-F]{6}$/.test(hex)) {
                return parseInt(hex, 16);
            }
            return fallback;
        }

        var workSecondaryColor = workCssHexToThreeInt(workRootStyles.getPropertyValue('--brand-secondary'), 14274753);
        var workAccentColor = workCssHexToThreeInt(workRootStyles.getPropertyValue('--brand-accent'), 16777215);

        var baseMaterial = new THREE.MeshStandardMaterial({
            color: workSecondaryColor,
            wireframe: true,
            transparent: true,
            opacity: 0.2
        });

        function createDecorMesh(geometry, x, y, z, scale, speedX, speedY, phase) {
            var mesh = new THREE.Mesh(geometry, baseMaterial.clone());
            mesh.position.set(x, y, z);
            mesh.scale.setScalar(scale);
            scene.add(mesh);
            return {
                mesh: mesh,
                baseY: y,
                speedX: speedX,
                speedY: speedY,
                phase: phase
            };
        }

        var decorativeMeshes = [
            createDecorMesh(new THREE.TorusGeometry(1, 0.24, 12, 72), -6.8, 2.2, -1.5, 0.9, 0.0024, 0.0031, 0.0),
            createDecorMesh(new THREE.DodecahedronGeometry(1.05, 0), 6.8, 1.0, -1.2, 1.0, 0.0018, 0.0026, 1.3),
            createDecorMesh(new THREE.OctahedronGeometry(0.9, 0), -6.3, -2.1, -1.0, 0.85, 0.0021, 0.0019, 2.1),
            createDecorMesh(new THREE.TorusKnotGeometry(0.62, 0.15, 64, 8), 6.2, -2.0, -1.4, 0.8, 0.0016, 0.0022, 2.8)
        ];

        var leftLight = new THREE.PointLight(workSecondaryColor, 1.1);
        leftLight.position.set(-7, 2, 4);
        scene.add(leftLight);

        var rightLight = new THREE.PointLight(workAccentColor, 0.9);
        rightLight.position.set(7, -1, 4);
        scene.add(rightLight);

        scene.add(new THREE.AmbientLight(workAccentColor, 0.22));

        function animate() {
            requestAnimationFrame(animate);
            var time = Date.now() * 0.001;
            decorativeMeshes.forEach(function (item, index) {
                item.mesh.rotation.y += item.speedY;
                item.mesh.rotation.x += item.speedX;
                item.mesh.position.y = item.baseY + Math.sin(time + item.phase + (index * 0.35)) * 0.18;
            });

            renderer.render(scene, camera);
        }
        animate();
    }

    function startWorkAnime() {
        if (workAnimeStarted || typeof anime === 'undefined') {
            return;
        }
        workAnimeStarted = true;

        var targetGrid = document.querySelector('.steps-grid');
        if (!targetGrid) {
            return;
        }

        var observerOptions = { threshold: 0.2 };
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    anime({
                        targets: '.step-card',
                        opacity: [0, 1],
                        translateY: [40, 0],
                        rotateX: [15, 0],
                        delay: anime.stagger(150),
                        duration: 1200,
                        easing: 'easeOutElastic(1, .8)'
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        observer.observe(targetGrid);
    }

    function boot() {
        if (window.__bpDeps && typeof window.__bpDeps.ensure === 'function') {
            window.__bpDeps.ensure('three', [
                'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js',
                'https://cdn.jsdelivr.net/npm/three@0.128.0/build/three.min.js'
            ]).then(startWork3D).catch(function () {});

            window.__bpDeps.ensure('anime', [
                'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js',
                'https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js'
            ]).then(startWorkAnime).catch(function () {});
            return;
        }

        startWork3D();
        startWorkAnime();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();
</script>
