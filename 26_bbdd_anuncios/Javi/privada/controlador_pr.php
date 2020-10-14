<?php
// ************************************************************************************
// CONTROLADOR
// Zona privada
// ************************************************************************************

//Vamos a utilizar variables de sesión para controlar si el usuario se ha identificado
session_start();
//Vamos a utilizar las funciones creadas
require("../includes/funciones.php");
//Vamos a comprobar si existe una variable de sesión que contenga el id de usuario:
if (isset($_SESSION["id_usuario"])) {
    //El usuario está identificado
    $id_usuario = $_SESSION["id_usuario"];
} else {
    //El usuario se está intentando colar, no se ha identificado:
    header("Location:../publica/login.php?error=Es necesario identificarse");
    exit;
}

// ************************************************************************************
// Comprobamos si vienen la variable -op- por el método POST o GET
// Esta variable es la que utilizamos para realizar las distintas operaciones CRUD
// ************************************************************************************

// Por POST vendrán las opción -nuevo anuncio- del formulario -index.php- de la zona privada
if (isset($_POST["op"])) {
    $op = $_POST["op"];
} else {
    $op = 0;
    $pagina = "index.php";
}
// Por GET solo vendrán las opciones -editar y eliminar- del formulario -index.php- de la zona privada
if (isset($_GET["op"])) {
    $id_anuncio = $_GET["id_anuncio"];
    $op = $_GET["op"];
}

// ************************************************************************************
// Crud - NUEVO ANUNCIO - opción 1
// Aquí llegamos cuando hacemos click en el link -nuevo anuncio- del -index.php- de la zona privada
// ************************************************************************************

if ($op == 1) {
    // Leemos los datos que vienen del formulario -nuevo.php- de la zona privada
    // Necesitamos el -id_usuario- porque es campo índice en la bbdd. Lo tomamos de la variable de sesión, el resto los obtenemos por el método POST del formulario -nuevo.php-
    $id_usuario = $_SESSION["id_usuario"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $fecha = $_POST["fecha"];

    // *-------------------------------------------------------------------------------------*
    // Gestionamos la carga de la foto en el servidor
    // *-------------------------------------------------------------------------------------*
    $nombre_en_el_servidor="default.png";
    //Comprobamos si se ha adjuntado una imagen
    if (!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $ha_subido_archivo = false;
    } else {
        $ha_subido_archivo = true;
    }
    //Compruebo si ha subido archivo o no:
    if ($ha_subido_archivo == true) {
        //Proceso los datos del archivo:
        //Ya estoy seguro de que ha enviado un archivo en el formulario y el servidor lo ha recibido
        //Recoger el nombre original del archivo
        $nombre_archivo_original = $_FILES["foto"]["name"];
        //Obtenemos el peso del archivo, nos lo da en bytes, lo pasamos a kb
        //$peso_archivo = $_FILES["foto"]["size"] / 1024;
        //El tipo de archivo que es:
        //$tipo_archivo = $_FILES["foto"]["type"];
        //Obtener el archivo que ha venido del formulario y guardarlo en la carpeta imágenes del servidor:
        $archivo = $_FILES["foto"]["tmp_name"];
        //Especificamos la carpeta de subida (donde lo voy a copiar)
        $ruta_de_subida = __DIR__ . "/../fotos/";
        //Mi objetivo es guardar la imagen en mi carpeta de imagenes del servidor, pero con un nombre único (no con el nombre original)
        //Hay que añadir la extensión según el archivo original:
        $extension_original = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);
        //Voy a crear un nombre de archivo único con el que se guardará en el servidor:
        //Cojo el tiempo en milisegundos:
        $nombre_en_el_servidor = round(microtime(true) * 1000);
        //Y por mayor seguridad, le añado un número aleatorio de 5 digitos:
        $nombre_en_el_servidor = $nombre_en_el_servidor . "_" . rand(10000, 99999) . "." . $extension_original;
        //Necesito una función que me guarde el archivo en la carpeta del servidor:
        move_uploaded_file($archivo, $ruta_de_subida . $nombre_en_el_servidor);
    }
    // *-------------------------------------------------------------------------------------*
    // FIN gestión de la carga de la foto en el servidor
    // *-------------------------------------------------------------------------------------*

    // Llamamos a la función que creará un nuevo anuncio en la bbdd. Esta función devuelve el último -id_anuncio- que se crea
    $id_anuncio = nuevo_anuncio($id_usuario, $titulo, $descripcion, $precio, $fecha, $nombre_en_el_servidor);
    //Comprobamos si el registro ha ido bien:
    if ($id_anuncio > 0) {
        //Si se ha guardado el anuncio, redirijimos a -index.php- de la zona privada con un mensaje de confirmación
        $pagina = "index.php?aviso=El anuncio se ha publicado satisfactoriamente";
    } else {
        //Si no se ha guardado el anuncio, redirijimos a -nuevo.php- de la zona privada con un mensje de error
        $pagina = "nuevo.php?aviso=El anuncio no se ha podido registrar";
    }
}

// ************************************************************************************
// cRud - OBTENER DATOS DEL ANUNCIO - opción 2
// Aquí llegamos cuando hacemos click en el icono editar del -index.php- de la zona privada
// ************************************************************************************

if ($op == 2) {
    // Llamamos a la función que leerá los datos del anuncio, pasándole como argumento el -id_anuncio- que hemos obtenido por el método GET (más arriba en este código)
    $datos_anuncio = cargarDatosAnuncio($id_anuncio);
    // Guardamos en variables de sesíon los datos obtenidos en el array de la función -cargar_anuncio- (excepto -id_anuncio- que ya lo habíamos obtenido por el método GET)
    $_SESSION["id_anuncio"] = $id_anuncio;
    $_SESSION["titulo"] = $datos_anuncio["titulo"];
    $_SESSION["descripcion"] = $datos_anuncio["descripcion"];
    $_SESSION["precio"] = $datos_anuncio["precio"];
    $_SESSION["fecha"] = $datos_anuncio["fecha"];
    // redirijimos a -editar.php- de la zona privada. Allí mostraremos los datos del anuncio utilizando las variables de sesión creadas anteriormente
    $pagina = "editar.php";
}

// ************************************************************************************
// crUd - EDITAR / ACTUALIZAR UN ANUNCIO - Opción 3
// Aquí llegamos cuando hacemos click en el botón -actualizar- del formulario -editar.php- de la zona privada
// ************************************************************************************

if ($op == 3) {
    // Obtenemos por el método POST todos los campos del formulario -editar.php-
    $id_anuncio = $_POST["id_anuncio"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $fecha = $_POST["fecha"];
    // Llamamos a la función que actualizará el anuncio en la bbdd. Esta función devuelve un número que es el total de filas (registros) que se van a actualizar
    $registro_actualizado = editar($id_anuncio, $titulo, $descripcion, $precio, $fecha);
    //Comprobamos si hay filas (registros) actualizadas:
    if ($registro_actualizado > 0) {
        //Si se ha actualizado el anuncio, redirijimos a -index.php- de la zona privada con un mensaje de confirmación
        $pagina = "index.php?aviso=El anuncio se ha actualizado satisfactoriamente";
    } else {
        //Si no se ha actualizado el anuncio, redirijimos a -editar.php- de la zona privada con un mensje de error
        $pagina = "editar.php?aviso=El anuncio no se ha podido actualizar";
    }
}

// ************************************************************************************
// cruD - ELIMINAR UN ANUNCIO - Opción 4
// Aquí llegamos cuando hacemos click en el botón -eliminar- del formulario -editar.php- de la zona privada
// ************************************************************************************

if ($op == 4) {
    // Llamamos a la función que eliminará el anuncio, pasándole como argumento el -id_anuncio- que hemos obtenido por el método GET (más arriba en este código)
    // La función devolverá un número que es el total de filas (registros) que se van a eliminar.
    $registro_eliminado = eliminar($id_anuncio);
    if ($registro_eliminado > 0) {
        //Si se ha eliminado el anuncio, redirijimos a -index.php- de la zona privada con un mensaje de confirmación
        $pagina = "index.php?aviso=El anuncio se ha eliminado correctamente";
    } else {
        //Si no se ha eliminado el anuncio, redirijimos a -editar.php- de la zona privada con un mensje de error
        $pagina = "index.php?aviso=El anuncio no se ha podido eliminar";
    }
}

// ************************************************************************************
//En función del resultado, redirijo a una página u otra pasándole la variable -$pagina-
// ************************************************************************************

header("Location:$pagina");