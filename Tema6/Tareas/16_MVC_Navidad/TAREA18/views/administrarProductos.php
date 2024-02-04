<div class="container card mt-2  ">
                <div class="row">
                    <div class="col-12 text-center  ">
                        <h2>Productos</h2>
                    </div>
                </div>
                <div class="row mt-3 border-bottom border-black  ">
                    <div class="col-2 text-center  ">
                        <h5>Codigo</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Titulo</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Precio</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Stock</h5>
                    </div>
                    <div class="col-4 text-center  ">
                        <h5>Acciones</h5>
                        <form action="" method="post">
                        <button type="submit" name="addProducto"  class="btn btn-warning mb-2">Añadir producto</button>
                        </form>
                    </div>

                </div>
                <?php
                foreach ($productos as $key => $value) {
                        echo'
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-2 text-center  ">
                        <h5>'.$value->codigo.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->titulo.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->precio.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->stock.'</h5>
                    </div>
                    <div class="col-4 text-center  ">
                    <form action="" method="post">
                        <button name="modificarP"  class="btn btn-secondary mb-2">Modificar</button>
                        <button name="eliminar" class="btn btn-danger mb-2">Eliminar</button>
                        <input type="hidden" name="codigo" value="'.$value->codigo.'">
                    </form>
                    </div>

                </div>
                   ';
                    
                }
               ?>