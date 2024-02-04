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
if (isset($_REQUEST['addPro']) && validaSubirProducto($errores)) {

    // GUARDAMOS LA IMAGEN
    $dir_subida = './webroot/img/productos/';
    $fichero_subido = $dir_subida . str_replace(' ', '_', basename($_FILES['imagen']['name']));
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.\n";
    } else {
        echo "Error subiendo archivo";
    }
    $producto = new Producto(null, $_REQUEST['titulo'], $_REQUEST['descripcion'], $_REQUEST['precio'], $_REQUEST['stock'], './webroot/img/productos/'.str_replace(' ', '_', basename($_FILES['imagen']['name'])), 1);
    ProductoDAO::insert($producto);
    echo '<p> Producto añadido correctamente...</p>';
    echo '<a href="./">Volver</a>';
    $_SESSION['controller'] = CON . 'administrarProductosController.php';
    $_SESSION['view'] = VIEW . 'administrarProductos.php';
    exit;
}

if(isset($_REQUEST['volverPro'])){
    $_SESSION['controller'] = CON . 'administrarProductosController.php';
    $_SESSION['view'] = VIEW . 'administrarProductos.php';
    header("Location: ./");
    exit;
}
?>