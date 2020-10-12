<?php

// *************************************************************************************************************************
// Llegamos aquí cuando hacemos click en la opción -log out- del formulario index.php de la zona privada
// *************************************************************************************************************************

// Eliminamos todas las variables de sesión
session_start();
session_destroy();
// Redirigimos al -index.php- de la zona pública:
header("Location:../publica/index.php");
?>