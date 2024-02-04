<?php
if (isset($_REQUEST['compra']) && !isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;
} elseif (isset($_REQUEST['compra']) && isset($_SESSION['usuario'])) {
   
    if (!ProductoDAO::comprobarStock($_SESSION['producto']->codigo, $_REQUEST['cantidad'])) {
        $_SESSION['controller'] = CON . 'productoController.php';
        $_SESSION['view'] = VIEW . 'sinStock.php';
        header("Location: ./");
        exit;
        //SI HAY STOCK
    } else {
       //Procesamos la compra
       $pedido = new Pedido(null, $_SESSION['producto']->codigo, $_REQUEST['cantidad'], date('Y-m-d'), $_SESSION['usuario']->user, round(($_SESSION['producto']->precio * $_REQUEST['cantidad']), 2), 1);
         if (PedidoDAO::compraProducto($pedido)) {

              $_SESSION['view'] = VIEW . 'pedidoProcesado.php';
              header("Location: ./");
              exit;
         } else {
              echo 'Error al procesar la Compra';
              exit;
         }

    }
} elseif (isset($_REQUEST['volver'])) {
    unset($_SESSION['controller']);
    unset($_SESSION['view']);
    header("Location: ./");
    exit;
}


?>