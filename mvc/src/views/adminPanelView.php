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
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <a href="index.php?r=userpage&Id=<?php echo $user["Id"]; ?>">
                        <?php echo $user["Nom"]; ?>
                    </a>

                </li>
            <?php endforeach; ?>
        </ul>
        <a class="btn btn-outline-success" href="index.php?r=registreadmin">Crear Usuari</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>