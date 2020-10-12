<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agencia de viajes </title>
</head>

<body>
<?php
//Creo una variable presupuesto e inicializo a 0
$presupuesto = 0;
//recojo los datos del formulario en variables:
$nombre = $_POST["inp_nombre"];
$apellido = $_POST["inp_apellidos"];
$dni = $_POST["inp_dni"];
$contrasena = $_POST["inp_contrasena"];
$viajeros = $_POST["inp_viajeros"];
$fecha_inicio = $_POST["inp_fecha"];
//Aqui me llega el value, que coincide con la duración en semanas:
$duracion = $_POST["inp_duracion"];
//Actualizo el presupuesto:
$presupuesto = $presupuesto + ($duracion * 300);


$destino = $_POST["inp_destino"];
//Hago un array y hago coincidir las posiciones del array, con el value del formulario:
$destinos = ["Playa","Montaña","Aventura"];
//Cojo en una variable el destino concreto:
$destino_elegido = $destinos[$destino];

//La misma estrategia para la referencia como nos has conocido:
$referencia = $_POST["inp_referencia"];
$opciones_referencia = ["Publicidad en facebook", "A través del email", "Publicidad en prensa", "Otros"];
$referencias = $opciones_referencia[$referencia];

//Lo mismo para saber si quiere mas info nuestra:
$infos = $_POST["inp_info"];
$opciones_info = ["SI", "NO"];
$info = $opciones_info[$infos];

//Estos si no están marcados, el campo no llega y me puede producir error:
if (isset($_POST["inp_excursiones"])) {
    $presupuesto = $presupuesto + 100;
	$excursiones = "Elegido";
} else {
    $excursiones = "No elegido";
}
if (isset($_POST["inp_lavanderia"])) {
    $presupuesto = $presupuesto + 100;
	$lavanderia = "Elegido";
} else {
    $lavanderia = "No elegido";
}
if (isset($_POST["inp_transporte"])) {
    $presupuesto = $presupuesto + 100;
    $transporte = "Elegido";
} else {
    $transporte  = "No elegido";
}

//El presupuesto calculado sería por un único viajero, multiplicamos por el total de viajeros:
$presupuesto = $presupuesto * $viajeros;

?>
    <center>
        <h1>Hemos recibido tus datos</h1>
        <h2>Datos recogidos:</h2>
        <p>Nombre: <?php echo $nombre ?></p>
        <p>Apellidos: <?php echo $apellido ?> </p>
        <p>DNI: <?php echo $dni ?> </p>
        <p>Contraseña: <?php echo $contrasena ?></p>
        <p>Número de viajeros: <?php echo $viajeros ?></p>
        <p>Fecha de inicio: <?php echo $fecha_inicio ?></p>
        <p>Duración de la estancia: <?php echo $duracion ?> semanas</p>
        <p>Destino: <?php echo $destino_elegido ?></p>
        <p>Extras elegidos:</p>
        <p>Excursiones: <?php echo $excursiones ?></p>
        <p>Lavanderia: <?php echo $lavanderia ?></p>
        <p>Transporte: <?php echo $transporte ?></p>
        <p>A sabido de nosotros principalmente por: <?php echo $referencias ?></p>
        <p>Quieres más información: <?php echo $info ?></p>

        <h2>PRESUPUESTO: <?php echo $presupuesto ?></h2>

        <img src="imagenes/<?php echo $destino ?>.jpg" width="300"/>
    </center>
</body>

</html>
