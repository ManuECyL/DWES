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


    function radioVacio($name) {

        if (!isset($_REQUEST[$name])) 
            return true;
    
        return false;
    }


    function selectVacio($name) {

        if (isset($_REQUEST[$name]) && $_REQUEST[$name] != 0) 
            return false;
    
        return true;
    }


    function esNumerico($name) {

        if (is_numeric($_REQUEST[$name])) {
            return true;
        }

        return false;
    }


    function rangoNumerico($name) {

        if ($_REQUEST[$name] >= 0 && $_REQUEST[$name] <= 100) {
            return true;
        }

        return false;
    }

    
    function mayorEdad($name) {

        $fecha = new Datetime($_REQUEST[$name]);
        $hoy = new Datetime();

        date_format($fecha, 'd/m/Y');
        date_format($hoy, 'd/m/Y');

        $años = $hoy -> diff($fecha);
        
        if (($años -> y) >= 18) {
            return true;
        }

        return false;
    }


    function formatoFecha($name) {
        
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $_REQUEST[$name])) {
            return true;
        }

        return false;
    }


    function generaChecks() {
      // Datos para generar los checkboxes
      $checks = ['Check 1', 'Check 2', 'Check 3', 'Check 4', 'Check 5', 'Check 6'];

      // Itera sobre las opciones y crea checkboxes dinámicamente
      foreach ($checks as $check) {
            echo '<input type="checkbox" id="' . $check . '" name="checks[]" value="' . $check . '" '; recuerdaCheck('checks', $check) . '>';            
            echo ' <label for="' . $check . '">' . $check . '</label>';
            echo "<br>";
      }
    }


    function rangoChecks($name) {

        $cont = 0;

        if (isset($_REQUEST[$name])) {

            $cont = count($_REQUEST[$name]); 

            if ($cont >= 1 && $cont <= 3) {
                return true;
            }
        }     

        return false;
    }


    function imagen($name) {

        if (isset($_FILES[$name])) {
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


    function recuerdaRadio($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
            echo 'checked';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }


    function recuerdaSelect($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
            echo 'selected';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }


    function recuerdaCheck($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && in_array($value, $_REQUEST[$name])) {    
            echo 'checked';
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }  


    function expresionTelefono($name) {
        
        if (preg_match('/^\d{9}$/', $_REQUEST[$name])) {
            return true;
        }

        return false;
    }

    
    function expresionEmail($name) {
        
        if (preg_match('/^\w+\@\w+\.\w{2,}$/', $_REQUEST[$name])) {
            return true;
        }

        return false;
    }


    function subirFichero($archivo) {
            
        $imagen = $_FILES[$archivo]['name'];

        $ruta = '/var/www/html/DWES/Tema3/Tareas/08_Formularios/';
        $ruta .= basename($_FILES[$archivo]['name']);

    // Comprueba si el archivo se ha movido al directorio indicado
        if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $ruta)) {
            
            chmod($ruta, 0777);
            // echo "Archivo Subido";
        
        } else {
            echo "Error al subir el archivo";
        }
    }

 
    function validaFormulario(&$errores){

    // Nombre
        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
        }

    // Apellido
        if (textVacio('apellido')) {
            $errores['apellido'] = "Apellido Vacío";
        }

    // Numérico
        if (textVacio('numérico')) {
            $errores['numérico'] = "Numérico Vacío";

        } elseif (!esNumerico('numérico')) {
            $errores['numérico'] = "Debe escribir un número";

        } elseif (!rangoNumerico('numérico')){
            $errores['numérico'] = "El número obligatorio debe ser entre 0 y 100";
        } 
        
    // Numérico Opcional
        if (!textVacio('numéricoOp')){

            if (!esNumerico('numéricoOp')) {
                $errores['numéricoOp'] = "Debe escribir un número";       
            
            } elseif (!rangoNumerico('numéricoOp')) {
                $errores['numéricoOp'] = "El número debe ser entre 0 y 100";
            }
        }

    // Fecha
        if (textVacio('fecha')) {
            $errores['fecha'] = "Debe seleccionar una fecha";
        
        } elseif (formatoFecha('fecha')) {
            $errores['fecha'] = "Formato de fecha incorrecto: dd/mm/yyyy";

        } elseif (!mayorEdad('fecha')) {
            $errores['fecha'] = "No es mayor de edad";      
        } 
        
    // Fecha Opcional
        if (!textVacio('fechaOp')){
            
            if (formatoFecha('fechaOp')) {
                $errores['fechaOp'] = "Formato de fecha incorrecto: dd-mm-yyyy";
            
            } elseif (!mayorEdad('fechaOp')) {
                $errores['fechaOp'] = "No es mayor de edad";
            }
        }

    // Radio
        if (radioVacio('radio')) {
            $errores['radio'] = "Debe seleccionar una opción";
        }

    // Select
        if (selectVacio('select')) {
            $errores['select'] = "Debe seleccionar una opción";
        }

    // Checks
        if (radioVacio('checks')) {
            $errores['checks'] = "Debe seleccionar al menos una opción y como máximo 3 <br>";
        
        } elseif (!rangoChecks('checks')) {
            $errores['checks'] = "Debe seleccionar al menos una opción y como máximo 3 <br>";
        }

    // Teléfono
        if (textVacio('telefono')) {
            $errores['telefono'] = "Teléfono Vacío";
        
        } elseif (!esNumerico('telefono')) {
            $errores['telefono'] = "Debe escribir un número";
        
        } elseif (!expresionTelefono('telefono')) {
            $errores['telefono'] = "El teléfono debe tener 9 dígitos";
        }

    // Email
        if (textVacio('email')) {
            $errores['email'] = "Email Vacío";
        
        } elseif (!expresionEmail('email')) {
            $errores['email'] = "Email incorrecto";
        }

    // Contraseña
        if (textVacio('contraseña')) {
            $errores['contraseña'] = "Contraseña Vacía";
        }

    // Fichero
        if (empty($_FILES['fichero']['name'])) {
            $errores['fichero'] = "Fichero Vacío";
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function mostrarTodo() {
        // NOMBRE
        echo "<strong>Nombre:</strong> " .$_REQUEST['nombre'];

        // NOMBRE OPCIONAL
        if (!textVacio('nombreOp')) {
            echo "<br><strong>Nombre Opcional:</strong> " .$_REQUEST['nombreOp'];    
        } 

        // APELLIDO
        echo "<br><strong>Apellido:</strong> " .$_REQUEST['apellido'];

        // APELLIDO OPCIONAL
        if (!textVacio('apellidoOp')) {
            echo "<br><strong>Apellido Opcional:</strong> " .$_REQUEST['apellidoOp'];   
        } 

        // NUMÉRICO
        echo "<br><strong>Numérico:</strong> " .$_REQUEST['numérico'];

        // APELLIDO OPCIONAL
        if (!textVacio('numéricoOp') && esNumerico('numéricoOp') && rangoNumerico('numéricoOp')) {
            echo "<br><strong>Numérico Opcional:</strong> " .$_REQUEST['numéricoOp'];   
        } 

        // FECHA
        echo "<br><strong>Fecha:</strong> " .$_REQUEST['fecha'];

        // FECHA OPCIONAL
        if (!textVacio('fechaOp') && !formatoFecha('fechaOp') && mayorEdad('fechaOp')) {
            echo "<br><strong>Fecha Opcional:</strong> " .$_REQUEST['fechaOp'];    
        } 

        // RADIO OBLIGATORIO
        echo "<br><strong>La opcion de radio seleccionada es:</strong> " .$_REQUEST['radio'];   

        
        // SELECT
        echo "<br><strong>La opcion seleccionada es:</strong> " .$_REQUEST['select'];    

        // CHECKBOX
        echo "<br><strong>Los checks que ha elegido son:</strong> ";

        foreach ($_REQUEST["checks"] as $key => $value) {
            echo "<br>- " . $value;
        }
        
        // TELEFONO
        echo "<br><strong>Teléfono:</strong> " .$_REQUEST['telefono'];

        // EMAIL
        echo "<br><strong>Email:</strong> " .$_REQUEST['email'];
        
        // CONTRASEÑA
        echo "<br><strong>Contraseña:</strong> " .$_REQUEST['contraseña'];

        // FICHERO
        echo "<br><strong>Fichero:</strong> " .$_FILES['fichero']['name'];
    }
?>