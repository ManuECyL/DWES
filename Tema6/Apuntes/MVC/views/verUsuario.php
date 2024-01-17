<?php

    if (isset($sms)) {
        echo $sms;
    }

    // Para ver el Perfil, necesitamos que anteriormente el controlador haya buscado un usuario

    // Mostramos los datos
?>
    <p>CodUsuario:<? echo $_SESSION['usuario'] -> codUsuario; ?></p>
    <p>descUsuario:<? echo $_SESSION['usuario'] -> descUsuario; ?></p>
    <p>fechaUltimaConexion:<? echo $_SESSION['usuario'] -> fechaUltimaConexion; ?></p>
    <p>perfil:<? echo $_SESSION['usuario'] -> perfil; ?></p>

    <form action="" method="post">
        <input type="submit" value="Editar" name="User_editar">
    </form>

<?php

?>