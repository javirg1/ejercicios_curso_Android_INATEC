<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla alumnos datos aleatorios</title>
</head>
<body>
	<?php
		$suma=0;
		$media=0;
		$edad_minima=50;
		$edad_maxima=0;
		$total_hombres=0;
		$total_mujeres=0;
		echo "<table border='1px' width='400px'>";
			echo "<tr>";
				echo "<th>NOMBRE</th>";
				echo "<th>EDAD</th>";
				echo "<th>SEXO</th>";
			echo "</tr>";
				for ($alumno=1;$alumno<=5;$alumno++){
				echo "<tr>";
					echo "<td>";
						echo "Alumno $alumno";
					echo "</td>";
					echo "<td>";		
						$edad=rand(18,50);
						if ($edad>$edad_maxima){
							$edad_maxima=$edad;
						}if ($edad<$edad_minima){
							$edad_minima=$edad;
						}
						echo "$edad";
						$suma=$suma+$edad;
					echo "</td>";
					echo "<td>";
						$num=rand(0,1);
							if ($num==0){
								$total_hombres++;
								echo "H";
							}else{
								echo "M";
							}
					echo "</td>";
				echo "</tr>";
			}
			echo "</tr>";
		echo "</table>";
		$media=$suma/5;
		$total_mujeres=5-$total_hombres;

		echo "<p>La media de edad es: $media</p>";
		echo "<p>La edad máxima es: $edad_maxima</p>";
		echo "<p>La edad mínima es: $edad_minima</p>";
		echo "<p>El total de hombres es: $total_hombres</p>";
		echo "<p>El total de mujeres es: $total_mujeres</p>";
	?>	
</body>
</html>