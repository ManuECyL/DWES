<?
    // Descargar Fichero XML
    header('Content-Type: txt/xml');
    header("Content-Disposition: attachment; filename=instrumentos.xml");
    readfile("./instrumentos.xml");
    exit;
?>