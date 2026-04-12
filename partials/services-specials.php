<?php @session_start(); require_once __DIR__ . '/../text.php'; ?>
<!-- ==============================
     OTHER SERVICES – REYES DG PAINTING LLC
============================== -->
<section class="services-specials-nova section" id="services-specials">
  <style>
    :root {
      --sp-primary: <?php echo $BrandColors['primary']; ?>;
      --sp-secondary: <?php echo $BrandColors['secondary']; ?>;
      --sp-white: <?php echo $BrandColors['white']; ?>;
    }

    .services-specials-nova {
      background: var(--sp-primary);
      color: var(--sp-white);
      padding: clamp(60px,7vw,100px) 0;
      position: relative;
      overflow: hidden;
      text-align: center;
    }

    .services-specials-nova::before {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 50% 10%, rgba(246,203,64,0.15), transparent 65%),
                  radial-gradient(circle at 80% 90%, rgba(255,255,255,0.08), transparent 75%);
      z-index: 0;
    }

    .sp__head {
      position: relative;
      z-index: 2;
      margin-bottom: clamp(35px,5vw,70px);
    }

    .sp__head .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font: 700 .9rem/1 var(--body-font,Inter);
      color: var(--sp-secondary);
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .sp__head .title {
      font: 800 clamp(26px,5vw,40px)/1.2 var(--title-font,Exo);
      color: var(--sp-white);
      margin-top: 12px;
    }

    /* GRID */
    .sp__grid {
      display: grid;
      gap: 24px;
      grid-template-columns: repeat(auto-fit, minmax(240px,1fr));
      max-width: 1000px;
      margin: 0 auto;
      position: relative;
      z-index: 2;
    }

    /* CARD */
    .sp-card {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 14px;
      padding: 24px 20px;
      text-align: center;
      transition: all .35s ease;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeUp .9s ease forwards;
      animation-timing-function: cubic-bezier(.21,.61,.35,1);
    }

    .sp-card:nth-child(1){ animation-delay:.1s; }
    .sp-card:nth-child(2){ animation-delay:.25s; }
    .sp-card:nth-child(3){ animation-delay:.4s; }
    .sp-card:nth-child(4){ animation-delay:.55s; }
    .sp-card:nth-child(5){ animation-delay:.7s; }

    .sp-card:hover {
      background: var(--sp-secondary);
      color: var(--sp-primary);
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,.25);
    }

    /* Icono decorativo */
    .sp-card img {
      width: 20px;
      opacity: 0.5;
      margin-bottom: 10px;
      animation: floatIcon 3s ease-in-out infinite;
    }

    .sp-card h3 {
      font: 700 1.05rem/1.3 var(--title-font,Exo);
      margin: 8px 0 0;
      color: inherit;
    }

    @keyframes fadeUp {
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes floatIcon {
      0%,100% { transform: translateY(0); }
      50% { transform: translateY(-4px); }
    }
  </style>

  <div class="container">
    <div class="sp__head">
      <span class="eyebrow"><i class="fa-solid fa-layer-group"></i> Additional Services</span>
      <h2 class="title">Other Services You Might Need</h2>
    </div>

    <div class="sp__grid">
      <?php foreach ($OtherServices as $svc): ?>
      <div class="sp-card">
        <img data-anim="fade"  src="assets/img/icon/footer_title4.svg" alt="Paint Icon">
        <h3><?php echo htmlspecialchars($svc); ?></h3>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
