<?php
// 1. Verificación de seguridad de datos (Misma lógica)
if (!isset($Company)) {
    if (file_exists(__DIR__ . '/text.php')) include_once __DIR__ . '/text.php';
    elseif (file_exists(__DIR__ . '/../text.php')) include_once __DIR__ . '/../text.php';
}

// 2. Configuración de Variables para esta sección
// Usamos frases del array $Phrase y contenido de $Home que habla de calidad
$introSubtitle = $Phrase[2] ?? 'Calidad real y ejecucion profesional';
$introTitle    = "Explora nuestros proyectos recientes";
$introText     = $Home[1] ?? 'Tu crecimiento es prioridad. Mostramos soluciones digitales con calidad visual, estructura clara y valor comercial.';

// 3. Preparar categorías basadas en Servicios ($SN)
// Limitamos a las primeras 4 o 5 para que no sea muy largo el menú
$categories = $SN ?? ['Estrategia', 'Web', 'Branding', 'Presencia Digital'];
?>

<section class="gallery-intro" id="gallery-intro">
    <div class="container">
        
        <div class="gallery-intro__header">
            <span class="gallery-intro__subtitle" data-anim="down" data-delay="1">
                <?= $introSubtitle ?>
            </span>
            
            <h2 class="gallery-intro__title" data-anim="up" data-delay="2">
                Resultados reales de <span class="highlight"><?= $Company ?></span>
            </h2>
            
            <div class="gallery-intro__text-wrapper" data-anim="up" data-delay="3">
                <p><?= $introText ?></p>
            </div>
        </div>

        <div class="gallery-intro__filters" data-anim="up" data-delay="4">
            <button class="filter-btn active" data-filter="all">Todos los proyectos</button>
            <?php 
            // Loop para generar botones basados en tus servicios
            if(isset($SN) && is_array($SN)): 
                $count = 0;
                foreach($SN as $id => $serviceName): 
                    if($count >= 5) break; // Limitar a 5 botones
                    // Crear un slug simple para el data-filter
                    $filterSlug = strtolower(str_replace(' ', '-', $serviceName));
            ?>
                <button class="filter-btn" data-filter="<?= $filterSlug ?>">
                    <?= $serviceName ?>
                </button>
            <?php 
                $count++;
                endforeach; 
            endif; 
            ?>
        </div>

        <div class="gallery-intro__separator" data-anim="scale" data-delay="5">
            <div class="dot"></div>
            <div class="line"></div>
            <div class="dot"></div>
        </div>

    </div>
</section>

<style>
/* ==============================
   GALLERY INTRO STYLES
   (Usa variables :root globales)
============================== */

.gallery-intro {
    padding: 100px 0 60px; /* Padding inferior reducido para pegar con la galería */
    background-color: var(--brand-neutral, #F5F5F5);
    text-align: center;
    position: relative;
}

/* --- Header Styles --- */
.gallery-intro__header {
    max-width: 800px;
    margin: 0 auto 50px;
}

.gallery-intro__subtitle {
    display: inline-block;
    font-family: var(--body-font);
    font-size: 0.9rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--brand-secondary);
    margin-bottom: 15px;
    position: relative;
    padding-left: 0;
}

.gallery-intro__title {
    font-family: var(--title-font);
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--brand-primary);
    line-height: 1.2;
    margin-bottom: 25px;
}

.gallery-intro__title .highlight {
    color: var(--brand-primary);
    position: relative;
    z-index: 1;
    display: inline-block;
}

/* Efecto de subrayado sutil en el nombre de la empresa */
.gallery-intro__title .highlight::after {
    content: '';
    position: absolute;
    bottom: 5px;
    left: 0;
    width: 100%;
    height: 12px;
    background-color: var(--brand-secondary);
    opacity: 0.2;
    z-index: -1;
    transform: skewX(-15deg);
}

.gallery-intro__text-wrapper p {
    font-family: var(--body-font);
    font-size: 1.1rem;
    line-height: 1.7;
    color: var(--body-color, #3A3A3A);
    opacity: 0.85;
}

/* --- Filter Buttons --- */
.gallery-intro__filters {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 60px;
}

.filter-btn {
    background: transparent;
    border: 1px solid rgba(0,0,0,0.1);
    padding: 12px 28px;
    border-radius: 50px;
    font-family: var(--body-font);
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--brand-primary);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.filter-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0%;
    height: 100%;
    background-color: var(--brand-secondary);
    z-index: -1;
    transition: width 0.3s ease;
}

.filter-btn:hover,
.filter-btn.active {
    border-color: var(--brand-secondary);
    color: var(--brand-white);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.filter-btn:hover::before,
.filter-btn.active::before {
    width: 100%;
}

/* --- Separator Decoration --- */
.gallery-intro__separator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    opacity: 0.5;
}

.gallery-intro__separator .dot {
    width: 6px;
    height: 6px;
    background-color: var(--brand-secondary);
    border-radius: 50%;
}

.gallery-intro__separator .line {
    width: 100px;
    height: 1px;
    background-color: var(--brand-primary);
}

/* --- Animaciones (Compatibilidad) --- */
[data-anim] {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}
[data-anim="scale"] { transform: scale(0.8); }

[data-anim].in-view {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* Responsive */
@media (max-width: 768px) {
    .gallery-intro { padding: 80px 0 40px; }
    .gallery-intro__filters { gap: 8px; }
    .filter-btn { padding: 10px 20px; font-size: 0.85rem; }
    .gallery-intro__separator .line { width: 60px; }
}
</style>

<script>
(function() {
    'use strict';
    // 1. Animaciones Scroll
    const section = document.getElementById('gallery-intro');
    if (section) {
        const animElements = section.querySelectorAll('[data-anim]');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        animElements.forEach(el => observer.observe(el));
    }

    // 2. Lógica Simple de Botones (Visual)
    const buttons = document.querySelectorAll('.filter-btn');
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remover clase active de todos
            buttons.forEach(b => b.classList.remove('active'));
            // Agregar a este
            this.classList.add('active');
            
            // Aquí iría la lógica de filtrado real (Isotope, MixItUp, etc.)
            // Por ahora es solo visual para la intro
        });
    });
})();
</script>
