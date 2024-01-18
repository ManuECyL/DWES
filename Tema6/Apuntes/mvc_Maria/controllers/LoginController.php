<?php

if(isset($_REQUEST['Login_IniciarSesion'])){
    //ver si nombre y contraseña no estan vacios
    $errores = array();
    if(validarFormulario( $errores)){
        //validado el usuario en la base datos
        $usuario = UserDAO::validarUser($_REQUEST['nombre'],$_REQUEST['pass']);
        //iniciar sesion validada
        if($usuario != null){
            $usuario->fechaUltimaConexion = date('Y-m-d');
            UserDAO::update($usuario);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'home.php';
            unset($_SESSION['controller']);
        }else{
            $errores['validado'] = "No existe el usaurio y contraseña";
        }        
    }
}else if(isset($_REQUEST['Login_Registro'])){
    $_SESSION['vista'] = VIEW.'registro.php';
}if(isset($_REQUEST['Login_GuardaRegistro'])){
    //ver si nombre y contraseña no estan vacios    
    $errores = array();
    if(validarFormularioR( $errores)){        
                
        $usuario = new User(
            $_REQUEST['cod'],
            $_REQUEST['nombre'],
            $_REQUEST['pass'],
            date('Y-m-d')
        );
        if(UserDAO::insert($usuario)){
            //mandarlo a la vista
            $_SESSION['vista'] = VIEW.'login.php';
            $sms = "Se ha registrado con exito";
        }else{
            $errores['registrar'] = "No se ha podido registrar";
        }        
    }
}