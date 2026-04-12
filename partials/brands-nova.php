<section class="brands-nova section" id="brands-sec">
  <style>
    .brands-nova {
      background: var(--brand-white, <?php echo $BrandColors['white']; ?>);
      padding: clamp(120px,7vw,100px) 0;
      text-align:center;
    }
    .brands-nova h2 {
      font:800 clamp(26px,5vw,38px)/1.2 var(--title-font,Exo);
      color: var(--brand-primary, <?php echo $BrandColors['primary']; ?>);
      margin-bottom:35px;
    }
    .brands-logos {
      display:flex;flex-wrap:wrap;justify-content:center;gap:40px;align-items:center;
    }
    .brands-logos img {
      max-height:60px;filter:grayscale(1);opacity:.7;
      transition:all .3s ease;
    }
    .brands-logos img:hover {
      filter:none;opacity:1;transform:scale(1.05);
    }
  </style>

  <div class="container">
    <h2>Trusted Materials & Brands</h2>
    <div class="brands-logos">
      <img data-anim="fade"  src="assets/img/brands/sherwin.png" alt="Sherwin-Williams">
    
      <img data-anim="fade"  src="assets/img/brands/benjaminmoore.png" alt="Benjamin Moore">

       <img data-anim="fade"  src="assets/img/brands/floor.png" alt="floor">
    
      <img data-anim="fade"  src="assets/img/brands/home_depot.webp" alt="home_depot">
       <img data-anim="fade"  src="assets/img/brands/lowe.png" alt="lowe">
    
    
   
    </div>
  </div>
</section>
