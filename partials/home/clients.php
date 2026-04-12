<?php
$clientLogos = [
    ['file' => 'gyg-legal.com.png',                    'name' => 'GYG Legal',             'url' => 'https://gyg-legal.com'],
    ['file' => 'nataliatrejospsicoterapia.com.png',     'name' => 'Natalia Trejos',        'url' => 'https://nataliatrejospsicoterapia.com'],
    ['file' => 'resortager.com.png',                    'name' => 'Resortager',            'url' => 'https://resortager.com'],
    ['file' => 'shop.celavista.com.png',                'name' => 'Celavista',             'url' => 'https://shop.celavista.com'],
    ['file' => 'sistemacuinabcn.com.png',               'name' => 'Sistema Cuina BCN',     'url' => 'https://sistemacuinabcn.com'],
    ['file' => 'vallcuerba.com.png',                    'name' => 'Vallcuerba',            'url' => 'https://www.vallcuerba.com'],
    ['file' => 'cmreducate.com.png',                    'name' => 'CMR Educate',           'url' => 'https://cmreducate.com'],
    ['file' => 'luxoboutique.com.png',                  'name' => 'Luxo Boutique',         'url' => 'https://www.luxoboutique.com'],
    ['file' => 'vdcontractors.png',                     'name' => 'VD Contractors',        'url' => 'https://vdcontractors.com'],
];
$basePath = 'assets/img/clients/';
?>

<section class="clients-bar">
    <div class="container">
        <p class="clients-bar__label">Trusted by</p>
    </div>
    <div class="clients-bar__track-wrap" aria-label="Client logos">
        <div class="clients-bar__track">
            <?php foreach ($clientLogos as $client): ?>
            <a class="clients-bar__item"
               href="<?= htmlspecialchars($client['url'], ENT_QUOTES, 'UTF-8') ?>"
               target="_blank" rel="noopener noreferrer"
               title="<?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?>">
                <img src="<?= htmlspecialchars($basePath . $client['file'], ENT_QUOTES, 'UTF-8') ?>"
                     alt="<?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?>"
                     loading="lazy">
            </a>
            <?php endforeach; ?>
            <?php foreach ($clientLogos as $client): ?>
            <a class="clients-bar__item"
               href="<?= htmlspecialchars($client['url'], ENT_QUOTES, 'UTF-8') ?>"
               target="_blank" rel="noopener noreferrer"
               title="<?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?>"
               aria-hidden="true" tabindex="-1">
                <img src="<?= htmlspecialchars($basePath . $client['file'], ENT_QUOTES, 'UTF-8') ?>"
                     alt=""
                     loading="lazy">
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
