<?php 
@session_start(); 
// 1. Carga de datos (Robustez idéntica al ejemplo)
if (!isset($Company)) {
    if (file_exists(__DIR__ . '/text.php')) include_once __DIR__ . '/text.php';
    elseif (file_exists(__DIR__ . '/../text.php')) include_once __DIR__ . '/../text.php';
}

// 2. Configuración Lógica para Galería
// Usamos $namepage si está definido (por el ruteo de text.php), si no, 'Portfolio'
$currentTitle = isset($namepage) ? $namepage : t('Galeria', 'Gallery');
$bgImage      = 'assets/img/hero/services_hero.jpg'; // Imagen sugerida

// 3. Construcción de Descripción usando variables de text.php
// Usamos $Phrase[0] ("Give Your Home New Style") y $Experience ("12 Years of Experience")
$galleryDesc  = "Explora una seleccion visual del trabajo de <strong>$Company</strong>. " .
                "Mostramos calidad, criterio y ejecucion en cada proyecto. " .
                "Descubre como podemos " . strtolower($Phrase[0]) . ".";

// 4. Variables de Acción
$ctaLink = i18n_localized_url('contact.php');
$ctaText = t('Solicitar asesoria', 'Request consultation');
?>

<section class="page-hero" id="gallery-hero">
  
  <div class="page-hero__bg">
    <img src="<?= $bgImage ?>" alt="<?= htmlspecialchars($currentTitle) ?> <?= htmlspecialchars(t('destacado', 'featured')) ?>" loading="eager">
    <div class="page-hero__overlay"></div>
  </div>

  <div class="container page-hero__content">
    
    <nav class="page-hero__breadcrumbs" aria-label="breadcrumb" data-anim="down" data-delay="1">
      <ul class="breadcrumbs-list">
        <li>
            <a href="index.php">
                <i class="fa-solid fa-house"></i> Inicio
            </a>
        </li>
        <li class="separator"><i class="fa-solid fa-chevron-right"></i></li>
        <li class="current" aria-current="page"><?= $currentTitle ?></li>
      </ul>
    </nav>

    <h1 class="page-hero__title" data-anim="up" data-delay="2">
      <?= htmlspecialchars($currentTitle) ?>
    </h1>

    <div class="page-hero__desc-wrapper" data-anim="up" data-delay="3">
        <span class="line"></span>
        <p class="page-hero__desc">
            <?= $galleryDesc ?>
        </p>
    </div>

    <div class="page-hero__cta" data-anim="up" data-delay="4">
        <a href="<?= $ctaLink ?>" class="btn-hero-action">
            <?= htmlspecialchars($ctaText) ?> <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

  </div>
  
  <div class="page-hero__bottom-bar"></div>
</section>

<style>
/* ==============================
   GALLERY HERO SPECIFIC STYLES
   (Hereda variables de text.php)
============================== */
:root {
    /* Mapeo directo de tus variables CSS de text.php */
    --brand-primary: <?= $BrandColors['primary'] ?? '#1E1E1E' ?>;
    --brand-secondary: <?= $BrandColors['secondary'] ?? '#FF6825' ?>;
    --brand-white: <?= $BrandColors['white'] ?? '#FFFFFF' ?>;
    --brand-accent: <?= $BrandColors['accent'] ?? '#002AA7' ?>;
    
    /* Fuentes definidas en tu CSS global */
    --title-font: "Exo", sans-serif;
    --body-font: "Inter", sans-serif;
}

.page-hero {
  position: relative;
  width: 100%;
  /* Altura ajustada para galería, a veces se prefiere menos altura que en Home */
  min-height: 450px; 
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
  /* Un poco más oscuro para que resalten las fotos del portafolio abajo */
  filter: brightness(0.85); 
}

.page-hero__overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(30, 30, 30, 0.9) 0%,     /* Usando brand-primary rgb aproximado */
    rgba(30, 30, 30, 0.75) 50%,
    rgba(30, 30, 30, 0.95) 100%
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
  margin-bottom: 1.5rem;
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
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 50px;
  backdrop-filter: blur(4px);
}

.breadcrumbs-list a {
  color: var(--brand-white);
  text-decoration: none;
  transition: color 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
  opacity: 0.8;
}

.breadcrumbs-list a:hover,
.breadcrumbs-list .current {
  color: var(--brand-secondary); /* Naranja */
  opacity: 1;
}

.breadcrumbs-list .separator {
  font-size: 0.7rem;
  color: var(--brand-secondary);
}

/* --- Typography --- */
.page-hero__title {
  font-family: var(--title-font);
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 800; /* Exo Black/Bold */
  line-height: 1.1;
  margin-bottom: 1.5rem;
  color: var(--brand-white);
  text-transform: uppercase;
  letter-spacing: -1px;
}

.page-hero__desc-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  max-width: 700px;
  margin-bottom: 2.5rem;
}

.page-hero__desc-wrapper .line {
  width: 60px;
  height: 4px;
  background-color: var(--brand-secondary);
  border-radius: 4px;
}

.page-hero__desc {
  font-family: var(--body-font);
  font-size: clamp(1rem, 1.2vw, 1.2rem);
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.9);
}

.page-hero__desc strong {
  color: var(--brand-white);
  font-weight: 700;
  color: var(--brand-secondary); /* Resaltar nombre empresa */
}

/* --- Button --- */
.btn-hero-action {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background-color: var(--brand-secondary);
    color: var(--brand-white);
    padding: 15px 35px;
    border-radius: 50px;
    font-family: var(--body-font);
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    border: 2px solid var(--brand-secondary);
}

.btn-hero-action:hover {
    background-color: transparent;
    border-color: var(--brand-white);
    color: var(--brand-white);
    transform: translateY(-3px);
}

/* --- Bottom Bar --- */
.page-hero__bottom-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, 
    var(--brand-primary) 0%, 
    var(--brand-secondary) 50%, 
    var(--brand-primary) 100%
  );
  z-index: 10;
}

/* --- Animation Classes (Compatibles con tu JS) --- */
[data-anim] {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

[data-anim].in-view {
    opacity: 1;
    transform: translateY(0);
}

/* Delays para efecto cascada */
[data-delay="1"].in-view { transition-delay: 0.1s; }
[data-delay="2"].in-view { transition-delay: 0.2s; }
[data-delay="3"].in-view { transition-delay: 0.3s; }
[data-delay="4"].in-view { transition-delay: 0.4s; }

/* Responsive adjustments */
@media (max-width: 768px) {
  .page-hero { padding: 120px 0 80px; }
  .page-hero__title { font-size: 2rem; }
}
</style>

<script>
// Reutilizamos el script de intersección para las animaciones
(function() {
    'use strict';
    const section = document.getElementById('gallery-hero');
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
