<?

    function enviado() {
        if (isset($_REQUEST['enviar'])) {
            return true;
        }

        return false;
    }


    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
        return false;
    }


    function existe($nombre) {
        if (isset($_REQUEST[$nombre])) {
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

    function comprobarExpresionRegular($exp, $name) {

        if (preg_match($exp, $_REQUEST[$name])) 
            return true;
        
        return false;
    }


    function comboVacio($name) {

        if (isset($_REQUEST[$name]) && $_REQUEST[$name] != 0) {
            return false;
        }

        return true;
    }

    function recuerdaCombo($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
            echo 'selected';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }

    function generaCombo() {
        // Datos para generar los checkboxes
        $array = array(
            "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
            "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
            "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
        );

        echo "<select name='cursos'>";

        // Agrega la opción vacía y desactivada
        echo "<option value='0'>Selecciona una opción</option>";


        // Itera sobre las opciones y crea checkboxes dinámicamente
        foreach ($array as $cursos => $asignaturas) {
            echo "<option value='" . $cursos . "' " . recuerdaCombo('cursos', $cursos) . ">" . $cursos . "</option>";
        }

        echo "</select>";
    }
    

    function checkVacio($name) {

        if (!isset($_REQUEST[$name])) 
            return true;
    
        return false;
    }

    function rangoChecks($nombre) {
        $cont = 0;

        if (isset($_REQUEST[$nombre])) {
            
            $cont = count($_REQUEST[$nombre]); 

            if ($cont >= 1 && $cont <= 3) {
                return true;
            }
        }       
        return false;
    }


    function recuerdaCheck($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && in_array($value, $_REQUEST[$name])) {    
            echo 'checked';
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    } 

    function generaChecks() {
        // Datos para generar los checkboxes
        $asignaturas = array(
            "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
            "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
            "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
        );
  
        // Itera sobre las opciones y crea checkboxes dinámicamente
        foreach ($asignaturas as $cursos => $curso) {

            foreach ($curso as $asignatura) {
                echo '<input type="checkbox" id="' . $asignatura . '" name="asignaturas[]" value="' . $asignatura . '" '; recuerdaCheck('asignaturas', $asignatura) . '>';            
                echo ' <label for="' . $asignatura . '">' . $asignatura . '</label>';
            }
        }
    }



    function validaFormulario(&$errores){

    // Nombre
        if (textVacio('nombre')) {
            $errores['nombre'] = "Nombre Vacío";
        
        } elseif (!comprobarExpresionRegular('/^[A-Z]{1}[a-z]{2,}\s[A-Z]{1}[a-z]{2,}\s[A-Z]{1}[a-z]{2,}$/', 'nombre')) {
            $errores['nombre'] = "Los nombres y apellidos deben empezar con mayúscula y tener 2 letras o más";
        }


    // Expediente
        if (textVacio('expediente')) {
            $errores['expediente'] = "Expediente Vacío";

        } elseif (!comprobarExpresionRegular('/^[0-9]{2}[A-Z]{3}\/[0-9]{2}$/', 'expediente')) {
            $errores['expediente'] = "Debe tener 2 números, 3 letras, una '/' y 2 números";
        }     

    // Combo
        if (comboVacio('cursos')) {
            $errores['cursos'] = "Debe seleccionar una opción";
        }

    // Checks
        if (checkVacio('asignaturas')) {
            $errores['asignaturas'] = "Debe seleccionar al menos una opción y como máximo 3 <br>";
        
        } elseif (!rangoChecks('asignaturas')) {
            $errores['asignaturas'] = "Debe seleccionar al menos una opción y como máximo 3 <br>";
        }

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }

    function mostrarTodo() {
        // NOMBRE
        echo "<strong>Nombre:</strong> " .$_REQUEST['nombre'];

        // NUMÉRICO
        echo "<br><strong>Expediente:</strong> " .$_REQUEST['expediente'];
        
        // SELECT
        echo "<br><strong>La opcion seleccionada es:</strong> " .$_REQUEST['cursos'];    

        // CHECKBOX
        echo "<br><strong>Las asignaturas que ha elegido son:</strong> ";

        foreach ($_REQUEST["asignaturas"] as $clave => $asignatura) {
            echo "<br>- " . $asignatura;
        }
        
    }
?>