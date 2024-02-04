<div class="container card mt-2  ">
                <div class="row">
                    <div class="col-12 text-center  ">
                        <h2>Resumen de pedidos</h2>
                    </div>
                </div>
                <div class="row mt-3 border-bottom border-black  ">
                    <div class="col-1 text-center  ">
                        <h5>Id</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Fecha</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Producto</h5>
                    </div>
                    <div class="col-1 text-center  ">
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Precio</h5>
                    </div>
                    <div class="col-4 text-center  ">
                        <h5>Factura</h5>
                    </div>

                </div>
                <?php
                foreach ($pedidos as $key => $value) {
                    $producto= ProductoDAO::findByCodigo($value->cod_producto);

                    if (UserDAO::isModerador($_SESSION['usuario']->user)){
                   echo'
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-2 text-center  ">
                        <h5>'.$value->id.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->fecha.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>';
                        echo $producto->titulo;
                        echo '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->cantidad.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->total.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                    <form action="" method="post">
                    <button name="factura" class="btn btn-warning mb-2">Factura</button>
                    <input type="hidden" name="id" value="'.$value->id.'">
                    </form>
                    </div>

                </div>
                   ';
                    }else if (UserDAO::isAdmin($_SESSION['usuario']->user)){
                        echo'
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-1 text-center  ">
                        <h5>'.$value->id.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->fecha.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>';
                        echo $producto->titulo;
                        echo '</h5>
                    </div>
                    <div class="col-1 text-center  ">
                        <h5>'.$value->cantidad.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->total.'</h5>
                    </div>
                    <div class="col-4 text-center  ">
                    <form action="" method="post">
                        <button name="factura" class="btn btn-warning mb-2">Factura</button>
                        <button name="modificar"  class="btn btn-secondary mb-2">Modificar</button>
                        <button name="eliminar" class="btn btn-danger mb-2">Eliminar</button>
                        <input type="hidden" name="id" value="'.$value->id.'">
                    </form>
                    </div>

                </div>
                   ';
                    }
                }
               ?>