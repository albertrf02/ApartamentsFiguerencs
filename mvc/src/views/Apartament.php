<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Apartamento Título</title>
    <link rel="stylesheet" href="src/CSS/apartament.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
        integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/JS/Apartaments.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>

<body>
    <div id="content">
        <div id="nav">
            <?php
            include 'head.php';
            ?>
        </div>
        <div class="cont" id="content">
            <div class="row">
                <div class="col-md-6 align-start">
                    <input type="hidden" id="idApartament" value="<?php echo $apartmentId?>">
                    <h1 id="apartment-name2"></h1>
                    <p id="apartment-address2"></p>
                    <p id="apartment-description2"></p>
                    <h2>Características:</h2>
                    <p id="apartment-M42"></p>
                    <p id="apartment-bedrooms2"></p>
                    <p>Current Season:
                        <?php echo $currentSeason; ?>
                    </p>
                    <p>
                        <?php echo $apartmentPrice; ?> €
                    </p>
                    <div class="dropdown">
                        <a href="#" class="btn btn-primary" onclick="toggleDropdown()">Reservar</a>
                        <div class="dropdown-content" id="dropdownContent">
                            <form action="index.php?r=apartament&action=crearReserva" method="post">

                                <label for="dataInici">Start Date:</label>
                                <input type="date" name="dataInici" id="dataInici" required><br><br>

                                <label for="dataFi">End Date:</label>
                                <input type="date" name="dataFi" id="dataFi" required><br><br>

                                <label for="numUsuaris">Usuari:</label>
                                <input type="number" name="numUsuaris" id="numUsuaris" required><br><br>

                                <input type="hidden" name="idApartament" id="idApartament" value="<?php echo $apartmentId?>">
                                <input type="hidden" name="preu" id="preu" value="<?php echo $apartmentPrice?>">
                                <input type="hidden" name="idTemporada" id="idTemporada" value="<?php echo $idTemporada?>">


                                <input type="submit" value="Reserva">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="image-slider">
                            <!-- Las imágenes se cargarán aquí dinámicamente -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div id="map" style="height: 400px;"></div>

                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>