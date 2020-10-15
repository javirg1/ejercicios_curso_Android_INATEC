<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio PHP - SQL</title>
</head>
<body>
	
	<center>
		<h3>Formulario de alta de alumno</h3>

		<?php
		//Compruebo si en la url (GET) viene alguna variable con error:
		if (isset($_GET["error"])) {
			echo "<p style='color:red'>".$_GET["error"]."<p>";
		}
		?>

		<p>Introduce estos datos de alta:</p>

		<form action="alumno_insertar.php" method="post">
			<p>Introduce nombre:</p>
			<p><input type="text" name="caja_nombre" required="true" />

			<p>Introduce nombre:</p>
			<p>
                <input type="radio" id="inp_sexo_0" name="caja_sexo" value="H" required="true"><label for="inp_sexo_0">Hombre</label>
                <input type="radio" id="inp_sexo_1" name="caja_sexo" value="M" required="true"><label for="inp_sexo_1">Mujer</label>
            </p>

			<p>Introduce cod postal:</p>
			<p><input type="number" name="caja_cp" required="true" /></p>

			<p>Introduce población:</p>
			<p><input type="text" name="caja_pob" required="true" />

			<p>Introduce fecha nacimiento:</p>
			<p><input type="date" name="caja_fecha_nac" required="true" /></p>

			<p>Introduce importe matricula:</p>
			<p><input type="number" name="caja_importe" required="true" /></p>

			<p>Estudios:</p>
			<p><textarea name="caja_estudios"></textarea></p>

			<p><input type="submit" value="Registrar"/></p>

			<p>Ver <a href="listado.php">lista de alumnos</a></p>

		</form>

	</center>
</body>
</html>