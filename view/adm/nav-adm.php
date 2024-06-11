<!doctype html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DDM</title>
    <link rel="stylesheet" href="../../css/stylo1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-gris-oscuro" id="nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php?seccion=seccion1">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="admin.php?seccion=seccion-ag-pro">Agregar Productos</a></li>
            <li><a class="dropdown-item" href="admin.php?seccion=seccion-ac-pro"> Actualizar Productos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="admin.php?seccion=seccion-eli-pro">Eliminar productos</a></li>
          </ul>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Estadisticas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Estadisticas de Ventas</a></li>
            <li><a class="dropdown-item" href="#">Satisfaccion</a></li>
            <li><a class="dropdown-item" href="#">Esatdisticas de Usuarios</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ofertas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Crear Ofertas</a></li>
            <li><a class="dropdown-item" href="#">Actualizar Ofertas</a></li>
            <li><a class="dropdown-item" href="#">Eliminar Ofertas</a></li>
            <li><a class="dropdown-item" href="#">Buscar Ofertas</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Bienvenido a DDM</a>
        </li>
      </ul> 
    </div>
  </div>
</nav>


<div class="conteiner">

  <?php

    include( $seccion.".php");

  ?>


</div>


    <script src="../../js/target.js"></script>
    <script src="../../js/productos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>