<?php
   
    function enviado() {

        if (isset($_REQUEST['buscar'])) 
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

    // BUSCADOR PELÍCULA 
        if (textVacio('buscarText')) {
            $errores['buscarText'] = "Debe introducir algún dato";
     
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function mostrarResultado() {
        // ID PELÍCULA
        echo "<b>El idPelícula es:</b> " . $_REQUEST['idPelicula'];
        
        // TÍTULO
        echo "<br><b>El título es:</b> " . $_REQUEST['titulo'];

        // DIRECTOR
        echo "<br><b>El director es:</b> " . $_REQUEST['director'];

        // AÑO LANZAMIENTO
        echo "<br><b>El año de lanzamiento es:</b> " . $_REQUEST['añoLanzamiento'];

        // GÉNERO
        echo "<br><b>El género es:</b> " . $_REQUEST['genero'];
                
        // DURACIÓN
        echo "<br><b>La duración es:</b> " . $_REQUEST['duracion'];

        // ACTORES PRINCIPALES
        echo "<br><b>Los actores principales son:</b> " . $_REQUEST['actoresPrin'];

        // SINOPSIS
        echo "<br><b>Sinopsis:</b> " . $_REQUEST['sinopsis'];
    }
?>