<?php
/**
 * popup.php — Google Review Invite (v2: compact + minimizable pill)
 * Include just before </body>:  <?php include 'popup.php'; ?>
 * Uses $google from text.php if available, otherwise falls back to default.
 */
if (!isset($google) || empty($google)) {
  $google = 'https://maps.app.goo.gl/eabFnFpGz3Atnqrs7';
}

/* ================= QUICK CONFIG ================= */
$gr_delay_ms     = 2200;  // time before opening (ms)
$gr_block_days   = 30;    // do not show again for N days
$gr_auto_min_ms  = 6500;  // auto-minimize after N ms (0 = never)
$gr_side         = 'right'; // 'right' or 'left'
$gr_offset       = 16;    // distance from edge (px)
?>
<!-- ======= GOOGLE REVIEW INVITE v2 ======= -->
<div id="grv2" class="grv2" aria-hidden="true">
  <div class="grv2-card" role="dialog" aria-modal="true" aria-labelledby="grv2-title">
    <button type="button" class="grv2-x" aria-label="Close">&times;</button>

    <header class="grv2-head">
      <svg width="18" height="18" viewBox="0 0 48 48" aria-hidden="true">
        <path fill="#4285F4" d="M44.5 20H24v8.5h11.8C34.8 33 31.1 36 26 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.2 0 5.9 1.2 8 3.2l6-6C36.9 6.2 31.9 4 26 4 14.4 4 5 13.4 5 25s9.4 21 21 21 21-9.4 21-21c0-1.6-.2-3.1-.5-4.5Z"/>
      </svg>
      <strong>Google Reviews</strong>
    </header>

    <h3  data-anim="up"id="grv2-title" class="grv2-title">Would you leave us a review?</h3>
    <p class="grv2-lead">Your feedback helps others in San Jose find us and keeps our team motivated to deliver 5★ service.</p>

    <div class="grv2-stars" aria-label="5 out of 5 stars">
      <?php for ($i=0; $i<5; $i++): ?>
        <svg class="grv2-star" width="16" height="16" viewBox="0 0 24 24"><path fill="#F7B500" d="m12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
      <?php endfor; ?>
      <span class="grv2-score">5.0</span>
    </div>

    <a class="grv2-btn" href="<?php echo htmlspecialchars($google, ENT_QUOTES); ?>" target="_blank" rel="noopener">
      Leave a Google Review
    </a>

    <div class="grv2-foot">
      <label class="grv2-hide">
        <input id="grv2-hide" type="checkbox"> Do not show again for 30 days
      </label>
      <button type="button" class="grv2-min" aria-label="Minimize">Minimize</button>
    </div>
  </div>

  <!-- MINIMIZED PILL BUTTON -->
  <button type="button" class="grv2-pill" aria-label="Open reviews invite">
    <svg width="16" height="16" viewBox="0 0 48 48" aria-hidden="true">
      <path fill="#4285F4" d="M44.5 20H24v8.5h11.8C34.8 33 31.1 36 26 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.2 0 5.9 1.2 8 3.2l6-6C36.9 6.2 31.9 4 26 4 14.4 4 5 13.4 5 25s9.4 21 21 21 21-9.4 21-21c0-1.6-.2-3.1-.5-4.5Z"/>
    </svg>
    Review on Google
  </button>
</div>

<style>
#grv2, #grv2 *{ box-sizing:border-box; font-family: system-ui, -apple-system, "Segoe UI", Inter, Roboto, Arial, sans-serif }
.grv2{
  position:fixed; inset:0; z-index:999999; pointer-events:none;
}
.grv2-card{
  position:absolute; <?php echo $gr_side === 'left' ? 'left' : 'right'; ?>:<?php echo (int)$gr_offset; ?>px; bottom:<?php echo (int)$gr_offset; ?>px;
  width:320px; max-width:95vw; padding:14px 14px 12px;
  background:#fff; color:#0f172a; border:1px solid #e5e7eb; border-radius:14px;
  box-shadow:0 10px 30px rgba(2,6,23,.18);
  pointer-events:auto; display:none; /* start hidden */
  animation:grv2In .25s ease-out;
}
@keyframes grv2In{from{transform:translateY(10px);opacity:0}to{transform:translateY(0);opacity:1}}

.grv2.is-open .grv2-card{ display:block }
.grv2.is-min .grv2-card{ display:none }

.grv2-x{
  position:absolute; top:6px; right:8px; border:0; background:transparent; color:#64748b;
  font-size:18px; line-height:1; cursor:pointer;
}
.grv2-x:hover{ color:#0f172a }

.grv2-head{ display:flex; align-items:center; gap:6px; color:#475569; font-size:12.5px; margin-bottom:6px }
.grv2-head strong{ font-weight:800 }

.grv2-title{ margin:0 0 6px 0; font:800 17px/1.15 inherit; color:#0b1220 }
.grv2-lead{ margin:0 0 8px 0; color:#475569; font-size:13px }

.grv2-stars{ display:flex; align-items:center; gap:4px; margin:0 0 10px 0 }
.grv2-star{ flex:0 0 auto }
.grv2-score{ margin-left:4px; font-weight:800; color:#0f172a; font-size:12.5px }

.grv2-btn{
  display:block; width:100%; text-align:center; text-decoration:none;
  background:#D93030; color:#fff; padding:10px 14px; border-radius:9px;
  font-weight:800; font-size:13px; border:1px solid transparent;
  box-shadow:0 8px 18px rgba(217,48,48,.20);
}
.grv2-btn:hover{ background:#b81f1f }

.grv2-foot{
  margin-top:10px; display:flex; align-items:center; justify-content:space-between; gap:8px;
}
.grv2-hide{ display:inline-flex; align-items:center; gap:8px; color:#64748b; font-size:12.5px }
.grv2-hide input{ accent-color:#D93030 }
.grv2-min{
  border:0; background:#e5e7eb; color:#0f172a; border-radius:8px; padding:6px 9px; font-weight:700; font-size:12px; cursor:pointer;
}
.grv2-min:hover{ background:#dce1e7 }

/* Minimized pill */
.grv2-pill{
  position:absolute; <?php echo $gr_side === 'left' ? 'left' : 'right'; ?>:<?php echo (int)$gr_offset; ?>px; bottom:<?php echo (int)$gr_offset; ?>px;
  pointer-events:auto;
  display:none; align-items:center; gap:8px; padding:10px 12px;
  background:#0f172a; color:#fff; border:1px solid rgba(255,255,255,.1);
  border-radius:999px; box-shadow:0 10px 22px rgba(2,6,23,.25);
  font-weight:800; font-size:12.5px; cursor:pointer;
}
.grv2.is-min .grv2-pill{ display:flex }
.grv2-pill:hover{ background:#111827 }

@media (max-width: 992px){
  .grv2-card{ width:300px }
}
@media (max-width: 420px){
  .grv2-card{ <?php echo $gr_side === 'left' ? 'left' : 'right'; ?>:10px; bottom:10px; width:calc(100vw - 20px) }
}
</style>

<script>
(function(){
  var root  = document.getElementById('grv2');
  if(!root) return;

  var card  = root.querySelector('.grv2-card');
  var pill  = root.querySelector('.grv2-pill');
  var btnX  = root.querySelector('.grv2-x');
  var btnMin= root.querySelector('.grv2-min');
  var chk   = root.querySelector('#grv2-hide');

  var KEY   = 'grv2_hide_until_v2';
  var DELAY = <?php echo (int)$gr_delay_ms; ?>;
  var DAYS  = <?php echo (int)$gr_block_days; ?>;
  var AUTO_MIN = <?php echo (int)$gr_auto_min_ms; ?>;

  function now(){ return Date.now(); }
  function daysMs(d){ return d*24*60*60*1000; }

  function blocked(){
    try{
      var v = localStorage.getItem(KEY);
      if(!v) return false;
      var t = parseInt(v,10);
      return !isNaN(t) && now() < t;
    }catch(e){ return false; }
  }
  function block(d){ try{ localStorage.setItem(KEY, String(now()+daysMs(d))); }catch(e){} }

  function openCard(){
    if(blocked()) return;
    root.classList.add('is-open');
    root.classList.remove('is-min');
  }
  function minimize(){
    root.classList.add('is-min');
    root.classList.remove('is-open');
  }
  function closeAll(){
    root.classList.remove('is-open');
    root.classList.add('is-min');
    if(chk && chk.checked) block(DAYS);
  }

  // Initial state
  if(!blocked()){
    setTimeout(function(){
      openCard();
      if (AUTO_MIN > 0) {
        setTimeout(function(){
          if(root.classList.contains('is-open')) minimize();
        }, AUTO_MIN);
      }
    }, Math.max(0, DELAY));
  } else {
    // Nothing (not even the pill)
    root.style.display = 'none';
  }

  // Events
  btnX && btnX.addEventListener('click', closeAll);
  btnMin && btnMin.addEventListener('click', minimize);
  pill  && pill.addEventListener('click', openCard);

  // Auto-minimize on very short viewports
  if (window.innerHeight < 650) {
    root.classList.add('is-min');
  }

  // Expose for manual control if needed
  window.grv2Open = openCard;
  window.grv2Min  = minimize;
  window.grv2Close= closeAll;
})();
</script>
