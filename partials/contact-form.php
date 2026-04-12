<?php 
@session_start(); 
if (!isset($BrandColors)) { require_once __DIR__ . '/../text.php'; }
?>

<section class="contact-bento-section" id="contact">
    <div class="container">
        <div class="bento-contact-grid">
            
            <div class="bento-card form-container">
                <div class="card-header">
                    <h2 class="form-title">Ponte en <span class="text-neon">contacto</span></h2>
                    <p class="form-subtitle">Estamos aqui para ayudarte. Escribenos para recibir orientacion experta, una propuesta personalizada o resolver cualquier duda.</p>
                </div>

                <form class="bento-form" method="post" action="send-mail.php">
                    <div class="form-row">
                        <div class="input-group">
                            <input type="text" name="name" placeholder="Nombre" required>
                        </div>
                        <div class="input-group">
                            <input type="text" name="lastname" placeholder="Apellido" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="tel" name="phone" placeholder="Telefono" required>
                    </div>

                    <div class="input-group">
                        <input type="email" name="email" placeholder="Correo electronico" required>
                    </div>

                    <div class="input-group">
                        <textarea name="message" placeholder="Mensaje" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn-neon-submit">Enviar mensaje</button>
                </form>
            </div>

            <div class="bento-info-col">
                <div class="info-header">
                    <span class="section-tag"><i class="fa-solid fa-asterisk"></i> PREGUNTAS FRECUENTES</span>
                    <h2 class="info-title">Preguntas comunes sobre <span class="text-neon">servicios</span></h2>
                </div>

                <div class="faq-accordion">
                    <div class="faq-item active">
                        <button class="faq-question" type="button" aria-expanded="true">
                            <span>En que tipo de proyectos se especializan?</span>
                            <i class="fa-solid fa-circle-minus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Nos especializamos en soluciones digitales para negocios de servicios: creacion web, rediseño, landing pages, presencia digital, visibilidad local y optimizacion enfocada en conversion.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span>Como inicio un proyecto con su equipo?</span>
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Comparte tus objetivos y tu situacion actual por este formulario o por WhatsApp. Revisamos el alcance, enviamos una propuesta clara y arrancamos con un plan estructurado.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false">
                            <span>Ofrecen una cotizacion inicial sin compromiso?</span>
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Si. Brindamos una asesoria inicial y una estimacion de alcance sin compromiso para que puedas evaluar presupuesto, tiempos y entregables esperados.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
:root {
    --neon-green: var(--brand-secondary);
    --card-bg: var(--brand-neutral);
    --input-bg: color-mix(in srgb, var(--brand-accent) 3%, transparent);
    --border-color: color-mix(in srgb, var(--brand-accent) 8%, transparent);
}

.contact-bento-section {
    background-color: var(--brand-primary);
    color: var(--brand-accent);
    padding: 100px 0;
    font-family: 'Inter', sans-serif;
}

.bento-contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: start;
}

/* --- FORM CARD --- */
.bento-card.form-container {
    background: var(--card-bg);
    padding: 50px;
    border-radius: 30px;
    border: 1px solid var(--border-color);
}

.contact-bento-section .text-neon { color: var(--neon-green); }

.form-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 15px;
    color: var(--brand-accent);
}

.form-subtitle {
    color: color-mix(in srgb, var(--brand-accent) 55%, var(--brand-primary) 45%);
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 40px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.input-group {
    margin-bottom: 20px;
}

.input-group input, 
.input-group textarea {
    width: 100%;
    background: var(--input-bg);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 15px 20px;
    color: var(--brand-accent);
    font-size: 1rem;
    outline: none;
    transition: 0.3s;
}

.input-group input:focus, 
.input-group textarea:focus {
    border-color: var(--neon-green);
    background: color-mix(in srgb, var(--brand-secondary) 2%, transparent);
}

.btn-neon-submit {
    width: 100%;
    background: var(--neon-green);
    color: var(--brand-primary);
    border: none;
    padding: 18px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 10px;
}

.btn-neon-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px color-mix(in srgb, var(--brand-secondary) 30%, transparent);
}

/* --- FAQ SECTION --- */
.section-tag {
    color: var(--neon-green);
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 2px;
}

.info-title {
    font-size: 2.8rem;
    font-weight: 800;
    margin: 15px 0 40px;
    color: var(--brand-accent);
}

.faq-accordion {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.faq-item {
    background: transparent;
    border-bottom: 1px solid var(--border-color);
    padding: 20px 0;
}

.faq-question {
    width: 100%;
    border: 0;
    background: transparent;
    padding: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-weight: 600;
    font-size: 1.1rem;
    text-align: left;
    color: var(--brand-accent);
}

.faq-question i {
    color: var(--neon-green);
    font-size: 1.2rem;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    padding-top: 0;
    color: color-mix(in srgb, var(--brand-accent) 65%, var(--brand-primary) 35%);
    font-size: 0.95rem;
    line-height: 1.6;
    transition: max-height 0.35s ease, opacity 0.25s ease, padding-top 0.35s ease;
}

.faq-item.active .faq-answer {
    max-height: 220px;
    opacity: 1;
    padding-top: 15px;
}

@media (max-width: 991px) {
    .bento-contact-grid { grid-template-columns: 1fr; }
    .form-title { font-size: 2.2rem; }
    .info-title { font-size: 2rem; }
}
</style>

<script>
(function () {
    var accordions = document.querySelectorAll('.contact-bento-section .faq-accordion');
    if (!accordions.length) return;

    accordions.forEach(function (accordion) {
        if (accordion.dataset.faqBound === '1') return;
        accordion.dataset.faqBound = '1';

        var items = accordion.querySelectorAll('.faq-item');
        items.forEach(function (item) {
            var button = item.querySelector('.faq-question');
            if (!button) return;

            button.addEventListener('click', function () {
                var isOpen = item.classList.contains('active');

                items.forEach(function (other) {
                    other.classList.remove('active');
                    var otherBtn = other.querySelector('.faq-question');
                    var otherIcon = other.querySelector('.faq-question i');
                    if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                    if (otherIcon) otherIcon.className = 'fa-solid fa-circle-plus';
                });

                if (!isOpen) {
                    item.classList.add('active');
                    button.setAttribute('aria-expanded', 'true');
                    var icon = button.querySelector('i');
                    if (icon) icon.className = 'fa-solid fa-circle-minus';
                }
            });
        });
    });
})();
</script>
