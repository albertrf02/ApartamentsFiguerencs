<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='src/CSS/index.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <title>Admin Panel</title>
</head>

<body>
    <div id="content">

        <div id="nav">
            <?php
            include 'head.php';
            ?>
        </div>
        <h3>Apartaments
        <a class="btn btn-primary" href="index.php?r=uploadapartament">Afegir Apartament</a>
        </h3>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titol</th>
                    <th>Adreça</th>
                    <th>Descripcio</th>
                    <th>Nº Persones</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($apartaments as $apartament): ?>
                    <tr>
                        <td>
                            <?php echo $apartament["Id"]; ?>
                        </td>
                        <td>
                            <?php echo $apartament["Titol"]; ?>
                        </td>
                        <td>
                            <?php echo $apartament["Adreca"]; ?>
                        </td>
                        <td>
                            <?php echo $apartament["Descripcio"]; ?>
                        </td>
                        <td>
                            <?php echo $apartament["numPersones"]; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?r=apartament&idApartament=<?php echo $apartament["Id"]; ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Usuaris 
        <?php if ($_SESSION['user']['Rol'] === 'Administrador'): ?>
        <a class="btn btn-primary" href="index.php?r=registreadmin">Afegir Usuari</a>
        <?php endif; ?>
        
        <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
            <a class="btn btn-primary" href="index.php?r=registregestor">Crear Usuari</a>
        <?php endif; ?>
        </h3>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>telefon</th>
                    <th>Correu</th>
                    <th>Rol</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php echo $user["Id"]; ?>
                    </td>
                    <td>
                            <?php echo $user["Nom"]; ?>
                    </td>
                    <td>
                        <?php echo $user["Telefon"]; ?>
                    </td>
                    <td>
                        <?php echo $user["CorreuElectronic"]; ?>
                    </td>
                    <td>
                        <?php echo $user["Rol"]; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="index.php?r=userpage&Id=<?php echo $user["Id"]; ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <a class="btn btn-primary" href="index.php?r=temporada">temporada</a>
        <a class="btn btn-primary" href="index.php?r=buscarreserva">buscarReserves</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="src/JS/Panel.js"></script>

</body>

</html>