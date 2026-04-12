<!--==============================
Gallery Preview (Videos)  
==============================-->
<section class="gallery-nova section" id="gallery-sec">
  <style>
    .gallery-nova {
      background: var(--smoke-color,#F8F9FA);
      padding: clamp(60px,7vw,100px) 0;
    }
    .gallery-nova__head {
      text-align: center;
      margin-bottom: clamp(30px,5vw,60px);
    }
    .gallery-nova__head .eyebrow {
      display:inline-flex;
      align-items:center;
      gap:8px;
      font:700 .9rem/1 var(--body-font,Inter);
      color:var(--brand-1,#FABA0D);
      text-transform:uppercase;
      letter-spacing:.05em;
    }
    .gallery-nova__head .title {
      font:800 clamp(26px,5vw,40px)/1.2 var(--title-font,Exo);
      color:var(--title-color,#2D6A7D);
      margin-top:10px;
    }

    /* Grid */
    .gallery-nova__grid {
      display: grid;
      gap: 20px;
      grid-template-columns: repeat(auto-fit, minmax(280px,1fr));
    }

    /* Cards de video */
    .gallery-card {
      position: relative;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0,0,0,.1);
      transform: translateY(30px);
      opacity: 0;
      animation: fadeUp 1s ease forwards;
    }
    .gallery-card video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      background:#000;
    }

    /* Overlay play icon */
    .gallery-card::after {
      content: "\f04b"; /* fa-play */
      font-family:"Font Awesome 6 Free";
      font-weight:900;
      position:absolute;
      top:50%;left:50%;
      transform:translate(-50%,-50%);
      font-size:2rem;
      color:rgba(255,255,255,.85);
      pointer-events:none;
      transition:transform .3s ease,opacity .3s ease;
      opacity:0;
    }
    .gallery-card:hover::after {
      opacity:1;
      transform:translate(-50%,-50%) scale(1.2);
    }

    /* Animación */
    @keyframes fadeUp {
      to {opacity:1; transform:translateY(0);}
    }
  </style>

  <div class="container">
    <!-- Encabezado -->
    <div class="gallery-nova__head">
      <span class="eyebrow"><i class="fas fa-video me-1"></i> Our Work</span>
      <h2 class="title">Project Highlights</h2>
    </div>

    <!-- Grid Videos -->
    <div class="gallery-nova__grid">
      <?php for($i=1;$i<=3;$i++): ?>
      <div class="gallery-card" style="animation-delay:<?=($i*0.2)?>s">
        <video 
          src="assets/img/videos/gallery_<?=$i?>.mp4" 
          autoplay muted loop playsinline 
          preload="none" loading="lazy">
        </video>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>