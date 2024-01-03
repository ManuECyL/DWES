<header class="bg-info bg-gradient">

    <div class="row container-fluid p-2">

      <div class="col-3 col-sm-4 col-md-6">

        <!-- LOGO -->
        <div class="row">
          <span style="font-size: 30px;">
            <a href="./index.php" class="logo"><i class="bi bi-controller px-4 icono"> Gameshop</i></a>
          </span>
        </div>

      </div>

      <div class="col-9 col-sm-8 col-md-6">

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

            <a href="#" data-bs-toggle="modal" data-bs-target="#btnModalLogin"><i class="bi bi-person-circle icono"></i></a>

                <!-- MENSAJE MODAL -->
                <div class="modal" id="btnModalLogin" tabindex="-1">

                  <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                      <div class="modal-header justify-content-center bg-dark bg-gradient">
                        <h5 style="color: white;">Login</h5>
                      </div>
              
                      <div class="modal-body text-center">

                        <form>

                          <div class="mb-3 formu">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="inputUsuario">
                          </div>

                          <div class="mb-3 formu">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña">
                          </div>

                          <button type="submit" class="btn bg-dark" style="color: white;">Iniciar Sesión</button>

                          <br>
                          <br>

                          <button type="submit" class="btn bg-dark" style="color: white;">Registrarse</button>

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