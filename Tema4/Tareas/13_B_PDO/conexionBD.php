<?php
    define('IP', $_SERVER['SERVER_ADDR']);  // Solo si el servidor y la BBDD se encuentran en el mismo sitio.
    define('USER', 'maria');
    define('PASS', 'maria');
    define('DB', 'tienda');
    define('DSN','pgsql:host='.IP.';dbname=tienda');
?>