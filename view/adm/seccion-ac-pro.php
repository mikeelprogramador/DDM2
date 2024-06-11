
<input type="text" placeholder="Buscar producto...." name="search" oninput="busqueda(event)">
<input type="button" value="Buscar" >


<div class="search" id="search">
     <?php
        include_once("../../metodos/clas-view.php");
        echo Vista::buscarProducto();
    ?> 
</div>