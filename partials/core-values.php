<?php 
@session_start(); 
require_once __DIR__ . '/../text.php'; 

// --- LÓGICA DE DATOS ---
$comp_name = $Company ?? 'Brothers Painting';

// Definimos los valores basados en la información de text.php (Honesty, Teamwork, Diligence...)
// Creamos un array estructurado para iterar en el HTML
$values_list = [
    [
        'icon'  => 'fa-handshake',
        'title' => 'Honesty & Trust',
        'desc'  => 'We operate with full transparency and integrity. No hidden fees, just clear communication and honest work.'
    ],
    [
        'icon'  => 'fa-users-gear',
        'title' => 'Teamwork & Passion',
        'desc'  => 'Our dedicated, bilingual team works together seamlessly to ensure every project exceeds your expectations.'
    ],
    [
        'icon'  => 'fa-award',
        'title' => 'Quality Commitment',
        'desc'  => 'We never cut corners. We use premium materials and proven techniques to guarantee long-lasting results.'
    ],
    [
        'icon'  => 'fa-helmet-safety', // Diligence
        'title' => 'Diligence & Safety',
        'desc'  => 'We protect your property and our crew by following strict safety protocols and maintaining organized worksites.'
    ]
];
?>

<section class="values-premium section-padding" id="core-values">
    <div class="container">
        
        <div class="values-header text-center">
            <span class="values-eyebrow" data-anim="fade">
                <i class="fa-solid fa-star"></i> Our Principles
            </span>
            <h2 class="values-title" data-anim="up" data-delay="1">
                The Values That Drive <br>
                <span class="highlight"><?= htmlspecialchars($comp_name) ?></span>
            </h2>
            <p class="values-desc" data-anim="up" data-delay="2">
                More than just a painting company, we are partners in improving your home. 
                Our reputation is built on these core pillars.
            </p>
        </div>

        <div class="values-grid">
            <?php foreach($values_list as $index => $val): 
                // Calcular delay para efecto cascada (1, 2, 3, 4...)
                $delay = $index + 1; 
            ?>
            <div class="value-card" data-anim="up" data-delay="<?= $delay ?>">
                <div class="card-icon-wrap">
                    <i class="fa-solid <?= $val['icon'] ?>"></i>
                </div>
                <h3 class="card-title"><?= $val['title'] ?></h3>
                <p class="card-text">
                    <?= $val['desc'] ?>
                </p>
                <div class="card-line"></div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<style>
/* =========================================
   VALUES PREMIUM STYLES
   ========================================= */

:root {
    --val-bg: #FFFFFF;
    --val-border: #EAEAEA;
    --val-hover-shadow: 0 15px 30px rgba(0,0,0,0.08);
}

.values-premium {
    padding: var(--section-space) 0;
    background-color: var(--brand-neutral); /* Fondo gris muy suave para contraste */
    position: relative;
}

/* --- HEADER --- */
.values-header {
    max-width: 700px;
    margin: 0 auto 60px;
    text-align: center;
}

.values-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--body-font);
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--brand-secondary);
    background: rgba(255, 104, 37, 0.08);
    padding: 6px 14px;
    border-radius: 50px;
    margin-bottom: 15px;
}

.values-title {
    font-family: var(--title-font);
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 800;
    color: var(--brand-primary);
    line-height: 1.2;
    margin-bottom: 16px;
}

.values-title .highlight {
    color: var(--brand-secondary);
}

.values-desc {
    font-family: var(--body-font);
    font-size: 1.05rem;
    color: var(--body-color);
    line-height: 1.6;
}

/* --- GRID SYSTEM --- */
.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

/* --- CARD DESIGN --- */
.value-card {
    background: var(--val-bg);
    padding: 40px 30px;
    border-radius: 12px;
    border: 1px solid var(--val-border);
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

/* Hover Effects */
.value-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--val-hover-shadow);
    border-color: var(--brand-secondary);
}

/* Icon */
.card-icon-wrap {
    width: 60px;
    height: 60px;
    background: var(--brand-neutral);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    color: var(--brand-secondary);
    margin-bottom: 24px;
    transition: 0.3s ease;
}

.value-card:hover .card-icon-wrap {
    background: var(--brand-secondary);
    color: var(--brand-white);
}

/* Text Content */
.card-title {
    font-family: var(--title-font);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--brand-primary);
    margin-bottom: 12px;
}

.card-text {
    font-family: var(--body-font);
    font-size: 0.95rem;
    color: var(--muted-text); /* Gris suave */
    line-height: 1.6;
    margin-bottom: 0;
}

/* Decorative Line on Hover */
.card-line {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0%;
    height: 3px;
    background: var(--brand-secondary);
    transition: width 0.4s ease;
}

.value-card:hover .card-line {
    width: 100%;
}

/* =========================================
   RESPONSIVE
   ========================================= */
@media (max-width: 768px) {
    .values-header {
        margin-bottom: 40px;
    }
    
    .value-card {
        padding: 30px 20px;
        align-items: center; /* Centrar en móvil si se prefiere */
        text-align: center;
    }

    .card-line {
        /* En móvil a veces es mejor mostrar la línea completa o quitarla */
        width: 100%; 
        opacity: 0.5;
    }
}
</style>