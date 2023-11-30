<?php
   
    function enviado() {

        if (isset($_REQUEST['buscar'])) 
            return true;
        
        return false;
    }

    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

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


    function buscarPelicula($archivo, $busqueda) {

        // Crear archivo XML con DOM
        $dom = new DOMDocument('1.0','utf-8');
        
        // Leer un archivo XML
        $dom -> load('../Ejercicio1/'.$archivo);

        // Obtener los elementos pelicula
        $peliculaLista = $dom->getElementsByTagName('pelicula');

        // Bucle para recorrer cada pelicula y obtener el titulo y los actores
        foreach ($peliculaLista as $pelicula) {
            
            $tagTitulo = $pelicula->getElementsByTagName('titulo');
            $titulo = $tagTitulo->item(0)->nodeValue;

            $tagActores = $pelicula->getElementsByTagName('actoresPrin');
            $actores = $tagActores->item(0)->nodeValue;

            // Si el titulo o los actores coinciden con la búsqueda muestra los datos de la película
            if (str_contains($titulo, $busqueda) || str_contains($actores, $busqueda)) {

                $nodo = $pelicula->firstChild;

                do {
                    
                    // Si el nodo es de tipo texto entra y muestra la etiqueta y el valor
                    if ($nodo->nodeType == 1) {
                        echo "\n<b>" . $nodo->tagName . ":</b> " . $nodo->nodeValue;
                        echo "<br>";
                    }

                } while ($nodo = $nodo->nextSibling);
            }                 
        }

        echo "La película no se encuentra en nuestra base de datos";        
    }
?>