<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='src/CSS/index.css' rel='stylesheet' />
    <title>Admin Panel</title>
</head>

<body>
    <div id="content">
        <div id="nav">
            <?php
            include 'head.php';
            ?>
        </div>
        <div style="display: flex">
            <ul>
                <?php foreach ($users as $user): ?>
                    <li>
                        <a href="index.php?r=userpage&Id=<?php echo $user["Id"]; ?>">
                            <?php echo $user["Nom"]; ?>
                        </a>

                    </li>
                <?php endforeach; ?>
            </ul>
            <ul>
                <?php foreach ($apartaments as $apartament): ?>
                    <li>
                        <a href="index.php?r=apartament&idApartament=<?php echo $apartament["Id"]; ?>">
                            <?php echo $apartament["Titol"]; ?>
                        </a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php if ($_SESSION['user']['Rol'] === 'Administrador'): ?>
            <a class="btn btn-outline-success" href="index.php?r=registreadmin">Crear Usuari</a>
        <?php endif; ?>
        <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
            <a class="btn btn-outline-success" href="index.php?r=registregestor">Crear Usuari</a>
        <?php endif; ?>
        <a class="btn btn-outline-success" href="index.php?r=uploadapartament">uploadapartament</a>
        <a class="btn btn-outline-success" href="index.php?r=temporada">temporada</a>
        <a class="btn btn-outline-success" href="index.php?r=buscarreserves">buscarReserva</a>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>