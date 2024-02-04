
    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="get">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="user" class="form-control" name="user" value= '<?php recuerda ('user'); ?>'  required/>
                <label class="form-label" for="user">Usuario</label>
                <p class="error"><?php errores ($errores,'user');?></p>
                <p class="error"><?php errores ($errores,'existeuser');?></p>

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" name="pass" value= '<?php recuerda ('pass'); ?>' pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$" required/>
                <label class="form-label" for="pass">Contraseña (Mínimo 8 caracteres, al menos una mayúscula, al menos una minúscula y al menos un número)</label>
                <p class="error"><?php errores ($errores,'pass');?></p>
                <p class="error"><?php errores ($errores,'validapass');?></p>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass2" class="form-control" name="repitepass" required/>
                <label class="form-label" for="pass2">Repita contraseña</label>
                <p class="error"><?php errores ($errores,'repitepass');?></p>
                <p class="error"><?php errores ($errores,'coincidepass');?></p>
            </div>

            <!-- email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" value= '<?php recuerda ('email'); ?>' required/>
                <label class="form-label" for="email">Email</label>
                <p class="error"><?php errores ($errores,'email');?></p>
            </div>

            <!-- Fecha NAC -->

            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" name="fecha" value= '<?php recuerda ('fecha'); ?>' required/>
                <label class="form-label" for="nacimiento">Fecha de Nacimiento</label>
                <p class="error"><?php errores ($errores,'fecha');?></p>
            </div>



            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="registro">Registro</button>
                <button type="submit" class="btn btn-secondary   btn-block mb-4" name="Borrar">Borrar</button>


                <!-- Register buttons -->
                <p><a href="./?login">Volver</a></p>

        </form>
    </div>
