<?php
session_start();
require_once '../../config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click&Serve - Menú</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <style>
    body {
    background: #faf7f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #4a4a4a;
    margin: 0;
    padding: 0;
}

.container-menu {
    padding: 100px 15px 60px;
    max-width: 1200px;
    margin: 0 auto;
}

.titulo-menu {
    text-align: center;
    margin-bottom: 60px;
    font-size: 3rem;
    font-weight: 700;
    color: #a98ca0; /* pastel lavanda */
    border-bottom: 3px solid #c8b5d9;
    padding-bottom: 12px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
}

.col-md-6, .col-lg-4 {
    flex: 1 1 30%;
    max-width: 30%;
    box-sizing: border-box;
}

.categoria-card {
    background: #fff;
    border-radius: 25px;
    box-shadow: 0 12px 30px rgba(169, 140, 160, 0.15);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    height: 430px;
}

.categoria-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(169, 140, 160, 0.3);
}

.categoria-card a {
    color: inherit;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.categoria-img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    border-bottom: 2px solid #e4dff2;
}

.categoria-body {
    padding: 30px 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.categoria-title {
    font-size: 1.9rem;
    font-weight: 700;
    color: #b39bc8; /* lavanda oscuro */
    margin-bottom: 0.5rem;
}

.categoria-subtitle {
    font-size: 1.1rem;
    color: #9783ac;
    font-style: italic;
    margin-bottom: 1rem;
}

.categoria-desc {
    font-size: 1rem;
    color: #6d6470;
    line-height: 1.4;
    flex-grow: 1;
}

.btn-elegante {
    background: #b39bc8;
    color: white;
    border-radius: 50px;
    padding: 12px 28px;
    font-weight: 600;
    font-size: 1.1rem;
    border: none;
    box-shadow: 0 5px 20px rgba(179, 155, 200, 0.3);
    transition: background-color 0.3s ease, transform 0.3s ease;
    cursor: pointer;
    align-self: center;
    margin-top: 30px;
    display: inline-block;
}

.btn-elegante:hover {
    background: #9a84b8;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(154, 132, 184, 0.5);
}

@media (max-width: 991px) {
    .col-md-6, .col-lg-4 {
        max-width: 45%;
        flex: 1 1 45%;
    }
}

@media (max-width: 576px) {
    .col-md-6, .col-lg-4 {
        max-width: 100%;
        flex: 1 1 100%;
    }

    .titulo-menu {
        font-size: 2.4rem;
        max-width: 100%;
    }

    .categoria-img {
        height: 180px;
    }

    .categoria-card {
        height: auto;
    }
}

</style>

</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container container-menu">
        <h1 class="titulo-menu">Menú de la Casa</h1>

        <div class="row">
            <?php
            $categorias = [
                ["Desayunos", "https://comedera.com/wp-content/uploads/sites/9/2022/12/Desayono-americano-shutterstock_2120331371.jpg", "Lo mejor de la Casa", "Empieza tu día con nuestros deliciosos desayunos.", "Desayunos.php"],
                ["Platos Principales", "https://mandolina.co/wp-content/uploads/2024/06/carne-asada-a-la-parrilla-1080x550-1-1200x900.jpg", "El sabor de nuestro puerto", "Nuestros platos estrella preparados con las mejores recetas.", "PlatosPrincipales.php"],
                ["Antojos", "https://foodisafourletterword.com/wp-content/uploads/2020/09/Instant_Pot_Birria_Tacos_with_Consomme_Recipe_tacoplate.jpg", "Lo mejor de la Casa", "Deliciosos antojitos para compartir o disfrutar solo.", "Antojos.php"],
                ["Entradas", "https://www.recetasnestle.com.ec/sites/default/files/srh_recipes/4e4293857c03d819e4ae51de1e86d66a.jpg", "Para comenzar", "Perfectas para compartir mientras esperas tu plato principal.", "Entradas.php"],
                ["Bebidas", "https://www.tuhogar.com/content/dam/cp-sites/home-care/tu-hogar/es_mx/recetas/snacks-bebidas-y-postres/aprende-a-preparar-batidos-saludables/4-ideas-para-preparar-batidos-saludables-axion.jpg", "Refrescantes", "La mejor selección de bebidas para acompañar tu comida.", "bebidas.php"],
                ["Postres", "https://images.aws.nestle.recipes/resized/2024_10_23T08_34_55_badun_images.badun.es_pastelitos_de_chocolate_blanco_y_queso_con_fresas_1290_742.jpg", "Dulces tentaciones", "Termina tu comida con nuestros deliciosos postres caseros.", "Postres.php"]
            ];

            foreach ($categorias as $cat) {
                echo "<div class='col-md-6 col-lg-4'>
                    <div class='categoria-card'>
                        <a href='{$cat[4]}'>
                            <img src='{$cat[1]}' class='categoria-img' alt='{$cat[0]}'>
                            <div class='categoria-body'>
                                <h3 class='categoria-title'>{$cat[0]}</h3>
                                <div class='categoria-subtitle'>{$cat[2]}</div>
                                <p class='categoria-desc'>{$cat[3]}</p>
                            </div>
                        </a>
                    </div>
                </div>";
            }
            ?>
        </div>

        <!-- Botón Regresar -->
       <div class="text-center mt-5">
        <a href="index.php" class="btn-elegante">Regresar al Inicio</a>
        </div>

</body>
</html>