<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='src/CSS/registre.css' rel='stylesheet' />
    <title>uploadApartament</title>
</head>

<body>
    <div id="content">
        <div id="nav">
            <?php
            include 'head.php';
            ?>
        </div>
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 560px;">
                <div class="col-8">
                    <div class="back-link">
                        <a href="index.php">
                            <i class="fas fa-arrow-left"></i> <img src="img/flecha-izquierda.png" alt=""
                                style="width:25px">
                        </a>
                    </div>
                    <h2 class="text-center">Apartament</h2>
                    <hr>
                    <form method="POST" enctype="multipart/form-data" action="index.php?r=uploadapartament">
                        <div class="form-group">
                            <label for="titol">Titol</label>
                            <input type="text" class="form-control" id="titol" name="titol">
                        </div>
                        <div class="form-group">
                            <label for="adreca">Adreça</label>
                            <input type="text" class="form-control" id="adreca" name="adreca">
                        </div>
                        <div class="form-group">
                            <label for="longitud">Longitud</label>
                            <input type="text" class="form-control" id="longitud" name="longitud">
                        </div>
                        <div class="form-group">
                            <label for="latitud">Latitud</label>
                            <input type="text" class="form-control" id="latitud" name="latitud">
                        </div>
                        <div class="form-group">
                            <label for="descripcio">Descripció</label>
                            <input type="text" class="form-control" id="descripcio" name="descripcio">
                        </div>
                        <div class="form-group">
                            <label for="metresQuadrats">Metres Quadrats</label>
                            <input type="text" class="form-control" id="metresQuadrats" name="metresQuadrats">
                        </div>
                        <div class="form-group">
                            <label for="numHabitacions">Número d'habitacions</label>
                            <input type="text" class="form-control" id="numHabitacions" name="numHabitacions">
                        </div>
                        <div class="form-group">
                            <label for="preuDiaTemporadaBaixa">Preu dia temporada baixa</label>
                            <input type="text" class="form-control" id="preuDiaTemporadaBaixa"
                                name="preuDiaTemporadaBaixa">
                        </div>
                        <div class="form-group">
                            <label for="preuDiaTemporadaAlta">Preu dia temporada alta</label>
                            <input type="text" class="form-control" id="preuDiaTemporadaAlta"
                                name="preuDiaTemporadaAlta">
                        </div>
                        <div class="form-group">
                            <label for="numPersones">Número de persones</label>
                            <input type="text" class="form-control" id="numPersones" name="numPersones">
                        </div>
                        <div class="form-group">
                            <label for="imatges">Imatge</label>
                            <input type="file" class="form-control-file" id="imatges" name="imatges">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>