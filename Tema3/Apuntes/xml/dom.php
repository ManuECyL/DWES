<?php

// CREAR

    // Crear archivo XML con DOM
    $dom = new DOMDocument('1.0','utf-8');

    // Con appendChild añade el hijo al final.
    $raiz = $dom->appendChild($dom->createElement('instrumentos'));

    // Creamos un elemento de tipo instrumento
    $instrumento = $dom->createElement('instrumento');

    // Se añaden al DOM la etiqueta elemento nombre y etiqueta elemento familia.
    $nombre = $dom->createElement('nombre','guitarra');
    $familia = $dom->createElement('familia','cuerda');

    // Se añade el instrumento a la raíz, y el nombre y la familia al instrumento.
    $raiz->appendChild($instrumento);
    $instrumento->appendChild($nombre);
    $instrumento->appendChild($familia);

    // Añadir atributos al instrumento. En este caso un id con valor 1.
    $instrumento->setAttribute('id', 1);


    // Forma más simplificada para añadir otro elemento con sus hijos nombre y familia. 
    $instrumento = $raiz->appendChild($dom->createElement('instrumento'));
    $instrumento->appendChild($dom->createElement('nombre','violin'));
    $instrumento->appendChild($dom->createElement('familia','cuerda'));


    // Formatear el fichero xml
    $dom->formatOutput = true;

    // Guardar archivo
    $dom->save('instrumentos.xml');


//----------------------------------------------------------------------------------------------

// LEER

    // Leer un archivo XML
    $dom->load('instrumentos.xml');

    echo "<pre>";
    // print_r($dom);

    // Bucle para ver los instrumentos. Hijos del dom.
    foreach ($dom->childNodes as $instrumentos) {
        
        // Bucle para ver cada instrumento sin saber sus nombres. Hijos de instrumentos
        foreach ($instrumentos->childNodes as $instrumento) {

            // Evitar el fallo al formatear el archivo XML
            if ($instrumento->nodeType == 1) {

                // Muestra el id del instrumento
                echo "\n" . $instrumento->getAttribute('id');

                $nodo = $instrumento->firstChild;

                // Recorre el bucle siempre que haya hermanos -> nombre, familia
                do {
                    
                    // Si el nodo es de tipo texto entra y muestra la etiqueta y el valor
                    if ($nodo->nodeType == 1) {
                        echo "\n" . $nodo->tagName . ": " . $nodo->nodeValue;
                    }

                } while ($nodo = $nodo->nextSibling);

            // Dos formas que realizan lo mismo.
                // DOMElement
                // echo "\nNombre: " . $instrumento->firstChild->nodeValue;
                // // DOMText
                // echo "\nNombre: " . $instrumento->firstChild->firstChild->data;
            }
        }
    }

    echo "\n";

    // Obtener los elementos instrumento
    $instrumentoLista = $dom->getElementsByTagName('instrumento');

    // Bucle para recorrer cada instrumento con sus hijos y poder tratarlos
    foreach ($instrumentoLista as $value) {
        // print_r($value);
        $a = $value->getElementsByTagName('nombre');
        echo "\n" . $a->item(0)->tagName . ": ". $a->item(0)->nodeValue;

        $a = $value->getElementsByTagName('familia');
        echo "\n" . $a->item(0)->tagName . ": ". $a->item(0)->nodeValue;
    }

?>

    <!-- Descargar -->
    <a href="descarga.php">Descargar</a>

    <!-- Descarga automáticamente -->
    <!-- header('Location: ./descarga.php?fichero='. $_REQUEST['fichero']);
    exit; -->
