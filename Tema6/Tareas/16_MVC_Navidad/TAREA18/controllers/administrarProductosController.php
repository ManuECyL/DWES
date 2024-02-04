<?php
if (!isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;

} else if(!UserDAO::isAdmin($_SESSION['usuario']->user)){
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;


}

else if(isset($_REQUEST['eliminar'])){
    ProductoDAO::delete($_REQUEST['codigo']);
    header("Location: ./");
    exit;

}
else if(isset($_REQUEST['modificarP'])){
    $_SESSION['idProducto'] = $_REQUEST['codigo']; //Guardo el id del Albaran en la sesion
    $_SESSION['controller'] = CON . 'modificarProductoController.php';
    $_SESSION['view'] = VIEW . 'modificarProducto.php';
    header("Location: ./");
    exit;
}

else if(isset($_REQUEST['addProducto'])){
    $_SESSION['controller'] = CON . 'addProductoController.php';
    $_SESSION['view'] = VIEW . 'addProducto.php';
    header("Location: ./");
    exit;
}
    $productos = ProductoDAO::findAll();