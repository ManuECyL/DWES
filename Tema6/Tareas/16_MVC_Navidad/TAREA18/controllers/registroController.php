<?php

if (isset($_SESSION['usuario'])) {
    header("Location: ./?logout");
    exit;
}

$errores = array ();
if (registrar() && validaFormulario($errores)) {
    $usuario = new User($_REQUEST['user'], $_REQUEST['pass'], $_REQUEST['email'], $_REQUEST['fecha'], 'cliente', 1);
    UserDAO::insert($usuario);
    echo '<p> Usuario registrado correctamente... Inicie sesión </p>';
    
    $_SESSION['view'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON. 'loginController.php';
    ?>

    <script>
        setTimeout(function() {

        }, 3000); // 3000 milisegundos = 3 segundos
    </script>
    <?php
    header ('Location: ./');
}


?>