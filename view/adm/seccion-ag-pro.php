<!-- Codigo bootstrap de la card donde se previsualisan los los articulos -->
<br>
<center>
    <h3>Vista previa del producto</h3><br>
<div class="home">
    <div class="card" style="width: 18rem;">
        <img src="../../img/img-paciente0.avif" id="card-img" class="card-img-top" alt="Erro al cargar la imagen">
        <div class="card-body">
            <h5 class="card-title" id="card-title">Card title</h5>
            <p class="card-text" id="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Comprar</a>
        </div>
    </div>
</div>
</center>




<div class="agr">
<form class="container mt-4" action="buscar.php?" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name-pro" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" id="name-pro" name="name-pro" placeholder="Nombre del producto" oninput="cardstring(event,'title')">
    </div>
    <div class="mb-3">
        <label for="descrip-pro" class="form-label">Descripción del producto</label>
        <textarea class="form-control" id="descrip-pro" name="descrip-pro" placeholder="Descripción del producto" oninput="cardstring(event,'text')"></textarea>
    </div>
    <div class="mb-3">
        <label for="card-img" class="form-label">Imagen</label>
        <input class="form-control" type="file" id="card-img" name="card-img" placeholder="Imagen" onchange="preview(event,'#card-img')">
    </div>
        <button type="button" class="btn btn-primary" onclick="continuar()">Continuar</button><br><br>
       
    <div class="mb-3" id="parte2">
        
    </div>
</form>
</div>
<br>

<?php
    if( isset($_GET['men'])){
        if( $_GET['men'] == "2" || $_GET['men'] == "0" ){
        ?><script> 
            window.onload = function() {
            alertError('<?php echo $_GET['men']; ?>');
            };
        </script><?php
        }if( $_GET['men'] == "1" ){
        ?><script> 
            window.onload = function() {
            confirmacion('<?php echo $_GET['men']; ?>');
            };
        </script><?php
        }if( $_GET['men'] == "img0" || $_GET['men'] == "img1" ){
        ?><script> 
            window.onload = function() {
            alertError('<?php echo $_GET['men']; ?>');
            };
            </script><?php
        }
    }
?>

