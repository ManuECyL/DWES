<?php
    $usuario = $_SESSION['usuario'];
?>

<form action="" method="post">
    
    <br>

    <label for="pass1"> Contraseña:
        <input type="password" name="pass1" id="pass1">
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'pass1');
            }   
        ?>
    </span>
 
    <br><br>

    <label for="pass2"> Repetir Contraseña:
        <input type="password" name="pass2" id="pass2">
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'pass2');
            }   
        ?>
    </span>
 
    <br><br>

<?php

    if (isset($errores)) {
        errores($errores, 'igual');
        errores($errores, 'update');
    }

?>

    <input type="submit" name="User_GuardarContraseña" value="Guardar contraseña">

</form>