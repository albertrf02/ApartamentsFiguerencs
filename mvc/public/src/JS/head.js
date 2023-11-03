let temaDark = false;

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




//   $('#staticBackdrop').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget); // Botón que abrió el modal
//     var apartamentoID = button.data('apartamento-id'); // ID del apartamento

//     // Utiliza AJAX para obtener la información del apartamento y luego actualiza el contenido del modal.
//     $.ajax({
//         url: '../../../src/models/apartaments.php', // Ruta para obtener la información del apartamento
//         type: 'GET',
//         data: { id: apartamentoID, /* otros parámetros si es necesario */ },
//         success: function (data) {
//             // Rellena el contenido de #apartment-details con la información del apartamento
//             $('#apartment-details').html(data);
//         }
//     });
// });



$("#spinner").spinner();
$( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});
$( "#datepicker2" ).datepicker({
  dateFormat: 'dd/mm/yy',
  minDate: 0, // Esto evitará fechas anteriores a la fecha actual
  beforeShow: function(input, inst) {
    var minDate = $("#datepicker").datepicker("getDate");
    if (minDate) {
      minDate.setDate(minDate.getDate() + 1); // Puedes ajustar este valor según tus necesidades
      $(this).datepicker("option", "minDate", minDate);
    }
  }
});


$(document).on('click', '.open-apartment-details', function(e) {
  // Obtén el ID del apartamento desde el atributo personalizado
  var apartmentId = $(e.target).data('apartamento-id');
  console.log(apartmentId);
  localStorage.setItem('apartmentId', apartmentId);

  // Realiza una solicitud AJAX para obtener los detalles del apartamento
  $.ajax({
      type: 'GET',
      url: 'index.php?r=apartament_ajax',
      data: { id: apartmentId },
      async: false,
      success: function(data) {
          // Cuando la solicitud AJAX se completa con éxito, actualiza el contenido de la ventana modal
          $('#apartment-name').html(data);
          $('#apartment-description').html(data);
          $('#apartment-address').html(data);
          $('#apartment-bedrooms').html(data);
          $('#apartment-M4').html(data);
          $('#apartment-people').html(data);
          jason = JSON.parse(data);
      },
      error: function() {
          // Maneja cualquier error que pueda ocurrir durante la solicitud AJAX
          alert('Ha ocurrido un error.');
      }
  });
});