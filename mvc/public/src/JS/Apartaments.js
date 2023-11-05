const nav = document.getElementById('nav');
  let lastScrollTop = 0;

  window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      // Scrolling down, hide the nav
      nav.classList.add('hidden');
    } else {
      // Scrolling up, show the nav
      nav.classList.remove('hidden');
    }

    lastScrollTop = scrollTop;
  });
  document.addEventListener("DOMContentLoaded", function (e) {
    var apartmentId = localStorage.getItem('apartmentId');
if (apartmentId) {
  // Utiliza el valor de apartmentId como sea necesario en esta página
  console.log('apartmentId: ' + apartmentId);
} else {
  console.log('No se encontró apartmentId en el localStorage.');
}

    // Realiza una solicitud AJAX para obtener los detalles del apartamento
    $.ajax({
        type: 'GET',
        url: 'index.php?r=apartament_ajax',
        data: { id: apartmentId },
        async: false,
        success: function(data) {
          console.log(data);
            // Cuando la solicitud AJAX se completa con éxito, actualiza el contenido de la ventana modal
            $('#apartment-name2').html(data);
            jason = JSON.parse(data);
        },
        error: function() {
            // Maneja cualquier error que pueda ocurrir durante la solicitud AJAX
            alert('Ha ocurrido un error.');
        }
    });
});

function toggleDropdown() {
  var dropdown = document.getElementById("dropdownContent");
  dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
}