<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registre.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="back-link">
                    <a href="index.php">
                        <i class="fas fa-arrow-left"></i> <img src="img/flecha-izquierda.png" alt="" style="width:25px">
                    </a>
                </div>
                <h2 class="text-center">Iniciar Sessió</h2>
                <hr>
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrasenya</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="button1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center redirectButton">
            <p>Ets un usuari nou?</p>
            <a href="registre.php"><button class="button1">Registra't</button></a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>