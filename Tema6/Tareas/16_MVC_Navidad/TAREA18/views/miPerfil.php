

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5">
        <form action="" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="user" class="form-control" name="user" value="<?php echo $_SESSION['usuario']->user; ?>" disabled />
                <label class="form-label" for="user">Usuario</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" name="pass" required />
                <label class="form-label" for="pass">Contraseña</label>
            </div>
            
            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass2" class="form-control" name="repitepass" required/>
                <label class="form-label" for="pass2">Repita contraseña</label>
            </div>

            <!-- email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" value="<?php echo $_SESSION['usuario']->email; ?>" required/>
                <label class="form-label" for="email">Email</label>
            </div>

            <!-- Fecha NAC -->
            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" name="nacimiento" value="<?php echo $_SESSION['usuario']->fecha_nac; ?>" required/>
                <label class="form-label" for="nacimiento">Fecha de Nacimiento</label>
            </div>


    
            <div class="text-center">
            <!-- Submit button -->
            <button type="submit" name="editar" class="btn btn-warning  btn-block mb-4">Editar</button>
        </form>

            <!-- Register buttons -->
                <p><a  href="./?home">Volver</a></p>
               
    </div>

