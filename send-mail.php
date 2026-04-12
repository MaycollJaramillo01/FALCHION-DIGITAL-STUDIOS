<?php
@session_start();
require_once __DIR__ . '/falchion-content.php';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: ' . falchion_url('contact.php'));
    exit;
}

function falchion_clean_input(string $value, int $max = 4000): string
{
    $value = strip_tags(trim($value));
    $value = str_replace("\r", '', $value);
    return function_exists('mb_substr') ? mb_substr($value, 0, $max, 'UTF-8') : substr($value, 0, $max);
}

$name = falchion_clean_input((string) ($_POST['name'] ?? ''), 120);
$email = falchion_clean_input((string) ($_POST['email'] ?? ''), 150);
$company = falchion_clean_input((string) ($_POST['company'] ?? ''), 150);
$service = falchion_clean_input((string) ($_POST['service'] ?? ''), 150);
$message = falchion_clean_input((string) ($_POST['message'] ?? ''), 4000);

if ($name === '' || $email === '' || $service === '' || $message === '') {
    $_SESSION['contact_error'] = 'Please complete all required fields.';
    header('Location: ' . falchion_url('contact.php#contact-form'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['contact_error'] = 'Please enter a valid email address.';
    header('Location: ' . falchion_url('contact.php#contact-form'));
    exit;
}

$subject = 'New contact request - ' . $Company;
$body = "New website inquiry\n\n";
$body .= "Name: {$name}\n";
$body .= "Email: {$email}\n";
$body .= "Company: {$company}\n";
$body .= "Service: {$service}\n";
$body .= "Message:\n{$message}\n\n";
$body .= 'Sent on: ' . date('Y-m-d H:i:s') . "\n";
$body .= 'IP: ' . ($_SERVER['REMOTE_ADDR'] ?? '') . "\n";

$headers = 'From: ' . $Company . ' <no-reply@falchionstudios.co.uk>' . "\r\n";
$headers .= 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = @mail($Mail, $subject, $body, $headers);

if (!$sent) {
    $dataDir = __DIR__ . '/data';
    $dataFile = $dataDir . '/leads.json';
    if (!is_dir($dataDir)) {
        @mkdir($dataDir, 0755, true);
    }

    $payload = [
        'ts' => date('c'),
        'name' => $name,
        'email' => $email,
        'company' => $company,
        'service' => $service,
        'message' => $message,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
        'ua' => $_SERVER['HTTP_USER_AGENT'] ?? '',
    ];

    $list = [];
    if (is_file($dataFile)) {
        $decoded = json_decode((string) file_get_contents($dataFile), true);
        if (is_array($decoded)) {
            $list = $decoded;
        }
    }
    array_unshift($list, $payload);
    @file_put_contents($dataFile, json_encode($list, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
}

$_SESSION['contact_success'] = $sent
    ? 'Thanks. Your message has been sent.'
    : 'Thanks. Your message was saved locally and we will follow up manually.';

header('Location: ' . falchion_url('contact.php#contact-form'));
exit;
