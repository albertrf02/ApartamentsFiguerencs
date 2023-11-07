const nav = document.getElementById("nav");
let lastScrollTop = 0;

window.addEventListener("scroll", () => {
  const scrollTop = window.scrollY || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    // Scrolling down, hide the nav
    nav.classList.add("hidden");
  } else {
    // Scrolling up, show the nav
    nav.classList.remove("hidden");
  }

  lastScrollTop = scrollTop;
});
document.addEventListener("DOMContentLoaded", function (e) {
  var apartmentId = localStorage.getItem("apartmentId");
  if (apartmentId) {
    // Utiliza el valor de apartmentId como sea necesario en esta página
    console.log("apartmentId: " + apartmentId);
  } else {
    console.log("No se encontró apartmentId en el localStorage.");
  }

  // Realiza una solicitud AJAX para obtener los detalles del apartamento
  $.ajax({
    type: "POST",
    url: "index.php?r=apartament_ajax",
    data: { id: apartmentId },
    async: false,
    success: function (data) {
      // Cuando la solicitud AJAX se completa con éxito, actualiza el contenido de la ventana modal

      $("#apartment-name2").html(data.Titol);
      $("#apartment-description2").html("descripció: "+data.Descripcio);
      $("#apartment-address2").html("Adreça: "+data.Adreca);
      $("#apartment-bedrooms2").html("Número habitacions: "+data.NumHabitacions);
      $("#apartment-M42").html("Metres quadrats: "+data.MetresQuadrats+" m2");
      $('#apartment-people2').html("Capacitat: "+data.numPersones + " persones");
      $("#apartment-pricealt2").html("Preu/dia temporada alta: "+data.PreuDiaTemporadaAlta);
      $("#apartment-pricebaixa2").html("Preu/dia temporada baixa: "+data.PreuDiaTemporadaBaixa);
      // $("#apartament-image2").attr("src", "img/"+data.Enlace);
      // $("#apartament-image3").attr("src", "img/"+data.Enlace);
      
        var $slider = $("#image-slider");
        $slider.empty();

if (data.Enlace) {
  var imagenesArray = data.Enlace.split(',');

  imagenesArray.forEach(function (imagenSrc, index) {
    var $imagen = $("<img>").attr("src", "img/" + imagenSrc.trim());
    var $item = $("<div class='carousel-item'></div>").append($imagen);

    // Marca la primera imagen como activa
    if (index === 0) {
      $item.addClass("active");
    }

    $slider.append($item);
    
  });
}

      console.log(data.Enlace);
      var mymap = L.map('map').setView([data.Latitud, data.Longitud], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

L.marker([data.Latitud, data.Longitud]).addTo(mymap)
  .bindPopup(data.Titol)
  .openPopup();
    },
    dataType: "json",
  });
});

function toggleDropdown() {
  var dropdown = document.getElementById("dropdownContent");
  dropdown.style.display =
    dropdown.style.display === "block" ? "none" : "block";
}

<<<<<<< HEAD
document.getElementById('resetToDefault').addEventListener('click', function () {
  document.getElementById('high_season_start').value = '2023-01-01';
  document.getElementById('high_season_end').value = '2023-06-30';
  document.getElementById('low_season_start').value = '2023-07-01';
  document.getElementById('low_season_end').value = '2023-12-31';
});
=======
>>>>>>> feature-reserva-jordi
