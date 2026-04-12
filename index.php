<?php
require_once __DIR__ . '/falchion-content.php';
require_once __DIR__ . '/text.php';
$pageTitle = 'Home';
$metaTitleOverride = $Company . ' | ' . $SiteTagline;
$metaDescriptionOverride = $SiteDescription;
?>
<?php include 'header.php'; ?>

<?php include 'partials/home/hero.php'; ?>
<?php include 'partials/home/intro-blocks.php'; ?>
<?php include 'partials/home/clients.php'; ?>
<?php include 'partials/home/about-orbit.php'; ?>
<?php include 'partials/home/services.php'; ?>
<?php include 'partials/home/portfolio-showcase.php'; ?>
<?php include 'partials/home/why-choose-us.php'; ?>
<?php include 'partials/home/pricing.php'; ?>
<?php include 'partials/home/testimonials.php'; ?>
<?php include 'partials/home/faq.php'; ?>
<?php include 'partials/home/cta-band.php'; ?>

<?php include 'footer.php'; ?>
