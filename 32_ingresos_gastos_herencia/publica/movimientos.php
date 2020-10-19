<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejer ING GTOS</title>
</head>
<body>
	<center>
		
		<h2>INGRESOS Y GASTOS</h2>
		<?php
		if (isset($_GET["mensaje"])) {
			echo "<h3 style='color:red'>".$_GET["mensaje"]."</h3>";
		}
		?>

		<form method="post" action="controlador.php?op=1">

			<p>Descripcion: <input type="text" name="inp_desc" />
			<p>Fecha: <input type="date" name="inp_fecha" />
			<p>Tipo mov:
				<select name="inp_tipo_mov">
					<option selected disabled>Ing/Gto</option>
					<option value="-1">(-) Gasto</option>
					<option value="1">(+) Ingreso</option>
				</select>

			</p>
			<p>Importe: <input type="number" name="inp_importe" />

			<p><input type="submit" value="Insertar"/>

		</form>

		<hr/>

		<table width="500" style="border:solid 2px blue">
			<tr>
				<td>ID</td>
				<td>FECHA</td>
				<td>DESC</td>
				<td align="right">IMPORTE</td>
				<td></td>
				<td></td>
			</tr>
			<?php
			//Necesito utilizar la clase CMovimiento para obtener el listado:
			require("../includes/cmovimiento.php");
			//Creo el objeto de la clase:
			$obj_mov = new CMovimiento();
			$lista_movimientos = $obj_mov->listarMovimientos();
			for($pos=0;$pos<count($lista_movimientos);$pos++) { 
				$movimiento = $lista_movimientos[$pos];
				$importe = $movimiento["tipo_movimiento"] * $movimiento["importe"];
				?>
				<tr>
					<td><?php echo $movimiento["id"] ?></td>
					<td><?php echo $movimiento["fecha"] ?></td>
					<td><?php echo $movimiento["descripcion"] ?></td>
					<td align="right"><?php echo $importe ?> €</td>
					<td><a href="editar.php?id=<?php echo $movimiento['id'] ?>">editar</a></td>
					<td><a href="controlador.php?op=3&id=<?php echo $movimiento['id'] ?>" onclick="return confirm('¿Deseas `eliminar` este registro?')">eliminar</a></td>
				</tr>
			<?php } ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td align="right"><?php echo $obj_mov->calcularSaldo()?> €</td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</center>
</body>
</html>