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
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">LOGO</a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success search" type="submit">Ss</button>
        <?php if (isset($loginValid) && $loginValid): ?>
          <b>
            <?php echo $loginName; ?>
          </b>
          <a class="btn btn-outline-success" href="index.php?r=userpage">Dades</a>
          <a class="btn btn-outline-success" href="index.php?r=logout">logout</a>
          <?php if ($_SESSION['user']['Rol'] === 'Administrador'): ?>
            <a class="btn btn-outline-success" href="index.php?r=adminpanel">adminPanel</a>
          <?php endif; ?>
          <?php if ($_SESSION['user']['Rol'] === 'Gestor'): ?>
            <a class="btn btn-outline-success" href="index.php?r=gestorpanel">gestorPanel</a>
          <?php endif; ?>
        <?php else: ?>
          <a class="btn btn-outline-success" href="index.php?r=login">Login</a>
          <a class="btn btn-outline-success" href="index.php?r=registre">Registre</a>
        <?php endif; ?>
        <a class="btn btn-outline-success" href="index.php?r=apartament">apartament</a>
        <a onclick="agregarClaseDark()" class="btn btn-outline-success">Canviar</a>
      </form>
    </div>
  </nav>
  <hr class="hr" />

  </div>

</html>