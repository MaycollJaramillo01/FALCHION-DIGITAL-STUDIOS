<?php
@session_start();
if (!isset($Company)) {
    include_once __DIR__ . '/../text.php';
}

$approachIntro = 'Nuestro enfoque estrategico combina analisis, ejecucion creativa y buenas practicas para generar resultados medibles.';

$approachPillars = [
    [
        'icon' => 'fa-bullseye',
        'title' => 'Nuestra Mision',
        'desc' => 'Impulsamos negocios con soluciones digitales practicas que mejoran visibilidad, generan leads calificados y sostienen crecimiento a largo plazo.'
    ],
    [
        'icon' => 'fa-braille',
        'title' => 'Nuestra Vision',
        'desc' => 'Buscamos ser el socio confiable de marcas orientadas al crecimiento mediante estrategia clara, ejecucion solida y resultados medibles.'
    ],
    [
        'icon' => 'fa-gem',
        'title' => 'Nuestro Valor',
        'desc' => 'Trabajamos con transparencia, velocidad y responsabilidad para que cada accion respalde tus objetivos y tu posicionamiento.'
    ]
];
?>

<section class="oa-v2" id="our-approach">
    <div class="oa-v2__wire" aria-hidden="true"></div>
    <div class="oa-v2__glow" aria-hidden="true"></div>

    <div class="container oa-v2__inner">
        <div class="oa-v2__head">
            <div class="oa-v2__left">
                <span class="oa-v2__kicker"><i class="fa-solid fa-asterisk"></i> Nuestro Enfoque</span>
                <h2 class="oa-v2__title">
                    <span>Enfoque <em>estrategico</em> para</span>
                    <span class="oa-v2__line2">crecimiento sostenible</span>
                </h2>
            </div>

            <p class="oa-v2__intro"><?= htmlspecialchars($approachIntro, ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <div class="oa-v2__pillars">
            <?php foreach ($approachPillars as $pillar): ?>
                <article class="oa-v2__item">
                    <h3>
                        <span class="oa-v2__icon"><i class="fa-solid <?= htmlspecialchars($pillar['icon'], ENT_QUOTES, 'UTF-8') ?>"></i></span>
                        <?= htmlspecialchars($pillar['title'], ENT_QUOTES, 'UTF-8') ?>
                    </h3>
                    <p><?= htmlspecialchars($pillar['desc'], ENT_QUOTES, 'UTF-8') ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.oa-v2 {
    position: relative;
    overflow: hidden;
    padding: 96px 0 90px;
    background:
        linear-gradient(90deg, color-mix(in srgb, var(--brand-primary) 96%, #000 4%) 0%, color-mix(in srgb, var(--brand-primary) 92%, #000 8%) 60%, color-mix(in srgb, var(--brand-primary) 96%, #000 4%) 100%);
}

.oa-v2__wire {
    position: absolute;
    left: -62px;
    top: 150px;
    width: 120px;
    height: 120px;
    border: 2px solid color-mix(in srgb, var(--brand-accent) 25%, transparent);
    transform: rotate(35deg);
    opacity: 0.35;
}

.oa-v2__wire::before,
.oa-v2__wire::after {
    content: "";
    position: absolute;
    inset: 20px;
    border: 2px solid color-mix(in srgb, var(--brand-accent) 20%, transparent);
}

.oa-v2__wire::after {
    inset: 40px;
}

.oa-v2__glow {
    position: absolute;
    right: 10%;
    top: -30px;
    width: 460px;
    height: 460px;
    background: radial-gradient(circle, color-mix(in srgb, var(--brand-secondary) 22%, transparent) 0%, transparent 68%);
    filter: blur(46px);
    opacity: 0.35;
    pointer-events: none;
}

.oa-v2__inner {
    position: relative;
    z-index: 2;
}

.oa-v2__head {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 40px;
    align-items: start;
    margin-bottom: 56px;
}

.oa-v2__kicker {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--brand-accent);
    font-size: 0.84rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 700;
}

.oa-v2__kicker i {
    color: var(--brand-secondary);
}

.oa-v2__title {
    margin: 14px 0 0;
    font-size: clamp(2.05rem, 4.2vw, 3.6rem);
    line-height: 1.06;
    color: var(--brand-accent);
    font-weight: 700;
    letter-spacing: -0.02em;
}

.oa-v2__title span {
    display: block;
}

.oa-v2__title em {
    color: var(--brand-secondary);
    font-style: normal;
    font-weight: 800;
}

.oa-v2__line2 {
    position: relative;
    padding-left: 14px;
}

.oa-v2__line2::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0.58em;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--brand-secondary);
}

.oa-v2__intro {
    margin: 40px 0 0;
    max-width: 560px;
    color: color-mix(in srgb, var(--brand-accent) 80%, var(--brand-primary) 20%);
    font-size: 1.08rem;
    line-height: 1.65;
}

.oa-v2__pillars {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 34px;
}

.oa-v2__item h3 {
    margin: 0 0 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--brand-secondary);
    font-size: 2rem;
    font-size: clamp(1.2rem, 1.55vw, 1.6rem);
    line-height: 1.2;
    font-weight: 700;
}

.oa-v2__icon {
    width: 34px;
    height: 34px;
    display: inline-grid;
    place-items: center;
    border-radius: 50%;
    border: 1px solid color-mix(in srgb, var(--brand-secondary) 35%, transparent);
    color: var(--brand-secondary);
    font-size: 0.95rem;
}

.oa-v2__item p {
    margin: 0;
    color: color-mix(in srgb, var(--brand-accent) 74%, var(--brand-primary) 26%);
    font-size: 1.02rem;
    line-height: 1.7;
}

@media (max-width: 1024px) {
    .oa-v2__head {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .oa-v2__intro {
        margin-top: 10px;
    }

    .oa-v2__pillars {
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }
}

@media (max-width: 680px) {
    .oa-v2 {
        padding: 78px 0 72px;
    }

    .oa-v2__wire {
        display: none;
    }

    .oa-v2__pillars {
        grid-template-columns: 1fr;
    }

    .oa-v2__item p {
        font-size: 0.95rem;
    }
}
</style>
