<?php
// Ensure $Areas is available (fallback if not defined in text.php)
if (!isset($Areas) || !is_array($Areas)) {
    $Areas = [
        "Baltimore, MD", "Baltimore County, MD", "Towson, MD", "Parkville, MD", 
        "Dundalk, MD", "Essex, MD", "Middle River, MD", "Rosedale, MD", 
        "White Marsh, MD", "Pikesville, MD", "Owings Mills, MD", 
        "Randallstown, MD", "Catonsville, MD", "Ellicott City, MD", 
        "Columbia, MD", "Glen Burnie, MD", "Pasadena, MD", "Severn, MD", 
        "Laurel, MD", "Annapolis, MD", "Bel Air, MD", "Aberdeen, MD", 
        "Edgewood, MD", "Fallston, MD", "Nottingham, MD", "Perry Hall, MD", 
        "Cockeysville, MD", "Lutherville-Timonium, MD", "Hunt Valley, MD"
    ];
}
?>

<section class="areas-nova section" id="areas-sec">
  <style>
    /* ============================
       AREAS SECTION STYLES
       ============================ */
    
    .areas-nova {
      /* Background using root vars */
      background: linear-gradient(180deg, var(--brand-white) 0%, var(--bg-light) 100%);
      padding: clamp(70px, 7vw, 110px) 0;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    /* Decorative blurred elements (using brand colors) */
    .areas-nova::before {
      content: "";
      position: absolute;
      top: -15%; left: -10%;
      width: 50%; height: 80%;
      background: radial-gradient(circle at 30% 50%, rgba(30, 30, 30, 0.05), transparent 70%); /* Primary hint */
      z-index: 0;
      pointer-events: none;
    }
    .areas-nova::after {
      content: "";
      position: absolute;
      bottom: -10%; right: -10%;
      width: 45%; height: 75%;
      background: radial-gradient(circle at 60% 50%, rgba(255, 104, 37, 0.08), transparent 70%); /* Secondary hint */
      z-index: 0;
      pointer-events: none;
    }

    .areas-container {
      position: relative;
      z-index: 2;
    }

    /* Header Styling */
    .areas-nova__title {
      font-family: var(--title-font);
      font-weight: 800;
      font-size: clamp(2rem, 5vw, 3rem);
      color: var(--brand-primary);
      margin-bottom: 15px;
      line-height: 1.2;
    }

    .areas-nova__desc {
      font-family: var(--body-font);
      font-size: 1.05rem;
      line-height: 1.7;
      color: var(--body-color);
      max-width: 720px;
      margin: 0 auto 45px;
      opacity: 0.9;
    }

    /* Area List Grid */
    .areas-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
      max-width: 1000px;
      margin: 0 auto;
    }

    /* Area Tag Item */
    .area-tag {
      background: var(--brand-white);
      color: var(--brand-primary);
      font-family: var(--body-font);
      font-weight: 600;
      font-size: 0.95rem;
      padding: 12px 24px;
      border-radius: 50px;
      border: 1px solid var(--line);
      box-shadow: var(--shadow-soft);
      transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      cursor: default;
      position: relative;
      overflow: hidden;
      
      /* Animation Setup */
      opacity: 0;
      transform: translateY(20px);
      animation: popIn 0.6s ease forwards;
      animation-delay: calc(var(--i) * 0.03s); /* Staggered entrance */
    }

    /* Tag Hover Effect */
    .area-tag:hover {
      background: var(--brand-secondary);
      color: var(--brand-white);
      border-color: var(--brand-secondary);
      transform: translateY(-5px);
      box-shadow: var(--shadow-medium);
    }

    /* Subtle Floating Animation after load */
    .area-tag {
      /* Combine entrance animation with continuous float */
      animation: popIn 0.6s ease forwards, floatY 4s ease-in-out infinite;
      animation-delay: calc(var(--i) * 0.03s), calc(0.6s + (var(--i) * 0.1s));
    }

    /* Keyframes */
    @keyframes popIn {
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes floatY {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-4px); }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .area-tag { padding: 10px 18px; font-size: 0.9rem; }
      .areas-nova { padding: 60px 0; }
    }
  </style>

  <div class="container areas-container">
    
    <div data-anim="up">
        <h2 class="areas-nova__title">Areas We Serve</h2>
        <p class="areas-nova__desc">
        <?= htmlspecialchars($Company ?? 'Brothers Painting') ?> proudly provides 
        <?= strtolower($Services ?? 'professional painting services') ?> across 
        <?= htmlspecialchars($Locality ?? 'Baltimore') ?> and surrounding communities.
        </p>
    </div>

    <div class="areas-list">
      <?php
        $i = 0;
        foreach ($Areas as $city): 
          $i++;
      ?>
        <span class="area-tag" style="--i:<?= $i; ?>;">
            <?= htmlspecialchars($city) ?>
        </span>
      <?php endforeach; ?>
    </div>

  </div>

</section>