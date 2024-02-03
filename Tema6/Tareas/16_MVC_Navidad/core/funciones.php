<?php
    
    function enviado() {

        if (isset($_REQUEST['enviar'])) 
            return true;
        
        return false;
    }


    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }

    // Comprobar si se ha pulsado el icono del carrito para posteriormente mostrar el mensaje de error y evitar que se mantenga en la página si existe otro error
    function existeCarrito($name) {

        if(isset($_REQUEST[$name])) {
           
            // Si existe el carrito, pero no se ha iniciado sesión
            $_SESSION['mensaje'] = "<div class='alert alert-danger text-center'><b>Debe iniciar sesión para acceder al carrito</b></div>";

            // Redirigir a la página anterior sin el parámetro 'carrito', es decir, con la url original
            header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
            exit;
        }

        return false;
    }


    function textVacio($name) {
        
        if (empty($_REQUEST[$name])) 
            return true;
    
        return false;
    }

    function comprobarExpresionRegular($exp, $name) {

        if (preg_match($exp, $_REQUEST[$name])) 
            return true;
        
        return false;
    }


    function errores($errores, $name) {

        if (isset($errores[$name])) 
            echo $errores[$name];
    }


    function recuerda($name) {

        if (existe($name) && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];
        } 
    }

    function validado() {
        
        if (isset($_SESSION['usuario'])) {
            return true;    
        }
        
        return false;
    }

    function imagen($name) {

        if (isset($_FILES[$name])) {
            return true;
        }

        return false;
    }

    function subirImagen($archivo) {
            
        $imagen = $_FILES[$archivo]['name'];

        $ruta = '/var/www/html/DWES/Tema5/Tareas/15_Navidad/imagenes/productos/';
        $ruta .= basename($_FILES[$archivo]['name']);

    // Comprueba si el archivo se ha movido al directorio indicado
        if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $ruta)) {
            
            chmod($ruta, 0777);
            // echo "Archivo Subido";
        
        } else {
            echo "Error al subir el archivo";
        }
    }

    function validarFormularioInicioSesion(&$errores) {

        if (textVacio('user')) {
            $errores['user'] = "Usuario Vacío";
        } 
        
        if (textVacio('pass')) {
            $errores['pass'] = "Contraseña vacía";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function validarRegistro(&$errores){

        // USUARIO
        if (textVacio('id_Usuario')) {
            $errores['id_Usuario'] = "Usuario Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]\w{4,}$/', 'id_Usuario')) {
            $errores['id_Usuario'] = "Mínimo 4 caracteres";
        }

        // CONTRASEÑA
        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";

        } elseif (strlen($_REQUEST['contraseña']) < 8) {
            $errores['contraseña'] = "La contraseña debe tener mínimo 8 caracteres";

        } elseif (!comprobarExpresionRegular('/(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*\d+)/', 'contraseña')) {
            $errores['contraseña'] = "Al menos 1 Mayúscula, 1 minúscula y 1 número";
        }

        // REPETIR CONTRASEÑA
        if (textVacio('passRepetida')) {
            $errores['passRepetida'] = "Repetir Contraseña Vacía";
        
        } elseif (strcmp($_REQUEST['contraseña'], $_REQUEST['passRepetida']) != 0) {
            $errores['passRepetida'] = "Las contraseñas no coinciden";
        }

        // EMAIL
        if (textVacio('email')) {
            $errores['email'] = "Correo Electrónico Vacío";

        } elseif (!comprobarExpresionRegular('/^\w+\@\w+\.\w{2,}$/', 'email')) {
            $errores['email'] = "Formato de email incorrecto";
        
        }

        // FECHA
        if (textVacio('fecha_Nacimiento')) {
            $errores['fecha_Nacimiento'] = "Debe seleccionar una fecha";
        
        } elseif (!comprobarExpresionRegular('/^\d{2}\-\d{2}\-\d{4}$/', 'fecha_Nacimiento')) {
            $errores['fecha_Nacimiento'] = "Formato de fecha incorrecto: dd-mm-yyyy";
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function validarPerfil(&$errores){

        // USUARIO
        if (textVacio('id_Usuario')) {
            $errores['id_Usuario'] = "Usuario Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]\w{4,}$/', 'id_Usuario')) {
            $errores['id_Usuario'] = "Mínimo 4 caracteres";
        }

        // CONTRASEÑA
        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";

        } elseif (strlen($_REQUEST['contraseña']) < 8) {
            $errores['contraseña'] = "La contraseña debe tener mínimo 8 caracteres";

        } elseif (!comprobarExpresionRegular($exp_contraseña = '/(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*\d+)/', 'contraseña')) {
            $errores['contraseña'] = "Al menos 1 Mayúscula, 1 minúscula y 1 número";
        }

        // EMAIL
        if (textVacio('email')) {
            $errores['email'] = "Correo Electrónico Vacío";

        } elseif (!comprobarExpresionRegular($exp_email = '/^\w+\@\w+\.\w{2,}$/', 'email')) {
            $errores['email'] = "Formato de email incorrecto";
        
        }

        // FECHA
        if (textVacio('fecha_Nacimiento')) {
            $errores['fecha_Nacimiento'] = "Debe seleccionar una fecha";
        
        } elseif (!comprobarExpresionRegular($exp_fecha = '/^\d{2}\-\d{2}\-\d{4}$/', 'fecha_Nacimiento')) {
            $errores['fecha_Nacimiento'] = "Formato de fecha incorrecto: dd-mm-yyyy";
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function validarAltaProducto(&$errores){

        // COD_PROD
        if (textVacio('cod_Prod')) {
            $errores['cod_Prod'] = "Cod_Prod Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Z][A-Z0-9]{2,}$/', 'cod_Prod')) {
            $errores['cod_Prod'] = "Empieza por mayúscula y después mínimo 2 mayúsculas más o números";
        }

        // TITULO
        if (textVacio('titulo')) {
            $errores['titulo'] = "Título Vacío";

        } elseif (!comprobarExpresionRegular('/^[A-Z][a-z]{3,}[\sA-Za-z0-9]{2,}$/', 'titulo')) {
            $errores['titulo'] = "Debe comenzar por mayúscula, contener mínimo 3 minúsculas y 2 minúsculas más o mayúsculas o números";
        }

        // COMPAÑIA
        if (textVacio('compañia')) {
            $errores['compañia'] = "Compañía Vacía";
        
        } elseif (!comprobarExpresionRegular('/^[A-Z][a-z]{3,}[\sA-Za-z0-9]{2,}$/', 'titulo')) {
            $errores['compañia'] = "Debe comenzar por mayúscula, contener mínimo 3 minúsculas y 2 minúsculas más o mayúsculas o números";
        }

        // STOCK
        if (textVacio('stock')) {
            $errores['stock'] = "Stock Vacío";

        } elseif (!comprobarExpresionRegular('/^\d{1,}$/', 'stock')) {
            $errores['stock'] = "Formato de stock incorrecto";
        
        }

        // PRECIO
        if (textVacio('precio')) {
            $errores['precio'] = "Precio Vacio";
        
        } elseif (!comprobarExpresionRegular('/^\d{1,}\,\d{2}$/', 'precio')) {
            $errores['precio'] = "Formato de precio incorrecto: 00,00";
        } 


        // RUTA IMAGEN
        if (textVacio('ruta_Imagen')) {
            $errores['ruta_Imagen'] = "Ruta Imagen Vacía";
        
        } elseif (!comprobarExpresionRegular($exp_fecha = '/^imagenes\/productos\/[a-zA-Z0-9]+\.jpg$/', 'ruta_Imagen')) {
            $errores['ruta_Imagen'] = "Formato de ruta_Imagen incorrecto: imagenes/productos/imagen.jpg";
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }

    
    // Botón Cerrar Sesión
    function cerrado() {

        if (isset($_REQUEST['cerrarSesion'])) {
            return true;
            header('Location: ./index.php');
        }
        
        return false;
    }

    // Comprobar si la sesión está iniciada
    function sesionIniciada() {

        if (!isset($_SESSION['usuario'])) {

            $_SESSION['error'] = "No tiene sesión iniciada.";
    
            header('Location: ./index.php');
            exit;
        }
    }

    // Cerrar la sesión
    function cerrarSesion() {
        // session_start();
        session_destroy();

        header('Location: ./index.php');
        exit;
    }
?>