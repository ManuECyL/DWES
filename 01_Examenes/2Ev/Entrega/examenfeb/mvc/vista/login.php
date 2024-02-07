<form name="logIn" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="contenedor">
        <div class="contenido">
            <div class="titulo">Iniciar sesión</div>
            <div class="form-group">
                <label for="loginUsuario">Usuario</label>
                <input type="text" class="form-control" name="loginUsuario" id="loginUsuario" aria-describedby="loginUsuario" placeholder="Introduce usuario">
            </div>
            <div class="form-group">
                <label for="loginPassword">Contraseña</label>
                <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Introduce contraseña">
            </div>
            <input type="checkbox" name="" id="">Recuerdame
            
            <button type="submit" name="iniciarSesion" class="btn btn-primary">Iniciar Sesión</button>
                  </div>
    </div>
</form>


