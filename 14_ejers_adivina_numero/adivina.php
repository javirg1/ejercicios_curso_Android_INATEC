<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina un número</title>
</head>
<body>
    <center>
<?php
$numero=$_POST["numero"];
$n=rand(1,3);
if($numero==$n){
    echo "<h2 style='color:green'>Acierto, era el número $numero </h2>";
}else{
    echo "<h2 style='color:red'>Fallo. Has introducido el número $numero . El número correcto era el $n</hs>";
}
?>
    </center>
</body>
</html>