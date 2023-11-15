<?
// LEER

   // Crear archivo XML con DOM
   $dom = new DOMDocument('1.0','utf-8');

    // Leer un archivo XML
    $dom->load('instrumentos.xml');

    echo "<pre>";
    // print_r($dom);

    // Bucle para ver los instrumentos. Hijos del dom.
    foreach ($dom->childNodes as $instrumentos) {
        
        // Bucle para ver cada instrumento. Hijos de instrumentos
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