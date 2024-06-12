function busquedaAdm(event){
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

function buscarProductos(ban){
    let texto; 
    if(ban === 1){
        texto = $("#barra-search").val();
    }
    var param = {
        'busquedaGeneral': texto
    }
    //console.log(texto);    

    $.ajax({
        data: param,    
        url: 'buscar.php',
        datatype: 'html',
        method: 'get',
        success: function(respuestas){
            $("#subContainer").html(respuestas);
            //console.log(respuestas);
        },
        error: function(xhr,status, error){
            console.log("Erro",error);
        }
    })

}

function pulsar(event){
    if(event.which === 13 ){
        event.preventDefault(); 
        $("#boton").click();
    }
}