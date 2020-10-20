<?php
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	require("../includes/cmovimiento.php");
	$obj_mov = new CMovimiento();
	$movimiento = $obj_mov->cargarDatos($id);
} else {
	header("Location:movimientos.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejer ING GTOS</title>
</head>
<body>
	<center>
		
		<h2>INGRESOS Y GASTOS - Editar movimiento</h2>
		<?php
		if (isset($_GET["mensaje"])) {
			echo "<h3 style='color:red'>".$_GET["mensaje"]."</h3>";
		}
		?>

		<form method="post" action="controlador.php?op=2">
			<input type="hidden" value="<?php echo $movimiento['id'] ?>" name="inp_id"/>
			<p>Descripcion: <input type="text" name="inp_desc" value="<?php echo $movimiento['descripcion'] ?>"/>
			<p>Fecha: <input type="date" name="inp_fecha" value="<?php echo $movimiento['fecha'] ?>" />
			<p>Tipo mov:
				<select name="inp_tipo_mov">
				<?php if ($movimiento["tipo_movimiento"] <0) { ?>
					<option value="-1" selected>(-) Gasto</option>
					<option value="1">(+) Ingreso</option>
				<?php } else { ?>
					<option value="-1">(-) Gasto</option>
					<option value="1" selected>(+) Ingreso</option>
				<?php } ?>

				</select>

			</p>
			<p>Importe: <input type="number" name="inp_importe" value="<?php echo $movimiento['importe'] ?>" />

			<p><input type="submit" value="Actualizar"/>

		</form>

		
	</center>
</body>
</html>