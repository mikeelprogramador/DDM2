<div class="contendor-productos">
    <?php
        $id = id::desencriptar($_GET['data']);
        echo Vista::ContenidoProducto($id);
    ?>
</div>

<a href="<?php echo (Verificaciones::verificarPerfil(1,$_SESSION['id']) == 2? '../../view/user/ddm.php':'../../view/adm/admin.php');  ?>"><button>Regresar</button></a>

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
            
            echo Vista::viewComentarios($id,$_SESSION['id']);
        ?>
    </div>
</div>
<script src="../../js/coment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  