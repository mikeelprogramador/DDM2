
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


  