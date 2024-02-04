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


}

$errores = array ();
if (isset($_REQUEST['addAlb']) && validaAlbaran($errores)) {
    $albaran = new Albaran(null, $_REQUEST['productocod'], $_REQUEST['cantidad'], $_REQUEST['fecha'], $_SESSION['usuario']->user, 1);
    AlbaranDAO::insert($albaran);
    echo '<p> Albaran registrado correctamente... </p>';
    echo '<a href="./">Volver</a>';
    $_SESSION['controller'] = CON . 'administrarAlbaranesController.php';
    $_SESSION['view'] = VIEW . 'administrarAlbaranes.php';
    exit;
}

if(isset($_REQUEST['volverAlbaranes'])){
    $_SESSION['controller'] = CON . 'administrarAlbaranesController.php';
    $_SESSION['view'] = VIEW . 'administrarAlbaranes.php';
    header("Location: ./");
    exit;
}

?>
