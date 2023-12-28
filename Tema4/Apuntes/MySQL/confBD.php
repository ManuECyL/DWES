<?
    // Si queremos que nadie acceda, debería ir fuera de la carpeta servidor;

    // Define una constante con su valor || //.gitignore -> confBD.php
    // define('IP', '192.168.7.207');  // Se podria usar el codigo de verCodigo, pero solo si el servidor y la BBDD se encuentran en el mismo sitio.
    define('IP', $_SERVER['SERVER_ADDR']);
    define('USER', 'maria');
    define('PASS', 'maria');

?>