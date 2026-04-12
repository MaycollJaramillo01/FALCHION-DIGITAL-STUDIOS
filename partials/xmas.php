<section class="xmas-video-section">
    <div class="bg-decoration"></div>

    <div class="auto-container-fixed">
        <div class="sec-title centered color-light" data-anim="slide-up">
            <span class="sub-title xmas-accent">Season's Greetings</span>
            <h2>Bringing Festive Colors To Your Home</h2>
            <div class="xmas-separator">
                <span>❄️</span>
            </div>
        </div>

        <div class="video-box-frame" data-anim="zoom-in" data-delay="2">
            <div class="video-outer-rim">
                <div class="video-inner-rim">
                    <video autoplay muted loop playsinline controls poster="assets/img/video-poster.jpg">
                        <source src="assets/video/BROTHER-PAINTING-video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
             <div class="corner-ribbon top-left"></div>
            <div class="corner-ribbon bottom-right"></div>
        </div>
    </div>
</section>
<style>
    /* =========================================
   Variables (Asegura que esto esté en tu CSS principal)
   ========================================= */
:root {
    /* Colores de la Marca existentes (Ejemplo) */
    --brand-primary: #1E1E1E;   /* Fondo oscuro */
    --brand-secondary: #FF6825; /* Naranja corporativo */
    --brand-white: #FFFFFF;

    /* NUEVOS Colores Acento Navideño */
    --xmas-red: #D42426;
    --xmas-green: #165B33;
    --xmas-gold: #F8B229;
}

/* =========================================
   Estilos de la Sección de Video Navideño
   ========================================= */

/* Contenedor principal sin porcentajes */
.xmas-video-section {
    position: relative;
    /* Usamos padding fijo en PX como solicitado */
    padding-top: 100px;
    padding-bottom: 100px;
    /* Fondo oscuro corporativo con un tinte navideño sutil */
    background-color: var(--brand-primary);
    background-image: linear-gradient(to bottom, rgba(22, 91, 51, 0.3), rgba(30, 30, 30, 1));
    overflow: hidden;
}

/* Decoración de fondo (puntos estilo nieve) */
.bg-decoration {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background-image: radial-gradient(rgba(255,255,255,0.1) 2px, transparent 2px);
    background-size: 60px 60px;
    pointer-events: none;
}

/* Contenedor de ancho fijo para centrar el contenido (reemplazo de container fluido) */
.auto-container-fixed {
    max-width: 1200px; /* Ancho máximo fijo */
    margin: 0 auto;    /* Centrado */
    padding: 0 20px;   /* Padding lateral fijo */
}

/* Estilos del Título */
.sec-title.color-light h2 {
    color: var(--brand-white);
    font-size: 42px; /* Tamaño fijo */
}

.sub-title.xmas-accent {
    color: var(--xmas-gold);
    font-weight: 700;
    letter-spacing: 3px; /* Espaciado fijo */
    text-transform: uppercase;
    display: block;
    margin-bottom: 15px;
}

/* Separador navideño con copo de nieve */
.xmas-separator {
    margin-top: 20px;
    margin-bottom: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px; /* Espacio fijo */
}
.xmas-separator::before,
.xmas-separator::after {
    content: '';
    height: 2px;
    width: 80px; /* Ancho fijo de las líneas */
    background: linear-gradient(to right, var(--xmas-red), var(--xmas-green));
}
.xmas-separator span {
    font-size: 24px;
}

/* =========================================
   El Marco del Video (Sin Porcentajes)
   ========================================= */

/* Contenedor principal del marco */
.video-box-frame {
    position: relative;
    /* Definimos un ancho fijo inicial para escritorio grande */
    width: 1000px;
    margin: 0 auto; /* Centrado */
    z-index: 2;
}

/* Borde exterior festivo (Rojo y Verde) */
.video-outer-rim {
    /* Padding fijo para crear el grosor del marco exterior */
    padding: 8px;
    background: repeating-linear-gradient(
        45deg,
        var(--xmas-red),
        var(--xmas-red) 20px,
        var(--xmas-green) 20px,
        var(--xmas-green) 40px
    );
    border-radius: 20px; /* Radio fijo */
    box-shadow: 0 30px 60px rgba(0,0,0,0.5);
}

/* Borde interior (Blanco/Dorado para separar) */
.video-inner-rim {
    border: 6px solid var(--xmas-gold); /* Borde fijo */
    background-color: #000;
    border-radius: 14px; /* Radio ligeramente menor */
    overflow: hidden;
    /* Altura fija calculada para ratio 16:9 aprox basada en el ancho del padre */
    /* (1000px ancho total - marcos) -> aprox 960px ancho útil -> 540px altura */
    height: 540px; 
    display: flex;
    align-items: center;
}

/* El video en sí */
.video-inner-rim video {
    /* Forzamos al video a llenar el contenedor de altura fija */
    width: 1000px; /* Ancho fijo igual al contenedor padre */
    height: 540px; /* Altura fija igual al contenedor padre */
    object-fit: cover;
    display: block;
}


/* (Opcional) Cintas decorativas en las esquinas */
.corner-ribbon {
    position: absolute;
    width: 100px; height: 100px;
    background: var(--xmas-red);
    z-index: 3;
}
.corner-ribbon.top-left {
    top: -10px; left: -10px;
    border-radius: 10px;
    /* Clip path para forma de lazo */
    clip-path: polygon(0 0, 100% 0, 50% 50%, 0 100%);
    background: linear-gradient(135deg, var(--xmas-gold), var(--xmas-red));
}
.corner-ribbon.bottom-right {
    bottom: -10px; right: -10px;
    border-radius: 10px;
    clip-path: polygon(100% 100%, 0 100%, 50% 50%, 100% 0);
    background: linear-gradient(135deg, var(--xmas-gold), var(--xmas-red));
}

/* =========================================
   Responsividad SIN Porcentajes
   Usamos media queries para cambiar tamaños FIJOS
   ========================================= */

/* Tablets y Pantallas Medianas */
@media only screen and (max-width: 1024px) {
    .video-box-frame, .video-inner-rim video {
        width: 800px;
    }
    .video-inner-rim, .video-inner-rim video {
        height: 450px; /* 16:9 ajustado */
    }
}

/* Tablets Pequeñas */
@media only screen and (max-width: 850px) {
    .video-box-frame, .video-inner-rim video {
        width: 600px;
    }
    .video-inner-rim, .video-inner-rim video {
        height: 338px; /* 16:9 ajustado */
    }
    .sec-title.color-light h2 { font-size: 36px; }
}

/* Móviles Landscape */
@media only screen and (max-width: 650px) {
    .video-box-frame, .video-inner-rim video {
        width: 450px;
    }
    .video-inner-rim, .video-inner-rim video {
        height: 253px;
    }
    .xmas-separator::before, .xmas-separator::after { width: 40px; }
     /* Ocultar cintas en móvil si molestan */
    .corner-ribbon { display: none; }
}

/* Móviles Portrait (Estrechos) */
@media only screen and (max-width: 480px) {
    .xmas-video-section { padding: 60px 0; }
    .sec-title.color-light h2 { font-size: 28px; }
    
    /* En pantallas muy pequeñas, usamos un ancho fijo seguro */
    .video-box-frame, .video-inner-rim video {
        width: 340px;
    }
    .video-inner-rim, .video-inner-rim video {
        height: 191px;
    }
    .auto-container-fixed { padding: 0 10px; }
}

/* =========================================
   Animaciones (Requiere el JS de IntersectionObserver)
   ========================================= */

/* Estados iniciales (antes de que el JS los active) */
[data-anim] {
    opacity: 0;
    transition: all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

/* Animación Slide Up (Título) */
[data-anim="slide-up"] {
    transform: translateY(40px); /* Desplazamiento fijo */
}

/* Animación Zoom In (Video) */
[data-anim="zoom-in"] {
    transform: scale(0.85);
}

/* Delay escalonado (si se usa el atributo data-delay en el JS) */
[data-delay="2"] { transition-delay: 0.2s; }

/* ESTADO FINAL: Cuando la clase 'in-view' es añadida por JS */
[data-anim].in-view {
    opacity: 1;
    transform: none;
}
</style>