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
                        <form>
                            Personal Information
                            <hr>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter your lastname">
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
                                    <input type="tel" class="form-control" id="phone"
                                        placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <label for="num_targeta">Targeta</label>
                                <input type="targeta" class="form-control" id="targeta" placeholder="targeta">
                            </div>
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