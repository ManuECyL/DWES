<h1>Registro</h1>

<form action="" method="post">
    
    <br>

    <label for="cod"> CodUsuario: 
        <input type="text" name="cod" id="cod">
    </label>
    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'cod');
            }            
        ?>
    </span>

    <br><br>

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

    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'igual');
                errores($errores,'registrar');
                echo "<br>";
            }            
        ?>

    </span>


    <input type="submit" name="Login_GuardaRegistro" value="Guardar Registro">

</form>