<?php 
   if(isset($_REQUEST['editar'])){
        $usuario = new User ($_SESSION['usuario']->user, $_REQUEST['pass'], $_REQUEST['email'], $_REQUEST['fecha'], $_SESSION['usuario']->rol, 1);
        UserDAO::update($usuario);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['view'] = VIEW.'home.php';
        unset($_SESSION['controller']);
        header("Location: ./");
    }


if (isset ($_REQUEST['home'])){
    $_SESSION['view'] = VIEW.'home.php';
    unset($_SESSION['controller']);
    header("Location: ./");
}


    ?>