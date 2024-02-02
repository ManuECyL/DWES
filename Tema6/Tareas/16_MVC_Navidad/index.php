<?php

  // require_once('./config/conexionBD.php');
  require("./config/config.php");
  // require_once('./core/funciones.php');

  session_start();

  require("./views/layout.php");

  if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
    $_SESSION['vista'] = VIEW . 'layout.php';
    $_SESSION['controller'] = CONTROLLER . 'LoginController.php';
  
  } elseif (existe('registrarse')) {
    $_SESSION['vista'] = VIEW . 'registro.php';
    $_SESSION['controller'] = CONTROLLER . 'RegistroController.php';
  }

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

  // } elseif (isset($_REQUEST['User_verCitas'])) {
  //     // Llamará a la vista que muestra el usuario
  //     $_SESSION['vista'] = VIEW . 'verCitas.php';
  //     $_SESSION['controller'] = CONTROLLER . 'CitasController.php';

  // }  elseif (isset($_REQUEST['Cita_VerCitasTodas'])) {
  //     // Llamará a la vista que muestra el usuario
  //     $_SESSION['vista'] = VIEW . 'verCitas.php';
  //     $_SESSION['controller'] = CONTROLLER . 'CitasController.php';
  // }


  if (isset($_SESSION['controller'])) {
      require($_SESSION['controller']);
  }

  // require("./views/layout.php");

?>
