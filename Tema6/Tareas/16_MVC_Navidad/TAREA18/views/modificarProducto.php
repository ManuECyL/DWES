    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="get">
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <label class="form-label">Modificando Producto con ID: <?php echo $producto->codigo; ?> </label>
                
                

            </div>
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <input hidden type="number" id="codigo"  class="form-control" name="codigo" value= '<?php echo $producto->codigo; ?>' />
               
             
                

            </div>
            <!-- Producto Titulo -->
            <div class="form-outline mb-4">
                <input type="text" id="titulo" class="form-control" name="titulo" value= '<?php echo $producto->titulo; ?>' />
                <label class="form-label" for="titulo">Titulo</label>
                <p class="error"><?php errores ($errores,'titulo');?></p>
                

            </div>

            <!-- Descripcion -->
            <div class="form-outline mb-4">
                <textarea name="descripcion" id="descripcion" cols="50" rows="10"><?php echo $producto->descripcion; ?></textarea><br>
                <label class="form-label" for="descripcion">Descripcion. </label>
                <p class="error"><?php errores ($errores,'descripcion');?></p>
            </div>


            <!-- Precio-->

            <div class="form-outline mb-4">
                <input type="text" id="precio" class="form-control" name="precio" value= '<?php echo $producto->precio; ?>' pattern="\d+(\.\d{1,2})?" />
                <label class="form-label" for="precio">Precio (Ej 6.99)</label>
                <p class="error"><?php errores ($errores,'precio');?></p>
                <p class="error"><?php errores ($errores,'preciotipo');?></p>
            </div>

            <!-- stock -->
            <div class="form-outline mb-4">
                <input type="number" id="stock" class="form-control" name="stock"  value= '<?php echo $producto->stock; ?>' />
                <label class="form-label" for="stock">Stock</label>  
                <p class="error"><?php errores ($errores,'stock');?></p>  
                <p class="error"><?php errores ($errores,'errordetipostock');?></p>  
            </div>
            <!-- imagen -->
            <div class="form-outline mb-4">
                <input type="text" id="imagen" class="form-control" name="imagen" value= '<?php echo $producto->imagen_url; ?>' />
                <label class="form-label" for="imagen">URL Imagen</label>  
                <p class="error"><?php errores ($errores,'imagen');?></p>  
            </div>
    

            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="registroProducto">Modificar</button>

                <!-- Register buttons -->
                <p><a href="./?volverProductos">Volver</a></p>

        </form>
    </div>
