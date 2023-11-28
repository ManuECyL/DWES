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
   

    function errores($errores, $name) {

        if (isset($errores[$name])) 
            echo $errores[$name];
    }


    function validaFormulario(&$errores){

    // BUSCADOR PELÍCULA 
        if (textVacio('buscarText')) {
            $errores['buscarText'] = "<br><br>Debe introducir algún dato";
     
        } 

        if (count($errores) == 0) {
            return true;
        }

        return false;
    }


    function buscarPelicula($dato) {

        if ($dato == $titulo || $dato == $actor) {
            
        }

    }


    function leerFichero($archivo) {

        // Crear archivo XML con DOM
        $dom = new DOMDocument('1.0','utf-8');
        
        // Leer un archivo XML
        $dom -> load($archivo);

        // Bucle para ver los peliculas. Hijos del dom.
        foreach ($dom->childNodes as $peliculas) {
        
            // Bucle para ver cada instrumento. Hijos de peliculas
            foreach ($peliculas->childNodes as $pelicula) {

                // Evitar el fallo al formatear el archivo XML
                if ($pelicula->nodeType == 1) {

                    // Muestra el id del pelicula
                    echo "\n" . $pelicula->getAttribute('id');

                    $nodo = $pelicula->firstChild;

                    // Recorre el bucle siempre que haya hermanos 
                    do {
                        
                        // Si el nodo es de tipo texto entra y muestra la etiqueta y el valor
                        if ($nodo->nodeType == 1) {
                            // echo "\n" . $nodo->tagName . ": " . $nodo->nodeValue;
                            mostrarResultado();
                        }

                    } while ($nodo = $nodo->nextSibling);
                }
            }
        }
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