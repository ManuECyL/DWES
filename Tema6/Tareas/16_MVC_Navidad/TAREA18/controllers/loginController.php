<?php

if (isset($_SESSION['usuario'])) {
    header("Location: ./?logout");
    exit;
}


if (isset($_REQUEST['Entrar']) && !textoVacio('user') && !textoVacio('pass')) {
    $usuario = UserDAO::validaUsuario($_REQUEST['user'], $_REQUEST['pass']);
    // Si entramoa, nos lleva a la página principal
    if ($usuario) {
        //Si el usuario ha marcado la casilla de recordar usuario, creamos la cookie
        if (isset($_REQUEST['recuerda'])) {
            insertarCookie($_REQUEST['user']);
        }
        // Indicamos en la superglobal $_SESSION el usuario con el que estamos
        $_SESSION['usuario'] = $usuario;
        $_SESSION['view'] = VIEW . 'home.php';
        unset($_SESSION['controller']);
        header("Location: ./");
        exit;
    } else {


        echo "<p class='errorlogin'>No existe el usuario o Contraseña.</p>";
        ?>
        <script>
        setTimeout(function() {

        }, 3000); // 3000 milisegundos = 3 segundos
    </script>
    <?php
    header ('Location: ./');
    exit;



    }
}
if (isset($_REQUEST['registro'])) {
    $_SESSION['view'] = VIEW . 'registro.php';
    $_SESSION['controller'] = CON. 'registroController.php';
    header ('Location: ./');
    exit;
}



if (isset ($_REQUEST['home'])){
    $_SESSION['view'] = VIEW.'home.php';
    unset($_SESSION['controller']);
    header("Location: ./");
}

?>