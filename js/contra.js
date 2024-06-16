
// Este es el script donde podemos visualizar la contraseña made by Juan Castañeda  
const passwordInput = document.getElementById('password');
const togglePassword = document.getElementById('toggle-password');

togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Cambia la imagen según el estado, ver contraseña o no ver la contraseña
    this.src = type === 'password' ? 'img/ojo1.png' : 'img/ojo2.png';
    this.alt = type === 'password' ? 'Mostrar contraseña' : 'Ocultar contraseña';
});

function verificacion(data = null){
    let texto = "";
    //Lista de error cuando el usuario inicia sesion
    if( data == "error-1" ){
        texto = "Error, el Usuario o la contraseña no coinciden.";
    }
    if( data === "error0" ){
        texto = "Ups ocurrio un error al momento de verificar los datos, intenta más tarde.";
    }
    //Lista de errores cuando el usaurio crea una cuanta 
    if( data == "-1error" ){
        texto = "Estos datos ya le pertenecen a un usuario, verifica nuevamente";
    }
    if( data === "0error" ){
        texto = "Ups ah ocurrido un erro al crear el usuario, verifca que los datos sean correctos";
    }
    //Mensaje de alerta
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: texto ,
        //footer: '<a href="#">Why do I have this issue?</a>'
      }).then((result) => {
        if(result.isConfirmed){
            window.location.href = 'index.php';
        }
      });
}
  