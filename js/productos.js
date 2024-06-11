function busqueda(event){
    let texto = event.target.value;
    var param = {
        'search': texto
    }

    $.ajax({
        data: param,
        url: 'buscar.php',
        datatype: 'html',
        method: 'get',
        success: function(respuestas){
            $("#search").html(respuestas);
            //console.log(respuestas);
        },
        error: function(xhr,status, error){
            console.log("Erro",error);
        }
    })
}