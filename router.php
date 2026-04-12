<?php
/**
 * Router for PHP built-in server (php -S).
 * Handles clean URLs, removes .php extensions, and routes service/blog slugs.
 *
 * Usage: php -S 127.0.0.1:8001 router.php
 */

$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri    = rawurldecode($uri);
$root   = __DIR__;
$target = $root . $uri;

// 1. If the request maps to an existing file (css, js, img, etc.) serve it directly
if ($uri !== '/' && is_file($target)) {
    // Let the built-in server handle static files
    return false;
}

// 2. Block sensitive paths
if (preg_match('#^/(\.git|\.env|data/)#', $uri)) {
    http_response_code(403);
    echo '403 Forbidden';
    return true;
}

// 3. Service pages: /service/slug → service/index.php?slug=slug
if (preg_match('#^/service/([a-z0-9-]+)/?$#', $uri, $m)) {
    $_GET['slug']               = $m[1];
    $_SERVER['QUERY_STRING']    = http_build_query($_GET);
    $_SERVER['REQUEST_URI']     = '/service/index.php?slug=' . $m[1];
    require $root . '/service/index.php';
    return true;
}

// 4. Blog posts: /blog/slug → blog-post.php?slug=slug
if (preg_match('#^/blog/([a-z0-9-]+)/?$#', $uri, $m)) {
    $_GET['slug']               = $m[1];
    $_SERVER['QUERY_STRING']    = http_build_query($_GET);
    $_SERVER['REQUEST_URI']     = '/blog-post.php?slug=' . $m[1];
    require $root . '/blog-post.php';
    return true;
}

// 5. Clean URLs: /contact → contact.php, /about → about.php, etc.
$cleaned = ltrim($uri, '/');
if ($cleaned === '' || $cleaned === '/') {
    $cleaned = 'index';
}
$cleaned = rtrim($cleaned, '/');

// Try adding .php
$phpFile = $root . '/' . $cleaned . '.php';
if (is_file($phpFile)) {
    require $phpFile;
    return true;
}

// 6. Redirect .php requests to clean URLs (301)
if (preg_match('#^(.+)\.php$#', $uri, $m)) {
    header('Location: ' . $m[1], true, 301);
    return true;
}

// 7. Default: try index.php (home)
if ($uri === '/') {
    require $root . '/index.php';
    return true;
}

// 404
http_response_code(404);
require $root . '/404.php';
return true;
