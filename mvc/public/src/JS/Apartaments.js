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
      $("#apartment-description2").html(data.Descripcio);
      $("#apartment-address2").html(data.Adreca);
      $("#apartment-bedrooms2").html(data.NumHabitacions);
      $("#apartment-M42").html(data.MetresQuadrats);
      // $('#apartment-people').html(data2.numPersones + " persones");
    },
    dataType: "json",
  });
});

function toggleDropdown() {
  var dropdown = document.getElementById("dropdownContent");
  dropdown.style.display =
    dropdown.style.display === "block" ? "none" : "block";
}
