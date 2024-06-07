<br>
<center>
  <div id="offers">
    <div class="offer active"><img src="../../img/oferta2.png" alt="" height="300px" width="100%" ></div>
    <div class="offer"><img src="../../img/oferta1.png" alt="" height="300px" width="100%"></div>
    <div class="offer"><img src="../../img/oferta3.png" alt="" height="300px" width="100%"></div>
   </div>
</center>

<center>
  <div class="productos">
    <p class="texto">Aquí van todos los productos, con sus imágenes, sus ofertas y sus descuentos, la descripción y todo.</p> 
  </div>
</center>

<center>
<br>
<div class="subContainer">
  <?php
    include_once("../../metodos/clas-view.php");
    echo Vista::mostrarProductos( $_GET['caht']);
  ?>
</div>
<br><br>
</center>  