<?php

if (!isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;

}else if(!UserDAO::isAdmin($_SESSION['usuario']->user)){
    session_destroy();
    header("Location: ./");
    exit;

}
$errores = array ();
if (isset($_REQUEST['registroAlbaran']) && validaAlbaran($errores)) {
    $albaran = new Albaran($_SESSION['idAlbaran'], $_REQUEST['productocod'], $_REQUEST['cantidad'], $_REQUEST['fecha'], $_SESSION['usuario']->user, 1);
    AlbaranDAO::update($albaran);
    echo '<p> Albaran modificado correctamente... Redirigiendo a Albaranes </p>';
    echo '<a href="./?volver">Volver</a>';
    exit;
   

if (isset ($_REQUEST['volveralbaranes'])){
    $_SESSION['controller'] = CON. 'administrarAlbaranesController.php';
    $_SESSION['view'] = VIEW.'administrarAlbaranes.php';
   
    header("Location: ./");
}

}
   $albaran = AlbaranDAO::findById($_SESSION['idAlbaran']);
