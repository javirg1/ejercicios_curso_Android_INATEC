<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar / Exportar Excel</title>
</head>
<body>
    <?php
    $a=file("datos_facturas.csv");
    for ($i=0;$i<=count($a);$i++){
        echo "$a[$i]";
    }

  ?> 
















</body>
</html>