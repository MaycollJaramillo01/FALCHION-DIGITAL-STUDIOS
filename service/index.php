<?php
$validSlugs = [
    'graphic-design',
    'web-design',
    'video-production',
    'motion-graphics',
    'digital-marketing',
];

// Try ?slug= param first (htaccess rewrite), then parse from REQUEST_URI
$slug = trim((string) ($_GET['slug'] ?? ''), '/');

if ($slug === '') {
    $uri = parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH);
    $slug = trim(basename((string) $uri), '/');
}

if (!in_array($slug, $validSlugs, true)) {
    http_response_code(404);
    include __DIR__ . '/../404.php';
    exit;
}

$serviceSlug = $slug;
require __DIR__ . '/../service-page.php';
