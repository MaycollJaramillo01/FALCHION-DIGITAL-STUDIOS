
<!-- ===================== REVIEWS SECTION (2 columnas, autoplay infinito) ===================== -->

<section id="reviews-sec" class="reviews-min section" aria-labelledby="reviewsTitle">
  <style>
    .reviews-min {
      background: var(--bg, #fff);
      padding-block: clamp(48px, 7vw, 96px);
    }

    .reviews-min__head {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-end;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
      animation: fadeInUp 0.8s ease both;
    }

    .reviews-min .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 999px;
      background: var(--smoke-color2, #F1F5F9);
      color: var(--txt-1, #0D0D0D);
      font: 700 .9rem/1 var(--body-font, Inter);
      animation: fadeIn 1s ease both;
    }

    .reviews-min .title {
      margin: .5rem 0 0;
      font: 900 clamp(22px, 3vw, 30px)/1.15 var(--title-font, Exo);
      color: var(--title-color, #000);
      animation: slideInLeft 1s ease both;
    }

    .reviews-min .lead {
      margin: .25rem 0 0;
      color: var(--body-color, #333);
      animation: fadeIn 1.2s ease both;
    }

    /* Cards */
    .rvw {
      background: #fff;
      border: 1px solid var(--th-border-color, #E5E7EB);
      border-radius: 14px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, .06);
      padding: 14px;
      display: flex;
      flex-direction: column;
      gap: 8px;
      min-height: 180px;
      margin: 10px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeUpCard 0.8s ease forwards;
    }

    .swiper-slide:nth-child(1) .rvw {
      animation-delay: 0.2s;
    }

    .swiper-slide:nth-child(2) .rvw {
      animation-delay: 0.4s;
    }

    .swiper-slide:nth-child(3) .rvw {
      animation-delay: 0.6s;
    }

    .swiper-slide:nth-child(4) .rvw {
      animation-delay: 0.8s;
    }

    .swiper-slide:nth-child(5) .rvw {
      animation-delay: 1s;
    }

    .rvw__head {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 6px;
      align-items: center
    }

    .rvw__avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      background: var(--brand-3, #FFFFFF);
      border: 1px solid var(--th-border-color, #E5E7EB);
      font: 800 .85rem/1 var(--body-font, Inter);
      color: var(--brand-2, #000)
    }

    .rvw__name {
      font: 700 .95rem/1.1 var(--body-font, Inter);
      color: var(--title-color, #000)
    }

    .rvw__meta {
      grid-column: 2/span 1;
      color: var(--gray-color, #9CA3AF);
      font-size: .78rem
    }

    .rvw__stars {
      display: inline-flex;
      gap: 2px
    }

    .rvw__stars svg {
      width: 14px;
      height: 14px;
      fill: var(--brand-1, #D93030)
    }

    .rvw__text {
      margin: 2px 0 0;
      color: var(--body-color, #333);
      font-size: .9rem;
    }

    /* Swiper ajustes */
    .reviews-swiper {
      padding-bottom: 40px
    }

    .swiper-pagination-bullet {
      background: #000;
      opacity: .3
    }

    .swiper-pagination-bullet-active {
      background: var(--brand-1, #D93030);
      opacity: 1
    }

    /* Botón */
    .btn-secondary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 12px 22px;
      border-radius: 999px;
      border: 2px solid var(--brand-2, #0F172A);
      text-decoration: none;
      font: 700 0.95rem/1 var(--body-font, Inter, sans-serif);
      color: var(--brand-2, #0F172A);
      background: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
      transition: all 0.3s ease;
      animation: fadeInUp 1s ease both;
      animation-delay: 1s;
    }

    .btn-secondary:hover {
      background: var(--brand-2, #0F172A);
      color: #fff;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    /* Animaciones */
    @keyframes fadeUpCard {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-40px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>

  <?php
  // Fuente del enlace a Google
  $google_reviews_url = $google ?? ($links['google_share'] ?? '#');

  $reviews = [

  [
    "name" => "Laura Bennett",
    "meta" => "3 reviews",
    "when" => "3 months ago",
    "rating" => 5,
    "text" =>
    "Jireh Painting did a phenomenal job on our living room and hallway. The attention to detail is outstanding. They covered everything perfectly, no mess, no rush, and the final result looks like a brand-new home. Very professional and friendly team!"
  ],

  [
    "name" => "Christopher Wood",
    "meta" => "Local Guide · 41 reviews",
    "when" => "4 months ago",
    "rating" => 5,
    "text" =>
    "Impressed from start to finish. They arrived on time, explained every step, and delivered excellent workmanship on our exterior siding. The trim looks sharp and the paint finish is flawless. Would absolutely hire them again."
  ],

  [
    "name" => "Diana Rojas",
    "meta" => "1 review",
    "when" => "6 months ago",
    "rating" => 5,
    "text" =>
    "Exceptional customer service! They refinished my kitchen cabinets and transformed the entire space. Smooth finish, perfect color, and great communication during the whole process."
  ],

  [
    "name" => "Patrick Sanders",
    "meta" => "5 reviews",
    "when" => "2 months ago",
    "rating" => 5,
    "text" =>
    "Super fast response and very honest pricing. They pressure washed my deck and driveway — everything looks brighter and cleaner than it has in years. Great value and great service."
  ],

  [
    "name" => "Elena Martínez",
    "meta" => "7 reviews · 12 photos",
    "when" => "5 months ago",
    "rating" => 5,
    "text" =>
    "I’m very picky with finishes, and this company surpassed my expectations. Clean edges, smooth walls, no drips. They worked neatly and were very respectful of our home. Highly recommended."
  ],

  [
    "name" => "John Peters",
    "meta" => "2 reviews",
    "when" => "3 months ago",
    "rating" => 5,
    "text" =>
    "The team was very professional and friendly. They repaired some drywall issues and repainted the entire area. Everything blends perfectly now — you’d never know it had damage before."
  ],

  [
    "name" => "Samantha Howard",
    "meta" => "Local Guide · 128 reviews",
    "when" => "7 months ago",
    "rating" => 5,
    "text" =>
    "Top-tier company. Great communication, fair prices, and premium results. The crew kept everything clean and stayed on schedule, which I really appreciated. Will use them again for future projects."
  ],

  [
    "name" => "Miguel Arce",
    "meta" => "4 reviews",
    "when" => "2 months ago",
    "rating" => 5,
    "text" =>
    "Very pleased with the carpentry repairs and painting they did in our home. They fixed some trim, patched a few areas, and everything looks seamless. Excellent craftsmanship."
  ],

  [
    "name" => "Karen Phillips",
    "meta" => "3 reviews",
    "when" => "4 months ago",
    "rating" => 5,
    "text" =>
    "I’ve worked with multiple contractors before but Jireh Painting stands out. They’re punctual, polite, and deliver exactly what they promise. Great experience overall."
  ],

  [
    "name" => "David Burton",
    "meta" => "1 review",
    "when" => "1 month ago",
    "rating" => 5,
    "text" =>
    "Amazing job on our office repainting! The team worked quietly and efficiently, minimizing disruption. Everything looks fresh and professional. Strongly recommended for commercial work."
  ]

];


  $reviewCount = count($reviews);
  $avg = 5.0; // todas son 5★

  function initials($n)
  {
    $p = preg_split('/\s+/', trim($n));
    return strtoupper(mb_substr($p[0], 0, 1) . (isset($p[1]) ? mb_substr($p[1], 0, 1) : ''));
  }
  function stars($n = 5)
  {
    $s = '';
    for ($i = 1; $i <= 5; $i++) {
      $s .= '<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.6 5.3 5.9.9-4.2 4.2 1 5.8L10 15.8 4.7 17.7l1-5.8L1.5 7.7l5.9-.9L10 1.5z"/></svg>';
    }
    return $s;
  }
  ?>

  <div class="container">
    <!-- Encabezado -->
    <div class="reviews-min__head">
      <div>
        <span class="eyebrow"><i class="fas fa-star"></i> What people say</span>
        <h2 id="reviewsTitle" class="title">5-Star Reviews for <?= htmlspecialchars($Company ?? '', ENT_QUOTES) ?></h2>
        <p class="lead">Real experiences from customers who trusted us.</p>
      </div>
      <a class="rating-pill" href="<?= htmlspecialchars($google_reviews_url, ENT_QUOTES) ?>" target="_blank" rel="noopener">
        ★ <?= number_format($avg, 1) ?> · <?= $reviewCount ?> Google reviews
      </a>
    </div>

    <!-- Swiper -->
    <div class="swiper reviews-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($reviews as $r): ?>
          <div class="swiper-slide">
            <article class="rvw" itemscope itemtype="https://schema.org/Review">
              <header class="rvw__head">
                <span class="rvw__avatar"><?= initials($r['name']) ?></span>
                <strong class="rvw__name"><?= htmlspecialchars($r['name']) ?></strong>
                <span class="rvw__stars"><?= stars($r['rating']) ?></span>
                <span class="rvw__meta"><?= htmlspecialchars($r['meta'] . ' · ' . $r['when']) ?></span>
              </header>
              <p class="rvw__text"><?= htmlspecialchars($r['text']) ?></p>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Paginación -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- CTA -->
    <div class="reviews-min__foot" style="text-align:center;margin-top:20px;">
      <a
        href="<?= htmlspecialchars($google_reviews_url, ENT_QUOTES) ?>"
        target="_blank"
        rel="noopener"
        style="
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      padding:12px 28px;
      border-radius:999px;
      border:2px solid #2D6A7D;
      text-decoration:none;
      font:700 0.95rem/1 'Inter', sans-serif;
      color:#2D6A7D;
      background:#FABA0D;
      box-shadow:0 4px 10px rgba(0,0,0,0.06);
      transition:all 0.3s ease;
    "
        onmouseover="this.style.background='#2D6A7D';this.style.color='#FFFFFF';"
        onmouseout="this.style.background='#FABA0D';this.style.color='#2D6A7D';">
        See all reviews on Google
      </a>
    </div>

  </div>
</section>

<!-- Init Swiper -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".reviews-swiper", {
      slidesPerView: 2,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        /* en móvil: 1 columna */
        768: {
          slidesPerView: 2
        } /* en tablet y desktop: 2 columnas */
      }
    });
  });
</script>