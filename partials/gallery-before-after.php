<?php @session_start();
require_once __DIR__ . '/../text.php'; ?>
<!-- ==============================
     BEFORE & AFTER – REYES DG PAINTING LLC
============================== -->
<section class="before-after-nova section" id="before-after">
    <style>
        :root {
            --ba-primary: <?php echo $BrandColors['primary']; ?>;
            --ba-secondary: <?php echo $BrandColors['secondary']; ?>;
            --ba-white: <?php echo $BrandColors['white']; ?>;
        }

        .before-after-nova {
            background: var(--ba-primary);
            color: var(--ba-white);
            padding: clamp(60px, 7vw, 100px) 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .before-after-nova::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.12), transparent 60%);
            z-index: 0;
        }

        .ba__head {
            position: relative;
            z-index: 2;
            margin-bottom: clamp(40px, 6vw, 70px);
        }

        .ba__head .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font: 700 .9rem/1 var(--body-font, Inter);
            color: var(--ba-secondary);
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .ba__head .title {
            font: 800 clamp(28px, 5vw, 42px)/1.2 var(--title-font, Exo);
            color: var(--ba-white);
            margin-top: 10px;
        }

        /* GRID */
        .ba__grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 40px;
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        /* CARD */
        .ba-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .3);
            transform: translateY(30px);
            opacity: 0;
            animation: fadeUp .8s ease forwards;
            background: #000;
            aspect-ratio: 4/3;
        }

        .ba-card:nth-child(1) {
            animation-delay: .1s;
        }

        .ba-card:nth-child(2) {
            animation-delay: .25s;
        }

        .ba-card:nth-child(3) {
            animation-delay: .4s;
        }

        /* SLIDER */
        .ba-slider {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            cursor: ew-resize;
            border-radius: 16px;
        }

        .ba-slider img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: clip-path .3s ease;
        }

        .ba-slider .after-img {
            clip-path: inset(0 0 0 50%);
            z-index: 2;
        }

        .ba-handle {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            background: var(--ba-secondary);
            z-index: 3;
            cursor: ew-resize;
            transition: background .3s ease;
        }

        .ba-handle::before {
            content: "\f0ec";
            /* Código del icono fa-arrows-left-right */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            /* Importante: usar solid (900) */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            color: var(--ba-secondary);
            background: var(--ba-primary);
            border-radius: 50%;
            width: 38px;
            height: 38px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 10px rgba(0, 0, 0, .25);
            border: 2px solid var(--ba-secondary);
        }


        .ba-label {
            position: absolute;
            top: 12px;
            font: 700 .8rem/1 var(--body-font, Inter);
            padding: 6px 10px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: .04em;
            z-index: 4;
        }

        .ba-label.before {
            left: 12px;
            background: var(--ba-secondary);
            color: var(--ba-primary);
        }

        .ba-label.after {
            right: 12px;
            background: var(--ba-secondary);
            color: var(--ba-primary);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container">
        <div class="ba__head">
            <span class="eyebrow"><i class="fa-solid fa-paint-roller"></i> Transformations</span>
            <h2 class="title">Before & After Projects</h2>
        </div>

        <div class="ba__grid">
            <!-- CARD 1 -->
            <div class="ba-card">
                <div class="ba-slider">
                    <img data-anim="fade"  src="assets/img/gallery/before1.jpg" alt="Before bathroom" class="before-img">
                    <img data-anim="fade"  src="assets/img/gallery/after1.jpg" alt="After bathroom" class="after-img">
                    <div class="ba-handle"></div>
                    <span class="ba-label before">Before</span>
                    <span class="ba-label after">After</span>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="ba-card">
                <div class="ba-slider">
                    <img data-anim="fade"  src="assets/img/gallery/before2.jpg" alt="Before living room" class="before-img">
                    <img data-anim="fade"  src="assets/img/gallery/after2.jpg" alt="After living room" class="after-img">
                    <div class="ba-handle"></div>
                    <span class="ba-label before">Before</span>
                    <span class="ba-label after">After</span>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="ba-card">
                <div class="ba-slider">
                    <img data-anim="fade"  src="assets/img/gallery/before3.jpg" alt="Before kitchen" class="before-img">
                    <img data-anim="fade"  src="assets/img/gallery/after3.jpg" alt="After kitchen" class="after-img">
                    <div class="ba-handle"></div>
                    <span class="ba-label before">Before</span>
                    <span class="ba-label after">After</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.ba-slider').forEach(slider => {
            const afterImg = slider.querySelector('.after-img');
            const handle = slider.querySelector('.ba-handle');
            let active = false;

            const move = x => {
                const rect = slider.getBoundingClientRect();
                let pos = ((x - rect.left) / rect.width) * 100;
                pos = Math.max(0, Math.min(pos, 100));
                afterImg.style.clipPath = `inset(0 0 0 ${pos}%)`;
                handle.style.left = `${pos}%`;
            };

            handle.addEventListener('mousedown', () => active = true);
            window.addEventListener('mouseup', () => active = false);
            window.addEventListener('mousemove', e => active && move(e.clientX));

            // Touch (móviles)
            handle.addEventListener('touchstart', () => active = true);
            window.addEventListener('touchend', () => active = false);
            window.addEventListener('touchmove', e => active && move(e.touches[0].clientX));

            // Inicial
            move(slider.getBoundingClientRect().left + slider.offsetWidth / 2);
        });
    </script>
</section>