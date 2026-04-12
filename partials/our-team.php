<?php @session_start(); require_once __DIR__ . '/../text.php'; ?>
<!-- ==============================
     OUR TEAM – REYES DG PAINTING LLC
============================== -->
<section class="team-nova section" id="team-sec">
  <style>
    :root {
      --team-primary: <?php echo $BrandColors['primary']; ?>;
      --team-secondary: <?php echo $BrandColors['secondary']; ?>;
      --team-white: <?php echo $BrandColors['white']; ?>;
    }

    .team-nova {
      background: var(--team-white);
      color: #222;
      padding: clamp(60px,7vw,100px) 0;
      position: relative;
      text-align: center;
    }

    .team-nova__head {
      margin-bottom: clamp(40px,6vw,70px);
    }
    .team-nova__head .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font: 700 .9rem/1 var(--body-font,Inter);
      color: var(--team-secondary);
      text-transform: uppercase;
      letter-spacing: .05em;
    }
    .team-nova__head .title {
      font: 800 clamp(26px,5vw,42px)/1.2 var(--title-font,Exo);
      color: var(--team-primary);
      margin-top: 10px;
    }

    /* GRID */
    .team-grid {
      display: grid;
      gap: 40px;
      grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
      max-width: 1100px;
      margin: 0 auto;
    }

    /* CARD */
    .team-card {
      background: #fff;
      border: 1px solid #eee;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 6px 16px rgba(0,0,0,.08);
      transition: all .35s ease;
      text-align: center;
    }

    .team-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0,0,0,.15);
      border-color: var(--team-secondary);
    }

    .team-card__photo {
      width: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      object-position: center;
      transition: transform .4s ease;
    }

    .team-card:hover .team-card__photo {
      transform: scale(1.05);
    }

    .team-card__body {
      padding: 24px 20px 30px;
    }

    .team-card__name {
      font: 700 1.15rem/1.3 var(--title-font,Exo);
      color: var(--team-primary);
      margin-bottom: 6px;
    }

    .team-card__role {
      font: 600 .95rem/1.3 var(--body-font,Inter);
      color: var(--team-secondary);
      margin-bottom: 10px;
    }

    .team-card__desc {
      font: 400 .9rem/1.6 var(--body-font,Inter);
      color: #444;
    }

    @media (max-width: 600px) {
      .team-card__desc {
        font-size: .88rem;
      }
    }
  </style>

  <div class="container">
    <div class="team-nova__head">
      <span class="eyebrow">Meet Our Team</span>
      <h2 class="title">People Who Make <?= htmlspecialchars($Company ?? 'Our Company') ?> Exceptional</h2>
      <p style="max-width:750px;margin:10px auto 0;font:400 1rem/1.6 var(--body-font,Inter);color:#555">
        Behind every project, there’s a dedicated group of professionals who bring passion, skill, and attention to detail. 
        Our experienced team ensures that every job — big or small — meets our high standards of quality and client satisfaction.
      </p>
    </div>

    <div class="team-grid">
      <!-- TEAM MEMBER 1 -->
      <div class="team-card">
        <img data-anim="fade"  src="assets/img/team/david.jpg" alt="David Reyes - Founder" class="team-card__photo">
        <div class="team-card__body">
          <h3  data-anim="up"class="team-card__name">David Reyes</h3>
          <p class="team-card__role">Founder & Lead Painter</p>
          <p class="team-card__desc">
            David founded <?= htmlspecialchars($Company) ?> with one goal — to combine craftsmanship and reliability. 
            He personally oversees every major project to ensure top-quality results and customer satisfaction.
          </p>
        </div>
      </div>

      <!-- TEAM MEMBER 2 -->
      <div class="team-card">
        <img data-anim="fade"  src="assets/img/team/carlos.jpg" alt="Carlos Mendoza - Project Supervisor" class="team-card__photo">
        <div class="team-card__body">
          <h3  data-anim="up"class="team-card__name">Carlos Mendoza</h3>
          <p class="team-card__role">Project Supervisor</p>
          <p class="team-card__desc">
            With a strong background in construction and finishing, Carlos manages crews, coordinates timelines, and 
            ensures each project runs smoothly from start to finish.
          </p>
        </div>
      </div>

      <!-- TEAM MEMBER 3 -->
      <div class="team-card">
        <img data-anim="fade"  src="assets/img/team/maria.jpg" alt="Maria Lopez - Color & Design Advisor" class="team-card__photo">
        <div class="team-card__body">
          <h3  data-anim="up"class="team-card__name">Maria Lopez</h3>
          <p class="team-card__role">Color & Design Advisor</p>
          <p class="team-card__desc">
            Maria assists clients in choosing the perfect color palettes and finishes, 
            making every space reflect their personal taste and style.
          </p>
        </div>
      </div>

      <!-- TEAM MEMBER 4 -->
      <div class="team-card">
        <img data-anim="fade"  src="assets/img/team/luis.jpg" alt="Luis Gonzalez - Exterior Specialist" class="team-card__photo">
        <div class="team-card__body">
          <h3  data-anim="up"class="team-card__name">Luis Gonzalez</h3>
          <p class="team-card__role">Exterior Specialist</p>
          <p class="team-card__desc">
            Luis brings more than a decade of field experience in exterior painting, waterproofing, and 
            pressure washing — always focused on durability and perfection.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
