<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href='src/CSS/index.css' rel='stylesheet' />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
    integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="src/JS/head.js" defer></script>
  <title>Kalewi</title>
</head>

<body>
  <div class="container">
    <div id="content">
      <div id="nav">
        <?php
        include 'head.php';
        ?>
      </div>
      <form method="GET">
        <div class="buscador">
          <div>
            <p>Data inici: <input type="text" name="datepicker" id="datepicker" value="<?php
            if ($datepicker == '01/01/1970') {
              echo "";
            } else {
              echo $datepicker;
            }
            ?>"></p>
          </div>
          <div>
            <p>Data final: <input type="text" name="datepicker2" id="datepicker2" value="<?php
            if ($datepicker2 == '01/01/1970') {
              echo "";
            } else {
              echo $datepicker2;
            }
            ?>"></p>
          </div>
          <div>
            <p>
              <label for="spinner">Número de persones:</label>
              <input id="spinner" name="numPersones" value="<?php
              if ($numPersones == '0') {
                echo "";
              } else {
                echo $numPersones;
              }
              ?>">
            </p>
          </div>
          <div>
            <button type="submit">Enviar</button>
          </div>
        </div>
      </form>


    </div>
    <h3 class="p">Tots els apartaments</h3>
    <hr class="hr3" />

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($apartaments as $apartament): ?>
        <div class="col">
          <div class="card">
            <img src="img/<?php echo $apartament['Enlace']; ?>" class="card-img-top" alt="Imagen del apartamento">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $apartament['Titol']; ?>
              </h5>
              <p class="card-text">Número d'habitacions:
                <?php echo $apartament['NumHabitacions']; ?>
              </p>
              <p class="card-text">Metres quadrats:
                <?php echo $apartament['MetresQuadrats']; ?> m2
              </p>
              <button class="btn btn-primary open-apartment-details" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" data-apartamento-id="<?php echo $apartament['Id']; ?>">Veure
                mes..</button>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>


  </div>
  <!-- Button trigger modal -->
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 apartment-name" id="staticBackdropLabel">Detalls de l'apartament</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <img id="apartment-img" src="" alt="Imatge">
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6"><b>Descripció:</b></div>
                <div class="col-6" id="apartment-description"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6"><b>Adreça:</b></div>
                <div class="col-6" id="apartment-address"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6"><b>Número habitacions:</b></div>
                <div class="col-6" id="apartment-bedrooms"></div>
              </div>
            </div>
            <diV class="col-6">
              <div class="row">
                <div class="col-6"><b>Metres quadrats:</b></div>
                <div class="col-6" id="apartment-M4"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6"><b>Capacitat:</b></div>
                <div class="col-6" id="apartment-people"> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <form method="POST" action="index.php?r=apartament">
            <input type="hidden" name="idApartament" id="idApartament">
            <input type="submit" value="Reservar" class="btn btn-primary">Reservar</button>
          </form>
        </div>
      </div>
    </div>
  </div>




  <!-- <div class="modal" id="apartmentModal">
      <div class="modal-content">
          Contenido de la ventana emergente (detalles del apartamento)
          <img src="" alt="Imagen del apartamento" id="modalImage">
          <h5 id="modalTitle"></h5>
          <p>Número habitaciones: <span id="modalBedrooms"></span></p>
          <p>Metros cuadrados: <span id="modalArea"></span></p>
          <p>Date: <input type="text" id="datepicker"></p>
          <button id="closeModal">Cerrar</button>
      </div> 
  </div> -->

  <!-- Botón de flecha hacia arriba -->
  <div id="scrollTopButton">
    <i class="fas fa-arrow-up bi">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
      </svg>
    </i>
  </div>

</body>
<footer>
  <?php
  include 'footer.php';
  ?>
</footer>

</html>