<?php
// Llamo al archivo funciones

include "funciones.php";

// compruebo si vienen el usuario y el password
if (isset($_POST["nombre"]) && isset($_POST["password"])) {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];
} else {
    header("location:acceso.php?error_url=Para acceder al catálogo debes introducir un usuario y password correctos");
    exit;
}

//Verifico el usuario y el password con dos funciones
if (verifica_password($password) == true && verifica_usuario($nombre) == true) {
    header("location:catalogo.php");
    exit;
} else {
    header("location:acceso.php?error=Usuario o password incorrecto. Vuelve a introducir los datos correctos");
    exit;
}