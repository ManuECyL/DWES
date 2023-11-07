<?php

// Primero ver si existe
    // Abrimos y lo leemos
/*    echo "<h1>Escribir fichero</h1>";

    if (file_exists('fichero.txt')) {
        echo "Existe";

        // Si existe, lo intentas abrir
        if (!$fp = fopen('fichero.txt', 'r')) {
            echo "Ha habido un problema al abrir el fichero";
            
        } else {
            $leido = fread($fp, filesize("fichero.txt"));
            echo "<br>" . $leido;

            // Cerramos el fichero
            fclose($fp);
        }
        
    } else {
        echo "No existe";
    }


    // Escribir el anterior sin sobreescribir y al final con .a
    echo "<h1>Escribir el anterior sin sobreescribir y al final con .a</h1>";

    if (file_exists('fichero.txt')) {
        echo "Existe";

        // Si existe, lo intentas abrir
        if (!$fp = fopen('fichero.txt', 'a')) {
            echo "Ha habido un problema al abrir el fichero";
                    
        } else {
            $texto = "Escribiendo...";

            if (!fwrite($fp, $texto, strlen($texto))) {
                echo "<br> Error al escribir";

                // Cerramos el fichero
                fclose($fp);
            }            
        }

    } else {
        echo "No existe";
    }


    // Escribir en el medio entre comas
    echo "<h1>Escribir en el medio entre comas</h1>";

    if (file_exists('fichero.txt')) {
        echo "Existe";

        // Si existe, lo intentas abrir
        if (!$fp = fopen('fichero.txt', 'c')) {
            echo "Ha habido un problema al abrir el fichero";
                    
        } else {
            $texto = "medio";
            fseek($fp, 28);

            if (!fwrite($fp, $texto, strlen($texto))) {
                echo "<br> Error al escribir";

                // Cerramos el fichero
                fclose($fp);
            }            
        }

    } else {
        echo "No existe";
    }


    // Leer fichero por lineas
    echo "<h1>Leer fichero por lineas</h1>";

    if (file_exists('ficheroLineas.txt')) {
        echo "Existe <br>";

        // Si existe, lo intentas abrir
        if (!$fp = fopen('ficheroLineas.txt', 'r')) {
            echo "Ha habido un problema al abrir el fichero";
                    
        } else {
            while ($leido = fgets($fp, filesize('ficheroLineas.txt'))) {
                echo "<br>" . $leido;
            }
            
            fclose($fp);           
        }

    } else {
        echo "No existe";
    }


    // Escribir fichero por lineas al final
    echo "<h1>Escribir fichero por lineas al final</h1>";

    if (file_exists('ficheroLineas.txt')) {
        echo "Existe <br>";

        // Si existe, lo intentas abrir
        if (!$fp = fopen('ficheroLineas.txt', 'a')) {
            echo "Ha habido un problema al abrir el fichero";
                    
        } else {
            $texto = "\nMi nueva linea";
            
            if (!fputs($fp, $texto, strlen($texto))) {
                echo "Error al escribir";
                fclose($fp);
            }                       
        }

    } else {
        echo "No existe";
    }
*/

// Prueba introducir texto entre lineas
    // $texto = "Nueva entre lineas";

    // while ($leido = fgets($fp, filesize('ficheroLineas.txt'))) {
        
    //     $linea = ftell($fp);
    //     echo "<br>" . $linea;
                    
    //     if (!fputs($fp, $texto, strlen($texto)) && $linea == 60) {
    //         echo "Error al escribir";
    //     }                
        
    //     fclose($fp);
    // }



    // Cuando queremos modificar un fichero secuencial
        // Crear un archivo temporal para leer y modificar
        // Borrar el anterior y renombrar el temporal con el nombre del anterior

    echo "<h1>Crear fichero temporal para modificar contenido de fichero secuencial</h1>";        
    $tmp = tempnam('.', 'tem.txt');

    if (file_exists('ficheroLineas.txt')) {
        echo "Existe <br>";

        // Si existe, lo intentas abrir
        if ((!$fp = fopen('ficheroLineas.txt', 'r')) || (!$ft = fopen($tmp, 'w'))) {
            echo "Ha habido un problema al abrir el fichero";
                    
        } else {
            $texto = "Linea nueva \n";
            $contador = 1;

            while ($leido = fgets($fp, filesize('ficheroLineas.txt'))) {
                fputs($ft, $leido, strlen($leido));

                if ($contador == 1) {
                    fputs($ft, $texto, strlen($texto));
                    $contador ++;
                }
            }   
            
            fclose($fp);
            fclose($ft);
            unlink("ficheroLineas.txt");
            rename($tmp, "ficheroLineas.txt");
            chmod("ficheroLineas.txt", 0777);
        }

    } else {
        echo "No existe";
    }
?>