<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page Not Found - 404</title>

<style>
/* ============================
   ROOT COLORS
============================ */
:root {
  --p: #1F3C88;
  --s: #F2A007;
  --bg: #f5f5f7;
  --white: #ffffff;
  --dark: #1d1d1f;
}

/* ============================
   PAGE BASE
============================ */
body {
  margin: 0;
  background: var(--bg);
  font-family: system-ui, Inter, sans-serif;
  color: var(--dark);
  overflow-x: hidden;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* ============================
   AURORA BACKGROUND
============================ */
.aurora-bg {
  position: fixed;
  inset: 0;
  overflow: hidden;
  z-index: -1;
}

.aurora {
  position: absolute;
  filter: blur(90px);
  opacity: 0.45;
  animation: floatAurora 14s infinite linear;
}

.aurora:nth-child(1) {
  width: 600px; height: 600px;
  background: var(--p);
  top: -10%; left: -10%;
}

.aurora:nth-child(2) {
  width: 500px; height: 500px;
  background: var(--s);
  bottom: -15%; right: -10%;
  animation-duration: 18s;
}

.aurora:nth-child(3) {
  width: 450px; height: 450px;
  background: #8ec5fc;
  top: 40%; left: -20%;
  animation-duration: 22s;
}

@keyframes floatAurora {
  from { transform: translateY(0) rotate(0deg); }
  to   { transform: translateY(-40px) rotate(360deg); }
}

/* ============================
   MAIN CARD
============================ */
.card-404 {
  text-align: center;
  max-width: 520px;
  padding: 60px 40px;
  background: rgba(255,255,255,0.45);
  border-radius: 28px;
  backdrop-filter: blur(40px);
  -webkit-backdrop-filter: blur(40px);
  box-shadow: 0 20px 60px rgba(0,0,0,0.08);
  transform: translateY(20px);
  opacity: 0;
  animation: fadeUp 1s ease forwards;
}

@keyframes fadeUp {
  to { opacity: 1; transform: translateY(0); }
}

/* ============================
   TEXT STYLES
============================ */
.card-404 h1 {
  font-size: clamp(58px, 10vw, 90px);
  margin: 0;
  font-weight: 800;
  color: var(--p);
  letter-spacing: -0.04em;
}

.card-404 p {
  margin: 12px 0 26px;
  font-size: 1.1rem;
  color: #333;
  line-height: 1.6;
}

/* ============================
   BUTTON
============================ */
.btn-home {
  display: inline-block;
  padding: 14px 34px;
  background: var(--p);
  color: var(--white);
  border-radius: 50px;
  text-decoration: none;
  font-weight: 700;
  font-size: 1rem;
  transition: .3s ease;
  box-shadow: 0 10px 24px rgba(0,0,0,0.16);
}

.btn-home:hover {
  background: var(--s);
  transform: translateY(-4px);
}

/* ============================
   FLOATING SHAPES
============================ */
.float {
  position: absolute;
  opacity: .3;
  animation: floatItem 6s ease-in-out infinite;
}

.float:nth-child(1) { top:10%; left:10%; }
.float:nth-child(2) { top:20%; right:15%; animation-duration:8s; }
.float:nth-child(3) { bottom:15%; left:22%; animation-duration:10s; }

@keyframes floatItem {
  0%,100% { transform: translateY(0); }
  50%     { transform: translateY(-14px); }
}

</style>
</head>

<body>

<!-- AURORA BACKGROUND -->
<div class="aurora-bg">
  <div class="aurora"></div>
  <div class="aurora"></div>
  <div class="aurora"></div>
</div>

<!-- FLOATING ICONS -->
<svg class="float" width="60" height="60" viewBox="0 0 24 24"><path fill="var(--p)" d="M12 17.27L18.18 21l-1.64-7L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
<svg class="float" width="70" height="70" viewBox="0 0 24 24"><path fill="var(--s)" d="M3 3h18v2H3zm0 4h18v2H3zm0 4h12v2H3zm0 4h12v2H3z"/></svg>
<svg class="float" width="50" height="50" viewBox="0 0 24 24"><path fill="#8ec5fc" d="M12 7a5 5 0 1 1 0 10a5 5 0 0 1 0-10m0-2a7 7 0 1 0 0 14a7 7 0 0 0 0-14z"/></svg>

<!-- MAIN CARD -->
<div class="card-404">
  <h1>404</h1>
  <p>Oops! The page you're looking for doesn’t exist, was moved, or never existed at all.</p>
  <a href="/" class="btn-home">Go Back Home</a>
</div>

</body>
</html>
