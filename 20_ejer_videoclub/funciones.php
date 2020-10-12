<?php

// Usuario alfanumérico y mínimo 6 caracteres

function verifica_usuario($usuario){
    $user = false;
    if (is_numeric($usuario)==false &&  strlen($usuario)>=6) {
        $user = true;
    }else{
        $user = false;
    }   
    return $user;
}

// Password numérico, impar y máximo 4 dígitos

function verifica_password($password)
{
    $pass = false;
    if (is_numeric($password) && $password % 2 != 0 && strlen($password)>0 && strlen($password)<=4) {
        $pass = true;
    }else{
        $pass = false;
    }   
    return $pass;
}
?>