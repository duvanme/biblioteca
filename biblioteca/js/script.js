// Obtener el modal
var modalform = document.getElementById("miModal");

// Obtener el botón que abre el formulario modal
var btnAbrir = document.getElementById("abrirModal");

// Obtener el elemento para cerrar el modal
var spanCerrar = document.getElementById("cerrarModal");

// Cuando se hace clic en el botón, se muestra el modal
btnAbrir.onclick = function() {
  modalform.style.display = "block";
}

// Cuando se hace clic en el elemento de cierre, se oculta el  formulario modal
spanCerrar.onclick = function() {
  modalform.style.display = "none";
}
// Cuando el usuario hace clic fuera del modal, también se cierra
window.onclick = function(event) {
  if (event.target == modal) {
    modalform.style.display = "none";
  }
}
