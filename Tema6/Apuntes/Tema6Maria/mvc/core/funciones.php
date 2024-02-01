<?php

function validarFormulario(&$errores)
{
    if (textVacio('nombre'))
        $errores['nombre'] = "Nombre Vacio";
    if (textVacio('pass'))
        $errores['pass'] = "Contraseña Vacio";

    if(count($errores) == 0)
        return true;
    return false;
    
}

function validarFormularioR(&$errores)
{
    if (textVacio('cod'))
        $errores['cod'] = "codUsuario Vacio";
    if (textVacio('nombre'))
        $errores['nombre'] = "Nombre Vacio";
    if (textVacio('pass'))
        $errores['pass'] = "Contraseña Vacio";
    if (textVacio('pass1'))
        $errores['pass1'] = "Contraseña Vacio";
    passIgual($_REQUEST['pass'],$_REQUEST['pass1'],$errores);
    if(count($errores) == 0)
        return true;
    return false;
    
}

function validaFormularioNuevaCita(&$errores)
{
    if (textVacio('especialista'))
        $errores['especialista'] = "especialista Vacio";
    if (textVacio('fecha'))
        $errores['fecha'] = "Fecha Vacio";
    if (textVacio('motivo'))
        $errores['motivo'] = "Motivo Vacio";
   
    if(count($errores) == 0)
        return true;
    return false;
    
}



function textVacio($name)
{
    if (empty($_REQUEST[$name]))
        return true;
    return false;
}

function errores($errores, $name)
{
    if (isset($errores[$name]))
        echo $errores[$name];
}

function validado(){
    if(isset($_SESSION['usuario']))
        return true;
    return false;
}

function passIgual($pass,$pass1,&$errores){
    if($pass !== $pass1){
        $errores['igual'] = "Las contraseñas no coinciden";
        return false;
    }
    return true;
}

function isAdmin(){
    if($_SESSION['usuario']->perfil == 'administrador')
        return true;
    return false;
}
