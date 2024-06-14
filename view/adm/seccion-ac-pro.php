<label for="">Buscar</label>
<input type="text" placeholder="Buscar producto...." name="search" oninput="busquedaAdm(event)">
<link rel="stylesheet" href="../../css/stylo4.css">


<div class="search" id="search">
     <?php
        include_once("../../metodos/clas-view.php");
        echo Vista::buscarProducto();
    ?> 
</div>