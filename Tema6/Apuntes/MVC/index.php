<?php

    require("./config/config.php");

    // Para hacer pruebas
    echo "findAll<pre>";
        UserDAO::findAll();
    echo "</pre>";

    echo "<br>";

    echo "findById<pre>";
        UserDAO::findById('2');
    echo "</pre>";

    echo "<br>";

    $usuario = new User('3', sha1('lucia'), 'lucia', '2024-01-11', 'usuario');
    echo "insert<pre>";
        UserDAO::insert($usuario);
    echo "</pre>";
?>