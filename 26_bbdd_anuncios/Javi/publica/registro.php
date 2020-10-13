<!--*************************************************************************************
VISTA
Zona Pública
Formulario para REGISTRAR un nuevo usuario
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Registro</title>
</head>

<body>

	<center>
		<h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
		<h2>Formulario de registro</h2>
		<hr>
		<?php
		// Comprobamos si viene la variable -error- por el método GET del controlador de la opción 2 de la zona pública
		if (isset($_GET["aviso"])) { ?>
			<p style="color:green"><?php echo $_GET["aviso"] ?></p>
		<?php } ?>
		<h3>Introduce tus datos de registro</h3>

		<!--*************************************************************************************
		Pedimos los datos del nuevo usuario
		*****************************************************************************************-->

		<form action="controlador.php" method="post">
			<input type="hidden" name="op" value="2">
			<label for="">Nombre:</label>
			<input type="text" name="caja_nombre" required="true">
			<br><br>
			<label for="">Email:</label>
			<input type="email" name="caja_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true">
			<br><br>
			<label for="">Password:</label>
			<input type="password" name="caja_password" required="true">
			<br><br>
			<input type="submit" value="Registrar">
			<!-- Link para acceder a la zona privada si ya tienes cuenta. Accede al formulario -login.php- -->
			<p>Ya tienes cuenta? <a href="login.php">identifícate</a></p>
			<!-- Link volver al listado de anuncios de la zona pública. Accede al formulario -index.php- -->
			<p>Volver al <a href="index.php">listado de anuncios</a></p>

		</form>

	</center>
</body>

</html>