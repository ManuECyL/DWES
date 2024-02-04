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
    PedidoDAO::delete($_REQUEST['id']);
    header("Location: ./");
    exit;
} else if(UserDAO::isAdmin($_SESSION['usuario']->user) && isset($_REQUEST['modificar'])){
    $_SESSION['idPedido'] = $_REQUEST['id']; //Guardo el id del pedido en la sesion
    $_SESSION['controller'] = CON . 'modificarPedidoController.php';
    $_SESSION['view'] = VIEW . 'modificarPedido.php';
    header("Location: ./");
    exit;

} else if(UserDAO::isAdmin($_SESSION['usuario']->user) && isset($_REQUEST['factura'])){
    $_SESSION['id'] = $_REQUEST['id']; //Guardo el id del pedido en la sesion
    echo '<script>window.open("./factura.php", "_blank");</script>';
  
 

} else if(UserDAO::isModerador($_SESSION['usuario']->user) && isset($_REQUEST['factura'])){
    $_SESSION['id'] = $_REQUEST['id']; //Guardo el id del pedido en la sesion
    echo '<script>window.open("./factura.php", "_blank");</script>';
 
}

    $pedidos = PedidoDAO::findAll();
    
?>