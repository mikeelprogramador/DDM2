function editarDatos(){
    document.getElementById("edit_nombre").disabled = false;
    document.getElementById("edit_apellido").disabled = false;
    crearBotonEdit();
    //console.log("hola");
}
function crearBotonEdit(){
    var div = document.getElementById("botones");
    var boton = document.createElement("button");
    boton.type = "button";
    boton.textContent = "Actualizar";
    document.getElementById("boton_contraseña").style.display= "none";
    document.getElementById("boton_correo").style.display= "none";
    div.appendChild(boton);
}

function cambiarFoto(img){
    img.style.cursor = 'pointer';
    img.addEventListener('click', function() {
            var foto = document.getElementById('foto_perfil');
            foto.click();
    });
    
}

function mostrarImagen(event,des) {
    var formData = new FormData();
    var archivo = event.target.files[0]; // Obtiene el archivo seleccionado

    formData.append('foto_perfil', archivo);
    if(des === 1) ur = 'consultas.php';
    if(des === 2) ur = 'buscar.php';
    $.ajax({
        url: ur,
        type: 'POST', // Método HTTP correcto para enviar archivos
        data: formData,
        dataType: 'html',
        contentType: false, // Importante: false cuando se usa FormData
        processData: false, // Importante: false cuando se usa FormData
        success: function(respuesta) {
            document.getElementById("imagen_perfil").src = respuesta;
           //console.log(respuesta);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function eliminarFoto(){
    console.log("hola mundo");
}
 
