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
            background: url("https://img.freepik.com/fotos-premium/fondo-rojo-pinceladas-blancas_851755-102.jpg") no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        nav.navbar {
            background-color: #ffe4e1 !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        nav.navbar .navbar-brand, nav.navbar .nav-link {
            color: #c62828 !important;
            font-weight: bold;
            text-transform: uppercase;
        }

        nav.navbar .nav-link:hover {
            color: #f44336 !important;
        }

        .btn-carrito {
            background-color: #ffebeb;
            border: 2px solid #ff0000;
            border-radius: 50px;
            padding: 0.5rem 1.2rem;
            color: #ff0000;
            font-weight: bold;
            transition: all 0.4s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .btn-carrito:hover {
            background-color: #ff0000;
            color: white;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
            transform: scale(1.1) rotate(-2deg);
        }

        .container-menu {
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .titulo-menu {
            text-align: center;
            margin: 40px auto;
            color: #d32f2f;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 3px solid #d32f2f;
            padding-bottom: 10px;
            max-width: 600px;
            font-size: 2.2rem;
        }

        .categoria-card {
            display: flex;
            flex-direction: row;
            transition: all 0.4s ease;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
            background: #ffffff;
            height: 250px;
            margin-bottom: 30px;
            position: relative;
        }

        .categoria-card::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .categoria-card:hover::after {
            background-color: rgba(255, 0, 0, 0.3);
        }

        .categoria-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 16px 30px rgba(0,0,0,0.2);
        }

        .categoria-card a {
            text-decoration: none;
            color: inherit;
            display: flex;
            width: 100%;
            height: 100%;
        }

        .categoria-img {
            width: 40%;
            height: 100%;
            object-fit: cover;
        }

        .categoria-body {
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 60%;
        }

        .categoria-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #d32f2f;
            font-weight: bold;
        }

        .categoria-subtitle {
            font-weight: 600;
            color: #444;
            margin-bottom: 10px;
        }

        .categoria-desc {
            color: #555;
            font-size: 1rem;
        }

        .card-redirect {
            background: linear-gradient(145deg, #fff, #f0f0f0);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 400px;
            margin: 60px auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-redirect:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(0,0,0,0.2);
        }

        .card-redirect h4 {
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #d32f2f;
        }

        .btn-animado {
            background: #d32f2f;
            color: #fff;
            padding: 0.9rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-animado::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.2);
            transition: left 0.5s;
        }

        .btn-animado:hover::after {
            left: 100%;
        }

        .btn-animado:hover {
            background: #b71c1c;
        }

        @media (max-width: 768px) {
            .categoria-card {
                flex-direction: column;
                height: auto;
            }

            .categoria-img {
                width: 100%;
                height: 200px;
            }

            .categoria-body {
                width: 100%;
            }

            .categoria-title {
                font-size: 1.5rem;
            }

            .titulo-menu {
                font-size: 1.8rem;
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
            <a href="index.php" class="btn btn-danger btn-lg">Regresar al Inicio</a>
        </div>
    </div>
</body>
</html>