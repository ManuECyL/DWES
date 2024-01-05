<?php
    function cerrarSesion() {
        // session_start();
        session_destroy();

        header('Location: ./index.php');
        exit;
    }
?>