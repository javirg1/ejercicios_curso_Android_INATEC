<?php
//Este archivo es el controlador:

//Recoger los datos del formulario:
if (isset($_POST["caja_num1"])) {
	$num1 = $_POST["caja_num1"];
	$num2 = $_POST["caja_num2"];
	$operacion = $_POST["caja_operacion"];

	//Para hacer la operacion, creo un objeto de la clase CCalculadora:
	require("CCalculadora.php");
	//Al crear el objeto tengo que pasarle los parámetros que espera el constructor:
	$obj_calculadora = new CCalculadora($num1,$num2,$operacion);
}
?>

<center>
	<h3>Resultado</h3>
	<p><?php echo $obj_calculadora->getOperando1() ?></p>
	<p><?php echo $obj_calculadora->getSigno() ?></p>
	<p><?php echo $obj_calculadora->getOperando2() ?></p>
	<p><?php echo $obj_calculadora->getRes() ?></p>

</center>