<?php

if (!isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;

} else if(!UserDAO::isAdmin($_SESSION['usuario']->user) && !UserDAO::isModerador($_SESSION['usuario']->user)){
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;


}else if(UserDAO::isAdmin($_SESSION['usuario']->user) && isset($_REQUEST['eliminar'])){
    AlbaranDAO::delete($_REQUEST['id']);
    header("Location: ./");
    exit;

}else if(UserDAO::isAdmin($_SESSION['usuario']->user) && isset($_REQUEST['modificar'])){
    $_SESSION['idAlbaran'] = $_REQUEST['id']; //Guardo el id del Albaran en la sesion
    $_SESSION['controller'] = CON . 'modificarAlbaranController.php';
    $_SESSION['view'] = VIEW . 'modificarAlbaran.php';
    header("Location: ./");
    exit;
}

else if(isset($_REQUEST['addAlbaran'])){
    $_SESSION['controller'] = CON . 'addAlbaranController.php';
    $_SESSION['view'] = VIEW . 'addAlbaran.php';
    header("Location: ./");
    exit;
}
    $albaranes = AlbaranDAO::findByAll();