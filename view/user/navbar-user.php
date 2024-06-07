<!doctype html>
<html lang="en">
  <head>

      <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-05CZXNWMZE"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

     gtag('config', 'G-05CZXNWMZE');
    </script> 



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DDM</title>
    <link rel="stylesheet" href="../../css/stylo1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <body class="body">

  <nav class="navbar navbar-expand-lg bg-gris-oscuro" id="nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ddm.php?caht=<?php echo $_GET['caht'];?>&seccion=home">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Historial</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="ddm.php?caht=<?php echo $_GET['caht'];?>&seccion=perfil">Perfil</a></li>
            <li><a class="dropdown-item" href="#"> Compras</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../login.php">Cerrar sesión</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ayuda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ofertas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Categoria1</a></li>
            <li><a class="dropdown-item" href="#"> Categoria2</a></li>
            <li><a class="dropdown-item" href="#">Categoria3</a></li>
            <li><a class="dropdown-item" href="#">Categoria4</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Bienvenido a DDM</a>
        </li>
      </ul>

      <form class="d-flex" role="search">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Carrito</a>
        </li> </ul>
        <input class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Search">
        <button class="btn btn-outline-success " type="submit">Buscar</button>
      </form>
      
    </div>
  </div>
</nav>

  <div class="container">

  <?php
      include($seccion.".php");
  ?>


  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../js/barra_oferta.js"></script>
  </body>
</html>