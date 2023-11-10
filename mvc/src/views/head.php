<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href='src/CSS/index.css' rel='stylesheet' />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Kalewi</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand a-logo" href="index.php?r=''"><img class="logo" src="img/logo.jpeg"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

          <form class="d-flex" role="search">

            <?php if (isset($loginValid) && $loginValid): ?>
              <div class="d-flex">
                <b class="Nomusuari">
                  <?php echo $loginName; ?>
                </b>
              </div>
              <a class="btn btn btn-link nav-link active btn-logout" aria-current="page"
                href="index.php?r=logout">logout</a>
              <?php if ($_SESSION['user']['Rol'] === 'Administrador'): ?>
                <a class="btn btn btn-link nav-link" href="index.php?r=adminpanel">Panell d'administració</a>
                <a class="btn btn btn-link nav-link" href="index.php?r=userpage">Perfil</a>
              <?php endif; ?>
              <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
                <a class="btn btn btn-link nav-link" href="index.php?r=adminpanel">Panell de Gestor</a>
                <a class="btn btn btn-link nav-link" href="index.php?r=userpage">Perfil</a>
              <?php endif; ?>
              <?php if ($_SESSION['user']['Rol'] === 'Usuari'): ?>
                <a class="btn btn btn-link nav-link" href="index.php?r=userpage">Perfil</a>
              <?php endif; ?>
            <?php else: ?>
              <a class="btn btn btn-link nav-link" href="index.php?r=login">Login</a>
              <a class="btn btn btn-link nav-link" href="index.php?r=registre">Registre</a>
            <?php endif; ?>
            <a onclick="agregarClaseDark()" class="btn btn btn-link nav-link">Canviar</a>
          </form>
        </div>
      </div>
    </div>
  </nav>
  <hr class="hr" />

  </div>

</html>