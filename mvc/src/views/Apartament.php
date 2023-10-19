<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Apartamento Título</title>
    <link rel="stylesheet" href="proves.css">
</head>
<body>
    <div id="nav">
        <?php
        include 'head.php';
        ?>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselImages" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/Habslider1.jpg" class="d-block w-100" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="img/Habslider2.jpg" class="d-block w-100" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="img/Habslider3.jpg" class="d-block w-100" alt="Imagen 3">
                        </div>
                        <!-- Agrega más imágenes aquí según sea necesario -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselImages" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselImages" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <h1>Título del Apartamento</h1>
                <p>Ubicación: Dirección del apartamento</p>
                <p>Coordenadas: Coordenadas del apartamento</p>
                <p>Descripción: Descripción del apartamento</p>
                <h2>Características:</h2>
                <ul>
                    <li>Metros cuadrados: 100 m²</li>
                    <li>Número de Habitaciones: 2</li>
                    <!-- Agrega más detalles aquí según tu tabla "Apartament" -->
                </ul>
                <h2>Precio por día:</h2>
                <p>Temporada Baja: $200.00</p>
                <p>Temporada Alta: $300.00</p>
                <a href="#" class="btn btn-primary">Reservar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/JS/Apartaments.js"></script>
</body>
</html>
