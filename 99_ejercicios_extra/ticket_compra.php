<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
</head>

<body>



    <?php
    $productos = array("Peras", "Manzanas", "Naranjas", "Uvas", "Aguacates", "Melocotones", "Limones", "Melón", "Papaya", "Plátano");
    $indice = rand(0, 9);
    $compra = array($productos[$indice]);
    //$nuevoProducto="";
    $existe = false;
    $cont = 0;
    while ($cont <= 5) {
        $n = rand(0, 9);
        for ($c = 0; $c < count($compra); $c++) {
            if ($compra[$c] = $productos[$n]) {
                $existe = true;
            }
        }
        if ($existe == false) {
            $compra[] = $productos[$n];
        }
        $cont++;
    }
    echo count($compra);
    for ($art = 0; $art < count($compra); $art++) {
        echo "$compra[$art] ";
    }





    ?>

</body>

</html>