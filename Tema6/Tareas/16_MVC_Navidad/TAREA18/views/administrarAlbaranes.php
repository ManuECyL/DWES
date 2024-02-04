<div class="container card mt-2  ">
                <div class="row">
                    <div class="col-12 text-center  ">
                        <h2>Resumen de Albaranes</h2>
                    </div>
                </div>
                <div class="row mt-3 border-bottom border-black  ">
                    <div class="col-1 text-center  ">
                        <h5>Id</h5>
                    </div>
                    <div class="col-2 text-start  ">
                        <h5>Producto</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Fecha</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Usuario</h5>
                    </div>
                    <div class="col-3 text-center  ">
                    <a href="./?addAlbaran"> <button class="btn btn-warning mb-2">Nuevo Albarán</button></a>
                    </div>

                </div>
                <?php
                foreach ($albaranes as $key => $value) {
                    $producto = ProductoDAO::findByCodigo($value->cod_producto);
                    if (UserDAO::isModerador($_SESSION['usuario']->user)){
                   echo'
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-1 text-center  ">
                        <h5>'.$value->id.'</h5>
                    </div>
                    <div class="col-2 text-start  ">
                        <h5>'.$producto->titulo.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>';
                        echo $value->cantidad;
                        echo'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->fecha.'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value->usuario.'</h5>
                    </div>
                    </div>';
                }else if (UserDAO::isAdmin($_SESSION['usuario']->user)){
                    echo'
                    <div class="row mt-3 border-bottom border-black">
                     <div class="col-1 text-center  ">
                         <h5>'.$value->id.'</h5>
                     </div>
                     <div class="col-2 text-start  ">
                         <h5>'.$producto->titulo.'</h5>
                     </div>
                     <div class="col-2 text-center  ">
                         <h5>';
                         echo $value->cantidad;
                         echo'</h5>
                     </div>
                     <div class="col-2 text-center  ">
                         <h5>'.$value->fecha.'</h5>
                     </div>
                     <div class="col-2 text-center  ">
                         <h5>'.$value->usuario.'</h5>
                     </div>
                     <div class="col-3 text-center  ">
                     <form action="" method="POST">
                          <button name="modificar" class="btn btn-secondary mb-2">Modificar</button>
                          <button name="eliminar" class="btn btn-danger mb-2">Eliminar</button>
                          <input type="hidden" name="id" value="'.$value->id.'">
                    </form>
                      </div>
                     </div>';
                }


              
                }
               ?>