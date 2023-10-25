<!-- Subir un fichero al servidor -->
<?php
    // if (count($_FILES) != 0) {
    //     echo "<pre>";
    //     print_r($_FILES);
    //     echo "</pre>";

    //     $ruta = '/var/www/html/DWES/Tema3/Apuntes/Formularios/Fichero/';
    //     $ruta .= basename($_FILES['fichero']['name']);

    // Comprueba si el archivo se ha movido al directorio indicado
    //     if (move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta)) {
    //         echo "Archivo Subido";
        
    //     } else {
    //         echo "Error al subir el archivo";
    //     }

    // }
?>

<!-- Subir varios ficheros a la vez al servidor -->
<?php
    if (count($_FILES) != 0) {

        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";  

        foreach ($_FILES["fichero"]["tmp_name"] as $key => $tmp_name) {

            // Validar que el fichero existe
            if ($_FILES["fichero"]["name"][$key]) {
                $nombre = $_FILES["fichero"]["name"][$key]; //Obtenemos el nombre original del archivo
                $nombreTemp = $_FILES["fichero"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

                $ruta = '/var/www/html/DWES/Tema3/Apuntes/Formularios/Fichero/';
                $ruta .= $nombre;

                //Movemos y validamos que el archivo se haya cargado correctamente
			        //El primer campo es el origen y el segundo el destino
                if (move_uploaded_file($nombreTemp, $ruta)) {
                    echo "Archivo Subido <br>";
                
                } else {
                    echo "Error al subir el archivo <br>";
                }
            }
        }

        // if (move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta)) {
        //     echo "Archivo Subido";
        
        // } else {
        //     echo "Error al subir el archivo";
        // }

    }
?>