// Obtener el modal
var modal = document.getElementById("modalPoema");

// Obtener el botón que abre el formulario modal
var buttons = document.getElementsByClassName("open-modal");

// Obtener el elemento para cerrar el modal
var spanCerrar = document.getElementById("cerrarPoema");

// Cuando se hace clic en el botón, se muestra el modal
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {
      modal.style.display = "block";
    });
  }
  
// Cuando se hace clic en el elemento de cierre, se oculta el  formulario modal
spanCerrar.onclick = function() {
  modal.style.display = "none";
}
// Cuando el usuario hace clic fuera del modal, también se cierra
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
