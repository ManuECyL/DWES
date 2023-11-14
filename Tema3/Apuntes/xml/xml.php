<?php
    // phpinfo();

/*
// Leer un fichero xml, sabiendo el nombre de las etiquetas que tenemos que recorrer
    if (file_exists('ficheroXML.xml')) {
        $xml = simplexml_load_file('ficheroXML.xml');
        
        echo "<pre>";
           // print_r($xml);
        
        // Acceder a una información específica
        foreach ($xml as $elemento) {
            //print_r($elemento); // $elemento tiene el primer elemento del XML -> coche

            echo "\nEl coche " . $elemento['id'];
            echo "\nLa marca es: " . $elemento->marca; // Con '->' accedemos a la propiedad indicada del elemento.
            echo " y el modelo es: " . $elemento->modelo;
        }

        echo "</pre>";

    } else {
        exit('Error abriendo ficheroXML.xml.');
    }


// Podemos no saber el nombre de las etiquetas
    if (file_exists('ficheroXML.xml')) {
        $xml = simplexml_load_file('ficheroXML.xml');
        
        echo "<pre>";
        
        
        foreach ($xml as $elemento) {
            leerElemento($elemento);
        }

        echo "</pre>";

    } else {
        exit('Error abriendo ficheroXML.xml.');
    }

    // Leer sin saber el nombre de la etiqueta
    function leerElemento($elemento) {
        
        foreach ($elemento->children() as $a) {
            echo $a . " ";
        }
    
        // echo $elemento->children()[0] . " "; // Muestra la Marca
        // echo $elemento->children()[1]. " "; // Muestra el Modelo
    }
*/

// Para escribir en un fichero XML SimpleXML
    $xml = new SimpleXMLElement('<juegos></juegos>');
    print_r($xml);

    // Añade un hijo asignandole el puntero 'juego1' para poder acceder a él
    $juego1 = $xml->addChild('juego');
    $juego1->addAttribute('id','1');
    $juego1->addAttribute('disponible','si');
    $juego1->addChild('nombre', 'FIFA');

    // Añadir al hijo 'juego' otros hijos
    $dispositivos = $juego1->addChild('dispositivos');
    $dispositivos->addChild('dispositivo','XBOX');
    $dispositivos->addChild('dispositivo','PlayStation');


    $juego2 = $xml->addChild('juego');
    $juego2->addAttribute('id','2');
    $juego2->addAttribute('disponible','no');
    $juego2->addChild('nombre', 'GTA');

    $dispositivos = $juego2->addChild('dispositivos');
    $dispositivos->addChild('dispositivo','XBOX');

    // Se sobreescribe en el fichero y se añade un juego nuevo, aunque tenga el mismo nombre de variable
    $juego2 = $xml->addChild('juego');
    $juego2->addAttribute('id','3');
    $juego2->addAttribute('disponible','si');
    $juego2->addChild('nombre', 'TETRIS');

    $dispositivos = $juego2->addChild('dispositivos');
    $dispositivos->addChild('dispositivo','PC');
    $dispositivos->addChild('dispositivo','XBOX');
    $dispositivos->addChild('dispositivo','PlayStation');

    // Guarda el xml en un fichero y si existe lo sobreescribe
    $xml->asXML('juegos.xml'); 




    // Cambiar datos del fichero XML a través del atributo 'id' y los guarda
    function cambioDisponible($id) {

        if (file_exists('juegos.xml')) {
            $xml = simplexml_load_file('juegos.xml');
                    
            foreach ($xml as $juego) {
                
                // Comprueba si el id del juego coincide con el id pasado como argumento
                if ($juego[0]['id'] == $id ) {

                    if ($juego[0]['disponible'] == 'si') {
                        $juego[0]['disponible'] == 'no'; // Cambia el valor del atributo 'disponible' de 'si' a 'no'
                    
                    } else {
                        $juego[0]['disponible'] == 'no';
                        break;
                    }
                }
            }

            $xml->asXML('juegos.xml'); // Se guardan el fichero

        } else {
            exit('Error abriendo ficheroXML.xml.');
        }
    }
?>