<?php
// captcha.php — versión SVG (no requiere GD)
if (session_status() !== PHP_SESSION_ACTIVE) { @session_start(); }

// Silenciar warnings para no romper headers
@ini_set('display_errors', '0');
@error_reporting(0);

// Limpia buffers
if (function_exists('ob_get_length') && ob_get_length()) { @ob_end_clean(); }

// Config
$len   = 5;
$chars = 'ABCDEFGHJKMNPQRSTUVWXYZ23456789'; // sin O,0,I,1
$w = 180; $h = 56;

// Genera código y guarda en sesión
$code = '';
$poolLen = strlen($chars) - 1;
for ($i=0; $i<$len; $i++) {
  $code .= $chars[random_int(0, $poolLen)];
}
$_SESSION['captcha'] = $code;

// Headers (SVG + no-cache)
header('Content-Type: image/svg+xml; charset=UTF-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: 0');

// Paleta
$bg    = '#F5F7FA';
$fg    = '#121212';
$noise = '#9CA3AF';

// Genera “ruido” (líneas y puntos) para el SVG
$noiseLines = '';
for ($i=0; $i<8; $i++) {
  $x1 = random_int(0, $w); $y1 = random_int(0, $h);
  $x2 = random_int(0, $w); $y2 = random_int(0, $h);
  $op = number_format(random_int(15,35)/100, 2);
  $noiseLines .= "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' stroke='$noise' stroke-opacity='$op' stroke-width='1'/>";
}

$noiseDots = '';
for ($i=0; $i<150; $i++) {
  $cx = random_int(0, $w); $cy = random_int(0, $h);
  $r  = random_int(1, 2);
  $op = number_format(random_int(10,25)/100, 2);
  $noiseDots .= "<circle cx='$cx' cy='$cy' r='$r' fill='$noise' fill-opacity='$op'/>";
}

// Posición de cada carácter
$charsSvg = '';
$startX = 20; $gap = 28; $y = 38;
for ($i=0; $i<strlen($code); $i++) {
  $x = $startX + $i*$gap + random_int(-2, 2);
  $rot = random_int(-15, 15);
  $charsSvg .= "<text x='$x' y='$y' font-family='Inter, Arial, sans-serif' font-size='28' font-weight='700' fill='$fg' transform='rotate($rot $x $y)'>"
              . htmlspecialchars($code[$i], ENT_QUOTES, 'UTF-8')
              . "</text>";
}

// Render SVG
echo <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="$w" height="$h" viewBox="0 0 $w $h" role="img" aria-label="CAPTCHA">
  <rect width="100%" height="100%" fill="$bg"/>
  $noiseLines
  $noiseDots
  $charsSvg
</svg>
SVG;
exit;
