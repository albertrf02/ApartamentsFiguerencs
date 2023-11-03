<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Apartamento Título</title>
    <link rel="stylesheet" href="src/CSS/apartament.css">
</head>

<body>
    <div id="content">
        <div id="nav">
            <?php
            include 'head.php';
            ?>
        </div>
        <div class="cont">
            <div class="row">
                <div class="col-md-6 align-start">
                    <h1>Título del Apartamento</h1>
                    <p>Ubicación: Dirección del apartamento</p>
                    <p>Coordenadas: Coordenadas del apartamento</p>
                    <p>Descripción: Descripción del apartamento</p>
                    <h2>Características:</h2>
                    <p>Metros cuadrados: 100 m²</p>
                    <p>Número de Habitaciones: 2</p>
                    <h2>Precio por día:</h2>
                    <p>Temporada Baja: $200.00</p>
                    <p>Temporada Alta: $300.00</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                </div>
                <div class="col-md-6">
                    <div id="carouselImages" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/hab3.jpg" class="d-block w-100" alt="Imagen 1">
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
                    <div class="divmaps">
                        <iframe class="maps"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23621.343034733003!2d2.9446442609151107!3d42.26426456676658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ba8de7daf77b2d%3A0x2f451468ac1a35cb!2s17600%20Figueres%2C%20Girona!5e0!3m2!1sca!2ses!4v1698074996461!5m2!1sca!2ses"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/JS/Apartaments.js"></script>
</body>

</html>