
    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="post">
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <input type="text" id="productocod" class="form-control" name="productocod" value= '<?php recuerda ('producto'); ?>' />
                <label class="form-label" for="productocod">Codigo de producto</label>
                <p class="error"><?php errores ($errores,'producto');?></p>
                <p class="error"><?php errores ($errores,'productonoexiste');?></p>
                

            </div>

            <!-- cantidad input -->
            <div class="form-outline mb-4">
                <input type="number" id="cantidad" class="form-control" name="cantidad" value= '<?php recuerda ('cantidad'); ?>'/>
                <label class="form-label" for="cantidad">Cantidad</label>
                <p class="error"><?php errores ($errores,'cantidad');?></p>
            </div>


            <!-- Fecha-->

            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" name="fecha" value= '<?php recuerda ('fecha'); ?>' />
                <label class="form-label" for="nacimiento">Fecha</label>
                <p class="error"><?php errores ($errores,'fecha');?></p>
            </div>



            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="addAlb">Registro</button>
                <button type="submit" class="btn btn-secondary   btn-block mb-4" name="Borrar">Borrar</button>


                <!-- Register buttons -->
                <p><a href="./?volverAlbaranes">Volver</a></p>

        </form>
    </div>
