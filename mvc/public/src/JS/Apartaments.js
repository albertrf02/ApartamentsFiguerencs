const nav = document.getElementById("nav");
let lastScrollTop = 0;

function agregarClaseDark() {
  const bodyElement = document.querySelector('body');
  if (bodyElement) {
      temaDark = !temaDark; // Invierte el estado actual del tema
      if (temaDark) {
          bodyElement.setAttribute('data-bs-theme', 'dark');
      } else {
          bodyElement.removeAttribute('data-bs-theme');
      }
  }
  console.log('Alternando clase dark');
}
function validarFechas() {
  var dataInici = document.getElementById("dataInici").value;
  var dataFi = document.getElementById("dataFi").value;

  if (dataInici > dataFi) {
      alert("La fecha final no puede ser anterior a la fecha de inicio.");
      return false;
  }
  
  return true;
}

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
      $("#apartment-description2").html("<b>Descripció: </b>"+data.Descripcio);
      $("#apartment-address2").html("<b>Adreça: </b>"+data.Adreca);
      $("#apartment-bedrooms2").html("<b>Número habitacions: </b>"+data.NumHabitacions);
      $("#apartment-M42").html("<b>Metres quadrats: </b>"+data.MetresQuadrats+"<b> m2</b>");
      $('#apartment-people2').html("<b>Capacitat: </b>"+data.numPersones + "<b> persones</b>");
      $("#apartment-pricealt2").html("<b>Preu/dia temporada alta: </b>"+data.PreuDiaTemporadaAlta);
      $("#apartment-pricebaixa2").html("<b>Preu/dia temporada baixa: </b>"+data.PreuDiaTemporadaBaixa);
      if(data.Extras == null){
        data.Extras = "<b>No hi ha extres</b>";
      }
      $("#apartment-extres2").html("<b>Extres: </b>"+data.Extras);
      console.log(data.Extras);
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

  //Flecha hacia arriba
  document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("scrollTopButton");

    // Muestra u oculta el botón según la posición de desplazamiento
    window.onscroll = function () {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        button.style.display = "block";
      } else {
        button.style.display = "none";
      }
    };

    // Desplázate hacia arriba al hacer clic en el botón
    button.addEventListener("click", function () {
      document.body.scrollTop = 0; // Para navegadores Safari
      document.documentElement.scrollTop = 0; // Para otros navegadores
    });
  });
