<?php
    // Recojo por la URL el fichero que quiero mostrar
    $fichero = $_GET["fichero"];

    highlight_file($fichero);
?>