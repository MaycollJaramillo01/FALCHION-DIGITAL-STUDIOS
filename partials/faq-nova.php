<section class="faq-nova section" id="faq-sec" itemscope itemtype="https://schema.org/FAQPage">
  <style>
    :root {
      --faq-primary:   <?php echo $BrandColors['primary']; ?>;
      --faq-secondary: <?php echo $BrandColors['secondary']; ?>;
      --faq-accent:    <?php echo $BrandColors['accent']; ?>;
      --faq-neutral:   <?php echo $BrandColors['neutral']; ?>;
      --faq-white:     <?php echo $BrandColors['white']; ?>;
    }

    .faq-nova {
      background: linear-gradient(180deg, var(--faq-white) 0%, var(--faq-neutral) 100%);
      padding: clamp(70px,7vw,110px) 0;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    /* Fondo arquitectónico */
    .faq-nova::before {
      content: "";
      position: absolute;
      top: -15%; right: -10%;
      width: 50%; height: 80%;
      background: radial-gradient(circle at 70% 30%, rgba(95,161,97,0.1), transparent 70%);
      z-index: 0;
    }

    .faq-nova h2 {
      text-align: center;
      font: 800 clamp(26px,5vw,40px)/1.2 var(--title-font,Exo);
      color: var(--faq-primary);
      margin-bottom: 40px;
      position: relative;
      z-index: 2;
      opacity: 0;
      animation: fadeDown 1s ease forwards;
    }
    .faq-nova h2::after {
      content: "";
      display: block;
      width: 70px;
      height: 4px;
      border-radius: 2px;
      margin: 10px auto 0;
      background: var(--faq-secondary);
    }

    details {
      max-width: 800px;
      margin: 0 auto 16px;
      border: 1px solid var(--faq-accent);
      border-radius: 14px;
      background: var(--faq-white);
      padding: 18px 22px;
      transition: all .3s ease;
      position: relative;
      box-shadow: 0 4px 15px rgba(0,0,0,.08);
      opacity: 0;
      animation: fadeUp 1s ease forwards;
    }

    details:nth-child(2) { animation-delay: .2s; }
    details:nth-child(3) { animation-delay: .4s; }
    details:nth-child(4) { animation-delay: .6s; }
    details:nth-child(5) { animation-delay: .8s; }

    details:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0,0,0,.1);
    }

    summary {
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
      color: var(--faq-primary);
      transition: color .3s ease;
    }

    summary i {
      color: var(--faq-secondary);
      transition: transform .4s ease, color .3s ease;
    }

    /* Flecha rotatoria al abrir */
    details[open] summary i {
      transform: rotate(180deg);
      color: var(--faq-primary);
    }

    details[open] {
      background: var(--faq-accent);
      border-color: var(--faq-secondary);
    }

    details p {
      margin-top: 12px;
      color: #333;
      font: 400 .96rem/1.65 var(--body-font,Inter);
      border-top: 1px solid rgba(0,0,0,.08);
      padding-top: 10px;
      transition: opacity .3s ease;
      opacity: .95;
    }

    /* Animaciones base */
    @keyframes fadeUp {
      0% { opacity: 0; transform: translateY(25px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeDown {
      0% { opacity: 0; transform: translateY(-25px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    /* Hover visual */
    details:hover summary i {
      color: var(--faq-accent);
    }

    /* Responsive */
    @media (max-width: 768px) {
      details { padding: 16px 18px; }
      .faq-nova h2 { font-size: clamp(24px,6vw,34px); }
    }
  </style>
<div class="container">
  <h2>Frequently Asked Questions</h2>

  <!-- PREGUNTA 1 -->
  <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <summary itemprop="name">
      <i class="fa-solid fa-chevron-down"></i> Do you provide free estimates?
    </summary>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">
        <?= htmlspecialchars($Estimates ?? 'Free estimates are available for all our services.') ?>
      </p>
    </div>
  </details>

  <!-- PREGUNTA 2 -->
  <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <summary itemprop="name">
      <i class="fa-solid fa-chevron-down"></i> Are you licensed and insured?
    </summary>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">
        <?= htmlspecialchars($Company ?? 'Our company') ?> is <?= htmlspecialchars($LicenseNote ?? 'Fully Licensed & Insured') ?>,
        ensuring professionalism and your complete peace of mind.
      </p>
    </div>
  </details>

  <!-- PREGUNTA 3 -->
  <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <summary itemprop="name">
      <i class="fa-solid fa-chevron-down"></i> What areas do you serve?
    </summary>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">
        We proudly serve <?= htmlspecialchars($Coverage ?? 'your local area') ?>,
        including <?= htmlspecialchars(implode(', ', $Areas ?? [])) ?>.
      </p>
    </div>
  </details>

  <!-- PREGUNTA 4 -->
  <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <summary itemprop="name">
      <i class="fa-solid fa-chevron-down"></i> How long does a project take?
    </summary>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">
        Project duration depends on scope and size. Typically, most <?= strtolower($Services ?? 'projects') ?> 
        are completed within a few days by our experienced team with over <?= (int)$ExperienceYears ?> years of expertise.
      </p>
    </div>
  </details>

  <!-- PREGUNTA 5 -->
  <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <summary itemprop="name">
      <i class="fa-solid fa-chevron-down"></i> What are your working hours?
    </summary>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <p itemprop="text">
        <?= htmlspecialchars($Schedule ?? 'We operate Monday through Saturday, with flexible hours available upon request.') ?>
      </p>
    </div>
  </details>
</div>

</section>
