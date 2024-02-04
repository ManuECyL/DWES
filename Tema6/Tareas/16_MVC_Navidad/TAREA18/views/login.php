

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="get">
            <!-- User input -->
            <div class="form-outline mb-4">
                <input type="text" id="user" name="user" class="form-control" required value="<?php if(isset ($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>"/>
                <label class="form-label" for="user">Usuario</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" name="pass" required />
                <label class="form-label" for="pass">Contraseña</label>
            </div>
        
            <!-- Acepta condiciones de uso -->
            <div class="form-outline  mb-4 text-center">
                <input type="checkbox" id="recuerda" class=" d-inline " name="recuerda"  />
                <label class="form-label" for="pass"> Recordar usuario</label>
            </div>



            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="Entrar">Entrar</button>

                <!-- Register buttons -->
                <p>Si todavía no eres miembro: <a href="./?registro">Regístrate</a></p>
                <p><a href="./?home">Volver</a></p>

            </div>
        </form>
    </div>
