<?php
// mail.php
if (session_status() !== PHP_SESSION_ACTIVE) { @session_start(); }

// Carga variables (Company, $Mail, $Domain, etc.)
require_once __DIR__ . '/text.php';

// Helpers
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

// Lee y valida
$name     = trim($_POST['name']     ?? '');
$email    = trim($_POST['email']    ?? '');
$phone    = trim($_POST['number']   ?? '');
$service  = trim($_POST['services'] ?? '');
$message  = trim($_POST['message']  ?? '');
$csrf     = $_POST['csrf']          ?? '';
$honey    = $_POST['website']       ?? ''; // honeypot

// CSRF
if (empty($_SESSION['csrf']) || !$csrf || !hash_equals($_SESSION['csrf'], $csrf)) {
  $_SESSION['contact_err'] = 'Security token expired. Please reload and try again.';
  header('Location: ' . i18n_localized_url('contact.php')); exit;
}

// Honeypot
if ($honey !== '') {
  $_SESSION['contact_err'] = 'Spam detected.';
  header('Location: ' . i18n_localized_url('contact.php')); exit;
}

// Reglas mínimas
$errors = [];
if ($name === '')                 $errors[] = 'Name is required.';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
if ($service === '')              $errors[] = 'Please select a service.';
if ($message === '')              $errors[] = 'Message is required.';

if ($errors) {
  $_SESSION['contact_err'] = implode(' ', $errors);
  header('Location: ' . i18n_localized_url('contact.php')); exit;
}

// Sanitiza
$name    = mb_substr(strip_tags($name), 0, 80, 'UTF-8');
$phone   = mb_substr(strip_tags($phone), 0, 50, 'UTF-8');
$service = mb_substr(strip_tags($service), 0, 80, 'UTF-8');
$message = mb_substr(strip_tags($message), 0, 4000, 'UTF-8');

// Destinatario desde text.php
$to = $Mail; // <- AQUÍ SE USA $Mail
if (!$to) { // fallback
  $_SESSION['contact_err'] = 'Recipient email not configured.';
  header('Location: ' . i18n_localized_url('contact.php')); exit;
}

// Asunto / remitentes
$host = parse_url($Domain ?? '', PHP_URL_HOST) ?: $_SERVER['HTTP_HOST'] ?? 'localhost';
$from = "no-reply@".$host;
$subject = "New Quote Request — ".($Company ?? 'Website');

// Body HTML
$rows = [
  'Name'    => $name,
  'Email'   => $email,
  'Phone'   => $phone,
  'Service' => $service,
  'Message' => nl2br(h($message)),
  'IP'      => $_SERVER['REMOTE_ADDR'] ?? '',
  'Date'    => date('Y-m-d H:i:s'),
];

$tbl = '';
foreach ($rows as $k=>$v){
  $tbl .= '<tr><td style="padding:8px 10px;border:1px solid #eee;background:#fafafa;font-weight:700;">'.h($k).'</td>'.
          '<td style="padding:8px 10px;border:1px solid #eee;">'.(is_string($v)?$v:h($v)).'</td></tr>';
}

$html = '<!doctype html><html><body style="font-family:Inter,Arial,sans-serif;color:#111827;">
  <h2 style="margin:0 0 10px;">New Quote Request</h2>
  <p style="margin:0 0 10px;">From <strong>'.h($Company).'</strong> website contact form.</p>
  <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;min-width:480px;">'.$tbl.'</table>
</body></html>';

// Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: ".$Company." <".$from.">\r\n";
$headers .= "Reply-To: ".h($name)." <".$email.">\r\n";
$headers .= "X-Mailer: PHP/".phpversion()."\r\n";

// Enviar
$sent = @mail($to, $subject, $html, $headers);

// Fallback: guardar si mail() falla (útil en localhost)
if (!$sent) {
  $dir  = __DIR__ . '/data';
  $file = $dir . '/leads.json';
  if (!is_dir($dir)) { @mkdir($dir, 0755, true); }
  $payload = [
    'ts'      => date('c'),
    'name'    => $name,
    'email'   => $email,
    'phone'   => $phone,
    'service' => $service,
    'message' => $message,
    'ip'      => $_SERVER['REMOTE_ADDR'] ?? '',
    'ua'      => $_SERVER['HTTP_USER_AGENT'] ?? ''
  ];
  $arr = [];
  if (is_file($file)) {
    $raw = file_get_contents($file);
    $dec = json_decode($raw, true);
    if (is_array($dec)) $arr = $dec;
  }
  array_unshift($arr, $payload);
  @file_put_contents($file, json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT));
}

// Flash OK
$_SESSION['contact_ok'] = $sent
  ? 'Thanks! Your request has been sent. We will contact you shortly.'
  : 'Thanks! Your request was received. (Email queue not available on this server.)';

header('Location: ' . i18n_localized_url('contact.php'));
exit;
