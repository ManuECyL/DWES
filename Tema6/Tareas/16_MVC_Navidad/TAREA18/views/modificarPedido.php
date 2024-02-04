<div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="post">
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <label class="form-label">Modificando Pedido con ID: <?php echo $pedido->id; ?> </label>
                
                

            </div>
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <input type="number" id="producto" class="form-control" name="productom" value= '<?php echo $pedido->cod_producto; ?>' />
                <label class="form-label" for="productom">Codigo de producto</label>
                <p class="error"><?php errores ($errores,'producto');?></p>
                <p class="error"><?php errores ($errores,'productonoexiste');?></p>
                

            </div>

            <!-- cantidad input -->
            <div class="form-outline mb-4">
                <input type="number" id="cantidad" class="form-control" name="cantidad" value= '<?php echo $pedido->cantidad; ?>'/>
                <label class="form-label" for="cantidad">Cantidad. <br> (Esta modificación no afectará al stock del producto, sólo al Pedido. Si desea modificar el stock vaya a productos o genere un albarán)</label>
                <p class="error"><?php errores ($errores,'cantidad');?></p>
            </div>


            <!-- Fecha-->

            <div class="form-outline mb-4">
                <input type="date" id="fecha" class="form-control" name="fecha" value= '<?php echo $pedido->fecha; ?>' />
                <label class="form-label" for="fecha">Fecha</label>
                <p class="error"><?php errores ($errores,'fecha');?></p>
            </div>

            <!-- Usuario -->
            <div class="form-outline mb-4">
                <input type="text" id="usuario1" class="form-control"  value= '<?php echo $pedido->usuario; ?>' disabled />
                <input type="hidden" id="usuario" class="form-control" name="usuario" value= '<?php echo $pedido->usuario; ?>' />
                <label class="form-label" for="usuario1">Usuario</label>                
            </div>
            <!-- Total -->
            <div class="form-outline mb-4">
                <input type="text" id="total" class="form-control" name="total" value= '<?php echo $pedido->total; ?>' pattern="\d+(\.\d{1,2})?"/>
                <label class="form-label" for="total">Total (Ej 6.99)</label>     
                <p class="error"><?php errores ($errores,'total');?></p>          
                <p class="error"><?php errores ($errores,'totaltipo');?></p>          
            </div>

            

            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="modificaPedido">Modificar</button>

                <!-- Register buttons -->
                <p><a href="./?volver">Volver</a></p>

        </form>
    </div>
