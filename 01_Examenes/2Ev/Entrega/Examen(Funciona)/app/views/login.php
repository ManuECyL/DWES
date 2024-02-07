<?php
if (isset($sms)) {
    echo $sms;
} ?>

<form action="" method="post">
    <label for="nombre">Nombre:
        <input type="text" name="nombre" id="nombre" value="<?php if (isset($_COOKIE['usuario'])){ echo $_COOKIE['usuario'];}?>">
    </label>
    <p style="color: red;">
        <?php
        if (isset($errores)) {
            errores($errores, "nombre");
        }
        ?>
    </p>
    <br>
    <label for="pass">Contraseña:
        <input type="password" name="pass" id="pass">
    </label>
    <p style="color: red;">
        <?php
        if (isset($errores)) {
            errores($errores, "pass");
        }
        ?>
    </p>
    <p style="color: red;">
        <?php
        if (isset($errores)) {
            errores($errores, "validado");
        }
        ?>
    </p>
    <br>
    <input type="checkbox" name="Login_RecordarUser" id="Login_RecordarUser">
    <label for="Login_RecordarUser">Recordar Usuario</label>
    <br>
    <br>
    <input type="submit" name="Login_IniciarSesion" value="Inicia Sesion">
</form>