<?php
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-view.php");
$id = id::desencriptar($_GET['data']);
echo Vista::ContenidoProducto($id);

?>
<a href="ddm.php"><button>Regresar</button></a>

<br><br>
<form onsubmit="apareceComentario(event,'<?php  echo $_GET['data'];   ?>')">
<input type="text" id="comentario"  >
<input type="submit" >
</form>

<hr>
<div class="comentarios">
    <label for="">Cajas de comentarios</label>
    <br><br>
    <div  id="coment">
        <?php
            include_once("../../metodos/clas-view.php");
            echo Vista::viewComentarios($id,$_SESSION['id']);
        ?>
    </div>
</div>