<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios PHP. Grupo 3</title>
</head>
<body>
	<center>
		<h3 style='color:blue'>1.- Obtén en una variable llamada precio un número aleatorio entre 10 y 100. Si es mayor que 50 aplica un descuento del 30% y si es menor o igual que 50 un descuento del 20%.</h3 style='color:blue'>
		<?php
			$precio=rand(10,100);
			if ($precio>50){
				$descuento=$precio*0.3;
				$precio_final=$precio-$descuento;
				echo "<h4>Precio $precio €, descuento 30% ($descuento €), precio final: $precio_final<h4>";
			}else{
				$descuento=$precio*0.2;
				$precio_final=$precio-$descuento;
				echo "<h4>Precio $precio €, descuento 20% ($descuento €), precio final: $precio_final<h4>";
			}
		?>
		<hr><hr>
		<h3 style='color:blue'>2.- Muestra una lista de 5 productos con precios aleatorios entre 10 y 100, y con descuentos aleatorios entre 20% y 40%.</h3 style='color:blue'>
		<?php
			for($p=1;$p<=5;$p++){
				$precio=rand(10,100);
				$desc=rand(20,30);
				$descuento=$precio*$desc/100;
				$precio_final=$precio-$descuento;
				echo "<h4>Precio $precio €, descuento $desc % ($descuento €), precio final: $precio_final<h4>";
			}
		?>
		<hr><hr>
		<h3 style='color:blue'>3.- Muestra la hora actual en horas:minutos:segundos, y en la siguiente línea la suma de los tres números</h3 style='color:blue'>
		<?php
			$hora_completa=date("H:i:s");
			$hora=date("H");
			$minutos=date("i");
			$segundos=date("s");
			$suma=$hora+$minutos+$segundos;
			echo "<h4>Son las $hora_completa<h4>";
			echo "<h4>La suma es: $suma<h4>";
		?>
		<hr><hr>
		<h3 style='color:blue'>4.-Mediante un bucle, muestra los numeros entre 1 y 1000 que son múltiplos del 3, del 4 y del 7 a la vez</h3 style='color:blue'>
		<?php
			for($num=1;$num<=1000;$num++){
				if($num%3==0 && $num%4==0 && $num%7==0){
					echo "<h4>$num</h4>";
				}
			}
		?>
		<hr><hr>
		<h3 style='color:blue'>5.- Mediante un bucle simula una especie de ticket de la compra, que muestre un listado de productos y su precio aleatorio entre 10 y 100 euros.Cada línea debe mostrar el producto y su precio. En total 5 productos. Después que muestre el SUBTOTAL, con la suma del precio de todos los productos.La siguiente línea la parte de IVA, calculando el 21% del SUBTOTAL, y por último el TOTAL con la suma del SUBTOTAL y el IVA.</h3 style='color:blue'>
		<?php
			$suma=0;
			$precio=0;
			for($p=1;$p<=5;$p++){
				$precio=rand(10,100);
				$suma=$suma+$precio;
				echo "<h4>Producto $p: $precio €<h4>";
			}
			$iva=$suma*21/100;
			$total=$suma+$iva;
			echo "--------------------------";
			echo "<h4>Subtotal: $suma €<h4>";
			echo "<h4>IVA (21%): $iva €<h4>";
			echo "<h4>TOTAL: $total €<h4>";
		?>
		<hr><hr>
		<h3 style='color:blue'>6.- Obtén combinaciones de 2 números aleatorios entre 1 y 5, hasta que salga una combinación de dos números iguales</h3 style='color:blue'>
		<?php
			$fila=0;
			$repetido=false;
			do{
				$n1=rand(1,5);
				$n2=rand(1,5);
				$fila=$fila+1;
				echo "<h4>Fila $fila: $n1 , $n2<h4>";
				if($n1==$n2){
					$repetido=true;
				}
				}while($repetido==false);
		?>
		<hr><hr>
		<h3 style='color:blue'>7.- Obten combinaciones de 3 números aleatorios entre 1 y 5, hasta que salga una combinación con los 3 números en orden ascendente y mayor uno que otro</h3 style='color:blue'>
		<?php
			$fila=0;
			$condicion=false;
			do{
				$n1=rand(1,5);
				$n2=rand(1,5);
				$n3=rand(1,5);
				$fila=$fila+1;
				echo "<h4>Fila $fila: $n1 , $n2, $n3<h4>";
				if($n1<$n2 && $n2<$n3){
					$condicion=true;
				}
			}while($condicion==false);
		?>
		<hr><hr>
		<h3 style='color:blue'>8.- Obten combinaciones de 3 números aleatorios entre 1 y 3, hasta que salga una combinación con los 3 números distintos</h3 style='color:blue'>
		<?php
			$fila=0;
			$condicion=false;
			do{
				$n1=rand(1,3);
				$n2=rand(1,3);
				$n3=rand(1,3);
				$fila=$fila+1;
				echo "<h4>Fila $fila: $n1 , $n2, $n3<h4>";
				if($n1!=$n2 && $n1!=$n3 && $n2!=$n3){
					$condicion=true;
				}
			}while($condicion==false);
		?>
	</center>
</body>
</html>