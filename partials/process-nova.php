<?php
// Ensure text.php variables are available. 
// If this file is included in index.php where text.php is already loaded, you can remove this block.
// Otherwise, keep it to ensure variables like $BrandColors exist.
if (!isset($BrandColors)) {
    // Fallback if text.php isn't loaded directly
    $BrandColors = [
        "primary"   => "#1E1E1E",
        "secondary" => "#FF6825",
        "accent"    => "#002AA7",
        "white"     => "#FFFFFF",
    ];
}
?>

<section class="process-elite section" id="process-sec">

<style>
/* ============================
   PROCESS SECTION STYLES
   ============================ */

.process-elite {
  background: var(--bg);
  padding: var(--section-space) 0;
  position: relative;
  overflow: hidden;
}

/* CONTAINER & LAYOUT */
.process-elite__layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: flex-start;
}

@media(max-width: 991px) {
  .process-elite__layout { 
    grid-template-columns: 1fr; 
    gap: 40px;
  }
}

/* --- LEFT COLUMN --- */
.process-elite__left {
  position: relative;
}

/* Image Styling */
.process-elite__img-wrapper {
  position: relative;
  border-radius: var(--radius-img);
  overflow: hidden;
  box-shadow: var(--shadow-medium);
  margin-bottom: 40px;
}

.process-elite__img-wrapper img {
  width: 100%;
  height: auto;
  display: block;
  transition: transform 0.5s ease;
}

.process-elite__img-wrapper:hover img {
  transform: scale(1.05);
}

/* Content Styling */
.process-elite__eyebrow {
  font-family: var(--body-font);
  font-weight: 700;
  font-size: 0.9rem;
  color: var(--brand-secondary);
  letter-spacing: 0.05em;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 15px;
}

.process-elite__title {
  font-family: var(--title-font);
  font-weight: 800;
  font-size: clamp(2rem, 5vw, 3rem);
  line-height: 1.2;
  color: var(--brand-primary);
  margin-bottom: 20px;
}

.process-elite__text {
  font-family: var(--body-font);
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--body-color);
  max-width: 500px;
  margin-bottom: 35px;
}

/* Button */
.process-elite__btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 16px 40px;
  background: var(--brand-primary);
  color: var(--brand-white);
  border-radius: 50px;
  font-family: var(--title-font);
  font-weight: 700;
  text-transform: uppercase;
  text-decoration: none;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.process-elite__btn::before {
  content: "";
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
  background: var(--brand-secondary);
  z-index: -1;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease;
}

.process-elite__btn:hover::before {
  transform: scaleX(1);
}

.process-elite__btn:hover {
  color: var(--brand-white);
  box-shadow: var(--shadow-soft);
}

/* --- RIGHT COLUMN (TIMELINE) --- */
.process-elite__timeline {
  position: relative;
  padding-left: 20px;
}

/* Vertical Line */
.process-elite__timeline::before {
  content: "";
  position: absolute;
  left: 49px; /* Center with icon width (60px icon + gap adjustments) */
  top: 20px;
  bottom: 20px;
  width: 2px;
  background: var(--line); /* Using root var */
  background: linear-gradient(to bottom, var(--brand-primary) 0%, var(--line) 100%);
  z-index: 0;
}

.process-elite__item {
  display: grid;
  grid-template-columns: 60px 1fr;
  gap: 30px;
  position: relative;
  margin-bottom: 40px;
  z-index: 1;
}

.process-elite__item:last-child {
  margin-bottom: 0;
}

/* Icon Circle */
.process-elite__icon-box {
  width: 60px;
  height: 60px;
  background: var(--brand-white);
  border: 2px solid var(--brand-primary);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--brand-primary);
  font-size: 1.2rem;
  transition: all 0.3s ease;
  box-shadow: var(--shadow-soft);
}

/* Active State / Hover for Icon */
.process-elite__item:hover .process-elite__icon-box {
  background: var(--brand-secondary);
  border-color: var(--brand-secondary);
  color: var(--brand-white);
  transform: scale(1.1);
}

/* Card Content */
.process-elite__card {
  background: var(--brand-white);
  padding: 30px;
  border-radius: var(--radius-card);
  box-shadow: var(--shadow-soft);
  border: 1px solid var(--line);
  transition: all 0.3s ease;
}

.process-elite__item:hover .process-elite__card {
  transform: translateY(-5px);
  box-shadow: var(--shadow-medium);
  border-color: transparent;
}

.process-elite__step-num {
  font-family: var(--body-font);
  font-weight: 700;
  font-size: 0.8rem;
  color: var(--brand-secondary);
  letter-spacing: 0.05em;
  margin-bottom: 8px;
  display: block;
}

.process-elite__card h3 {
  font-family: var(--title-font);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--brand-primary);
  margin-bottom: 12px;
}

.process-elite__card p {
  font-family: var(--body-font);
  font-size: 0.95rem;
  line-height: 1.6;
  color: var(--muted-text);
  margin: 0;
}

/* Responsive Adjustments */
@media(max-width: 576px) {
  .process-elite__timeline { padding-left: 0; }
  .process-elite__timeline::before { left: 29px; }
  .process-elite__item { 
    grid-template-columns: 1fr; 
    gap: 15px; 
  }
  .process-elite__icon-box {
    margin: 0 auto; /* Center icon on mobile if stacked */
    display: none; /* Often cleaner to hide timeline line/icon on very small screens or adjust layout */
  }
  .process-elite__timeline::before { display: none; }
}

</style>

<div class="container">

  <div class="process-elite__layout">

    <div class="process-elite__left">
      
      <div class="process-elite__img-wrapper" data-anim="fade">
        <img src="assets/img/process/1.jpg" alt="Our Working Process">
      </div>

      <div class="process-elite__content">
        <div class="process-elite__eyebrow" data-anim="up" data-delay="1">
           <i class="fa-solid fa-clipboard-check"></i> <span>How We Work</span>
        </div>

        <h2 class="process-elite__title" data-anim="up" data-delay="2">
          Simple & Transparent <span style="color: var(--brand-secondary);">Workflow</span>
        </h2>

        <p class="process-elite__text" data-anim="up" data-delay="3">
          We follow a seamless, efficient, and transparent process from start to finish—ensuring your project is completed with precision and care.
        </p>

        <div data-anim="up" data-delay="4">
          <a href="<?= htmlspecialchars(falchion_url('contact.php'), ENT_QUOTES, 'UTF-8') ?>" class="process-elite__btn">
            Get Started <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i>
          </a>
        </div>
      </div>

    </div>

    <div class="process-elite__timeline">

      <?php
      // Process Steps Data
      $steps = [
        [
          "title" => "Initial Consultation", 
          "desc"  => "We discuss your goals, preferences, materials, and timeline to understand exactly what you want.", 
          "icon"  => "fa-comments"
        ],
        [
          "title" => "Planning & Estimate", 
          "desc"  => "We prepare a transparent proposal with a fully structured plan, scope, and schedule.", 
          "icon"  => "fa-file-signature"
        ],
        [
          "title" => "Project Execution", 
          "desc"  => "Our team completes the work using premium materials, precision techniques, and high standards.", 
          "icon"  => "fa-paint-roller"
        ],
        [
          "title" => "Final Walkthrough", 
          "desc"  => "We review everything together to ensure your full satisfaction before closing the project.", 
          "icon"  => "fa-check-circle"
        ],
      ];

      $stepCount = 1;
      $delay = 1; 

      foreach ($steps as $step):
        // Increment delay for staggered animation effect
        $animDelay = $delay + 1;
      ?>

      <div class="process-elite__item" data-anim="left" data-delay="<?= $animDelay ?>">
        
        <div class="process-elite__icon-box">
          <i class="fa-solid <?= $step['icon'] ?>"></i>
        </div>

        <div class="process-elite__card">
          <span class="process-elite__step-num">STEP 0<?= $stepCount ?></span>
          <h3><?= $step['title'] ?></h3>
          <p><?= $step['desc'] ?></p>
        </div>

      </div>

      <?php 
        $stepCount++; 
        $delay++;
      endforeach; 
      ?>

    </div>
    </div>
</div>

</section>