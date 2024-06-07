<form class="d-flex" role="search">
  <input class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Search">
  <button class="btn btn-outline-success " type="submit">Buscar</button>
</form>

<center>
<br>
<div class="subContainer">
  <?php
    include_once("../../metodos/clas-view.php");
    echo Vista::mostrarProductos();
  ?>
</div>

</center>