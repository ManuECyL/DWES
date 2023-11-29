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


    function generarRadios() {

        // Datos para generar los radios
        $generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];
    
        // Itera sobre las opciones y crea radioButton dinámicamente
        foreach ($generos as $genero) {
                echo '<input type="radio" id="' . $genero . '" name="genero" value="' . $genero . '" '; recuerdaRadio('genero', $genero) . '>';            
                echo ' <label for="' . $genero . '">&nbsp;' . $genero . '</label>';
                echo "<br>";
        }        
    }

    function recuerdaRadio($name, $value) {

        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
            echo 'checked';            
        
        } elseif (isset($_REQUEST['borrar'])) {
            echo '';
        }
    }

    function radioVacio($name) {

        if (!isset($_REQUEST[$name])) 
            return true;
    
        return false;
    }

    
    function validaFormulario(&$errores){

    // ID PELÍCULA 
        if (textVacio('idPelicula')) {
            $errores['idPelicula'] = "ID Vacío";
     
        } elseif (!comprobarExpresionRegular('/^\d{4}[a-zA-Z]{2}\-\d{3}$/', 'idPelicula')) {
            $errores['idPelicula'] = "Año, 2 letras, '-' y 3 dígitos";
        }

    // TÍTULO    
        if (textVacio('titulo')) {
            $errores['titulo'] = "Título Vacío";
        
        } elseif (is_numeric($_REQUEST['titulo'])) { 
            $errores['titulo'] = "El Título tiene que ser texto";
        } 

    // DIRECTOR
        if (textVacio('director')) {
            $errores['director'] = "Director Vacío";
        
        } elseif (is_numeric($_REQUEST['director'])) { 
            $errores['director'] = "El Director tiene que ser texto";
        }


    // AÑO LANZAMIENTO
        if (textVacio('añoLanzamiento')) {
            $errores['añoLanzamiento'] = "Debe seleccionar una fecha";

        } elseif (!is_numeric($_REQUEST['añoLanzamiento'])) { 
            $errores['añoLanzamiento'] = "El año de lanzamiento tiene que ser numérico";
 
        } elseif (!comprobarExpresionRegular('/^\d{4}$/', 'añoLanzamiento')) {
            $errores['añoLanzamiento'] = "Formato de fecha incorrecto: yyyy";
        }

    // GÉNERO  
        if (radioVacio('genero')) {
            $errores['genero'] = "Debe seleccionar un género";
        }

    // DURACIÓN
        if (textVacio('duracion')) {
            $errores['duracion'] = "Duración Vacía";

        } elseif (!comprobarExpresionRegular('/^\d{2}\:\d{2}\:\d{2}$/', 'duracion')) {
            $errores['duracion'] = "Formato de tiempo incorrecto";
        }

    // ACTORES PRINCIPALES
        if (textVacio('actoresPrin')) {
            $errores['actoresPrin'] = "Actores Vacío";

        } elseif (!comprobarExpresionRegular('/^[A-Za-z]+\,*/', 'actoresPrin')) {
            $errores['actoresPrin'] = "Los actores deben ir separados por comas";
        }

    // SINOPSIS
        if (textVacio('sinopsis')) {
            $errores['sinopsis'] = "Sinopsis Vacía";

        } elseif (strlen($_REQUEST['sinopsis']) < 50) {
            $errores['sinopsis'] = "La sinopsis debe tener mínimo 50 caracterees";
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



    function almacenarInformacion($archivo) {

        if (file_exists($archivo)) {

            // Carga el fichero XML
            $xml = simplexml_load_file($archivo);
                
            // Añade los elementos al fichero existente
            $pelicula = $xml->addChild('pelicula');
            $pelicula->addChild('idPelicula', $_REQUEST['idPelicula']);
            $pelicula->addChild('titulo', $_REQUEST['titulo']);
            $pelicula->addChild('director', $_REQUEST['director']);
            $pelicula->addChild('añoLanzamiento', $_REQUEST['añoLanzamiento']);
            $pelicula->addChild('genero', $_REQUEST['genero']);
            $pelicula->addChild('duracion', $_REQUEST['duracion']);
            $pelicula->addChild('actoresPrin', $_REQUEST['actoresPrin']);
            $pelicula->addChild('sinopsis', $_REQUEST['sinopsis']);
    
            $xml->asXML($archivo);

        } else {

            // Crear archivo XML con DOM
            $dom = new DOMDocument('1.0','utf-8');

            // Crea un nuevo objeto SimpleXMLElement para el XML
            $xml = new SimpleXMLElement('<peliculas></peliculas>');

            // Añade los elementos respectivamente
            $raiz = $dom->appendChild($dom->createElement('peliculas'));
    
            $pelicula = $raiz -> appendChild($dom->createElement('pelicula'));

            $pelicula = $xml->addChild('pelicula');
            $pelicula->addChild('idPelicula', $_REQUEST['idPelicula']);
            $pelicula->addChild('titulo', $_REQUEST['titulo']);
            $pelicula->addChild('director', $_REQUEST['director']);
            $pelicula->addChild('añoLanzamiento', $_REQUEST['añoLanzamiento']);
            $pelicula->addChild('genero', $_REQUEST['genero']);
            $pelicula->addChild('duracion', $_REQUEST['duracion']);
            $pelicula->addChild('actoresPrin', $_REQUEST['actoresPrin']);
            $pelicula->addChild('sinopsis', $_REQUEST['sinopsis']);
    
            $xml->asXML($archivo);           
        }
    }

    function subirFichero($archivo) {

        // $fichero = $_FILES[$archivo]['name'];

        $ruta = '/var/www/html/DWES/00_Examenes/1Ev/Ejercicio1/';

        $ruta .= basename($_FILES[$archivo]['name']);

    // Comprueba si el archivo se ha movido al directorio indicado
        if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $ruta)) {
            echo "Archivo subido con éxito";
                    
        } else {
            echo "Error al subir el archivo";
        }
    }
?>