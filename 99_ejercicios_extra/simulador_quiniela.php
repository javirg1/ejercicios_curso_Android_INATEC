<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de quiniela</title>
</head>
<body>
<?php
$compara="";
$pronostico=array();
$aciertos=0;
$col="";
$resultado=array("1","1","X","1","1","2","1","X","X","2","1","1","X","2");
for ($i=1;$i<=15;$i++){
    $num=rand(1,3);
    if ($num==3){
        $aleatorio="X";
    }else{
        $aleatorio=$num;
    }
    $pronostico[]=$aleatorio;
}
echo "<table border='1px'>";
    echo "<tr>";
        echo "<th width='100px'>Partido</th>";
        echo "<th width='100px'>Pronóstico</th>";
        echo "<th width='100px'>Ganadora</th>";
        echo "<th width='100px'>Aciertos</th>";
    echo "</tr>";
echo "</table>";
for($j=0;$j<=13;$j++){
    if($pronostico[$j] == $resultado[$j]){
        $compara="Acierto";
        $aciertos++;
        $col="green";
    }else{
        $compara="Fallo";
        $col="white";
    }
    echo "<table border='1px'>";
        echo "<tr>";
            echo "<td width='100px'>";
                echo "Equipo Casa - Equipo Fuera";
            echo"</td>";
            echo "<td width='100px'>";
                echo "$pronostico[$j]";
            echo"</td>";
            echo "<td width='100px'>";
                echo "$resultado[$j]";
            echo"</td>";
            echo "<td width='100px' style='background-color:$col'>";
                echo "$compara";
            echo"</td>";
        echo "</tr>";
    echo "</table>";
}
echo "<p>El número de aciertos es: $aciertos</p>";
?>




</body>
</html>