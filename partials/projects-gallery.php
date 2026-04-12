<?php
/*==============================================================
  CONFIGURACIÓN DE RUTAS (PHP)
==============================================================*/

// 1. Protocolo
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// 2. Host
$host = $_SERVER['HTTP_HOST'];

// 3. Subcarpeta (IMPORTANTE: Déjalo vacío '' si estás en la raíz, o pon 'nombre-carpeta' si estás en localhost/carpeta)
$project_root_folder = ''; // Ej: 'mi-sitio-web'

// 4. Construcción de URL Base
$path_prefix = $project_root_folder ? $project_root_folder . '/' : '';
$ProjectBaseURL = $protocol . $host . '/' . $path_prefix . 'assets/img/projects/';

// 5. Ruta del sistema (Filesystem)
$ProjectBase  = __DIR__ . '/../assets/img/projects/';

/* Obtener carpetas */
$ProjectFolders = array_filter(glob($ProjectBase . '*'), 'is_dir');
natcasesort($ProjectFolders);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
  /* =========================================
     ESTILOS PREMIUM - PROJECTS SECTION
     ========================================= */
  
  /* Variables de respaldo por si no están definidas en tu CSS global */
  :root {
    --brand-primary: #1E1E1E;
    --brand-secondary: #FF6825; /* Naranja acento */
    --brand-white: #FFFFFF;
    --brand-neutral: #F5F5F5;
    --text-main: #333333;
    --radius-lg: 16px;
    --radius-sm: 8px;
    --shadow-card: 0 10px 30px rgba(0,0,0,0.08);
  }

  .projects-premium {
    padding: 100px 0;
    background-color: var(--brand-white);
    overflow: hidden;
  }

  /* --- TÍTULOS --- */
  .pm-header {
    text-align: center;
    margin-bottom: 60px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
  }

  .pm-header h2 {
    font-family: var(--title-font, sans-serif);
    font-size: 3rem;
    font-weight: 800;
    color: var(--brand-primary);
    margin-bottom: 15px;
    line-height: 1.1;
  }

  .pm-header p {
    font-family: var(--body-font, sans-serif);
    color: var(--text-main);
    opacity: 0.7;
    font-size: 1.1rem;
  }

  /* --- TARJETAS Y CONTENEDORES --- */
  .pm-card {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-card);
    background: #000; /* Fondo negro para evitar flash blanco */
  }

  .pm-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    filter: brightness(0.9);
  }

  /* Efecto Hover: Zoom */
  .pm-card:hover img {
    transform: scale(1.08);
    filter: brightness(1);
  }

  /* Overlay Gradiente para texto */
  .pm-overlay {
    position: absolute;
    bottom: 0; left: 0; width: 100%;
    padding: 40px 30px;
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 100%);
    z-index: 2;
    transform: translateY(10px);
    transition: transform 0.4s ease;
  }

  .pm-card:hover .pm-overlay {
    transform: translateY(0);
  }

  .pm-cat {
    display: inline-block;
    background: var(--brand-secondary);
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 4px;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .pm-title-card {
    color: #fff;
    font-family: var(--title-font, sans-serif);
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0;
    line-height: 1.2;
  }

  /* --- LAYOUTS (Grid System) --- */
  
  /* Layout 1: Hero Único */
  .layout-hero {
    height: 450px;
    width: 100%;
  }

  /* Layout 2: Dos Columnas */
  .layout-split {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 20px;
    height: 450px;
  }
  .layout-split .pm-card { height: 100%; }

  /* Layout 3: Collage (1 Grande izq, 2 Pequeños der) */
  .layout-collage {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 20px;
    height: 450px;
  }

  .col-right-stack {
    display: flex;
    flex-direction: column;
    gap: 20px;
    height: 100%;
  }

  .pm-card-full { height: 100%; }
  .pm-card-half { height: calc(50% - 10px); }

  /* --- SWIPER AJUSTES --- */
  .projectsSwiper {
    padding-bottom: 50px !important;
  }
  
  .swiper-pagination-bullet-active {
    background-color: var(--brand-secondary) !important;
  }

  /* --- RESPONSIVE --- */
  @media(max-width: 992px) {
    .layout-split, .layout-collage {
      grid-template-columns: 1fr;
      height: auto;
    }
    .col-right-stack { display: grid; grid-template-columns: 1fr 1fr; height: 200px; }
    .layout-hero { height: 350px; }
    .layout-split .pm-card { height: 300px; }
    .pm-card-full { height: 300px; margin-bottom: 20px;}
  }

  @media(max-width: 576px) {
    .col-right-stack { grid-template-columns: 1fr; height: auto; }
    .pm-card-half { height: 200px; }
    .pm-header h2 { font-size: 2.2rem; }
  }

  /* --- MOTOR DE ANIMACIONES --- */
  [data-anim] {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
  }
  .in-view {
    opacity: 1 !important;
    transform: none !important;
  }
  [data-delay="1"] { transition-delay: 0.1s; }
  [data-delay="2"] { transition-delay: 0.2s; }
</style>

<section class="projects-premium" id="projects">
  <div class="container">

    <div class="pm-header">
      <h2 data-anim>Our Recent Projects</h2>
      <p data-anim data-delay="1">Explore our portfolio of residential and commercial excellence.</p>
    </div>

    <div class="swiper projectsSwiper">
      <div class="swiper-wrapper">

        <?php
        foreach ($ProjectFolders as $folderPath):
          
          $folderName = basename($folderPath);
          $displayName = str_replace(['-', '_'], ' ', $folderName); // Limpiar nombre

          // Obtener imágenes
          $images = glob($folderPath . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);
          if (count($images) < 1) continue;

          natsort($images);
          $images = array_slice($images, 0, 3);
          $count = count($images);

          // Helper URL
          $url = function ($img) use ($ProjectBaseURL, $folderName) {
            $base = rtrim($ProjectBaseURL, '/') . '/'; 
            return $base . rawurlencode($folderName) . '/' . rawurlencode(basename($img));
          };
        ?>

        <div class="swiper-slide">

          <?php if ($count == 1): ?>
            <div class="pm-card layout-hero" data-anim>
              <img src="<?= $url($images[0]) ?>" alt="Project <?= htmlspecialchars($displayName) ?>">
              <div class="pm-overlay">
                <span class="pm-cat">Project</span>
                <h3 class="pm-title-card"><?= htmlspecialchars($displayName) ?></h3>
              </div>
            </div>

          <?php elseif ($count == 2): ?>
            <div class="layout-split">
              <div class="pm-card" data-anim>
                <img src="<?= $url($images[0]) ?>" alt="Main View">
                <div class="pm-overlay">
                  <span class="pm-cat">Before / After</span>
                  <h3 class="pm-title-card"><?= htmlspecialchars($displayName) ?></h3>
                </div>
              </div>
              <div class="pm-card" data-anim data-delay="1">
                <img src="<?= $url($images[1]) ?>" alt="Detail View">
              </div>
            </div>

          <?php elseif ($count >= 3): ?>
            <div class="layout-collage">
              <div class="pm-card pm-card-full" data-anim>
                <img src="<?= $url($images[0]) ?>" alt="Main Project View">
                <div class="pm-overlay">
                  <span class="pm-cat">Gallery Showcase</span>
                  <h3 class="pm-title-card"><?= htmlspecialchars($displayName) ?></h3>
                </div>
              </div>
              
              <div class="col-right-stack">
                <div class="pm-card pm-card-half" data-anim data-delay="1">
                  <img src="<?= $url($images[1]) ?>" alt="Detail 1">
                </div>
                <div class="pm-card pm-card-half" data-anim data-delay="2">
                  <img src="<?= $url($images[2]) ?>" alt="Detail 2">
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div> <?php endforeach; ?>

      </div> <div class="swiper-pagination"></div>

    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  /* 1. Iniciar Swiper con configuración suave */
  var swiper = new Swiper(".projectsSwiper", {
    loop: true,
    speed: 1000, // Transición más lenta y elegante
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true
    },
    effect: "slide",
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: { spaceBetween: 20 },
      768: { spaceBetween: 30 },
      1200: { spaceBetween: 40 }
    }
  });

  /* 2. Motor de Animaciones (Intersection Observer) */
  document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
      threshold: 0.15 // Se activa cuando el 15% del elemento es visible
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target); // Solo animar una vez
        }
      });
    }, observerOptions);

    document.querySelectorAll('[data-anim]').forEach(el => {
      observer.observe(el);
    });
  });
</script>