<header class="bg-info bg-gradient">

    <div class="row container-fluid p-2">

      <div class="col-7 col-sm-7 col-md-7">

        <!-- LOGO -->
        <div class="row">

            <div class="col-9 col-sm-9 col-md-9">
                <span style="font-size: 30px;">
                  <a href="./index.php" class="logo"><i class="bi bi-controller px-4 icono"> Gameshop</i></a>
                </span>
            </div>

            <div class="col-3 col-sm-3 col-md-3">
                <span style="font-size: 30px;">
                    <p>Home</p>
                </span>
            </div>
        </div>

      </div>

      <div class="col-5 col-sm-5 col-md-5 py-2">

        <div class="row">

          <!-- BUSCADOR -->
          <div class="col-4 col-sm-4 col-md-8 d-flex align-items-center justify-content-center justify-content-lg-end">
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
              <a href="./carrito.html"><i class="bi bi-cart4 icono" style="font-size: 150%;"></i></a>
            </span>              
          </div>

          <!-- USUARIO -->
          <div class="col-2 col-sm-2 col-md-1" style="font-size: 150%;">

            <a href="#" data-bs-toggle="modal" data-bs-target="#btnModalLogin"><i class="bi bi-person-circle icono" id="btnUsuario"></i></a>

            <!-- MENSAJE MODAL -->
            <div class="modal fade"  id="btnModalLogin" tabindex="-1">

              <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                  <div class="modal-header justify-content-center bg-dark bg-gradient">
                    <h5 style="color: white;">Login</h5>
                  </div>
          
                  <div class="modal-body text-center">

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

                        <br>
                        <br>

                        <button type="submit" id="registrarse" name="registrarse" class="btn bg-dark formu" style="width: 40%;">Registrarse</button>
                    </form>


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