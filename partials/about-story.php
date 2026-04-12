<?php 
@session_start(); 
require_once __DIR__ . '/../text.php'; 

// --- LÓGICA DE DATOS SEGURA ---
// Aseguramos que existan variables para evitar errores si text.php falla
$comp_name = $Company ?? 'Brothers Painting';
$exp_years = $ExperienceYears ?? 12;
$location  = $Locality ?? 'Baltimore';
$region    = $Region ?? 'MD';
$phone_display = $Phone ?? '(410) 419-5790';
$phone_link    = $PhoneRef ?? 'tel:4104195790';

// Texto principal dividido para mejor lectura
$about_headline = "Transforming Homes in $location with Expert Craftsmanship";
$about_intro    = $About[0] ?? "We are a family-owned company delivering top-quality results.";
$about_detail   = $About[1] ?? "Our distinction lies in our dedication, honesty, and workmanship.";

?>

<section class="about-premium section-padding" id="about">
    <div class="container">
        <div class="about-premium__wrapper">
            
            <div class="about-premium__visual" data-anim="fade">
                <div class="visual-backdrop"></div>
                
                <figure class="visual-image-wrap">
                    <img src="assets/img/normal/about_section.jpg" 
                         alt="<?= htmlspecialchars($comp_name) ?> Work Team" 
                         class="visual-img">
                </figure>

                <div class="experience-card" data-anim="up" data-delay="3">
                    <div class="exp-icon">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <div class="exp-content">
                        <span class="exp-number"><?= $exp_years ?>+</span>
                        <span class="exp-label">Years of<br>Excellence</span>
                    </div>
                </div>
            </div>

            <div class="about-premium__content">
                
                <div class="section-header">
                    <span class="tagline" data-anim="left">
                        <i class="fa-solid fa-paint-roller"></i> About <?= htmlspecialchars($comp_name) ?>
                    </span>
                    <h2 class="title" data-anim="up" data-delay="1">
                        Professional Painting & <br>
                        <span class="highlight">Home Improvements</span>
                    </h2>
                </div>

                <div class="text-body" data-anim="up" data-delay="2">
                    <p class="lead-text"><?= $about_intro ?></p>
                    <p><?= $about_detail ?></p>
                </div>

                <div class="feature-grid" data-anim="up" data-delay="3">
                    <div class="feature-item">
                        <i class="fa-solid fa-file-signature"></i>
                        <div class="feature-text">
                            <strong>Licensed & Insured</strong>
                            <span>100% Protected</span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-comments"></i>
                        <div class="feature-text">
                            <strong><?= htmlspecialchars($Bilingual ?? 'Bilingual Team') ?></strong>
                            <span>English & Spanish</span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <div class="feature-text">
                            <strong>Free Estimates</strong>
                            <span>No Hidden Fees</span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-calendar-check"></i>
                        <div class="feature-text">
                            <strong>Reliable Schedule</strong>
                            <span>Mon - Sat Service</span>
                        </div>
                    </div>
                </div>

                <div class="cta-group" data-anim="up" data-delay="4">
                    <a href="contact.php" class="btn-main">
                        Get a Free Quote <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="<?= $phone_link ?>" class="btn-phone">
                        <div class="icon-circle"><i class="fa-solid fa-phone"></i></div>
                        <div class="phone-info">
                            <span>Call Us Now</span>
                            <strong><?= $phone_display ?></strong>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
/* =========================================
   ESTILOS PREMIUM - ABOUT SECTION
   ========================================= */

/* Variables locales derivadas del ROOT global para consistencia */
:root {
    --ab-gap: clamp(40px, 5vw, 80px); /* Espaciado fluido */
    --ab-radius: 12px;
}

.section-padding {
    padding: var(--section-space) 0;
    background: linear-gradient(to bottom, var(--brand-white) 0%, var(--bg-light) 100%);
    overflow: hidden;
}

.about-premium__wrapper {
    display: grid;
    grid-template-columns: 0.85fr 1fr; /* Imagen un poco más chica que texto */
    gap: var(--ab-gap);
    align-items: center;
}

/* --- 1. LADO VISUAL (IMAGEN) --- */
.about-premium__visual {
    position: relative;
    padding: 20px 0 20px 20px; /* Espacio para el efecto visual */
}

/* Cuadro decorativo detrás de la foto */
.visual-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 90%;
    height: 90%;
    border: 2px solid var(--brand-secondary);
    border-radius: var(--ab-radius);
    z-index: 1;
    opacity: 0.3;
}

.visual-image-wrap {
    position: relative;
    z-index: 2;
    border-radius: var(--ab-radius);
    overflow: hidden;
    box-shadow: var(--shadow-medium);
    margin: 0;
    /* Aspect Ratio para mantener forma vertical elegante */
    aspect-ratio: 3/4; 
}

.visual-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s var(--anim-ease);
}

.about-premium__visual:hover .visual-img {
    transform: scale(1.05); /* Zoom suave al pasar mouse */
}

/* Tarjeta Flotante (Experience Badge) */
.experience-card {
    position: absolute;
    bottom: 40px;
    left: -20px; /* Rompe la caja hacia la izquierda */
    z-index: 3;
    background: var(--brand-white);
    padding: 20px 25px;
    border-radius: var(--ab-radius);
    box-shadow: var(--shadow-strong);
    display: flex;
    align-items: center;
    gap: 15px;
    border-left: 5px solid var(--brand-secondary);
    max-width: 240px;
}

.exp-icon {
    font-size: 2rem;
    color: var(--brand-secondary);
}

.exp-content {
    display: flex;
    flex-direction: column;
}

.exp-number {
    font-family: var(--title-font);
    font-weight: 800;
    font-size: 2rem;
    line-height: 1;
    color: var(--brand-primary);
}

.exp-label {
    font-family: var(--body-font);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    color: var(--gray-dark);
    line-height: 1.2;
    margin-top: 5px;
}

/* --- 2. LADO CONTENIDO (TEXTO) --- */
.section-header {
    margin-bottom: 25px;
}

.tagline {
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

.title {
    font-family: var(--title-font);
    font-size: clamp(2rem, 3.5vw, 3rem);
    font-weight: 800;
    line-height: 1.15;
    color: var(--brand-primary);
}

.highlight {
    color: var(--brand-secondary);
    /* Subrayado creativo */
    background-image: linear-gradient(to right, rgba(255, 104, 37, 0.2) 0%, rgba(255, 104, 37, 0.2) 100%);
    background-position: 0 88%;
    background-size: 100% 12px;
    background-repeat: no-repeat;
}

.text-body .lead-text {
    font-size: 1.15rem;
    font-weight: 500;
    color: var(--brand-primary);
    margin-bottom: 15px;
}

.text-body p {
    color: var(--body-color);
    line-height: 1.7;
    margin-bottom: 15px;
}

/* Feature Grid (Iconos) */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin: 30px 0;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 15px;
    background: var(--brand-white);
    padding: 15px;
    border-radius: 8px;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(0,0,0,0.03);
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-3px);
    border-color: var(--brand-secondary);
}

.feature-item i {
    font-size: 1.5rem;
    color: var(--brand-accent); /* Azul para contraste con naranja */
}

.feature-text {
    display: flex;
    flex-direction: column;
}

.feature-text strong {
    font-family: var(--title-font);
    font-size: 1rem;
    color: var(--brand-primary);
}

.feature-text span {
    font-size: 0.8rem;
    color: var(--muted-text);
}

/* CTA Group */
.cta-group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 30px;
    margin-top: 10px;
}

.btn-main {
    background: var(--brand-primary);
    color: #fff;
    padding: 15px 35px;
    font-family: var(--title-font);
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.9rem;
    border-radius: 6px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-main:hover {
    background: var(--brand-secondary);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(255, 104, 37, 0.3);
}

.btn-phone {
    display: flex;
    align-items: center;
    gap: 15px;
    text-decoration: none;
    color: var(--brand-primary);
    transition: 0.3s;
}

.btn-phone:hover .icon-circle {
    background: var(--brand-secondary);
    color: white;
}

.icon-circle {
    width: 45px;
    height: 45px;
    background: rgba(30, 30, 30, 0.05);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    color: var(--brand-primary);
    transition: 0.3s;
}

.phone-info {
    display: flex;
    flex-direction: column;
}

.phone-info span {
    font-size: 0.8rem;
    text-transform: uppercase;
    color: var(--muted-text);
    font-weight: 600;
}

.phone-info strong {
    font-family: var(--title-font);
    font-size: 1.1rem;
    color: var(--brand-primary);
}

/* =========================================
   RESPONSIVE
   ========================================= */
@media (max-width: 991px) {
    .about-premium__wrapper {
        grid-template-columns: 1fr;
        gap: 60px;
    }
    
    /* En móvil, la imagen pasa arriba o abajo según prefieras. 
       Aquí la pongo abajo para priorizar el texto */
    .about-premium__visual {
        order: 2; 
        max-width: 500px;
        margin: 0 auto;
        padding-left: 0;
    }

    .experience-card {
        left: 50%;
        transform: translateX(-50%);
        bottom: -25px;
        width: 100%;
        max-width: 280px;
        border-left: none;
        border-bottom: 4px solid var(--brand-secondary);
        justify-content: center;
    }

    .visual-backdrop {
        left: 50%;
        transform: translateX(-50%);
    }
}

@media (max-width: 576px) {
    .feature-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-group {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }
    
    .btn-main {
        width: 100%;
        justify-content: center;
    }
}
</style>