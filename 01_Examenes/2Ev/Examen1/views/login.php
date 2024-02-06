<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<form action="./index.php" method="post">
    
    <label for="username"> Nombre:
        <input type="text" name="username" id="username">
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'username');
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

    <label for="recuerdame">Recuerdame</label>
    <input type="checkbox" name="recuerdame" id="recuerdame">

    <br><br>

    <input type="submit" name="Login_IniciarSesion" value="Iniciar Sesion">

</form>
