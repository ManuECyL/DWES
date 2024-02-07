<?php

require('./config/config.php');
session_start();

if (isset($_REQUEST['logout'])) {
    session_destroy();
    header('Location: ./index.php');

} 

// SI EXISTE UN CONTROLADOR LO REQUIERE
if (!isset($_SESSION['controller'])) {
    $_SESSION['controller'] = CON . 'LoginController.php';
}
require($_SESSION['controller']);
require('./views/layout.php');
