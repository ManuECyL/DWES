<?php


//Si se pulsa el botón de iniciar sesion
if (isset($_REQUEST['iniciarSesion'])) {
    $entradaOK = true; //Variable que controla el formularo
    //Comprobación de errores en los campos
    
    //Si la entradaOK es correcta
    if ($entradaOK) {   
        /* @param variable $codUsuario Variable que almacena el usuario introducido
         * @param variable $password Variable que almacena el password introducido concatenándelo con el $codUsuario y haciendo la función hash
         */
        $codUsuario = $_POST["loginUsuario"];
        $password = sha1($_POST["loginPassword"]);

        // @param Usuario $objetoUsuario Objeto que almacena el usuario después de validarlo
        $objetoUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);

        // Si $objetoUsuario tiene un Usuario
        if (!is_null($objetoUsuario)) {
            //Se crea una sesión con el objeto Usuario completo
            $_SESSION["usuarioDAW205POO"] = $objetoUsuario;//Carga el usuario en la sesión
            $_SESSION["pagina"]="inicioL"; //Se guarda en la variable de sesión la ventana de inicio
            $_SESSION['vista'] = $vistas[ $_SESSION["pagina"]];
            require $controladores['inicioL'];
            require_once $vistas["layout"];
            
        } else { // Si $objetoUsuario no tiene un Usuario
            $_SESSION['vista'] = $vistas['login']; //Se carga en la sesión de vistas, la que queremos
            require_once $vistas["layout"];
        }
    } else {//Si la entradaOK no es correcta
        $_SESSION['vista'] = $vistas['login']; //Se carga en la sesión de vistas, la que queremos
        require_once $vistas["layout"];
    }
} else { //Si no se ha pulsado el botón de iniciar sesion
    $_SESSION['vista'] = $vistas['login']; //Se carga en la sesión de vistas, la que queremos
    require_once $vistas["layout"];
}

