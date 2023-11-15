<?
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
?>