<?php
    if (count($_FILES) != 0) {
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";

        $ruta = '/var/www/html/DWES/Tema3/Apuntes/Formularios/Fichero/';
        $ruta .= basename($_FILES['fichero']['name']);

        $temp_name = $_FILES["pictures"]["tmp_name"][$key];
    }
?>