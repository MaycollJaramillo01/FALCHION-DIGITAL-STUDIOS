
<!-- ==============================
CTA Fuerte
============================== -->
<section class="cta-strong" style="background:#2D6A7D;color:#fff;padding:60px 20px;position:relative;overflow:hidden;">
  <div class="container" style="max-width:1200px;margin:0 auto;display:flex;flex-direction:column;align-items:center;text-align:center;gap:25px;">

    <!-- Título -->
    <h2 style="font:800 clamp(26px,5vw,38px)/1.2 'Exo',sans-serif;margin:0;color:#fff;text-transform:uppercase;letter-spacing:-0.5px;">
      Get Your Free Estimate Today!
    </h2>

    <!-- Subtexto -->
    <p style="max-width:720px;margin:0;font:500 1.05rem/1.6 'Inter',sans-serif;color:#FABA0D;">
      Licensed & Insured · Over <?= htmlspecialchars($Experience ?? "10 Years") ?> of Experience · Available Mon–Sat
    </p>

    <!-- Botones -->
    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;margin-top:10px;">
      
      <!-- Teléfono -->
      <a href="<?= htmlspecialchars($PhoneRef ?? '#') ?>" 
         style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;
                border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;
                background:#FABA0D;color:#2D6A7D;transition:all .3s ease;box-shadow:0 6px 16px rgba(0,0,0,.25);">
        <i class="fas fa-phone-alt"></i> Call Now
      </a>

      <!-- WhatsApp -->
      <a href="https://wa.link/l4f5t4" target="_blank" rel="noopener"
         style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;
                border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;
                background:#25D366;color:#fff;transition:all .3s ease;box-shadow:0 6px 16px rgba(0,0,0,.25);">
        <i class="fab fa-whatsapp"></i> WhatsApp
      </a>

      <!-- Email -->
      <a href="<?= htmlspecialchars($MailRef ?? '#') ?>" 
         style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;
                border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;
                background:#fff;color:#2D6A7D;border:2px solid #FABA0D;transition:all .3s ease;">
        <i class="fas fa-envelope"></i> Email Us
      </a>
    </div>
  </div>

  <!-- Decoración (círculo amarillo animado) -->
  <div style="position:absolute;bottom:-80px;right:-80px;width:200px;height:200px;background:#FABA0D;opacity:0.15;border-radius:50%;animation:pulseCta 6s ease-in-out infinite;"></div>
</section>