<?php @session_start(); ?>

<!DOCTYPE html>
<?php include 'text.php'; ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php
        // Asegúrate de que $page_name esté definida, por ejemplo, usando basename($_SERVER['PHP_SELF'])
        if (!isset($page_name)) {
            $page_name = basename($_SERVER['PHP_SELF']);
        }

        if ($page_name == 'about.php') {
            echo "$Company | About";
        } elseif ($page_name == 'services.php') {
            echo "$Company | Services";
        } elseif ($page_name == 'gallery.php') {
            echo "$Company | Gallery";
        } elseif ($page_name == '404.php') {
            echo "$Company | 404";
        } elseif ($page_name == 'thank-you.php') {
            echo "$Company | Thank you";
        } elseif ($page_name == 'contact.php') {
            echo "$Company | Contact";
        } else {
            // Manejar la página de inicio o cualquier otra página no listada
            echo "$Company | Home";
        } ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Inter:wght@100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/testimonials.css">
    <link rel="stylesheet" href="assets/css/star.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.php"><img data-anim="fade"  src="assets/img/logo-white.png" alt="Rakar"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Our Services</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout1 ">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">

                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-map"></i> <?= $Address ?></li>
                                <li><i class="fas fa-envelope"></i> <a href="<?= $MailRef ?>"><?= $Mail ?></a></li>
                                <li><i class="fas fa-phone"></i> <a href="<?= $PhoneRef ?>"><?= $Phone ?></a></li>
                                 <li><i class="fas fa-phone"></i> <a href="<?= $PhoneRef2 ?>"><?= $Phone2 ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="d-flex align-items-center gap-2 header__top-right">
                            <?php if (!empty($facebook)) : ?>
                                <a aria-label="Facebook" href="<?= $facebook ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($yelp)) : ?>
                                <a aria-label="Yelp" href="<?= $yelp ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fab fa-yelp"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($google)) : ?>
                                <a aria-label="Google Reviews" href="<?= $google ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fab fa-google"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($mapquest)) : ?>
                                <a aria-label="MapQuest" href="<?= $mapquest ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-map-marked-alt"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($angi)) : ?>
                                <a aria-label="Angi" href="<?= $angi ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-star"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($thumbtack)) : ?>
                                <a aria-label="Thumbtack" href="<?= $thumbtack ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-thumbtack"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($homeadvisor)) : ?>
                                <a aria-label="HomeAdvisor" href="<?= $homeadvisor ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-home"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="sticky-wrapper">
            <div class="container">
                <div class="menu-area">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="index.php"><img data-anim="fade"  src="assets/img/logo-white.png" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="services.php">Our Services</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>

                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                        class="fas fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <a class="header-call" href="<?php echo $PhoneRef; ?>"><span class="icon-btn"><i
                                                class="fas fa-phone-volume"></i></span> <?php echo $Phone; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </header>


    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script src="assets/js/jquery.imagesloaded.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/main.js"></script> <script>
        document.addEventListener("DOMContentLoaded", () => {
            AOS.init({
                once: true,      // animación solo una vez
                duration: 900,   // duración en ms
                easing: 'ease-out-cubic',
                offset: 100
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {
            // Manejar la apertura y cierre del menú móvil
            $('.th-menu-toggle').on('click', function(e) {
                e.preventDefault();
                // Alternar la clase en el wrapper del menú
                $('.th-menu-wrapper').toggleClass('menu-open');
                // Alternar una clase en el body para evitar el scroll detrás del menú
                $('body').toggleClass('menu-active');
            });
            
            // Cerrar el menú si se hace clic fuera de él (opcional, depende del CSS)
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.th-menu-wrapper').length && !$(e.target).closest('.th-menu-toggle').length && $('body').hasClass('menu-active')) {
                    $('.th-menu-wrapper').removeClass('menu-open');
                    $('body').removeClass('menu-active');
                }
            });
        });
    </script>
    
    <script>
        (function($) {
            function initGallery() {
                var $grid = $('.gm-grid');

                // Fallback CSS mientras carga / si no existe Isotope
                $grid.addClass('gm-fallback');

                var hasIso = !!$.fn.isotope;
                var hasImg = !!$.fn.imagesLoaded;

                if (!hasIso || !hasImg || !$grid.length) return;

                $grid.imagesLoaded(function() {
                    $grid.removeClass('gm-fallback').addClass('is-ready').isotope({
                        itemSelector: '.g-item',
                        percentPosition: true,
                        layoutMode: 'masonry',
                        masonry: {
                            columnWidth: '.grid-sizer',
                            gutter: 12
                        }
                    });
                });

                // filtros
                $('.gm-filters').on('click', '.chip', function() {
                    var $b = $(this);
                    $b.addClass('is-active').siblings().removeClass('is-active');
                    $grid.isotope({
                        filter: $b.data('filter')
                    });
                });

                // lightbox
                $('.gallery-nova .popup-image').magnificPopup({
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    image: {
                        titleSrc: function(item) {
                            return item.el.attr('data-caption') || '<?= addslashes($Company) ?>';
                        }
                    }
                });
            }
            // asegúrate que ya están cargados los plugins
            $(window).on('load', initGallery);
        })(jQuery);
    </script>
/