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

if (isset($_REQUEST['modificaPedido']) && validaPedido2($errores)) {
    $pedido = new Pedido($_SESSION['idPedido'], $_REQUEST['productom'], $_REQUEST['cantidad'], $_REQUEST['fecha'], $_REQUEST['usuario'], $_REQUEST['total'], 1);
    PedidoDAO::update($pedido);
    echo '<p> Pedido modificado correctamente...</p>';
    echo '<a href="./?volver">Volver</a>';
    exit;

}
if (isset ($_REQUEST['volver'])){
    $_SESSION['controller'] = CON. 'administrarPedidosController.php';
    $_SESSION['view'] = VIEW.'administrarPedidos.php';
   
    header("Location: ./");
}

    $pedido = PedidoDAO::findByCodigo($_SESSION['idPedido']);
?>