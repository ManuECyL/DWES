<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<form action="" method="post">
    
    <br>

    <label for="nombre"> Nombre:
        <input type="text" name="nombre" id="nombre">
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'nombre');
            }   
        ?>
    </span>

    <br><br>

    <label for="pass"> Contraseña: 
        <input type="password" name="pass" id="pass">
    </label>
    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'pass');
            }            
        ?>
    </span>

    <br><br>

    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'validado');
                echo "<br>";
            }            
        ?>

    </span>

    <input type="submit" name="Login_IniciarSesion" value="Iniciar Sesion">
    <input type="submit" name="Login_Registro" value="Registrarme">

</form>