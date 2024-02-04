<?php

  require_once("./config/config.php");

  session_start();

  if (!comprobarBD()) {
    crearScript();
  }
  
  $_SESSION['vista'] = VIEW . 'layout.php';
  
  if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
    $_SESSION['vista'] = VIEW . 'layout.php';
    $_SESSION['controller'] = CONTROLLER . 'LoginController.php';
    
  } elseif (existe('registrarse')) {
    $_SESSION['vista'] = VIEW . 'registro.php';
    $_SESSION['controller'] = CONTROLLER . 'RegistroController.php';
  }
  
  
  if (isset($_SESSION['controller'])) {
    require($_SESSION['controller']);
  }
  
  if (isset($sms)) {
    echo $sms;
  }

  require_once("./views/layout.php");

?>
