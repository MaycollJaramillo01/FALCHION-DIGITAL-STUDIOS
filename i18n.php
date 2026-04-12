<?php
if (defined('BB_I18N_BOOTSTRAPPED')) {
    return;
}

define('BB_I18N_BOOTSTRAPPED', true);

function i18n_supported_locales(): array
{
    return ['es', 'en'];
}

function i18n_default_locale(): string
{
    return 'en';
}

function i18n_normalize_locale($locale): string
{
    $locale = strtolower(trim((string)$locale));
    return in_array($locale, i18n_supported_locales(), true) ? $locale : i18n_default_locale();
}

function i18n_get_locale(): string
{
    static $locale = null;

    if ($locale !== null) {
        return $locale;
    }

    $defaultLocale = i18n_default_locale();
    $requestedLocale = '';

    if (isset($_GET['lang'])) {
        $requestedLocale = i18n_normalize_locale($_GET['lang']);
        i18n_persist_locale($requestedLocale);
    } elseif (isset($_COOKIE['bb_site_lang'])) {
        $requestedLocale = i18n_normalize_locale($_COOKIE['bb_site_lang']);
    }

    $locale = $requestedLocale !== '' ? $requestedLocale : $defaultLocale;
    return $locale;
}

function i18n_is_locale(string $locale): bool
{
    return i18n_get_locale() === i18n_normalize_locale($locale);
}

function i18n_persist_locale(string $locale): void
{
    $locale = i18n_normalize_locale($locale);
    $maxAge = 60 * 60 * 24 * 365;
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

    setcookie('bb_site_lang', $locale, [
        'expires' => time() + $maxAge,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => false,
        'samesite' => 'Lax',
    ]);

    $_COOKIE['bb_site_lang'] = $locale;
}

function t(string $es, ?string $en = null): string
{
    return i18n_is_locale('en') ? (string)($en ?? $es) : $es;
}

function t_attr(string $es, ?string $en = null): string
{
    return htmlspecialchars(t($es, $en), ENT_QUOTES, 'UTF-8');
}

function i18n_switch_url(string $locale, bool $explicit = false): string
{
    $locale = i18n_normalize_locale($locale);
    $requestUri = (string)($_SERVER['REQUEST_URI'] ?? '');
    $parts = parse_url($requestUri);

    $path = (string)($parts['path'] ?? '');
    if ($path === '') {
        $path = 'index.php';
    }

    $query = [];
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $query);
    }

    if ($locale === i18n_default_locale() && !$explicit) {
        unset($query['lang']);
    } else {
        $query['lang'] = $locale;
    }

    $queryString = http_build_query($query);
    return $path . ($queryString !== '' ? '?' . $queryString : '');
}

function i18n_localized_url(string $path): string
{
    $path = trim($path);
    if ($path === '') {
        $path = 'index.php';
    }

    $fragment = '';
    $fragmentPosition = strpos($path, '#');
    if ($fragmentPosition !== false) {
        $fragment = substr($path, $fragmentPosition);
        $path = substr($path, 0, $fragmentPosition);
    }

    $parts = parse_url($path);
    if ($parts === false) {
        return $path . $fragment;
    }

    $scheme = isset($parts['scheme']) ? (string)$parts['scheme'] : '';
    $host = isset($parts['host']) ? (string)$parts['host'] : '';
    if ($scheme !== '' || $host !== '') {
        return $path . $fragment;
    }

    $normalizedPath = isset($parts['path']) ? (string)$parts['path'] : '';
    if ($normalizedPath === '') {
        $normalizedPath = (string)parse_url((string)($_SERVER['REQUEST_URI'] ?? 'index.php'), PHP_URL_PATH);
        if ($normalizedPath === '') {
            $normalizedPath = 'index.php';
        }
    }

    $extension = strtolower(pathinfo($normalizedPath, PATHINFO_EXTENSION));
    if ($extension !== '' && !in_array($extension, ['php', 'html', 'htm'], true)) {
        return $path . $fragment;
    }

    $query = [];
    if (!empty($parts['query'])) {
        parse_str((string)$parts['query'], $query);
    }

    if (array_key_exists('lang', $query)) {
        $query['lang'] = i18n_normalize_locale($query['lang']);
        $queryString = http_build_query($query);
        // Remove .php extension for clean URLs
        $normalizedPath = preg_replace('/\.php$/', '', $normalizedPath);
        return $normalizedPath . ($queryString !== '' ? '?' . $queryString : '') . $fragment;
    }

    if (!i18n_is_locale(i18n_default_locale())) {
        $query['lang'] = i18n_get_locale();
    }

    $queryString = http_build_query($query);

    // Remove .php extension for clean URLs
    $normalizedPath = preg_replace('/\.php$/', '', $normalizedPath);

    return $normalizedPath . ($queryString !== '' ? '?' . $queryString : '') . $fragment;
}

function i18n_localize_markup_urls(string $html): string
{
    return preg_replace_callback(
        '/\b(href|action)=([\'"])([^\'"]+)\2/i',
        static function (array $matches): string {
            $attribute = $matches[1];
            $quote = $matches[2];
            $url = $matches[3];
            $trimmed = trim($url);

            if ($trimmed === '') {
                return $matches[0];
            }

            $lower = strtolower($trimmed);
            foreach (['#', 'mailto:', 'tel:', 'javascript:', 'data:', 'blob:'] as $prefix) {
                if (strpos($lower, $prefix) === 0) {
                    return $matches[0];
                }
            }

            if (strpos($trimmed, '//') === 0) {
                return $matches[0];
            }

            $localized = i18n_localized_url($trimmed);
            return $attribute . '=' . $quote . $localized . $quote;
        },
        $html
    );
}

function i18n_translate_output(string $html): string
{
    $html = i18n_localize_markup_urls($html);

    if (i18n_is_locale('en')) {
        static $translations = null;
        if ($translations === null) {
            $translationFile = __DIR__ . '/data/ui-translations.php';
            $translations = is_file($translationFile) ? (require $translationFile) : [];
        }

        if (!empty($translations)) {
            $translatedMarkup = i18n_translate_markup_text($html, $translations);
            $html = $translatedMarkup !== '' ? $translatedMarkup : strtr($html, $translations);
        }
    }

    return $html;
}

function i18n_translate_markup_text(string $html, array $translations): string
{
    if ($html === '' || !class_exists('DOMDocument')) {
        return '';
    }

    $dom = new DOMDocument('1.0', 'UTF-8');
    $flags = 0;
    if (defined('LIBXML_HTML_NOIMPLIED')) {
        $flags |= LIBXML_HTML_NOIMPLIED;
    }
    if (defined('LIBXML_HTML_NODEFDTD')) {
        $flags |= LIBXML_HTML_NODEFDTD;
    }

    $internalErrors = libxml_use_internal_errors(true);
    $loaded = $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, $flags);
    libxml_clear_errors();
    libxml_use_internal_errors($internalErrors);

    if (!$loaded) {
        return '';
    }

    i18n_translate_dom_node($dom, $translations);

    $result = $dom->saveHTML();
    if (!is_string($result) || $result === '') {
        return '';
    }

    return preg_replace('/^<\?xml[^>]+>\s*/', '', $result) ?? '';
}

function i18n_translate_dom_node(DOMNode $node, array $translations): void
{
    if ($node instanceof DOMText) {
        $node->nodeValue = i18n_translate_text_segment($node->nodeValue ?? '', $translations);
        return;
    }

    if ($node instanceof DOMElement) {
        $tagName = strtolower($node->tagName);
        if (in_array($tagName, ['script', 'style', 'noscript', 'template'], true)) {
            return;
        }

        foreach (['aria-label', 'placeholder', 'alt', 'title', 'value', 'data-quick'] as $attribute) {
            if ($node->hasAttribute($attribute)) {
                $node->setAttribute($attribute, i18n_translate_text_segment($node->getAttribute($attribute), $translations));
            }
        }
    }

    /** @var DOMNode $child */
    foreach ($node->childNodes as $child) {
        i18n_translate_dom_node($child, $translations);
    }
}

function i18n_translate_text_segment(string $text, array $translations): string
{
    if ($text === '' || empty($translations)) {
        return $text;
    }

    static $cachedPatterns = [];
    $cacheKey = md5(implode("\n", array_keys($translations)));

    if (!isset($cachedPatterns[$cacheKey])) {
        $keys = array_keys($translations);
        usort($keys, static function (string $a, string $b): int {
            return strlen($b) <=> strlen($a);
        });

        $patterns = [];
        foreach ($keys as $source) {
            if ($source === '') {
                continue;
            }

            $patterns[] = [
                'pattern' => '/(?<![\p{L}\p{N}])' . preg_quote($source, '/') . '(?![\p{L}\p{N}])/u',
                'replace' => (string)$translations[$source],
            ];
        }

        $cachedPatterns[$cacheKey] = $patterns;
    }

    foreach ($cachedPatterns[$cacheKey] as $entry) {
        $text = preg_replace($entry['pattern'], $entry['replace'], $text) ?? $text;
    }

    return $text;
}

function i18n_start_buffer(): void
{
    static $started = false;

    if ($started) {
        return;
    }

    $started = true;
    ob_start('i18n_translate_output');
}
