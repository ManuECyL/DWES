<?php
function textoVacio($name)
{
    if (empty($name)) {
        return true;
    }
    return false;
}

function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo $errores[$name];
    }
}

function validarFormulario(&$errores)
{
    if (textoVacio($_REQUEST['nombre'])) {
        $errores['nombre'] = "Nombre vacio";
    }
    if (textoVacio($_REQUEST['pass'])) {
        $errores['pass'] = "Password vacio";
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}

function validado()
{
    if (isset($_SESSION['usuario'])) {
        return true;
    }
    return false;
}



function isAdmin()
{
    if ($_SESSION['usuario']->tipo == "admin")
        return true;
    return false;
}

?>