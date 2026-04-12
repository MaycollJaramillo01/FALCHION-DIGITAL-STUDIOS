<?php
if (!isset($WCU_Stats)) {
    include_once __DIR__ . '/../text.php';
}
$whyNovaCtaUrl = $PrimaryCTAUrl ?? 'contact.php';
$activityTitle = t('Informacion de actividad', 'Activity overview');
$performanceTitle = t('Analisis de rendimiento', 'Performance analysis');
$dataALabel = t('Dato A', 'Data A');
$dataBLabel = t('Dato B', 'Data B');
$updatedLabel = t('Actualizado: ahora', 'Updated: now');
$viewDetailsLabel = t('Ver detalles', 'View details');
$metricDesc = t('Optimizando tu huella digital para alcanzar mayor visibilidad.', 'Optimizing your digital footprint to reach stronger visibility.');
$imageAlt = t('Equipo experto', 'Expert team');
$fastGrowthLabel = t('Crecimiento rapido', 'Fast growth');
$safeStrategyLabel = t('Estrategia segura', 'Reliable strategy');
?>
<section class="wcu-bento-section">
    <div class="container">
        
        <div class="wcu-bento-header">
            <div class="header-left">
                <span class="section-tag-alt"><i class="fa-solid fa-asterisk"></i> <?= $WCU_Badge ?></span>
                <h2 class="wcu-bento-title"><?= $WCU_Title ?></h2>
            </div>
            <div class="header-right">
                <a href="<?= htmlspecialchars($whyNovaCtaUrl, ENT_QUOTES, 'UTF-8') ?>" class="btn-contact-neon">
                    <?= $WCU_BtnText ?> <span class="icon-circle"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                </a>
            </div>
        </div>

        <div class="bento-grid">
            
            <div class="bento-stats-col">
                <div class="bento-card card-activity-v2">
                    <div class="card-activity-header">
                        <div class="header-info">
                            <span class="live-dot"></span>
                            <h3><?= htmlspecialchars($activityTitle, ENT_QUOTES, 'UTF-8') ?></h3>
                        </div>
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </div>

                    <div class="card-activity-body">
                        <div class="gauge-wrapper">
                            <svg viewBox="0 0 100 50" class="gauge-svg">
                                <path class="gauge-bg" d="M10,45 A40,40 0 0,1 90,45" />
                                <path class="gauge-fill" d="M10,45 A40,40 0 0,1 90,45" />
                            </svg>
                            <div class="gauge-content">
                                <span class="gauge-val">$6,581</span>
                                <small><?= htmlspecialchars($performanceTitle, ENT_QUOTES, 'UTF-8') ?></small>
                            </div>
                        </div>

                        <div class="activity-stats-list">
                            <div class="stat-row">
                                <div class="stat-info">
                                    <span><?= htmlspecialchars($dataALabel, ENT_QUOTES, 'UTF-8') ?></span>
                                    <strong>7.95K</strong>
                                </div>
                                <div class="stat-trend up">+ 3.48%</div>
                            </div>
                            <div class="stat-row">
                                <div class="stat-info">
                                    <span><?= htmlspecialchars($dataBLabel, ENT_QUOTES, 'UTF-8') ?></span>
                                    <strong>4.38K</strong>
                                </div>
                                <div class="stat-trend down">- 2.12%</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer-mini">
                        <span><?= htmlspecialchars($updatedLabel, ENT_QUOTES, 'UTF-8') ?></span>
                        <a href="#"><?= htmlspecialchars($viewDetailsLabel, ENT_QUOTES, 'UTF-8') ?></a>
                    </div>
                </div>

                <div class="metrics-subgrid">
                    <?php foreach($WCU_Stats as $key => $stat): ?>
                    <div class="bento-card card-metric">
                        <span class="metric-label"><i class="fa-solid fa-asterisk"></i> <?= $stat['label'] ?></span>
                        <div class="metric-value" data-target="<?= (int)($stat['value'] ?? 0) ?>" data-suffix="<?= htmlspecialchars($stat['suffix'] ?? '', ENT_QUOTES, 'UTF-8') ?>">0<?= htmlspecialchars($stat['suffix'] ?? '', ENT_QUOTES, 'UTF-8') ?></div>
                        <p class="metric-desc"><?= htmlspecialchars($metricDesc, ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bento-image-col">
                <div class="image-box">
                    <img src="<?= htmlspecialchars($WCU_MainImage ?? 'assets/img/projects/digital-presence-setup/case-02.jpg', ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($imageAlt, ENT_QUOTES, 'UTF-8') ?>" width="720" height="900" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='assets/img/projects/digital-presence-setup/case-02.jpg';">
                    <div class="overlay-glass">
                        <div class="glass-item"><i class="fa-solid fa-bolt"></i> <?= htmlspecialchars($fastGrowthLabel, ENT_QUOTES, 'UTF-8') ?></div>
                        <div class="glass-item"><i class="fa-solid fa-shield-halved"></i> <?= htmlspecialchars($safeStrategyLabel, ENT_QUOTES, 'UTF-8') ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
:root {
    --neon: var(--brand-secondary);
    --card-bg: var(--brand-neutral);
    --border-glass: color-mix(in srgb, var(--brand-accent) 8%, transparent);
    --muted-text: color-mix(in srgb, var(--brand-accent) 50%, var(--brand-primary) 50%);
}

.wcu-bento-section {
    background: var(--brand-primary);
    color: var(--brand-accent);
    padding: 100px 0;
    font-family: 'Inter', sans-serif;
    position: relative;
    overflow: hidden;
}

.container { width: 90%; max-width: 1250px; margin: 0 auto; }

.wcu-bento-section::before,
.wcu-bento-section::after {
    content: "";
    position: absolute;
    border-radius: 999px;
    pointer-events: none;
    z-index: 0;
}

.wcu-bento-section::before {
    width: 420px;
    height: 420px;
    top: -140px;
    left: -120px;
    background: color-mix(in srgb, var(--brand-secondary) 9%, transparent);
    filter: blur(40px);
}

.wcu-bento-section::after {
    width: 460px;
    height: 460px;
    bottom: -200px;
    right: -160px;
    background: color-mix(in srgb, var(--brand-accent) 6%, transparent);
    filter: blur(46px);
}

.wcu-bento-section .container {
    position: relative;
    z-index: 1;
}

/* RE-DISEÃ‘O CARD ACTIVITY V2 */
.card-activity-v2 {
    background: linear-gradient(145deg, var(--brand-neutral), var(--brand-primary));
    border: 1px solid var(--border-glass);
    border-radius: 32px;
    padding: 30px;
    position: relative;
    overflow: hidden;
}

.card-activity-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.header-info { display: flex; align-items: center; gap: 12px; min-width: 0; }
.live-dot {
    width: 8px; height: 8px;
    background: var(--neon);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--neon);
    animation: pulse 2s infinite;
}

.card-activity-header h3 { font-size: 1.1rem; font-weight: 500; color: var(--brand-accent); margin: 0; }
.card-activity-header i { color: var(--muted-text); }

.card-activity-body {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 30px;
    align-items: center;
}

/* Gauge Chart SVG */
.gauge-wrapper { position: relative; width: 100%; }
.gauge-svg { width: 100%; height: auto; }
.gauge-bg { fill: none; stroke: color-mix(in srgb, var(--brand-accent) 12%, transparent); stroke-width: 8; stroke-linecap: round; }
.gauge-fill {
    fill: none; stroke: var(--neon); stroke-width: 8; 
    stroke-linecap: round; stroke-dasharray: 126; /* Longitud del arco */
    stroke-dashoffset: 40; /* Controla el progreso */
    transition: 2s ease-out;
}

.gauge-content {
    position: absolute;
    bottom: 5px; left: 50%;
    transform: translateX(-50%);
    text-align: center;
}
.gauge-val { display: block; font-size: 1.8rem; font-weight: 800; color: var(--brand-accent); line-height: 1; }
.gauge-content small { font-size: 0.7rem; color: var(--muted-text); text-transform: uppercase; letter-spacing: 1px; }

/* Stats List */
.activity-stats-list { display: flex; flex-direction: column; gap: 15px; min-width: 0; }
.stat-row {
    display: flex; justify-content: space-between; align-items: center;
    background: color-mix(in srgb, var(--brand-accent) 3%, transparent);
    padding: 12px 18px;
    border-radius: 16px;
    border: 1px solid transparent;
    transition: 0.3s;
    gap: 14px;
    min-width: 0;
}
.stat-row:hover { border-color: color-mix(in srgb, var(--brand-secondary) 20%, transparent); background: color-mix(in srgb, var(--brand-secondary) 2%, transparent); }

.stat-info span { display: block; font-size: 0.75rem; color: var(--muted-text); margin-bottom: 2px; }
.stat-info strong { font-size: 1.1rem; color: var(--brand-accent); }

.stat-trend { font-size: 0.8rem; font-weight: 700; padding: 4px 10px; border-radius: 8px; flex-shrink: 0; white-space: nowrap; }
.stat-trend.up { color: var(--neon); background: color-mix(in srgb, var(--brand-secondary) 10%, transparent); }
.stat-trend.down { color: var(--brand-accent); background: color-mix(in srgb, var(--brand-accent) 12%, transparent); }

.card-footer-mini {
    margin-top: 25px; padding-top: 15px;
    border-top: 1px solid color-mix(in srgb, var(--brand-accent) 5%, transparent);
    display: flex; justify-content: space-between;
    font-size: 0.75rem; color: var(--muted-text);
    gap: 12px;
    min-width: 0;
}
.card-footer-mini a { color: var(--neon); text-decoration: none; font-weight: 600; }

/* RESTO DEL ESTILO (MANTENIDO) */
.wcu-bento-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 50px;
    gap: 24px;
}
.header-left { max-width: 720px; }
.section-tag-alt {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 1.8px;
    color: var(--brand-secondary) !important;
    text-transform: uppercase;
    padding: 8px 12px;
    border-radius: 999px;
    background: color-mix(in srgb, var(--brand-secondary) 10%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-secondary) 25%, transparent);
}
.wcu-bento-title {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 800;
    margin-top: 15px;
    color: var(--brand-accent) !important;
    line-height: 1.05;
    text-shadow: 0 8px 26px color-mix(in srgb, var(--brand-primary) 65%, transparent);
}
.btn-contact-neon {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: var(--brand-primary);
    background: var(--brand-secondary);
    font-weight: 800;
    border-radius: 999px;
    padding: 12px 16px 12px 20px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    box-shadow: 0 10px 24px color-mix(in srgb, var(--brand-secondary) 25%, transparent);
}
.btn-contact-neon .icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: color-mix(in srgb, var(--brand-primary) 10%, transparent);
}
.btn-contact-neon:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 28px color-mix(in srgb, var(--brand-secondary) 35%, transparent);
}

.bento-grid { display: grid; grid-template-columns: 1.6fr 1fr; gap: 24px; }
.bento-grid > * { min-width: 0; }
.bento-stats-col { display: flex; flex-direction: column; gap: 24px; }
.metrics-subgrid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }

.card-metric {
    background: linear-gradient(165deg, color-mix(in srgb, var(--brand-neutral) 88%, transparent), color-mix(in srgb, var(--brand-primary) 94%, transparent));
    padding: 35px;
    border-radius: 32px;
    border: 1px solid var(--border-glass);
    transition: transform 0.25s ease, border-color 0.25s ease;
}
.card-metric:hover {
    transform: translateY(-6px);
    border-color: color-mix(in srgb, var(--brand-secondary) 26%, transparent);
}
.metric-label {
    color: color-mix(in srgb, var(--brand-accent) 82%, transparent) !important;
    font-size: 0.82rem;
    letter-spacing: 1.2px;
    font-weight: 700;
    text-transform: uppercase;
}
.metric-value {
    font-size: 3.5rem;
    font-weight: 900;
    color: var(--brand-secondary) !important;
    margin: 12px 0 10px;
    line-height: 1;
    text-shadow: 0 6px 20px color-mix(in srgb, var(--brand-secondary) 28%, transparent);
}
.metric-desc {
    color: color-mix(in srgb, var(--brand-accent) 72%, transparent) !important;
    margin: 0;
    line-height: 1.45;
}

.image-box { border-radius: 32px; overflow: hidden; height: 100%; min-height: 500px; position: relative; }
.image-box img { width: 100%; height: 100%; object-fit: cover; }

.overlay-glass {
    position: absolute; bottom: 20px; left: 20px; right: 20px;
    display: flex; gap: 10px;
}
.glass-item {
    background: color-mix(in srgb, var(--brand-primary) 50%, transparent); backdrop-filter: blur(10px);
    padding: 10px 15px; border-radius: 12px; font-size: 0.8rem;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 10%, transparent);
    color: var(--brand-accent) !important;
    font-weight: 700;
}

@keyframes pulse { 0% { opacity: 0.5; } 50% { opacity: 1; } 100% { opacity: 0.5; } }

@media (max-width: 991px) {
    .bento-grid { grid-template-columns: 1fr; }
    .card-activity-body { grid-template-columns: 1fr; }
    .wcu-bento-header { flex-direction: column; align-items: flex-start; }
    .metrics-subgrid { grid-template-columns: 1fr; }
    .card-metric { padding: 28px; }
    .metric-value { font-size: clamp(2.9rem, 11vw, 4.2rem); }
}

@media (max-width: 575px) {
    .wcu-bento-section {
        padding: 84px 0;
    }

    .card-activity-v2,
    .card-metric,
    .image-box {
        border-radius: 24px;
    }

    .card-activity-v2,
    .card-metric {
        padding: 22px;
    }

    .card-activity-header {
        align-items: flex-start;
        gap: 12px;
    }

    .card-activity-body {
        gap: 22px;
    }

    .gauge-content {
        width: 100%;
        bottom: 0;
    }

    .gauge-val {
        font-size: 1.7rem;
    }

    .gauge-content small {
        display: block;
        line-height: 1.35;
        letter-spacing: 0.08em;
    }

    .stat-row {
        flex-direction: column;
        align-items: flex-start;
        padding: 16px 18px;
    }

    .stat-trend {
        align-self: flex-start;
    }

    .card-footer-mini {
        flex-direction: column;
        align-items: flex-start;
    }

    .metrics-subgrid {
        gap: 18px;
    }

    .metric-label {
        display: block;
        line-height: 1.6;
    }

    .metric-value {
        font-size: clamp(2.8rem, 18vw, 4rem);
    }

    .metric-desc {
        font-size: 0.98rem;
    }

    .overlay-glass {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const target = document.querySelector('.wcu-bento-section');
    if (!target) {
        return;
    }

    let hasAnimated = false;

    function animateFallbackCounter(el, duration) {
        const targetValue = parseInt(el.getAttribute('data-target') || '0', 10) || 0;
        const suffix = el.getAttribute('data-suffix') || '';
        const start = performance.now();

        function tick(now) {
            const progress = Math.min((now - start) / duration, 1);
            const current = Math.floor(progress * targetValue);
            el.textContent = current + suffix;
            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    }

    function runCountersAndGauge() {
        if (hasAnimated) {
            return;
        }
        hasAnimated = true;

        const metricEls = document.querySelectorAll('.metric-value');
        const gaugeEl = document.querySelector('.gauge-fill');
        const canUseAnime = (typeof anime !== 'undefined');

        if (canUseAnime && gaugeEl) {
            anime({
                targets: '.gauge-fill',
                strokeDashoffset: [126, 40],
                duration: 2000,
                easing: 'easeOutQuart'
            });
        } else if (gaugeEl) {
            gaugeEl.style.transition = 'stroke-dashoffset 2s ease-out';
            gaugeEl.style.strokeDashoffset = '126';
            requestAnimationFrame(() => {
                gaugeEl.style.strokeDashoffset = '40';
            });
        }

        metricEls.forEach((el) => {
            const targetValue = parseInt(el.getAttribute('data-target') || '0', 10) || 0;
            const suffix = el.getAttribute('data-suffix') || '';

            if (canUseAnime) {
                const counterObj = { value: 0 };
                anime({
                    targets: counterObj,
                    value: targetValue,
                    round: 1,
                    duration: 2000,
                    easing: 'easeOutExpo',
                    update: () => {
                        el.textContent = counterObj.value + suffix;
                    }
                });
            } else {
                animateFallbackCounter(el, 1800);
            }
        });
    }

    function triggerAnimationsWithDependency() {
        if (window.__bpDeps && typeof window.__bpDeps.ensure === 'function') {
            Promise.race([
                window.__bpDeps.ensure('anime', [
                    'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js',
                    'https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js'
                ]).catch(() => null),
                new Promise((resolve) => setTimeout(resolve, 1500))
            ]).finally(runCountersAndGauge);
            return;
        }

        runCountersAndGauge();
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                triggerAnimationsWithDependency();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    observer.observe(target);
});
</script>
