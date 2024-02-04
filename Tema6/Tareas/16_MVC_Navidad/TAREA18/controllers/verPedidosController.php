<?php
if (!isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;
   

}else if(isset($_SESSION['usuario']) && isset($_REQUEST['factura'])){
    // $_SESSION['controller'] = CON . 'facturaController.php';
    $_SESSION['id'] = $_REQUEST['id']; //Guardo el id del pedido en la sesion para poder usarlo en la factura
    
    echo '<script>window.open("./factura.php", "_blank");</script>';


    
} 

    $pedidos = PedidoDAO::findByUser($_SESSION['usuario']->user);
    ?>