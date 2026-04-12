<?php
// ---------------------------------------------------------
// 1. CONFIGURACIÓN DE RUTAS (CORREGIDO PARA XAMPP)
// ---------------------------------------------------------

// __DIR__ es C:\xampp\htdocs\brotherpainting\partials
// Usamos '/../' para subir a C:\xampp\htdocs\brotherpainting\

// Ruta FISICA para que PHP encuentre los archivos (Escaneo)
$baseDir = __DIR__ . '/../';
$dirImages = $baseDir . 'assets/img/gallery/';
$dirVideos = $baseDir . 'assets/video/';

// Ruta WEB para que el navegador muestre las fotos (HTML src)
// Asumimos que index.php carga esto desde la raíz del sitio
$webUrlImages = 'assets/img/gallery/';
$webUrlVideos = 'assets/video/';

// Configuración básica
if (!isset($SN)) $SN = [1 => 'General', 2 => 'Corporativo', 3 => 'Comercial', 4 => 'Digital'];
$serviceKeys = array_keys($SN);

function slugify($text)
{
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
}

// ---------------------------------------------------------
// 2. ESCANEO DE ARCHIVOS
// ---------------------------------------------------------

$GalleryImages = [];
$GalleryVideos = [];

// A. ESCANEAR IMÁGENES
if (is_dir($dirImages)) {
    // Buscamos extensiones comunes
    $patterns = ['*.jpg', '*.jpeg', '*.png', '*.webp', '*.JPG'];
    $files = [];
    foreach ($patterns as $p) {
        // glob busca en C:\xampp\htdocs\brotherpainting\assets\img\gallery\*.jpg
        $found = glob($dirImages . $p);
        if ($found) $files = array_merge($files, $found);
    }

    foreach ($files as $filePath) {
        $filename = basename($filePath);
        $rKey = $serviceKeys[array_rand($serviceKeys)];

        $GalleryImages[] = [
            'type'     => 'image',
            // Aquí usamos la ruta web: assets/img/gallery/foto.jpg
            'src'      => $webUrlImages . $filename,
            'title'    => pathinfo($filename, PATHINFO_FILENAME),
            'cat_name' => $Company
        ];
    }
} else {
    // MENSAJE DE ERROR VISIBLE SI NO ENCUENTRA LA CARPETA
    echo "<div style='color:red; background:#fee; padding:10px; border:1px solid red; margin-bottom:10px;'>
            <strong>Error de Ruta:</strong> PHP no encuentra la carpeta en: <br> $dirImages
          </div>";
}

// B. ESCANEAR VIDEOS
if (is_dir($dirVideos)) {
    $patterns = ['*.mp4', '*.webm', '*.MP4'];
    $files = [];
    foreach ($patterns as $p) {
        $found = glob($dirVideos . $p);
        if ($found) $files = array_merge($files, $found);
    }

    foreach ($files as $filePath) {
        $filename = basename($filePath);
        $rKey = $serviceKeys[array_rand($serviceKeys)];

        // Buscar poster (imagen con mismo nombre)
        $posterName = pathinfo($filename, PATHINFO_FILENAME) . '.jpg';
        $posterPath = $dirVideos . $posterName;
        $posterSrc = file_exists($posterPath) ? $webUrlVideos . $posterName : "";

        $GalleryVideos[] = [
            'type'     => 'video',
            'src'      => $webUrlVideos . $filename,
            'poster'   => $posterSrc,
            'title'    => pathinfo($filename, PATHINFO_FILENAME),
            'cat_name' => $Company
        ];
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<section class="gallery-section">
    <div class="container">

        <div class="gallery-header">
            <h2 class="section-title"><?= htmlspecialchars(t('Galeria', 'Gallery'), ENT_QUOTES, 'UTF-8') ?></h2>
            <div class="gallery-tabs-nav">
                <button class="tab-btn active" onclick="switchTab('images')">
                    <i class="fa-regular fa-images"></i> <?= htmlspecialchars(t('Fotos', 'Photos'), ENT_QUOTES, 'UTF-8') ?> (<?= count($GalleryImages) ?>)
                </button>
                <button class="tab-btn" onclick="switchTab('videos')">
                    <i class="fa-solid fa-circle-play"></i> <?= htmlspecialchars(t('Videos', 'Videos'), ENT_QUOTES, 'UTF-8') ?> (<?= count($GalleryVideos) ?>)
                </button>
            </div>
        </div>

        <div id="panel-images" class="gallery-panel active">
            <?php if (empty($GalleryImages)): ?>
                <div class="empty-state">
                    <i class="fa-regular fa-folder-open"></i>
                    <p><?= htmlspecialchars(t('No se encontraron imagenes en:', 'No images were found in:'), ENT_QUOTES, 'UTF-8') ?><br><code><?= $webUrlImages ?></code></p>
                </div>
            <?php else: ?>
                <div class="gallery-grid">
                    <?php foreach ($GalleryImages as $index => $item): ?>
                        <div class="gallery-card" onclick="openLightbox('images', <?= $index ?>)">
                            <div class="card-media">
                                <img src="<?= $item['src'] ?>" loading="lazy" alt="Proyecto">
                                <div class="card-overlay">
                                    <span class="view-icon"><i class="fa-solid fa-expand"></i></span>
                                </div>
                            </div>
                            <div class="card-info">
                                <span class="card-cat"><?= $item['cat_name'] ?></span>
                                <h3 class="card-title"><?= $item['title'] ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div id="panel-videos" class="gallery-panel">
            <?php if (empty($GalleryVideos)): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-video-slash"></i>
                    <p><?= htmlspecialchars(t('No se encontraron videos en:', 'No videos were found in:'), ENT_QUOTES, 'UTF-8') ?><br><code><?= $webUrlVideos ?></code></p>
                </div>
            <?php else: ?>
                <div class="gallery-grid">
                    <?php foreach ($GalleryVideos as $index => $item): ?>
                        <div class="gallery-card video-card" onclick="openLightbox('videos', <?= $index ?>)">
                            <div class="card-media">
                                <video src="<?= $item['src'] ?>" muted loop playsinline poster="<?= $item['poster'] ?>"></video>
                                <div class="play-btn-overlay"><i class="fa-solid fa-play"></i></div>
                            </div>
                            <div class="card-info">
                                <span class="card-cat"><?= $item['cat_name'] ?></span>
                                <h3 class="card-title"><?= $item['title'] ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<div id="lightbox-modal" class="lightbox">
    <div class="lightbox-toolbar">
        <span id="lb-counter" class="lightbox-counter"></span>
        <button class="lightbox-close" onclick="closeLightbox()"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="lightbox-wrapper">
        <button class="lightbox-nav prev" onclick="changeSlide(-1)"><i class="fa-solid fa-chevron-left"></i></button>
        <div class="lightbox-content" id="lightbox-media-container"></div>
        <button class="lightbox-nav next" onclick="changeSlide(1)"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
    <div class="lightbox-caption">
        <h3 id="lb-title"></h3>
        <p id="lb-cat"></p>
    </div>
</div>

<style>
    /* Estilos Esenciales */
    :root {
        --g-primary: #FF6825;
        --g-dark: #0f172a;
        --g-bg: #f8fafc;
    }

    .gallery-section {
        padding: 50px 0;
        background: var(--g-bg);
        font-family: sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .gallery-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .gallery-tabs-nav {
        display: inline-flex;
        gap: 10px;
        background: #e2e8f0;
        padding: 5px;
        border-radius: 50px;
    }

    .tab-btn {
        border: none;
        background: transparent;
        padding: 10px 20px;
        border-radius: 50px;
        cursor: pointer;
        color: #64748b;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
    }

    .tab-btn.active {
        background: #fff;
        color: var(--g-primary);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .gallery-panel {
        display: none;
        animation: fadeIn 0.5s;
    }

    .gallery-panel.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }

    .gallery-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        cursor: pointer;
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .card-media {
        position: relative;
        aspect-ratio: 4/3;
        background: #000;
        overflow: hidden;
    }

    .card-media img,
    .card-media video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
        display: block;
    }

    .gallery-card:hover .card-media img {
        transform: scale(1.1);
    }

    .card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.3);
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .gallery-card:hover .card-overlay {
        opacity: 1;
    }

    .view-icon {
        color: white;
        font-size: 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(4px);
    }

    .play-btn-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 2rem;
        z-index: 2;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .card-info {
        padding: 15px;
    }

    .card-cat {
        font-size: 0.8rem;
        color: var(--g-primary);
        font-weight: bold;
        text-transform: uppercase;
        display: block;
        margin-bottom: 5px;
        font-family: var(--title-font);
    }

    .card-title {
        font-size: 1rem;
        margin: 0;
        color: var(--g-dark);
    }

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #94a3b8;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 10px;
        display: block;
    }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.95);
        flex-direction: column;
    }

    .lightbox-toolbar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        z-index: 100;
    }

    .lightbox-close {
        background: none;
        border: none;
        color: white;
        font-size: 2rem;
        cursor: pointer;
    }

    .lightbox-wrapper {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .lightbox-nav {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: white;
        padding: 15px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.5rem;
        position: absolute;
        z-index: 101;
        transition: 0.2s;
    }

    .lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .lightbox-nav.prev {
        left: 20px;
    }

    .lightbox-nav.next {
        right: 20px;
    }

    .lightbox-content {
        max-width: 90%;
        max-height: 80vh;
        display: flex;
        justify-content: center;
    }

    .lightbox-content img,
    .lightbox-content video {
        max-width: 100%;
        max-height: 80vh;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .lightbox-caption {
        text-align: center;
        padding: 20px;
        color: white;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    @media(max-width: 768px) {
        .lightbox-nav {
            display: none;
        }
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // 1. DATA
        const galleryData = {
            images: <?= json_encode($GalleryImages) ?>,
            videos: <?= json_encode($GalleryVideos) ?>
        };

        let currentType = 'images';
        let currentIndex = 0;

        // ELEMENTOS DOM
        const lb = document.getElementById('lightbox-modal');
        const container = document.getElementById('lightbox-media-container');
        const title = document.getElementById('lb-title');
        const cat = document.getElementById('lb-cat');
        const counter = document.getElementById('lb-counter');
        const wrapper = document.querySelector('.lightbox-wrapper'); // Para detectar swipe

        // -------------------------------------------------
        // 2. LOGICA DE TABS Y PREVIEW
        // -------------------------------------------------

        // Video Hover Preview
        document.querySelectorAll('.video-card').forEach(card => {
            const video = card.querySelector('video');
            if (video) {
                card.addEventListener('mouseenter', () => video.play().catch(() => {}));
                card.addEventListener('mouseleave', () => {
                    video.pause();
                    video.currentTime = 0;
                });
            }
        });

        window.switchTab = (type) => {
            currentType = type;
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.gallery-panel').forEach(p => p.classList.remove('active'));

            // Activar tab y panel
            const btns = document.querySelectorAll('.tab-btn');
            if (type === 'images') btns[0].classList.add('active');
            if (type === 'videos') btns[1].classList.add('active');
            document.getElementById('panel-' + type).classList.add('active');
        };

        // -------------------------------------------------
        // 3. LOGICA LIGHTBOX (ABRIR/CERRAR/CAMBIAR)
        // -------------------------------------------------

        window.openLightbox = (type, index) => {
            if (!galleryData[type].length) return;
            currentType = type;
            currentIndex = index;
            updateContent();
            lb.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        };

        window.closeLightbox = () => {
            lb.style.display = 'none';
            container.innerHTML = '';
            const video = container.querySelector('video');
            if (video) video.pause(); // Asegurar que el video se detenga
            document.body.style.overflow = 'auto';
        };

        window.changeSlide = (dir) => {
            const len = galleryData[currentType].length;
            currentIndex = (currentIndex + dir + len) % len;
            updateContent();
        };

        function updateContent() {
            const item = galleryData[currentType][currentIndex];
            const total = galleryData[currentType].length;

            container.innerHTML = '';
            container.style.opacity = '0'; // Efecto suave

            setTimeout(() => {
                if (item.type === 'video') {
                    const v = document.createElement('video');
                    v.src = item.src;
                    v.controls = true;
                    v.autoplay = true;
                    v.playsInline = true; // Importante para iOS
                    v.style.width = '100%';
                    v.style.maxHeight = '80vh';
                    container.appendChild(v);
                } else {
                    const i = document.createElement('img');
                    i.src = item.src;
                    container.appendChild(i);
                }
                container.style.opacity = '1';
            }, 100);

            title.innerText = item.title;
            cat.innerText = item.cat_name;
            counter.innerText = (currentIndex + 1) + ' / ' + total;
        }

        // -------------------------------------------------
        // 4. NUEVO: TECLADO (FLECHAS + ESC)
        // -------------------------------------------------
        document.addEventListener('keydown', (e) => {
            // Solo si el lightbox está visible
            if (lb.style.display === 'flex') {
                if (e.key === 'ArrowLeft') changeSlide(-1);
                if (e.key === 'ArrowRight') changeSlide(1);
                if (e.key === 'Escape') closeLightbox();
            }
        });

        // -------------------------------------------------
        // 5. NUEVO: MOBILE SWIPE (GESTOS TÁCTILES)
        // -------------------------------------------------
        let touchStartX = 0;
        let touchEndX = 0;

        wrapper.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, {
            passive: true
        });

        wrapper.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, {
            passive: true
        });

        function handleSwipe() {
            // Si no está abierto, no hacer nada
            if (lb.style.display !== 'flex') return;

            const swipeThreshold = 50; // Mínima distancia para considerar swipe
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Deslizó a la izquierda -> Siguiente
                    changeSlide(1);
                } else {
                    // Deslizó a la derecha -> Anterior
                    changeSlide(-1);
                }
            }
        }
    });
</script>
