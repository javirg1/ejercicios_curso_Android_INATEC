<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="controlador.php" method="post">
      <?php
        //Compruebo si en la url (GET) viene alguna variable con error:
        if (isset($_GET["error"])) { ?>
          <p class="text-danger"><?php echo $_GET["error"] ?></p>
      <?php } ?>
      <input type="hidden" name="op" value="2"/>
      <img class="mb-4" src="../fotos/default.png" alt="" width="96">
      <h1 class="h3 mb-3 font-weight-normal">Datos de registro</h1>
      <label for="inputName" class="sr-only">Nombre</label>
      <input type="text" id="inputName" class="form-control" placeholder="Tu nombre" name="caja_nombre" required autofocus>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Dirección email" name="caja_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="caja_password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>

      <p>Ya tienes cuenta? <a href="login.php">identifícate</a></p>

      <p>Volver al <a href="index.php">listado de anuncios</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
</body>
</html>
