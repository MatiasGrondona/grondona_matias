const modalPerfilUsuario = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

modalPerfilUsuario.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})