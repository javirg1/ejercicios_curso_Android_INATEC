<?php
session_start();
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Gualapop - Compra y Vende</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <?php




    //Incluyo el archivo con las funciones:
    require("../includes/funciones.php");
    //Vamos a distinguir si tengo que mostrar todos los anuncios, o los de un usuario concreto:
    if(isset($_GET["id_usuario"])) {
      //Cargar los anuncios de este usuario:
      $id_usuario = $_GET["id_usuario"];
      $anuncios = cargarAnuncios($id_usuario);
      //Cargar los datos del usuario para saber al menos su nombre:
      $usuario = cargarDatosUsuario($id_usuario);
      $nombre_usuario = $usuario["nombre"];
      //echo "<p>Listado de los anuncios de $nombre_usuario. <a href='index.php'>(Volver al listado principal)</a></p>";
    } else {?>
      //Cargar todos los anuncios:
      $anuncios = cargarAnuncios();
      //echo "<p>Listado de todos los anuncios</p>";
      <?php } ?>

  <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Acerca de</h4>
          <p class="text-muted">Esto es un ejemplo de como se puede cambiar una plantilla bootstrap para en este caso encajarla en una web de anuncios de compra - venta.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contacto</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Seguir en Twitter</a></li>
            <li><a href="#" class="text-white">Me gusta en Facebook</a></li>
            <li><a href="#" class="text-white">Contacto por mail</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Gualapop</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Gualapop</h1>
      <p class="lead text-muted">Si no lo usas véndelo, dale una segunda vida y saca dinero.</p>
      <?php
      //Si el usuario está identificado, le ofrecemos el enlace para ir a la zona privada
      if (isset($_SESSION["id_usuario"])) { ?>
      <p>
        <a href="#" class="btn btn-primary my-2">Ir a mi zona privada</a>
      </p>
      <?php } else { ?>
        <a href="#" class="btn btn-primary my-2">Identifícate</a>
      <?php } 
      if(isset($_GET["id_usuario"])) { ?>
          <p class="lead text-muted">Listado de los anuncios de <?php echo $nombre_usuario ?></p>
          <a href='index.php'>(Volver al listado principal)</a>
      <?php } else { ?>
          <p class="lead text-muted">Listado de todos los anuncios.</p>
      <?php } ?>
            
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        <?php
        if (isset($_GET["id_anuncio"])) {
          $id_anuncio = $_GET["id_anuncio"];
          //Cargar los datos del anuncio:
          //Incluyo el archivo con las funciones:
          $anuncio = cargarDatosAnuncio($id_anuncio);
          //var_dump($anuncio);exit;
        } else {
          header("Location:index.php");
          exit;
        }
        ?>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src="../fotos/<?php echo $anuncio['foto'] ?>" width="100%" />
              
              <div class="card-body">
                <p class="card-text"><strong><?php echo $anuncio["titulo"] ?></strong></p>
                <p class="card-text"><?php echo $anuncio["fecha"] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                  </div>
                  <small class="text-muted"><?php echo $anuncio["precio"] ?> €</small>
                </div>
              </div>
            </div>
          </div>


      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Volver arriba</a>
    </p>

  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
