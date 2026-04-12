<?php
// Fallback para evitar que los textos se vean vacios si no existe text.php
$About = isset($About) ? $About : [t('Impulsamos el crecimiento digital con precision y estrategia creativa.', 'We drive digital growth with precision and creative strategy.')];
$SN = isset($SN) ? $SN : ["", t('Estrategia Digital', 'Digital Strategy'), t('Optimizacion SEO', 'SEO Optimization'), t('Marketing de Contenidos', 'Content Marketing')];
$ExSD = isset($ExSD) ? $ExSD : ["", t('Planes a la medida para tu marca.', 'Plans tailored to your brand.'), t('Mejor posicionamiento en buscadores.', 'Stronger search visibility.'), t('Historias que conectan y convierten.', 'Stories that connect and convert.')];
$aboutUrl = i18n_localized_url('about.php');
?>

<section class="about-modern" id="about-section">
    <div class="container about-modern__grid">
        <div class="about-modern__images">
            <div class="pill-frame frame-1">
                <img src="assets/img/hero/1.jpg" alt="Equipo" width="300" height="420" loading="lazy" decoding="async" onerror="this.src='assets/img/normal/about_3.jpg'">
            </div>
            <div class="pill-frame frame-2">
                <img src="assets/img/hero/2.jpg" alt="Trabajo" width="320" height="500" loading="lazy" decoding="async" onerror="this.src='assets/img/hero/hero2.jpg'">
            </div>
            <span class="about-spark" aria-hidden="true">&#10022;</span>

            <div class="badge-wrapper">
                <div class="badge-inner">
                    <svg viewBox="0 0 100 100">
                        <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="transparent"/>
                        <text font-size="7.5" style="fill:var(--brand-secondary);" font-weight="bold" letter-spacing="3">
                            <textPath xlink:href="#circlePath"><?= htmlspecialchars(t('CONOCE MAS', 'LEARN MORE'), ENT_QUOTES, 'UTF-8') ?> &#8226; <?= htmlspecialchars(t('CONOCE MAS', 'LEARN MORE'), ENT_QUOTES, 'UTF-8') ?> &#8226; <?= htmlspecialchars(t('CONOCE MAS', 'LEARN MORE'), ENT_QUOTES, 'UTF-8') ?> &#8226;</textPath>
                        </text>
                    </svg>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </div>
            </div>
        </div>

        <div class="about-modern__content">
            <div class="section-label">
                <i class="fa-solid fa-asterisk"></i> <span><?= htmlspecialchars(t('SOBRE NUESTRA AGENCIA', 'ABOUT OUR AGENCY'), ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <h2 class="main-title">
                <?= htmlspecialchars(t('Impulsamos el', 'We drive'), ENT_QUOTES, 'UTF-8') ?> <span class="neon-text"><?= htmlspecialchars(t('crecimiento', 'growth'), ENT_QUOTES, 'UTF-8') ?></span> <?= htmlspecialchars(t('con', 'with'), ENT_QUOTES, 'UTF-8') ?> <br>
                <?= htmlspecialchars(t('soluciones digitales mas inteligentes', 'smarter digital solutions'), ENT_QUOTES, 'UTF-8') ?>
            </h2>

            <p class="description"><?= $About[0] ?></p>

            <div class="features-list">
                <?php for($i=1; $i<=3; $i++): ?>
                <div class="glass-card">
                    <div class="card-icon">
                        <i class="fa-solid <?= ['','fa-microchip','fa-chart-line','fa-bolt'][$i] ?>"></i>
                    </div>
                    <div class="card-info">
                        <h3><?= $SN[$i] ?></h3>
                        <p><?= $ExSD[$i] ?></p>
                    </div>
                </div>
                <?php endfor; ?>
            </div>

            <a href="<?= htmlspecialchars($aboutUrl, ENT_QUOTES, 'UTF-8') ?>" class="modern-btn">
                <?= htmlspecialchars(t('Conoce mas', 'Learn more'), ENT_QUOTES, 'UTF-8') ?> <span class="btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
            </a>
        </div>
    </div>
</section>

<style>
/* Reset y variables */
:root {
    --neon: var(--brand-secondary);
    --dark: var(--brand-primary);
    --glass: color-mix(in srgb, var(--brand-accent) 5%, transparent);
}

.about-modern {
    position: relative;
    padding: 90px 0;
    background: var(--dark);
    color: var(--brand-accent);
    overflow: hidden;
    min-height: auto;
}

.about-modern__grid {
    position: relative;
    z-index: 5;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

/* Imagenes estilo pildora */
.about-modern__images {
    position: relative;
    height: 700px;
    display: flex;
    align-items: center;
}

.pill-frame {
    position: absolute;
    border-radius: 220px;
    overflow: hidden;
    border: 2px solid color-mix(in srgb, var(--brand-accent) 22%, transparent);
    box-shadow: 0 24px 64px color-mix(in srgb, var(--brand-primary) 82%, transparent);
}

.frame-1 { width: 300px; height: 420px; left: 10px; top: 36px; z-index: 3; }
.frame-2 { width: 320px; height: 500px; right: 0; top: 140px; z-index: 2; opacity: 0.95; }

.pill-frame img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
.pill-frame:hover img { transform: scale(1.1); }

.about-spark {
    position: absolute;
    top: 84px;
    left: 58%;
    z-index: 8;
    font-size: 3rem;
    line-height: 1;
    color: var(--brand-secondary);
    text-shadow: 0 0 20px color-mix(in srgb, var(--brand-secondary) 55%, transparent);
}

/* Badge rotativo */
.badge-wrapper {
    position: absolute;
    bottom: 62px;
    left: 112px;
    z-index: 10;
}

.badge-inner {
    width: 130px;
    height: 130px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: color-mix(in srgb, var(--brand-primary) 80%, transparent);
    border-radius: 50%;
}

.badge-inner svg { position: absolute; width: 100%; height: 100%; animation: spin 10s linear infinite; }
.badge-inner i { color: var(--neon); font-size: 1.5rem; }

@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

/* Contenido */
.section-label { color: var(--neon); font-weight: 700; font-size: 0.9rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
.main-title { font-size: 3.5rem; font-weight: 800; line-height: 1.1; margin-bottom: 25px; color: var(--brand-accent) !important; text-shadow: 0 6px 18px rgba(0,0,0,0.35); }
.neon-text { color: var(--neon); text-shadow: 0 0 15px color-mix(in srgb, var(--brand-secondary) 50%, transparent); }
.description { color: color-mix(in srgb, var(--brand-accent) 65%, var(--brand-primary) 35%); margin-bottom: 40px; font-size: 1.1rem; max-width: 500px; }

/* Tarjetas glassmorphism */
.glass-card {
    display: flex;
    gap: 20px;
    background: var(--glass);
    backdrop-filter: blur(10px);
    padding: 25px;
    border-radius: 20px;
    border: 1px solid color-mix(in srgb, var(--brand-accent) 10%, transparent);
    margin-bottom: 15px;
    transition: 0.3s ease;
}

.glass-card:hover { border-color: var(--neon); background: color-mix(in srgb, var(--brand-secondary) 5%, transparent); transform: translateX(10px); }
.card-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    background: color-mix(in srgb, var(--brand-accent) 8%, transparent);
    border: 1px solid color-mix(in srgb, var(--brand-accent) 18%, transparent);
    color: var(--brand-accent) !important;
}

.card-icon i {
    color: var(--brand-accent) !important;
    opacity: 1 !important;
    font-size: 1.25rem;
}
.card-info h3 { font-size: 1.3rem; margin-bottom: 5px; color: var(--brand-accent) !important; }
.card-info p { color: color-mix(in srgb, var(--brand-accent) 55%, var(--brand-primary) 45%); font-size: 0.95rem; margin: 0; }

/* Boton */
.modern-btn {
    display: inline-flex;
    align-items: center;
    gap: 20px;
    background: var(--brand-accent);
    color: var(--brand-primary);
    padding: 10px 10px 10px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    margin-top: 20px;
}

.btn-icon { background: var(--neon); width: 45px; height: 45px; border-radius: 50%; display: grid; place-items: center; color: var(--brand-primary); }

@media (max-width: 991px) {
    .about-modern__grid { grid-template-columns: 1fr; }
    .about-modern__images { height: 620px; }
    .frame-1 { width: 250px; height: 360px; left: 0; top: 24px; }
    .frame-2 { width: 255px; height: 390px; right: 0; top: 170px; }
    .about-spark { top: 64px; left: 50%; transform: translateX(-50%); font-size: 2.4rem; }
    .badge-wrapper { left: 68px; bottom: 36px; }
}

@media (max-width: 575px) {
    .about-modern__images { height: 560px; }
    .frame-1 { width: 190px; height: 300px; left: 6px; top: 18px; }
    .frame-2 { width: 205px; height: 340px; right: 6px; top: 150px; }
    .about-spark { top: 52px; left: 52%; font-size: 1.95rem; }
    .badge-wrapper { left: 38px; bottom: 18px; }
    .badge-inner { width: 108px; height: 108px; }
}
</style>
