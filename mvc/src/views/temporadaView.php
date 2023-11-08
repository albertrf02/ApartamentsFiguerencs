<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="src/CSS/registre.css">
    <script src="src/JS/Admin.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Temporada</title>
</head>

<body>
    <div id="content">
        <div id="nav">
            <?php
            include 'head.php';
            ?>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="back-link">
                        <a href="index.php?r=adminpanel">
                            <i class="fas fa-arrow-left"></i> <img src="img/flecha-izquierda.png" alt=""
                                style="width:25px">
                        </a>
                    </div>
                    <h2 class="text-center">Canvi Temporada</h2>
                    <hr>
                    <form action="index.php?r=temporada" method="post">

                        <label for="high_season_start">Començament temporada alta:</label>
                        <input type="date" name="high_season_start" id="high_season_start"
                            value="<?php echo $seasonDates['DataIniciTemporadaAlta']; ?>">
                        <br>
                        
                        <label for="high_season_end">Finalització temporada alta:</label>
                        <input type="date" name="high_season_end" id="high_season_end"
                            value="<?php echo $seasonDates['DataFinalitzacioTemporadaAlta']; ?>">
                        <br>

                        <label for="low_season_start">Començament temporada baixa:</label>
                        <input type="date" name="low_season_start" id="low_season_start"
                            value="<?php echo $seasonDates['DataIniciTemporadaBaixa']; ?>">
                        <br>

                        <label for="low_season_end">Finalitzacio temporada baixa:</label>
                        <input type="date" name="low_season_end" id="low_season_end"
                            value="<?php echo $seasonDates['DataFinalitzacioTemporadaBaixa']; ?>">
                        <br>

                        <input type="submit" name="update_season" value="Update Season Dates">
                        <button type="button" id="resetToDefault">Reset to Default</button>
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