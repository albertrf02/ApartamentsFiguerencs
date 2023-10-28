<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">

            <div class="col-md-6">
                <div class="back-link">
                </div>
                <div class="card">
                    <div class="card-header">
                        <img src="..\..\public\img\usuario.png" alt="" style="width: 50px">
                    </div>
                    <div class="card-body">

                        <?php if (isset($error)): ?>

                            <div class="alert alert-danger">
                                <?php
                                echo $error;
                                ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="index.php?r=userpage">
                            Personal Information
                            <hr>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="Nom" name="Nom"
                                    placeholder="Enter your name" value=<?php echo $userDb['Nom']; ?>>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="Cognoms" name="Cognoms"
                                    placeholder="Enter your lastname" value=<?php echo $userDb['Cognoms']; ?>>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="custom-select" id="phone-prefix">
                                            <option value="+1">+1 (USA)</option>
                                            <option value="+34">+34 (Spain)</option>
                                            <option value="+44">+44 (UK)</option>
                                            <option value="+49">+49 (Germany)</option>
                                        </select>
                                    </div>
                                    <input type="tel" class="form-control" id="Telefon" name="Telefon"
                                        placeholder="Enter your phone number" value=<?php echo $userDb['Telefon']; ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="CorreuElectronic" name="CorreuElectronic"
                                    placeholder="Enter your email" value=<?php echo $userDb['CorreuElectronic']; ?>>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="Contrasenya" name="Contrasenya"
                                    placeholder="Enter your password" value=<?php echo $userDb['Contrasenya']; ?>>
                            </div>
                            <div class="form-group">
                                <label for="num_targeta">Targeta</label>
                                <input type="targeta" class="form-control" id="NumTargetaCredit" name="NumTargetaCredit"
                                    placeholder="targeta" value=<?php echo $userDb['NumTargetaCredit']; ?>>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>