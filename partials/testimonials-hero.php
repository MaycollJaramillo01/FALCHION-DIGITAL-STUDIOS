<?php 
@session_start(); 
// 1. Carga segura de datos
if (!isset($Company)) {
    if (file_exists(__DIR__ . '/text.php')) include_once __DIR__ . '/text.php';
    elseif (file_exists(__DIR__ . '/../text.php')) include_once __DIR__ . '/../text.php';
}

// 2. Configuración de Variables para la Vista
$currentPage = $Services ?? 'Our Services'; // Título principal
$bgImage = 'assets/img/hero/services_hero.jpg'; // Imagen específica de Servicios

// Definimos el texto descriptivo usando tus variables originales
$companyName = $Company ?? 'Our Company';
$licenseText = strtolower($LicenseNote ?? 'Fully Licensed & Insured');
$areaText    = $Coverage ?? 'your service area';

// Construcción de la descripción (permitiendo HTML simple)
$heroDesc = "From interior to exterior improvements — <strong>$companyName</strong> delivers reliable, $licenseText craftsmanship for residential projects across $areaText.";

$estimateLink = ($BaseURL ?? '') . '/testimonials.php';
$estimateText = $Estimates ?? 'Request a Free Estimate';
?>

<section class="page-hero" id="services-hero">
  
  <div class="page-hero__bg">
    <img src="<?= $bgImage ?>" alt="<?= htmlspecialchars($currentPage) ?> Background" loading="eager">
    <div class="page-hero__overlay"></div>
  </div>

  <div class="container page-hero__content">
    
    <nav class="page-hero__breadcrumbs" aria-label="breadcrumb" data-anim="down" data-delay="1">
      <ul class="breadcrumbs-list">
        <li>
            <a href="<?= htmlspecialchars(falchion_url('index.php'), ENT_QUOTES, 'UTF-8') ?>">
                <i class="fa-solid fa-house"></i> Home
            </a>
        </li>
        <li class="separator"><i class="fa-solid fa-chevron-right"></i></li>
        <li class="current" aria-current="page">Testimonials</li>
      </ul>
    </nav>

    <h1 class="page-hero__title" data-anim="up" data-delay="2">
      <?= htmlspecialchars($currentPage) ?>
    </h1>

    <div class="page-hero__desc-wrapper" data-anim="up" data-delay="3">
        <span class="line"></span>
        <p class="page-hero__desc">
            <?= $heroDesc ?>
        </p>
    </div>

    <div class="page-hero__cta" data-anim="up" data-delay="4">
        <a href="<?= $estimateLink ?>" class="btn-hero-action">
            <?= htmlspecialchars($estimateText) ?> <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

  </div>
  
  <div class="page-hero__bottom-bar"></div>
</section>

<style>
/* ==============================
   PAGE HERO STYLES (Based on Template)
============================== */
:root {
    /* Asegurando variables por defecto si no están definidas globalmente */
    --brand-primary: #1a1a1a; 
    --brand-secondary: #f39c12; /* Color naranja de ejemplo */
    --brand-white: #ffffff;
    --title-font: sans-serif;
    --body-font: sans-serif;
}

.page-hero {
  position: relative;
  width: 100%;
  min-height: 500px; /* Un poco más alto para acomodar el botón */
  padding: 140px 0 100px; 
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  background-color: var(--brand-primary);
}

/* --- Background Layer --- */
.page-hero__bg {
  position: absolute;
  inset: 0;
  z-index: 1;
}

.page-hero__bg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transform: scale(1.05);
  filter: brightness(0.9);
}

.page-hero__overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(20, 20, 20, 0.85) 0%,
    rgba(20, 20, 20, 0.70) 50%,
    rgba(20, 20, 20, 0.95) 100%
  );
  z-index: 2;
}

/* --- Content Layout --- */
.page-hero__content {
  position: relative;
  z-index: 10;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--brand-white);
}

/* --- Breadcrumbs --- */
.page-hero__breadcrumbs {
  margin-bottom: 2rem;
}

.breadcrumbs-list {
  list-style: none;
  padding: 8px 24px;
  margin: 0;
  display: inline-flex;
  align-items: center;
  gap: 12px;
  font-family: var(--body-font);
  font-size: 0.85rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 50px;
  backdrop-filter: blur(5px);
}

.breadcrumbs-list a {
  color: var(--brand-white);
  text-decoration: none;
  transition: color 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
  opacity: 0.9;
}

.breadcrumbs-list a:hover,
.breadcrumbs-list .current {
  color: var(--brand-secondary);
  opacity: 1;
}

.breadcrumbs-list .separator {
  font-size: 0.7rem;
  color: var(--brand-secondary);
  opacity: 0.8;
}

/* --- Typography --- */
.page-hero__title {
  font-family: var(--title-font);
  font-size: clamp(2.8rem, 5vw, 4.5rem);
  font-weight: 800;
  line-height: 1.1;
  margin-bottom: 1.5rem;
  color: var(--brand-white);
  text-transform: uppercase;
  text-shadow: 0 5px 15px rgba(0,0,0,0.5);
}

.page-hero__desc-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  max-width: 800px;
  margin-bottom: 2.5rem; /* Espacio para el botón */
}

.page-hero__desc-wrapper .line {
  width: 80px;
  height: 4px;
  background-color: var(--brand-secondary);
  border-radius: 4px;
}

.page-hero__desc {
  font-family: var(--body-font);
  font-size: clamp(1rem, 1.2vw, 1.25rem);
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.9);
}

.page-hero__desc strong {
  color: var(--brand-white);
  font-weight: 700;
}

/* --- Button Style (Added for Services) --- */
.btn-hero-action {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background-color: var(--brand-secondary);
    color: var(--brand-white);
    padding: 16px 40px;
    border-radius: 50px;
    font-family: var(--body-font);
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}

.btn-hero-action:hover {
    background-color: var(--brand-white);
    color: var(--brand-primary);
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.4);
}

/* --- Bottom Bar --- */
.page-hero__bottom-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 6px;
  background: linear-gradient(90deg, 
    var(--brand-primary) 0%, 
    var(--brand-secondary) 50%, 
    var(--brand-primary) 100%
  );
  z-index: 10;
}

/* --- Animation Classes --- */
[data-anim] {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

[data-anim].in-view {
    opacity: 1;
    transform: translateY(0);
}

/* Delays escalonados */
[data-delay="1"].in-view { transition-delay: 0.1s; }
[data-delay="2"].in-view { transition-delay: 0.3s; }
[data-delay="3"].in-view { transition-delay: 0.5s; }
[data-delay="4"].in-view { transition-delay: 0.7s; }

/* --- Responsive --- */
@media (max-width: 768px) {
  .page-hero {
    min-height: auto;
    padding: 120px 0 80px;
  }
  .page-hero__title {
    font-size: 2.2rem;
  }
  .btn-hero-action {
      padding: 14px 30px;
      font-size: 0.9rem;
  }
}
</style>

<script>
(function() {
    'use strict';
    // Script de animación
    const section = document.getElementById('services-hero');
    if (!section) return;

    const animElements = section.querySelectorAll('[data-anim]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    animElements.forEach(el => observer.observe(el));
})();
</script>