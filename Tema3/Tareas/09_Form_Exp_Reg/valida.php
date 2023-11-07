<?php
   
    function enviado() {

        if (isset($_REQUEST['enviar'])) 
            return true;
        
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
    
    function mayorEdad($name) {

        $fecha = new Datetime($_REQUEST[$name]);
        $hoy = new Datetime();

        date_format($fecha, 'd-m-Y');
        date_format($hoy, 'd-m-Y');

        $años = $hoy -> diff($fecha);
        
        if (($años -> y) >= 18) {
            return true;
        }

        return false;
    }


    function dniValido($name) {

        $dni = $_REQUEST[$name];

        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);

        $letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
        $valor = $numeros % 23;

        $letraNif= substr($letras, $valor, 1);

        if ($letraNif == $letra) {
            return true;
        }

        return false;
    }


    function errores($errores, $name) {

        if (isset($errores[$name])) 
            echo $errores[$name];
    }

    
    function recuerda($name) {

        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];

        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }

    
    function validaFormulario(&$errores){

    // NOMBRE
        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
     
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}$/', 'nombre')) {
            $errores['nombre'] = "Mínimo 3 caracteres";
        }

    // APELLIDOS    
        if (textVacio('apellidos')) {
            $errores['apellidos'] = "Apellidos Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/', 'apellidos')) {
            $errores['apellidos'] = "Mínimo 3 caracteres en cada apellido y un espacio para separar";
        }

    // CONTRASEÑA
        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";

        } elseif (strlen($_REQUEST['contraseña']) < 8) {
            $errores['contraseña'] = "La contraseña debe tener mínimo 8 caracteres";

        } elseif (!comprobarExpresionRegular($exp_contraseña = '/(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*\d+)/', 'contraseña')) {
            $errores['contraseña'] = "Al menos 1 Mayúscula, 1 minúscula y 1 número";
        }

        if (textVacio('r_contraseña')) {
            $errores['r_contraseña'] = "Repetir Contraseña Vacía";
        
        } elseif (strcmp($_REQUEST['contraseña'], $_REQUEST['r_contraseña']) != 0) {
            $errores['r_contraseña'] = "Las contraseñas no coinciden";
        }

    // FECHA
        if (textVacio('fecha')) {
            $errores['fecha'] = "Debe seleccionar una fecha";
        
        } elseif (!comprobarExpresionRegular($exp_fecha = '/^\d{2}\-\d{2}\-\d{4}$/', 'fecha')) {
            $errores['fecha'] = "Formato de fecha incorrecto: dd-mm-yyyy";
        
        } elseif (!mayorEdad('fecha')) {
            $errores['fecha'] = "No es mayor de edad";
        }

    // DNI  
        if (textVacio('dni')) {
            $errores['dni'] = "DNI Vacío";

        } elseif (!comprobarExpresionRegular($exp_dni = '/^\d{8}[A-Z]{1}$/', 'dni')) {
            $errores['dni'] = "El DNI debe contener 8 dígitos y una letra";
        
        } elseif (!dniValido('dni')) {
            $errores['dni'] = "El DNI no es válido";
        }

    // EMAIL
        if (textVacio('email')) {
            $errores['email'] = "Correo Electrónico Vacío";

        } elseif (!comprobarExpresionRegular($exp_email = '/^\w+\@\w+\.\w{2,}$/', 'email')) {
            $errores['email'] = "Formato de email incorrecto";
        
        }

    // FICHERO IMAGEN
        if (empty($_FILES['fichero']['name'])) {
            $errores['fichero'] = "Imagen Vacía";
        
        } elseif (!preg_match('/(jpg|png|bmp)$/', $_FILES['fichero']['name'])) {
            $errores['fichero'] = "Formato de Imagen Incorrecto (jpg, png, bmp)";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function subirFichero($archivo) {
            
        $imagen = $_FILES[$archivo]['name'];

        $ruta = '/var/www/html/DWES/Tema3/Tareas/09_Form_Exp_Reg/imagenes/';
        //chmod('/var/www/html/DWES/Tema3/Tareas/09_Form_Exp_Reg', 0777); 
        //chmod('/var/www/html/DWES/Tema3/Tareas/09_Form_Exp_Reg/valida.php', 0777);
        //chmod($ruta, 0777);
        $ruta .= basename($_FILES[$archivo]['name']);

    // Comprueba si el archivo se ha movido al directorio indicado
        if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $ruta)) {
            
            // chmod($ruta, 0777);
            // echo "Archivo Subido";
        
        } else {
            echo "Error al subir el archivo";
        }
    }

    function mostrarResultado() {
        // NOMBRE
        echo "El nombre es: " . $_REQUEST['nombre'];

        // APELLIDO
        echo "<br>Los apellidos son: " . $_REQUEST['apellidos'];

        // CONTRASEÑA
        echo "<br>La contraseña es: " . $_REQUEST['contraseña'];

        // FECHA
        echo "<br>La fecha es: " . $_REQUEST['fecha'];
                
        // DNI
        echo "<br>El DNI es: " . $_REQUEST['dni'];

        // EMAIL
        echo "<br>El email es: " . $_REQUEST['email'];

        // FICHERO IMAGEN
        echo '<br><p><img src="imagenes/'.$_FILES['fichero']['name'].'"></p>';
    }
?>