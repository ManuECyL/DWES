<?php
  
    function enviado() {

        if (isset($_REQUEST['leer']) || isset($_REQUEST['editar']) || isset($_REQUEST['volver']) || isset($_REQUEST['guardar'])) 
            return true;

        return false;
    }

    function textVacio($name) {

        if (empty($_REQUEST[$name])) 
            return true;
        
        return false;
    }

    function botonUsado($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }

    function existeFichero($archivo) {

        if (file_exists($archivo)) 
           return true;
        
        return false;
    }


    // function leer() {

    //     if (existeBoton('leer') && !existeFichero('fichero')) {
    //         $errores['leer'] = "El fichero no existe";
        
    //     } elseif (existeBoton('leer') && existeFichero('fichero')) {

    //         if (!$fp = fopen('fichero', 'r')) {
    //             $errores['leer'] = "Ha habido un problema al abrir el fichero";
                
    //         } else {
    //             $leido = fread($fp, filesize('fichero'));
    //             echo "<br>" . $leido;
    
    //             // Cerramos el fichero
    //             fclose($fp);
    //         }            
    //     } 
    // }

    
    // function escribir() {

    //     if (isset($_REQUEST['escribir']) && !existeFichero('fichero')) {

        
    //     } elseif (isset($_REQUEST['escribir']) && existeFichero('fichero')) {

    //         if (!$fp = fopen('fichero', 'w')) {
    //             $errores['escribir'] = "Ha habido un problema al abrir el fichero";
                
    //         } else {
    //             $leido = fread($fp, filesize('fichero'));
    //             echo "<br>" . $leido;
    
    //             // Cerramos el fichero
    //             fclose($fp);
    //         }            
    //     }
    // }



    // function subirFichero($archivo) {
            
    //     $imagen = $_FILES[$archivo]['name'];

    //     $ruta = '/var/www/html/DWES/Tema3/Tareas/09_Form_Exp_Reg/imagenes/';
    //     //chmod($ruta, 0777);
    //     $ruta .= basename($_FILES[$archivo]['name']);

    // // Comprueba si el archivo se ha movido al directorio indicado
    //     if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $ruta)) {
            
    //         // chmod($ruta, 0777);
    //         // echo "Archivo Subido";
        
    //     } else {
    //         echo "Error al subir el archivo";
    //     }
    // }
    
?>