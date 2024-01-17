<form action="" method="post">
    
    <br>

    <label for="codUsuario"> codUsuario:
        <input type="text" name="cod" id="cod" value="<? echo $_SESSION['usuario'] -> codUsuario; ?>" readonly>
    </label>
 
    <br><br>

    <label for="nombre"> descUsuario:
        <input type="text" name="nombre" id="nombre" value="<? echo $_SESSION['usuario'] -> descUsuario; ?>">
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'nombre');
            }   
        ?>
    </span>
 
    <br><br>

    <label for="fecha"> Fecha Ultima Conexion:
        <input type="text" name="fecha" id="fecha" value="<? echo $_SESSION['usuario'] -> fechaUltimaConexion; ?>" readonly>
    </label>
 
    <br><br>

    <label for="perfil"> Perfil:
        <input type="text" name="perfil" id="perfil" value="<? echo $_SESSION['usuario'] -> perfil; ?>" readonly>
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'update');
            }   
        ?>
    </span>
 
    <br><br>

    <input type="submit" name="User_Guardar" value="Guardar Cambios">
    <input type="submit" name="User_CambiaContraseña" value="Cambiar contraseña">

</form>