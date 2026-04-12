<section class="certifications-nova section" id="cert-sec">
  <style>
    .certifications-nova {
      background: var(--brand-primary, <?php echo $BrandColors['primary']; ?>);
      color: var(--brand-white, <?php echo $BrandColors['white']; ?>);
      padding: clamp(60px,7vw,90px) 0;
      text-align:center;
      position:relative;
      overflow:hidden;
    }
    .certifications-nova::before {
      content:"";position:absolute;inset:0;
      background:radial-gradient(circle at 30% 50%,rgba(255,255,255,.12),transparent 70%);
    }
    .cert-grid {
      display:grid;gap:28px;
      grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
      max-width:1000px;margin:0 auto;position:relative;z-index:2;
    }
    .cert-card {
      background:rgba(255,255,255,.08);
      border-radius:14px;
      padding:30px 22px;
      backdrop-filter:blur(5px);
      transition:all .3s ease;
    }
    .cert-card:hover {
      background:rgba(255,255,255,.15);
      transform:translateY(-4px);
    }
    .cert-card i {
      font-size:2rem;
      color: var(--brand-secondary, <?php echo $BrandColors['secondary']; ?>);
      margin-bottom:10px;
    }
    .cert-card h3 {
      font:700 1.1rem/1.3 var(--title-font,Exo);
      margin-bottom:8px;
    }
    .cert-card p {
      color:#e9e9e9;
      font:.95rem/1.5 var(--body-font,Inter);
    }
  </style>

  <div class="container">
    <div class="cert-grid">
      <div class="cert-card">
        <i class="fa-solid fa-certificate"></i>
        <h3>Licensed & Insured</h3>
        <p data-anim="blur">We meet all state and local regulations to ensure your property is protected.</p>
      </div>
      <div class="cert-card">
        <i class="fa-solid fa-shield-halved"></i>
        <h3>Guaranteed Work</h3>
        <p data-anim="blur">Every project comes with our satisfaction guarantee and quality commitment.</p>
      </div>
      <div class="cert-card">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <h3>On-Time Delivery</h3>
        <p data-anim="blur">We respect your schedule and deliver projects promptly without compromising quality.</p>
      </div>
      <div class="cert-card">
        <i class="fa-solid fa-language"></i>
        <h3>Bilingual Attention</h3>
        <p data-anim="blur">English & Spanish speaking staff ready to assist you every step of the way.</p>
      </div>
    </div>
  </div>
</section>
