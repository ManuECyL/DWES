<?php
    // El index es como otro controlador

    require("./config/config.php");

    // Entramos en la app por el index, por ello iniciamos la sesion aquí
    // session_start();

    // if (isset($_REQUEST['login'])) {  
    //     $_SESSION['vista'] = VIEW . 'login.php';
    //     $_SESSION['controller'] = CONTROLLER . 'LoginController.php';
    
    // } elseif (isset($_REQUEST['home'])) {
    //     $_SESSION['vista'] = VIEW . 'home.php';

    // } elseif (isset($_REQUEST['logout'])) {
    //     // Hasta que no se recarga la página, no expira
    //     session_destroy();
    //     // Si destruimos la sesión, debemos recargar la página
    //     header('Location: ./index.php');
    
    // } elseif (isset($_REQUEST['User_verPerfil'])) {
    //     // Llamará a la vista que muestra el usuario
    //     $_SESSION['vista'] = VIEW . 'verUsuario.php';
    //     $_SESSION['controller'] = CONTROLLER . 'UserController.php';
    // }


    // if (isset($_SESSION['controller'])) {
    //     require($_SESSION['controller']);
    // }

    // require("./views/layout.php");




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

    // echo "<pre>";

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

    // echo "-------------------------- Valida User -----------------------------------";
    // $usuario = UserDAO::validaUser('maria', 'maria');
    // print_r($usuario);



    // print_r(CitaDAO::findAll());

    // // print_r(CitaDAO::findById(2));

    // echo "<br><br>";

    // $cita = new Cita(5, 'dermatologo', 'Esta creciendo un lunar', '2024-06-03', true, '3');
    // CitaDAO::insert($cita);

    // print_r(CitaDAO::findAll());


    // $cita = CitaDAO::findById(1);

    // echo "<pre>";

        // print_r($cita);

    // echo "</pre>";

    
    // $cita -> fecha = '2026-01-02';
    
    // CitaDAO::update($cita);
    
    // $cita = CitaDAO::findById(1);

    
    // echo "<pre>";

        // print_r($cita);

    // echo "</pre>";

       
    echo "<pre>";
        $usuario = UserDAO::findById(1);
        print_r(CitaDAO::findByPaciente($usuario));
    echo "</pre>";

    echo "<pre>";
        $usuario = UserDAO::findById(2);
        print_r(CitaDAO::findByPacienteH($usuario));
    echo "</pre>";

?>