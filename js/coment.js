function apareceComentario(event,id){
    event.preventDefault();
    var param = {
        'agregarComentario': true,
        'data': id, 
        'comentario': $("#comentario").val()
    };

    $.ajax({
        data: param, 
        url: 'consultas.php',
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
        url: 'consultas.php',
        datatype: 'text',
        method: 'post',
        success: function (respuesta){
            ( respuesta != "" ? $("#coment").html(respuesta): alert("No has ingresado ningun comentario"));
            //console.log(respuesta);
        },
        error: function (xhr,status,error){
            console.log(error);
        }
    });
}