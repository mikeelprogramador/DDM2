function apareceComentario(event,id){
    event.preventDefault();
    var param = {
        'agregarComentario': true,
        'data': id, 
        'comentario': $("#comentario").val()
    };

    $.ajax({
        data: param, 
        url: 'comet_control.php',
        datatype: 'text',
        method: 'post',
        success: function (respuesta){
            ( respuesta != "" ? $("#coment").html(respuesta): alert("No has ingresado ningun comentario"));
            $("#comentario").val('');
            //console.log(respuesta);
        },
        error: function (xhr,status,error){
            console.log(error);
        }
    });
}
function eliminarComentario(id_comen, id_pro){
    var param = {
        'eliminarComentario': true,
        'comen': id_comen,
        'data': id_pro
    };

    $.ajax({
        data: param, 
        url: 'comet_control.php',
        datatype: 'text',
        method: 'post',
        success: function (respuesta){
           // ( respuesta != "" ? $("#coment").html(respuesta): alert("No has ingresado ningun comentario"));
            //console.log(respuesta);
            $("#coment").html(respuesta)
        },
        error: function (xhr,status,error){
            console.log(error);
        }
    });
}

function megusta(checkbox){
    var checkboxes = document.getElementsByName('like');
      checkboxes.forEach(function(currentCheckbox) {
        // Desmarcar el checkbox actual si no es el que ha sido seleccionado
        if (currentCheckbox !== checkbox) {
          currentCheckbox.checked = false;
        }
      });
}