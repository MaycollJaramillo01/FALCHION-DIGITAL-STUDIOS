<?php
/* ==========================================================================
   1. DATOS (Simulación de tu archivo text.php incluido)
   ========================================================================== */
@session_start();

// COLORES DE MARCA (Brothers Painting)
$BrandColors = [
  "primary"   => "#1E1E1E", // Negro Corporativo
  "secondary" => "#FF6825", // Naranja
  "accent"    => "#002AA7", // Azul
  "white"     => "#FFFFFF",
];

// SERVICIOS (Brothers Painting)
$SN = []; $SD = [];
$SN[1] = "Painting Contractor";
$SD[1] = "Professional painting services for interior and exterior spaces. We prep, paint, seal, and finish with top-quality materials for long-lasting results.";

$SN[2] = "Texture Painting";
$SD[2] = "First-class texture painting solutions for walls and surfaces. We add character, depth, and unique styles to any area of your home.";

$SN[3] = "Drywall Services";
$SD[3] = "Dependable drywall installation, repair, and finishing. We ensure smooth, clean walls with professional workmanship.";

// CONFIGURACIÓN DE IMÁGENES
// Si tienes las imágenes reales, cambia las rutas. 
// Aquí uso placeholders dinámicos para que el diseño se vea bien de inmediato.
$ServiceImages = [
  1 => 'assets/img/service/1.jpg',
  2 => 'assets/img/service/2.jpg',
  3 => 'assets/img/service/3.jpg',
];
?>

<style>
    :root {
        /* Mapeo de colores PHP a CSS */
        --bp-primary: <?php echo $BrandColors['primary']; ?>;   /* #1E1E1E */
        --bp-secondary: <?php echo $BrandColors['secondary']; ?>; /* #FF6825 */
        --bp-accent: <?php echo $BrandColors['accent']; ?>;      /* #002AA7 */
        --bp-white: <?php echo $BrandColors['white']; ?>;

        /* Tipografía y Layout */
        --font-head: "Exo", sans-serif;
        --font-body: "Inter", sans-serif;
        --radius: 12px;
        --transition: cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* Reset de Sección */
    .services-bento {
        padding: 100px 0;
        background-color: #F8F9FA; /* Fondo gris muy suave */
        overflow: hidden;
    }

    .sb-container {
        width: 100%;
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* --- CABECERA --- */
    .sb-header {
        text-align: center;
        max-width: 760px;
        margin: 0 auto 60px;
    }

    .sb-subtitle {
        display: inline-block;
        font-family: var(--font-body);
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--bp-secondary);
        margin-bottom: 15px;
        position: relative;
        padding-left: 15px;
    }
    
    /* Pequeño punto decorativo antes del subtítulo */
    .sb-subtitle::before {
        content: '';
        position: absolute;
        left: 0; top: 50%; transform: translateY(-50%);
        width: 8px; height: 8px;
        background: var(--bp-secondary);
        border-radius: 50%;
    }

    .sb-title {
        font-family: var(--font-head);
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 800;
        line-height: 1.1;
        color: var(--bp-primary);
        margin-bottom: 20px;
    }

    .sb-desc {
        font-family: var(--font-body);
        font-size: 1.1rem;
        color: #666;
        line-height: 1.6;
    }

    /* --- GRID SYSTEM (Bento Layout) --- */
    .sb-grid {
        display: grid;
        grid-template-columns: 1.3fr 1fr; /* Columna Izq más ancha */
        gap: 24px;
        margin-bottom: 50px;
    }

    .sb-col-right {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    /* --- TARJETA DE SERVICIO --- */
    .sb-card {
        position: relative;
        border-radius: var(--radius);
        overflow: hidden;
        background: #000; /* Fondo de carga */
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: transform 0.4s var(--transition);
        /* Altura mínima para asegurar visualización */
    }

    /* Tamaños específicos */
    .sb-card--lg { 
        height: 100%; 
        min-height: 520px; 
    }
    .sb-card--sm { 
        height: 248px; 
        flex-grow: 1; 
    }

    /* Imagen */
    .sb-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s var(--transition), filter 0.4s ease;
        filter: brightness(0.85); /* Un poco oscura para leer texto */
    }

    /* Overlay Gradiente */
    .sb-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.3) 50%, transparent 100%);
        z-index: 1;
        transition: opacity 0.4s ease;
    }

    /* Contenido de texto */
    .sb-content {
        position: absolute;
        bottom: 0; left: 0;
        width: 100%;
        padding: 35px;
        z-index: 2;
        transform: translateY(10px);
        transition: transform 0.4s var(--transition);
    }

    .sb-num {
        font-family: var(--font-head);
        font-size: 4rem;
        font-weight: 800;
        color: rgba(255,255,255,0.1); /* Transparente */
        position: absolute;
        top: -50px; right: 20px;
        line-height: 1;
        transition: transform 0.4s ease;
    }

    .sb-card-title {
        color: var(--bp-white);
        font-family: var(--font-head);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .sb-card-text {
        color: rgba(255,255,255,0.9);
        font-family: var(--font-body);
        font-size: 0.95rem;
        line-height: 1.5;
        max-width: 90%;
        
        /* Efecto de revelar texto */
        opacity: 0; 
        max-height: 0;
        overflow: hidden;
        transition: all 0.5s var(--transition);
    }

    /* Icono de flecha flotante */
    .sb-icon {
        position: absolute;
        top: 25px; right: 25px;
        width: 45px; height: 45px;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(5px);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: var(--bp-white);
        z-index: 3;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    /* --- ESTADOS HOVER --- */
    .sb-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .sb-card:hover .sb-img {
        transform: scale(1.1);
        filter: brightness(1); /* Imagen se aclara */
    }

    .sb-card:hover .sb-content {
        transform: translateY(0);
    }

    /* Revelar descripción */
    .sb-card:hover .sb-card-text {
        opacity: 1;
        max-height: 100px; /* Suficiente para el texto */
        margin-top: 10px;
    }

    /* Mover icono y cambiar color */
    .sb-card:hover .sb-icon {
        background: var(--bp-secondary);
        color: var(--bp-white);
        transform: rotate(45deg);
    }

    /* --- BOTÓN --- */
    .sb-btn-wrapper { text-align: center; }

    .sb-btn {
        display: inline-block;
        padding: 18px 45px;
        background-color: var(--bp-primary);
        color: var(--bp-white);
        font-family: var(--font-head);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .sb-btn::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 0%; height: 100%;
        background-color: var(--bp-secondary);
        z-index: -1;
        transition: width 0.3s ease-in-out;
    }

    .sb-btn:hover::after { width: 100%; }
    .sb-btn:hover { color: var(--bp-white); box-shadow: 0 10px 20px rgba(255, 104, 37, 0.3); }

    /* --- RESPONSIVE --- */
    @media (max-width: 992px) {
        .sb-grid { grid-template-columns: 1fr; gap: 20px; }
        .sb-card--lg { min-height: 400px; }
        .sb-card--sm { height: 300px; }
        .sb-card-text { opacity: 1; max-height: 100px; margin-top: 10px; } /* Mostrar texto siempre en móvil */
        .sb-title { font-size: 2.5rem; }
    }

    /* --- ANIMACIONES --- */
    [data-anim] {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .in-view {
        opacity: 1 !important;
        transform: none !important;
    }
    
    /* DEFINICIÓN DE DELAYS */
    [data-delay="1"] { transition-delay: 0.1s; }
    [data-delay="2"] { transition-delay: 0.2s; }
    [data-delay="3"] { transition-delay: 0.3s; }
    
    /* NUEVO DELAY PARA 0.5s */
    [data-delay="5"] { transition-delay: 0.5s; }
</style>

<section class="services-bento" id="services">
    <div class="sb-container">

        <div class="sb-header">
            <span class="sb-subtitle" data-anim>Our Expertise</span>
            <h2 class="sb-title" data-anim data-delay="1">Professional Painting & <br>Finishing Services</h2>
            <p class="sb-desc" data-anim data-delay="2">
                We specialize in high-quality painting, drywall, and texture solutions. 
                Transforming residential and commercial properties with precision.
            </p>
        </div>

        <div class="sb-grid">
            
            <div class="sb-col-left">
                <div class="sb-card sb-card--lg" data-anim data-delay="5">
                    <img src="<?= $ServiceImages[1] ?>" alt="<?= $SN[1] ?>" class="sb-img">
                    <div class="sb-overlay"></div>
                    <div class="sb-icon"><i class="fas fa-arrow-right"></i></div>
                    
                    <div class="sb-content">
                        <span class="sb-num">01</span>
                        <h3 class="sb-card-title"><?= $SN[1] ?></h3>
                        <p class="sb-card-text"><?= $SD[1] ?></p>
                    </div>
                </div>
            </div>

            <div class="sb-col-right">
                
                <div class="sb-card sb-card--sm" data-anim data-delay="5">
                    <img src="<?= $ServiceImages[2] ?>" alt="<?= $SN[2] ?>" class="sb-img">
                    <div class="sb-overlay"></div>
                    <div class="sb-icon"><i class="fas fa-arrow-right"></i></div>
                    
                    <div class="sb-content">
                        <span class="sb-num">02</span>
                        <h3 class="sb-card-title"><?= $SN[2] ?></h3>
                        <p class="sb-card-text"><?= $SD[2] ?></p>
                    </div>
                </div>

                <div class="sb-card sb-card--sm" data-anim data-delay="5">
                    <img src="<?= $ServiceImages[3] ?>" alt="<?= $SN[3] ?>" class="sb-img">
                    <div class="sb-overlay"></div>
                    <div class="sb-icon"><i class="fas fa-arrow-right"></i></div>
                    
                    <div class="sb-content">
                        <span class="sb-num">03</span>
                        <h3 class="sb-card-title"><?= $SN[3] ?></h3>
                        <p class="sb-card-text"><?= $SD[3] ?></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="sb-btn-wrapper" data-anim data-delay="5">
            <a href="<?= htmlspecialchars(falchion_url('services.php'), ENT_QUOTES, 'UTF-8') ?>" class="sb-btn">
                View All Services
            </a>
        </div>

    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        threshold: 0.05 // Se activa cuando el 15% del elemento es visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('[data-anim]').forEach(el => {
        observer.observe(el);
    });
});
</script>