<?php
// Asegúrate de que las variables de text.php estén disponibles
@session_start();
if (!isset($BrandColors)) {
    // Intenta cargar text.php asumiendo estructura estándar
    $text_path = __DIR__ . '/../text.php';
    if (file_exists($text_path)) {
        require_once $text_path;
    }
}
$ctaPrimaryUrl = $PrimaryCTAUrl ?? 'contact.php';
$ctaPrimaryLabel = !empty($Phone) ? 'Llamar: ' . $Phone : 'Solicitar llamada estrategica';
$ctaLocationLine = $Address ?? 'tu mercado';
$ctaCoverageLine = $Coverage ?? 'Estados Unidos y mercados remotos';
?>

<section class="cta-premium" id="cta-sec">

<style>
/* =========================================
   CTA PREMIUM STYLES
   ========================================= */

.cta-premium {
    /* Fondo oscuro corporativo */
    background-color: var(--brand-primary);
    padding: clamp(60px, 8vw, 120px) 0;
    position: relative;
    overflow: hidden;
    isolation: isolate;
}

/* Patrón de fondo (puntos) */
.cta-premium::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(var(--brand-secondary) 1px, transparent 1px);
    background-size: 40px 40px;
    opacity: 0.05;
    z-index: -1;
}

/* Resplandor decorativo */
.cta-premium::after {
    content: '';
    position: absolute;
    top: -50%; right: -20%;
    width: 800px; height: 800px;
    background: radial-gradient(circle, var(--brand-secondary) 0%, transparent 70%);
    opacity: 0.1;
    z-index: -2;
    pointer-events: none;
}

.cta-grid {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 60px;
    align-items: center;
}

/* --- COLUMNA IZQUIERDA (Texto) --- */
.cta-content {
    color: var(--brand-white);
    position: relative;
    z-index: 2;
}

.cta-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 50px;
    font-family: var(--body-font);
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--brand-secondary);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 25px;
    backdrop-filter: blur(4px);
}

.cta-title {
    font-family: var(--title-font);
    font-size: clamp(2rem, 5vw, 4rem); /* Responsive font size */
    font-weight: 800;
    line-height: 1.1;
    color: var(--brand-white);
    margin-bottom: 20px;
}

.cta-desc {
    font-family: var(--body-font);
    font-size: 1.1rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 35px;
    max-width: 550px;
}

.cta-features {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
}

.cta-feat-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: var(--title-font);
    font-weight: 600;
    color: var(--brand-white);
    font-size: 0.95rem;
}

.cta-feat-icon {
    color: var(--brand-secondary);
    font-size: 1.1rem;
}

/* Botones */
.cta-btn-group {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.cta-btn {
    padding: 16px 36px;
    border-radius: 50px;
    font-family: var(--title-font);
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
}

.cta-btn-primary {
    background: var(--brand-secondary);
    color: var(--brand-white);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    border: 2px solid var(--brand-secondary);
}

.cta-btn-primary:hover {
    background: var(--brand-white);
    color: var(--brand-secondary); /* Invertido para contraste */
    border-color: var(--brand-white);
    transform: translateY(-3px);
}

.cta-btn-outline {
    border: 2px solid rgba(255,255,255,0.3);
    color: var(--brand-white);
    background: transparent;
}

.cta-btn-outline:hover {
    border-color: var(--brand-white);
    background: var(--brand-white);
    color: var(--brand-primary);
}

/* --- COLUMNA DERECHA (Tarjeta Flotante) --- */
.cta-card-wrapper {
    position: relative;
    padding: 10px; /* Espacio para los dots */
}

.cta-card {
    background: var(--brand-white);
    padding: 40px;
    border-radius: var(--radius-card, 20px);
    box-shadow: var(--shadow-strong);
    position: relative;
    z-index: 2;
    overflow: hidden; /* Para contener el borde dashed */
}

/* Borde punteado interno decorativo */
.cta-card::before {
    content: '';
    position: absolute;
    top: 15px; left: 15px; right: 15px; bottom: 15px;
    border: 2px dashed var(--line, #e5e5e5);
    border-radius: 12px;
    pointer-events: none;
}

.cta-card-title {
    font-family: var(--title-font);
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--brand-primary);
    text-align: center;
    margin-bottom: 30px;
}

.cta-info-list {
    display: flex;
    flex-direction: column;
    gap: 25px;
    position: relative;
    z-index: 3;
}

.cta-info-item {
    display: flex;
    align-items: center;
    gap: 15px;
}

.cta-icon-circle {
    width: 50px; height: 50px;
    background: rgba(255, 104, 37, 0.1); /* Naranja suave fijo o usar var si existe opacity */
    background: color-mix(in srgb, var(--brand-secondary), transparent 90%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-secondary);
    font-size: 1.2rem;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}

.cta-info-item:hover .cta-icon-circle {
    transform: scale(1.1);
    background: var(--brand-secondary);
    color: var(--brand-white);
}

.cta-info-text {
    overflow: hidden; /* Previene desbordamiento de texto */
}

.cta-info-text strong {
    display: block;
    font-family: var(--title-font);
    color: var(--brand-primary);
    font-size: 1.1rem;
    line-height: 1.3;
}

.cta-info-text span {
    display: block;
    font-family: var(--body-font);
    color: var(--muted-text);
    font-size: 0.85rem;
    margin-bottom: 3px;
}

/* Dots decorativos detrás */
.cta-card-dots {
    position: absolute;
    bottom: -20px; left: -20px;
    width: 150px; height: 150px;
    background-image: radial-gradient(var(--brand-white) 2px, transparent 2px);
    background-size: 15px 15px;
    opacity: 0.2;
    z-index: 1;
}

/* =========================================
   RESPONSIVE LOGIC
   ========================================= */

/* Tablets y Laptops Pequeñas (max 991px) */
@media (max-width: 991px) {
    .cta-grid {
        grid-template-columns: 1fr; /* Una columna */
        text-align: center;
        gap: 50px;
    }

    .cta-badge, .cta-desc, .cta-features, .cta-btn-group {
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-card-wrapper {
        max-width: 550px; /* Limitar ancho tarjeta */
        margin: 0 auto;
    }

    .cta-info-list {
        text-align: left; /* Mantener lista alineada a la izquierda dentro de la tarjeta */
    }
}

/* Móviles (max 576px) */
@media (max-width: 576px) {
    .cta-premium {
        padding: 60px 0;
    }

    .cta-title {
        font-size: 2rem; /* Título más pequeño */
    }

    .cta-btn-group {
        flex-direction: column; /* Botones apilados */
        width: 100%;
        gap: 12px;
    }

    .cta-btn {
        width: 100%; /* Botón ancho completo */
    }

    .cta-card {
        padding: 30px 20px; /* Menos padding lateral */
    }

    .cta-card::before {
        top: 10px; left: 10px; right: 10px; bottom: 10px;
    }

    .cta-info-item {
        /* En pantallas muy pequeñas, apilamos icono y texto si es necesario */
        flex-direction: row; 
        align-items: center;
    }
    
    .cta-info-text strong {
        font-size: 1rem;
        word-break: break-word; /* Evitar que emails largos rompan el layout */
    }
}

/* Móviles Muy Pequeños (max 380px) */
@media (max-width: 380px) {
    .cta-info-item {
        flex-direction: column;
        text-align: center;
    }
    .cta-info-list {
        text-align: center;
    }
}

/* =========================================
   ANIMACIONES
   ========================================= */
[data-anim] {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s cubic-bezier(0.2, 0.8, 0.2, 1), transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
}

.in-view {
    opacity: 1 !important;
    transform: none !important;
}

[data-delay="1"] { transition-delay: 0.1s; }
[data-delay="2"] { transition-delay: 0.2s; }
[data-delay="3"] { transition-delay: 0.3s; }

</style>

<div class="container"> <div class="cta-grid">
        
        <div class="cta-content">
            <div data-anim="up">
                <span class="cta-badge">
                    <i class="fa-solid fa-star"></i> <?= htmlspecialchars($Experience) ?>
                </span>
            </div>
            
            <h2 class="cta-title" data-anim="up" data-delay="1">
                <?= htmlspecialchars(t('Listo para elevar tu', 'Ready to elevate your'), ENT_QUOTES, 'UTF-8') ?> <br>
                <span style="color: var(--brand-secondary);"><?= htmlspecialchars(t('presencia digital?', 'digital presence?'), ENT_QUOTES, 'UTF-8') ?></span>
            </h2>
            
            <p class="cta-desc" data-anim="up" data-delay="2">
                <?= htmlspecialchars($Company) ?> <?= htmlspecialchars(t('ayuda a marcas ambiciosas a verse mas profesionales, comunicar con claridad y lanzar activos digitales que respaldan su crecimiento.', 'helps ambitious brands look more professional, communicate clearly, and launch digital assets that support their growth.'), ENT_QUOTES, 'UTF-8') ?>
                <?= htmlspecialchars(t('Contactanos hoy para una asesoria estrategica enfocada en tu siguiente paso en', 'Contact us today for a strategic consultation focused on your next step in'), ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($ctaLocationLine) ?>.
            </p>

            <div class="cta-features" data-anim="up" data-delay="2">
                <div class="cta-feat-item">
                    <i class="fa-solid fa-circle-check cta-feat-icon"></i> <?= htmlspecialchars(t('Ejecucion estrategica', 'Strategic execution'), ENT_QUOTES, 'UTF-8') ?>
                </div>
                <div class="cta-feat-item">
                    <i class="fa-solid fa-circle-check cta-feat-icon"></i> <?= htmlspecialchars($Estimates) ?>
                </div>
                <div class="cta-feat-item">
                    <i class="fa-solid fa-circle-check cta-feat-icon"></i> <?= htmlspecialchars(t('Presentacion premium de marca', 'Premium brand presentation'), ENT_QUOTES, 'UTF-8') ?>
                </div>
            </div>

            <div class="cta-btn-group" data-anim="up" data-delay="3">
                <a href="<?= htmlspecialchars($ctaPrimaryUrl, ENT_QUOTES, 'UTF-8') ?>" class="cta-btn cta-btn-primary">
                    <i class="fa-solid fa-phone"></i> <?= htmlspecialchars($ctaPrimaryLabel) ?>
                </a>
                <a href="<?= htmlspecialchars(i18n_localized_url('contact.php'), ENT_QUOTES, 'UTF-8') ?>" class="cta-btn cta-btn-outline">
                    <?= htmlspecialchars(t('Solicitud online', 'Online request'), ENT_QUOTES, 'UTF-8') ?>
                </a>
            </div>
        </div>

        <div class="cta-card-wrapper" data-anim="left" data-delay="2">
            <div class="cta-card-dots"></div>
            <div class="cta-card">
                <h3 class="cta-card-title"><?= htmlspecialchars(t('Contacto rapido', 'Fast contact'), ENT_QUOTES, 'UTF-8') ?></h3>
                
                <div class="cta-info-list">
                    <div class="cta-info-item">
                        <div class="cta-icon-circle">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="cta-info-text">
                            <span><?= htmlspecialchars(t('Prefieres una conversacion directa?', 'Prefer a direct conversation?'), ENT_QUOTES, 'UTF-8') ?></span>
                            <strong>
                                <a href="<?= htmlspecialchars($ctaPrimaryUrl, ENT_QUOTES, 'UTF-8') ?>" style="color: inherit; text-decoration: none;">
                                    <?= htmlspecialchars($ctaPrimaryLabel) ?>
                                </a>
                            </strong>
                        </div>
                    </div>

                    <div class="cta-info-item">
                        <div class="cta-icon-circle">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="cta-info-text">
                            <span><?= htmlspecialchars(t('Envianos un correo', 'Send us an email'), ENT_QUOTES, 'UTF-8') ?></span>
                            <strong>
                                <a href="<?= $MailRef ?>" style="color: inherit; text-decoration: none;">
                                    <?= htmlspecialchars($Mail) ?>
                                </a>
                            </strong>
                        </div>
                    </div>

                    <div class="cta-info-item">
                        <div class="cta-icon-circle">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div class="cta-info-text">
                            <span><?= htmlspecialchars(t('Nuestra area de servicio', 'Our service area'), ENT_QUOTES, 'UTF-8') ?></span>
                            <strong><?= htmlspecialchars($ctaCoverageLine) ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('#cta-sec [data-anim]').forEach(el => observer.observe(el));
});
</script>
