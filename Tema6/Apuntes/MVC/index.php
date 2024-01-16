<?php

    require("./config/config.php");

    // // Para hacer pruebas
    // echo "findAll<pre>";
    //     UserDAO::findAll();
    // echo "</pre>";

    // echo "<br>";

    // echo "findById<pre>";
    //     UserDAO::findById('2');
    // echo "</pre>";

    // echo "<br>";

    // $usuario = new User('3', sha1('lucia'), 'lucia', '2024-01-11', 'usuario');
    // UserDAO::insert($usuario);

    // UserDAO::update($usuario);

    echo "<pre>";

    // echo "-------------------------- Find All -----------------------------------";
    // UserDAO::findAll();

    // echo "<br>";

    // echo "-------------------------- Find By -----------------------------------";
    // $usuario = UserDAO::findById('3');
    
    // echo "<br>";

    // echo "-------------------------- Update -----------------------------------";
    // $usuario -> descUsuario = 'Lucia';
    // UserDAO::update($usuario);
    // UserDAO::findAll();

    // echo "<br>";

    // echo "-------------------------- Insert -----------------------------------";
    // $user2 = new User('4', 'Luis', 'Luis', '2024-01-16');
    // UserDAO::insert($user2);
    // UserDAO::findAll();

    // echo "<br>";

    // echo "-------------------------- Delete -----------------------------------";
    // // UserDAO::delete($user2);
    // UserDAO::findAll();

    // echo "<br>";

    // echo "-------------------------- Buscar por Nombre -----------------------------------";
    // UserDAO::buscarPorNombre('lu');

    // echo "<br>";

    // echo "-------------------------- Activar Usuario -----------------------------------";
    // $usuario = UserDAO::findById('1');
    // UserDAO::activar($usuario); // Primero hay que darlo de baja

    // echo "<br>";

    echo "-------------------------- Valida User -----------------------------------";
    $usuario = UserDAO::validaUser('maria', 'maria');
    print_r($usuario);


?>