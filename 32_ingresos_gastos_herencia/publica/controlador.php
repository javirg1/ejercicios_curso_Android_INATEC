<?php

$op=0;
if (isset($_GET["op"])) {
	$op = $_GET["op"];
}
$msg="";
//Crear un objeto de la clase CMovimiento, para insertarlo:
require("../includes/cmovimiento.php");
$obj_mov = new CMovimiento();
//Según las distintas operaciones:
switch ($op) {
	case 1:	//Insertar
		//Recoger los datos del formulario:
		$descripcion = $_POST["inp_desc"];
		$fecha = $_POST["inp_fecha"];
		$importe = $_POST["inp_importe"];
		$tipo_mov = $_POST["inp_tipo_mov"];
		
		$res = $obj_mov->insertarMovimiento($fecha,$descripcion,$importe,$tipo_mov);
		if ($res>0) {
			$msg = "Movimiento insertado";
		} else {
			$msg = "No se ha podido insertar";
		}
		break;
	case 2:	//Actualizar
		//Recoger los datos del formulario:
		$id = $_POST["inp_id"];
		$descripcion = $_POST["inp_desc"];
		$fecha = $_POST["inp_fecha"];
		$importe = $_POST["inp_importe"];
		$tipo_mov = $_POST["inp_tipo_mov"];

		$res = $obj_mov->actualizarMovimiento($id,$fecha,$descripcion,$importe,$tipo_mov);
		if ($res>0) {
			$msg = "Movimiento actualizado";
		} else {
			$msg = "No se ha podido actualizar";
		}
		break;
	case 3: //Eliminar
		//Necesito saber el ID del movimiento a eliminar:
		$msg = "No se ha podido eliminar";
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$res = $obj_mov->eliminarMovimiento($id);
			if ($res>0) {
				$msg = "Movimiento eliminado";
			}
		}
		break;
	default:
		//Operación desconocida
		break;
}

header("Location:movimientos.php?mensaje=$msg");
?>