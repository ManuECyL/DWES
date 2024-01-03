<footer class="bg-dark bg-gradient">
    <div class="row py-5">

      <!-- LINKS -->
      <div class="col-12 col-md-4 text-center">
        <h5 class="footerTitulo py-1" id="accordionInfo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Información</h5>
        
        <div class="accordion-collapse collapse py-3 accordion-body" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionInfo">

          <p>
            <a href="#" class="footerLink">Inicio</a>
          </p>

          <p>
            <a href="#" class="footerLink">Características</a>
          </p>

          <p>
            <a href="#" class="footerLink">Preguntas Frecuentes</a>
          </p>

          <p>
            <a href="#" class="footerLink">Sobre Nosotros</a>
          </p>

        </div>
        
      </div>
        
      <br>
      <br>

      <!-- SUSCRIPCIÓN -->
      <div class="col-12 col-md-4">
        <form id="accordionSub">

          <h5 class="footerTitulo text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Suscríbite a nuestro boletín</h5>

          <div class="accordion-collapse collapse py-4 accordion-body" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionSub">

            <p style="color: white; text-align: center;">Actualizaciones mensuales sobre nuestros productos nuevos y más destacados.</p>
            
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">

              <label for="newsletter1" class="visually-hidden">Dirección Email</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Dirección Email">
              <button class="btn btn-light bg-dark" type="button" data-bs-toggle="modal" data-bs-target="#btnModal" style="color: white;">Suscribirme</button>

              <!-- MENSAJE MODAL -->
              <div class="modal" id="btnModal" tabindex="-1">

                <div class="modal-dialog modal-dialog-centered">

                  <div class="modal-content">
                    <div class="modal-header">
                      <h5>Suscripción</h5>
                    </div>

                    <div class="modal-body">
                      <p>Se ha suscrito con éxito</p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary bg-dark" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                  </div>

                </div>     

              </div>

            </div>

          </div>

        </form>

      </div>

      <br>
      <br>

  <!-- REDES -->
      <div class="col-12 col-md-4">

        <div class="mx-auto text-center"  style="width: 50%;">   

          <div class="row">
            <div class="col-3">
                <a href="#"><i class="bi bi-twitter iconoRed"></i></a>
            </div>                          

            <div class="col-3">
                <a href="#"><i class="bi bi-instagram iconoRed"></i></a>
            </div>                          

            <div class="col-3">
                <a href="#"><i class="bi bi-facebook iconoRed"></i></a>
            </div>                          

            <div class="col-3">
                <a href="#"><i class="bi bi-youtube iconoRed"></i></a>               
            </div>   

          </div>

        </div>

      </div>

    </div>
    
    <!-- COPYRIGHT -->
    <div class="d-flex flex-column flex-sm-row justify-content-center py-3 bg-info">
      <p style="color: black; font-weight: bold;">© 2023 Company, Inc. All rights reserved.</p>
    </div>

  </footer>