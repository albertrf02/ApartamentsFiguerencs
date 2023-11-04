<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='src/CSS/index.css' rel='stylesheet' />
    <title>User</title>
</head>

<body>
    <div id="content">
        <div id="nav">
            <?php include 'head.php'; ?>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="back-link"></div>
                    <div class="card">
                        <div class="card-header">
                            <img src="..\..\public\img\usuario.png" alt="" style="width: 50px">
                        </div>
                        <div class="card-body">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="index.php?r=userpage">
                                Personal Information
                                <hr>
                                <div class="form-group">
                                    <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
                                        <p>
                                            <b>Nom:</b>
                                            <?php echo $userToEdit['Nom']; ?>
                                        </p>
                                    <?php else: ?>
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" id="Nom" name="Nom"
                                            placeholder="Enter your name" value="<?php echo $userToEdit['Nom']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
                                        <p>
                                            <b>Cognoms:</b>
                                            <?php echo $userToEdit['Cognoms']; ?>
                                        </p>
                                    <?php else: ?>
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="Cognoms" name="Cognoms"
                                            placeholder="Enter your lastname" value="<?php echo $userToEdit['Cognoms']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
                                        <p>
                                            <b>Telefon:</b>
                                            <?php echo $userToEdit['Telefon']; ?>
                                        </p>
                                    <?php else: ?>
                                        <label for="phone">Phone Number</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" id="Telefon" name="Telefon"
                                                placeholder="Telefon" value="<?php echo $userToEdit['Telefon']; ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
                                        <p>
                                            <b>Correu Electronic:</b>
                                            <?php echo $userToEdit['CorreuElectronic']; ?>
                                        </p>
                                    <?php else: ?>
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="CorreuElectronic"
                                            name="CorreuElectronic" placeholder="Enter your email"
                                            value="<?php echo $userToEdit['CorreuElectronic']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if (($_SESSION['user']['Rol'] === 'Administrador') || ($_SESSION['user']['Rol'] === 'Usuari')): ?>
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="Contrasenya" name="Contrasenya"
                                            placeholder="Enter your password"
                                            value="<?php echo $userToEdit['Contrasenya']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if (($_SESSION['user']['Rol'] === 'Administrador') || ($_SESSION['user']['Rol'] === 'Usuari')): ?>

                                        <label for="num_targeta">Targeta</label>
                                        <input type="targeta" class="form-control" id="NumTargetaCredit"
                                            name="NumTargetaCredit" placeholder="targeta"
                                            value="<?php echo $userToEdit['NumTargetaCredit']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($_SESSION['user']['Rol'] === 'Administrador'): ?>
                                        <label for="rol">Rol</label>
                                        <select class="form-control" id="Rol" name="Rol">
                                            <option value="Administrador" <?php if ($userToEdit['Rol'] === 'Administrador') {
                                                echo 'selected';
                                            } ?>>Administrador</option>
                                            <option value="Gestor" <?php if ($userToEdit['Rol'] === 'Gestor') {
                                                echo 'selected';
                                            } ?>>Gestor</option>
                                            <option value="Usuari" <?php if ($userToEdit['Rol'] === 'Usuari') {
                                                echo 'selected';
                                            } ?>>Usuari</option>
                                        </select>
                                    <?php endif; ?>
                                </div>

                                <input type="hidden" name="Id" value="<?php echo $userToEdit['Id']; ?>">
                                <?php if (isset($admin)): ?>
                                    <input type="checkbox" name="delete"> Delete user
                                <?php endif; ?>

                                <?php if ($_SESSION['user']['Rol'] !== 'Gestor'): ?>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Reserves
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>