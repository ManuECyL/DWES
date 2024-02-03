<?
  if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
  }
?>
<header class="bg-info bg-gradient">

    <div class="row container-fluid p-2">

      <div class="col-7 col-sm-7 col-md-7">

        <!-- LOGO -->
        <div class="row">

          <?php
            if (isset($_SESSION['usuario'])) {
              echo '<div class="col-8 col-sm-8 col-md-8">';
            
            } else {
              echo '<div class="col-9 col-sm-9 col-md-9">';
            }
          ?>
            <span style="font-size: 30px;">
          <?php
            if (isset($_SESSION['vista']) == 'productos.php') {
              echo '<a href="../index.php" class="logo"><i class="bi bi-controller px-4 icono"> Gameshop</i></a>';
            } else {
                echo '<a href="./index.php" class="logo"><i class="bi bi-controller px-4 icono"> Gameshop</i></a>';
            }
          ?>
            </span>
          </div>

          <?php
              if (isset($_SESSION['usuario'])) {
                echo '
                  <div class="col-4 col-sm-4 col-md-4">
                    <span style="font-size: 30px;">
                      <p>Página Usuario</p>
                    </span>
                  </div>
                ';

              } else {
                echo '
                  <div class="col-3 col-sm-3 col-md-3">
                    <span style="font-size: 30px;">
                      <p>🎮🕹️🎰</p>
                    </span>
                  </div>
                ';

              }
          ?>

        </div>

      </div>

      <div class="col-5 col-sm-5 col-md-5 py-2">

        <div class="row">

          <!-- BUSCADOR -->
          <div class="col-4 col-sm-4 col-md-7 d-flex align-items-center justify-content-center justify-content-lg-end">
            <form method="get" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control rounded" placeholder="Buscar"/>
            </form>
          </div>

          <!-- LUPA -->
          <div class="col-2 col-sm-2 col-md-1" style="font-size: 150%;">
            <span>
              <a href="#"><i class="bi bi-search icono"></i></a>
            </span>
          </div>
          
          <!-- CARRITO -->
          <div class="col-2 col-sm-2 col-md-1">
            <span>
              <?php
                  if (isset($_SESSION['usuario'])) {
                      echo '<a href="./carrito.php"><i class="bi bi-cart4 icono" style="font-size: 150%;"></i></a>';
              
                  } else {
                  ?>
                    <!-- <a href="?accion=carrito"><i class="bi bi-cart4 icono carrito" style="font-size: 150%;"></i></a> -->
                    <a href="?carrito=true" name="carrito"><i class="bi bi-cart4 icono carrito" style="font-size: 150%;"></i></a>
                  <?php
                  }
              ?>
            </span>              
          </div>

          <!-- USUARIO -->
          <div class="col-2 col-sm-2 col-md-1" style="display:flex; font-size: 150%;">

            <a href="#" data-bs-toggle="modal" data-bs-target="#btnModalLogin"><i class="bi bi-person-circle icono" id="btnUsuario"></i></a>

            <?php
                if (isset($_SESSION['usuario'])) {
                    
                    echo '<p style="font-size: 15px; margin-left: 10px; margin-top: 5px">'. $id_Usuario = $usuario -> id_Usuario.'</p>';
                }
            ?>

            <!-- MENSAJE MODAL -->
            <div class="modal"  id="btnModalLogin" tabindex="-1">

              <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                  <div class="modal-header justify-content-center bg-dark bg-gradient">
                    
                    <?php
                      if (isset($_SESSION['usuario'])) {
                        echo '<h5 style="color: white;">'. $id_Usuario = $usuario -> id_Usuario .'</h5>';
    
                      } else {
                        echo '<h5 style="color: white;">Login</h5>';
                      }
                    ?>
                  
                    
                  </div>
          
                  <div class="modal-body text-center">

                    <?php
                        if (isset($_SESSION['usuario'])) {
                    ?>
                            <form action="" method="post" name="formularioT15" enctype="multipart/form-data">

                              <div class="mb-3">
                                  <button type="submit" id="perfil" name="perfil" class="btn bg-dark formu">Perfil</button>
                              </div>
                    <?php       
                            if ($usuario -> rol == 'cliente') {
                    ?>
                              <div class="mb-3">
                                <button type="submit" id="pedidos" name="pedidos" class="btn bg-dark formu">Pedidos</button>
                              </div>
                    <?php    
                            }

                            if ($usuario -> rol == 'admin' || $usuario -> rol == 'moderador') {
                    ?>
                              <div class="mb-3">
                                <button type="submit" name="modificarProductos" class="btn bg-dark formu">Modificar Productos</button>
                              </div>

                    <?php
                            }

                    ?>    
                              <div class="mb-3">
                                  <button type="submit" id="cerrarSesion" name="cerrarSesion" class="btn bg-dark formu">Cerrar Sesión</button>
                              </div>

                            </form>
                    <?php    
                        
                        } else {
                          echo '
                            <form action="" method="post" name="formularioLogin" enctype="multipart/form-data">

                              <div class="mb-3">
                                <label for="user" class="form-label">Usuario</label>
                                <input type="text" id="user" name="user" class="form-control">
                              </div>

                              <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña</label>
                                <input type="password" id="pass" name="pass" class="form-control">                    
                              </div>

                              <button type="submit" id="iniciarSesion" name="iniciarSesion" class="btn bg-dark formu" style="width: 40%;">Iniciar Sesión</button>

                              <br><br>

                              <button type="submit" id="registrarse" name="registrarse" class="btn bg-dark formu" style="width: 40%;">Registrarse</button>
                            </form>
                          ';
                        }
                    ?>

                  </div>

                  <div class="modal-footer bg-dark bg-gradient">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                  </div>

                </div>
              </div>            
            </div>
          </div>
          
        </div>                  
      </div>                 
    </div>
  </header>