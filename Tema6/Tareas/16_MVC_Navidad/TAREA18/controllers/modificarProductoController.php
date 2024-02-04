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


if (isset($_REQUEST['registroProducto']) && validaProducto($errores)) {
    $producto = new Producto($_REQUEST['codigo'], $_REQUEST['titulo'], $_REQUEST['descripcion'], $_REQUEST['precio'], $_REQUEST['stock'], $_REQUEST['imagen'],1);
    ProductoDAO::update($producto);
    echo '<p> Producto modificado correctamente...  </p>';
    echo '<a href="./?volver">Volver</a>';
    exit;
    
}
if (isset ($_REQUEST['volverProductos'])){
    $_SESSION['controller'] = CON. 'administrarProductosController.php';
    $_SESSION['view'] = VIEW.'administrarProductos.php';
   
    header("Location: ./");
}

    $producto = ProductoDAO::findByCodigo($_SESSION['idProducto']);
    
?>