<!--*************************************************************************************
VISTA
Zona Pública
Formulario para ACCEDER a la zona privada
*****************************************************************************************-->

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Anuncios - Login</title>
</head>

<body>

	<center>
		<h1>WEB DE ANUNCIOS - COMPRA y VENTA</h1>
		<h2>Formulario de login</h2>
		<?php
		// Comprobamos si en la url (GET) viene alguna variable con error
		if (isset($_GET["error"])) {
			echo "<p style='color:red'>" . $_GET["error"] . "<p>";
		}
		?>
		<hr>
		<h3>Identificación</h3>

		<!--*************************************************************************************
		Pedimos los datos de acceso
		*****************************************************************************************-->

		<form action="controlador.php" method="post">
			<input type="hidden" name="op" value="1">
			<label for="">Email:</label>
			<input type="email" name="caja_email" placeholder="Tu email">
			<br><br>
			<label for="">Password:</label>
			<input type="password" name="caja_password" placeholder="Tu password">
			<br><br>
			<input type="submit" value="Validar" /></p>
			<!-- Link para crear una nueva cuenta si no eres usuario registrado. Accede al formulario -registro.php- -->
			<p>¿No tienes cuenta? <a href="registro.php">regístrate</a></p>
			<!-- Link para ir a la zona pública y no acceder a la zona privada. Accede al formulario -index.php- de la zona pública -->
			<p>Volver al listado de anuncios de la zona <a href="index.php">pública</a></p>

		</form>

	</center>
</body>

</html>