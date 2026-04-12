<?php
$projectRoot  = dirname(__DIR__, 2);
$heroMediaRel = 'assets/img/hero';
$heroMediaDir = $projectRoot . '/' . $heroMediaRel;
$mediaFiles   = [];

if (is_dir($heroMediaDir)) {
    $files = scandir($heroMediaDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'mp4', 'webm', 'mov'])) {
                $mediaFiles[] = [
                    'path' => $BaseURL . $heroMediaRel . '/' . $file,
                    'type' => in_array($ext, ['mp4', 'webm', 'mov']) ? 'video' : 'image',
                    'name' => pathinfo($file, PATHINFO_FILENAME)
                ];
            }
        }
    }
}
?>
<section class="hero dark-hero">
    <div class="container hero__grid">
        <div class="hero__content">
            <span class="eyebrow top-label"><?= htmlspecialchars($HomeHeroCopy['headline'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            <h1 class="hero__title"><?= htmlspecialchars($HomeHeroCopy['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="hero__p"><?= htmlspecialchars($HomeHeroCopy['sub'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
            <div class="button-row">
                <a class="button button--yellow" href="<?= htmlspecialchars(falchion_url($HomeHeroCopy['cta_primary_href'] ?? 'contact.php'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($HomeHeroCopy['cta_primary'] ?? 'Get started', ENT_QUOTES, 'UTF-8') ?></a>
                <a class="button button--outline-yellow" href="<?= htmlspecialchars(falchion_url($HomeHeroCopy['cta_secondary_href'] ?? 'projects.php'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($HomeHeroCopy['cta_secondary'] ?? 'Explore Projects', ENT_QUOTES, 'UTF-8') ?></a>
            </div>
        </div>

        <div class="hero__media">
            <div class="marquee-wrapper">
                <div class="marquee-track">
                    <?php 
                    // Imprimir 2 veces el bloque exacto de medios para crear el loop infinito sin saltos
                    for ($iteration = 0; $iteration < 2; $iteration++): 
                        foreach ($mediaFiles as $media): 
                    ?>
                        <div class="marquee-item">
                            <?php if ($media['type'] === 'video'): ?>
                                <video src="<?= htmlspecialchars($media['path'], ENT_QUOTES, 'UTF-8') ?>" autoplay muted loop playsinline></video>
                            <?php else: ?>
                                <img src="<?= htmlspecialchars($media['path'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($media['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                            <?php endif; ?>
                        </div>
                    <?php 
                        endforeach; 
                    endfor; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
