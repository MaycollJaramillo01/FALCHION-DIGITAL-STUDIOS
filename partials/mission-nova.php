<?php 
@session_start(); 
require_once __DIR__ . '/../text.php'; 

// --- CONFIGURACIÓN DE DATOS ---
$comp_name = $Company ?? 'Brothers Painting';

// Definimos los pasos del proceso en un Array PHP para mantener el HTML limpio
$steps = [
    [
        'id'    => '01',
        'icon'  => 'fa-comments',
        'title' => 'Consultation',
        'desc'  => "We listen to your vision. Whether it's interior or exterior, we discuss your goals and assess the project scope."
    ],
    [
        'id'    => '02',
        'icon'  => 'fa-file-invoice-dollar',
        'title' => 'Free Estimate',
        'desc'  => ($Estimates ?? 'Free Estimates') . ". We provide a detailed, transparent quote with no hidden fees or surprises."
    ],
    [
        'id'    => '03',
        'icon'  => 'fa-paint-roller', // O fa-hammer si es general
        'title' => 'Execution',
        'desc'  => "Our licensed team preps the area, protects your property, and delivers high-quality craftsmanship on schedule."
    ],
    [
        'id'    => '04',
        'icon'  => 'fa-clipboard-check',
        'title' => 'Final Walkthrough',
        'desc'  => "We inspect the work with you to ensure 100% satisfaction before we consider the job complete."
    ]
];
?>

<section class="process-premium section-padding" id="process">
    <div class="container">
        
        <div class="process-header">
            <span class="process-eyebrow" data-anim="fade">
                <i class="fa-solid fa-list-check"></i> How We Work
            </span>
            <h2 class="process-title" data-anim="up" data-delay="1">
                Simple Steps to a <br><span class="highlight">Perfect Project</span>
            </h2>
            <p class="process-desc" data-anim="up" data-delay="2">
                At <?= htmlspecialchars($comp_name) ?>, we believe in a hassle-free experience. 
                From the first call to the final touch-up, we handle everything.
            </p>
        </div>

        <div class="process-grid">
            <?php foreach($steps as $index => $step): 
                $delay = $index + 1; // 1, 2, 3...
            ?>
            <div class="process-card" data-anim="up" data-delay="<?= $delay ?>">
                <div class="card-number-bg"><?= $step['id'] ?></div>
                
                <div class="card-icon">
                    <i class="fa-solid <?= $step['icon'] ?>"></i>
                </div>
                
                <h3 class="card-title"><?= $step['title'] ?></h3>
                <p class="card-desc"><?= $step['desc'] ?></p>

                <?php if($index < count($steps) - 1): ?>
                <div class="arrow-connector">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="process-cta" data-anim="scale" data-delay="4">
            <a href="<?= htmlspecialchars(falchion_url('contact.php'), ENT_QUOTES, 'UTF-8') ?>" class="btn-process">
                Start Your Project Today <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>

<style>
/* =========================================
   PROCESS PREMIUM STYLES
   ========================================= */

:root {
    --proc-gap: 30px;
    --proc-card-bg: #FFFFFF;
}

.process-premium {
    padding: var(--section-space) 0;
    background: linear-gradient(to bottom, var(--brand-neutral) 0%, #FFFFFF 100%);
    position: relative;
    overflow: hidden;
}

/* --- HEADER --- */
.process-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.process-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--body-font);
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--brand-secondary);
    background: rgba(255, 104, 37, 0.08);
    padding: 6px 14px;
    border-radius: 50px;
    margin-bottom: 15px;
}

.process-title {
    font-family: var(--title-font);
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 800;
    color: var(--brand-primary);
    line-height: 1.2;
    margin-bottom: 15px;
}

.process-title .highlight {
    color: var(--brand-secondary);
}

.process-desc {
    font-family: var(--body-font);
    font-size: 1.05rem;
    color: var(--body-color);
    line-height: 1.6;
}

/* --- GRID --- */
.process-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--proc-gap);
    margin-bottom: 50px;
    position: relative;
}

/* --- CARD --- */
.process-card {
    background: var(--proc-card-bg);
    padding: 40px 25px;
    border-radius: 12px;
    position: relative;
    text-align: center;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(0,0,0,0.03);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    z-index: 1;
    overflow: hidden;
}

.process-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-medium);
    border-color: rgba(255, 104, 37, 0.2);
}

/* Marca de agua (Número grande fondo) */
.card-number-bg {
    position: absolute;
    top: -10px;
    right: -10px;
    font-family: var(--brand-primary);
    font-size: 5rem;
    font-weight: 900;
    color: var(--brand-accent);
    opacity: 0.4;
    line-height: 1;
    z-index: 0;
    pointer-events: none;
    transition: 0.3s;
}

.process-card:hover .card-number-bg {
    color: var(--brand-secondary);
    opacity: 0.1;
    transform: scale(1.1);
}

/* Icono */
.card-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 20px;
    background: var(--brand-neutral);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: var(--brand-primary);
    position: relative;
    z-index: 2;
    transition: 0.3s;
}

.process-card:hover .card-icon {
    background: var(--brand-secondary);
    color: var(--brand-white);
}

/* Textos */
.card-title {
    font-family: var(--title-font);
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--brand-primary);
    margin-bottom: 12px;
    position: relative;
    z-index: 2;
}

.card-desc {
    font-family: var(--body-font);
    font-size: 0.9rem;
    color: var(--muted-text);
    line-height: 1.6;
    position: relative;
    z-index: 2;
}

/* --- FLECHA CONECTORA (Desktop) --- */
.arrow-connector {
    position: absolute;
    top: 50%;
    right: -25px; /* Ajustar según el gap */
    transform: translateY(-120%);
    color: var(--brand-secondary);
    opacity: 0.3;
    font-size: 1.2rem;
    z-index: 3;
}

/* --- CTA --- */
.process-cta {
    text-align: center;
}

.btn-process {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background-color: var(--brand-primary);
    color: var(--brand-white);
    padding: 16px 36px;
    font-family: var(--title-font);
    font-weight: 700;
    text-transform: uppercase;
    border-radius: 50px;
    text-decoration: none;
    transition: 0.3s ease;
    box-shadow: var(--shadow-soft);
}

.btn-process:hover {
    background-color: var(--brand-secondary);
    transform: translateY(-3px);
    box-shadow: var(--shadow-medium);
}

/* =========================================
   RESPONSIVE
   ========================================= */
@media (max-width: 991px) {
    .process-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    /* En tablet 2 columnas, ajustamos flechas */
    .arrow-connector {
        display: none; /* Ocultamos flechas en tablet/movil por complejidad de flujo */
    }
}

@media (max-width: 576px) {
    .process-grid {
        grid-template-columns: 1fr; /* Una columna en móvil */
    }
    
    .process-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px 20px;
    }
}
</style>