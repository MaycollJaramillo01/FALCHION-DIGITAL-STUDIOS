<?php
/* =========================================================
   LÓGICA BACKEND INTERNA (Procesamiento de Reseñas)
   ========================================================= */
// Asegúrate de que la sesión esté iniciada si no lo está ya en el index
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Configuración de Archivo JSON
$data_dir = __DIR__ . '/data';
$json_file = $data_dir . '/testimonials.json';

// 1. Crear directorio y archivo si no existen
if (!file_exists($json_file)) {
    if (!is_dir($data_dir)) { mkdir($data_dir, 0777, true); }
    file_put_contents($json_file, json_encode(['items' => []]));
}

// 2. Procesar Envío del Formulario
$alert_msg = "";
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['submit_review'])) {
    
    // Anti-Flood (Esperar 30 segundos entre posts)
    if (isset($_SESSION['last_post_time']) && (time() - $_SESSION['last_post_time'] < 30)) {
        $alert_msg = '<div class="alert-box error">Espera 30 segundos antes de publicar otra reseña.</div>';
    } else {
        // Sanitización
        $name = htmlspecialchars(trim($_POST['r_name']));
        $city = htmlspecialchars(trim($_POST['r_city']));
        $rating = (int)$_POST['r_rating'];
        $message = htmlspecialchars(trim($_POST['r_message']));

        if ($name && $message && $rating) {
            // Cargar datos existentes
            $current_data = json_decode(file_get_contents($json_file), true);
            $items = isset($current_data['items']) ? $current_data['items'] : (is_array($current_data) ? $current_data : []);

            // Crear nueva entrada
            $new_entry = [
                'id' => uniqid(),
                'name' => $name,
                'city' => $city,
                'rating' => $rating,
                'message' => $message,
                'date' => time()
            ];

            // Insertar al inicio
            array_unshift($items, $new_entry);

            // Guardar
            if (file_put_contents($json_file, json_encode(['items' => $items], JSON_PRETTY_PRINT))) {
                $_SESSION['last_post_time'] = time();
                // Redirección JS para limpiar el formulario (PRG)
                echo "<script>window.location.href = window.location.href.split('?')[0] + '?status=success#reviews-section';</script>";
                exit;
            }
        } else {
            $alert_msg = '<div class="alert-box error">Nombre, calificacion y mensaje son obligatorios.</div>';
        }
    }
}

// Mensaje de éxito tras redirección
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $alert_msg = '<div class="alert-box success">Reseña enviada correctamente. Gracias.</div>';
}

// 3. Leer Reseñas para Mostrar
$raw_data = file_get_contents($json_file);
$decoded_data = json_decode($raw_data, true);
$all_reviews = isset($decoded_data['items']) ? $decoded_data['items'] : (is_array($decoded_data) ? $decoded_data : []);

// Paginación (8 por página)
$limit = 8;
$total_reviews = count($all_reviews);
$total_pages = ceil($total_reviews / $limit);
$current_page = isset($_GET['p']) ? max(1, (int)$_GET['p']) : 1;
$offset = ($current_page - 1) * $limit;
$visible_reviews = array_slice($all_reviews, $offset, $limit);
?>

<style>
    /* Variables fallback por si no cargan del CSS principal */
    .sec-testimonials {
        padding: 100px 0;
        background-color: var(--bg-light, #f9f9f9);
        font-family: var(--body-font, sans-serif);
    }

    /* GRID LAYOUT (2 COLUMNAS) */
    .reviews-layout {
        display: grid;
        grid-template-columns: 380px 1fr; /* Izquierda Fija | Derecha Flexible */
        gap: 40px;
        align-items: start;
    }

    /* --- COLUMNA IZQUIERDA: FORMULARIO STICKY --- */
    .form-sticky-col {
        position: sticky;
        top: 120px; /* Se queda pegado al bajar */
        background: #fff;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: var(--shadow-medium, 0 10px 30px rgba(0,0,0,0.08));
        border-top: 5px solid var(--brand-secondary, #FF6825);
    }

    .form-head h3 {
        font-family: var(--title-font, sans-serif);
        font-size: 22px;
        color: var(--brand-primary, #1E1E1E);
        margin-bottom: 15px;
        text-align: center;
        font-weight: 700;
    }

    .inp-group { margin-bottom: 15px; }
    
    .inp-field {
        width: 100%;
        padding: 14px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #fafafa;
        transition: 0.3s;
        font-family: inherit;
    }
    .inp-field:focus {
        border-color: var(--brand-secondary, #FF6825);
        background: #fff;
        outline: none;
    }

    /* Estrellas Interactivas */
    .stars-input-wrapper {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        margin-bottom: 20px;
        gap: 5px;
    }
    .stars-input-wrapper input { display: none; }
    .stars-input-wrapper label {
        font-size: 28px;
        color: #ddd;
        cursor: pointer;
        transition: 0.2s;
    }
    .stars-input-wrapper label:hover,
    .stars-input-wrapper label:hover ~ label,
    .stars-input-wrapper input:checked ~ label {
        color: #FFC107;
    }

    .btn-send-review {
        width: 100%;
        background: var(--brand-primary, #1E1E1E);
        color: #fff;
        padding: 15px;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        cursor: pointer;
        text-transform: uppercase;
        transition: 0.3s;
    }
    .btn-send-review:hover {
        background: var(--brand-secondary, #FF6825);
        transform: translateY(-2px);
    }

    .google-link-box {
        text-align: center;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #eee;
        font-size: 13px;
    }
    .google-link-box a {
        color: var(--brand-secondary, #FF6825);
        font-weight: 700;
        text-decoration: none;
    }

    /* --- COLUMNA DERECHA: LISTADO --- */
    .reviews-list-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adaptable */
        gap: 25px;
    }

    .review-item-card {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: var(--shadow-soft, 0 5px 15px rgba(0,0,0,0.05));
        border: 1px solid #f0f0f0;
        display: flex;
        flex-direction: column;
        transition: 0.3s;
    }
    .review-item-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-medium, 0 15px 30px rgba(0,0,0,0.1));
        border-color: var(--brand-secondary, #FF6825);
    }

    .ri-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
        align-items: center;
    }
    .ri-name { font-weight: 700; color: var(--brand-primary, #1E1E1E); font-size: 16px; }
    .ri-loc { font-size: 12px; color: var(--brand-secondary, #FF6825); display: block; text-transform: uppercase; font-weight: 600; }
    .ri-stars { color: #FFC107; font-size: 13px; }

    .ri-body {
        font-size: 15px;
        line-height: 1.6;
        color: #555;
        font-style: italic;
        flex-grow: 1;
        margin-bottom: 15px;
    }
    
    .ri-date { font-size: 12px; color: #aaa; text-align: right; }

    /* Alertas */
    .alert-box { padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-size: 14px; font-weight: 600; }
    .alert-box.success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-box.error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

    /* Paginación */
    .pagination-bar { text-align: center; margin-top: 40px; grid-column: 1 / -1; }
    .pg-btn {
        display: inline-block; padding: 8px 14px; margin: 0 4px; border: 1px solid #ddd;
        color: #333; text-decoration: none; border-radius: 4px; transition: 0.3s;
    }
    .pg-btn.active, .pg-btn:hover {
        background: var(--brand-primary, #1E1E1E); color: #fff; border-color: var(--brand-primary, #1E1E1E);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .reviews-layout { grid-template-columns: 1fr; }
        .form-sticky-col { position: static; margin-bottom: 50px; }
    }
</style>

<section class="sec-testimonials" id="reviews-section">
    <div class="container">
        
        <div class="sec-title centered" data-anim="up">
            <span class="sub-title">Testimonios</span>
            <h2>Lo que dicen los clientes sobre <?php echo isset($Company) ? $Company : 'nosotros'; ?></h2>
            <div class="separator"></div>
            <p>Atendiendo proyectos en <?php echo isset($Locality) ? $Locality : 'tu zona'; ?>.</p>
        </div>

        <div class="reviews-layout">
            
            <div class="form-sticky-col" data-anim="left">
                <div class="form-head">
                    <h3>Comparte tu experiencia</h3>
                </div>
                
                <?php echo $alert_msg; ?>

                <form method="POST" action="">
                    <div class="stars-input-wrapper">
                        <input type="radio" id="st5" name="r_rating" value="5" checked><label for="st5" title="Excelente"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="st4" name="r_rating" value="4"><label for="st4" title="Muy bueno"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="st3" name="r_rating" value="3"><label for="st3" title="Regular"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="st2" name="r_rating" value="2"><label for="st2" title="Bajo"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" id="st1" name="r_rating" value="1"><label for="st1" title="Malo"><i class="fa-solid fa-star"></i></label>
                    </div>

                    <div class="inp-group">
                        <input type="text" name="r_name" class="inp-field" placeholder="Tu nombre *" required>
                    </div>
                    <div class="inp-group">
                        <input type="text" name="r_city" class="inp-field" placeholder="Ciudad (ej. <?php echo isset($Locality) ? $Locality : 'Laurel'; ?>)">
                    </div>
                    <div class="inp-group">
                        <textarea name="r_message" class="inp-field" rows="5" placeholder="Como fue tu experiencia con el proyecto?" required></textarea>
                    </div>

                    <button type="submit" name="submit_review" class="btn-send-review">
                        Publicar reseña
                    </button>
                </form>

                <?php if(isset($google) && !empty($google)): ?>
                <div class="google-link-box">
                    Tambien puedes ver nuestras reseñas en <a href="<?php echo $google; ?>" target="_blank">Google Maps <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <?php endif; ?>
            </div>

            <div class="list-col">
                <?php if (empty($visible_reviews)): ?>
                    <div style="text-align:center; padding:40px; color:#999; border:2px dashed #eee; border-radius:12px;" data-anim="up">
                        <i class="fa-regular fa-comment-dots" style="font-size:40px; margin-bottom:15px;"></i><br>
                        Aun no hay reseñas. Se la primera persona en compartir tu experiencia.
                    </div>
                <?php else: ?>
                    
                    <div class="reviews-list-grid">
                        <?php foreach ($visible_reviews as $idx => $review): 
                            // Animación en cascada
                            $delay = ($idx % 3) + 1; 
                        ?>
                        <div class="review-item-card" data-anim="up" data-delay="<?php echo $delay; ?>">
                            <div class="ri-header">
                                <div>
                                    <div class="ri-name"><?php echo htmlspecialchars($review['name']); ?></div>
                                    <?php if(!empty($review['city'])): ?>
                                        <span class="ri-loc"><?php echo htmlspecialchars($review['city']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="ri-stars">
                                    <?php 
                                    $s = isset($review['rating']) ? (int)$review['rating'] : 5;
                                    for($i=1; $i<=5; $i++) echo ($i<=$s) ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>'; 
                                    ?>
                                </div>
                            </div>
                            
                            <div class="ri-body">
                                "<?php echo nl2br(htmlspecialchars($review['message'])); ?>"
                            </div>

                            <div class="ri-date">
                                <i class="fa-regular fa-clock"></i> <?php echo date("d/m/Y", $review['date']); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($total_pages > 1): ?>
                    <div class="pagination-bar" data-anim="up">
                        <?php for($p=1; $p<=$total_pages; $p++): ?>
                            <a href="?p=<?php echo $p; ?>#reviews-section" class="pg-btn <?php echo ($p == $current_page) ? 'active' : ''; ?>">
                                <?php echo $p; ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>

                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
