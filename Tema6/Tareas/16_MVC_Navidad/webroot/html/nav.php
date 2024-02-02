<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

  <div class="navbar row container-fluid d-flex text-center">

      <ul class="navbar-nav row row-cols">

      <?php
        if (!isset($_SESSION['usuario'])) {
          echo '
            <div class="col-md-6 col-lg">
              <li class="nav-item">
                <a class="nav-link navNombre" href="./index.php">Inicio</a>             
              </li>
            </div>

            <div class="col-md-6 col-lg">
              <li class="nav-item">
                <a class="nav-link navNombre" href="' . VIEW . 'productos.php ">Productos</a>
              </li>
            </div>
          ';
        }
      ?>

      <?php
        if (isset($_SESSION['usuario'])) {

          echo '
            <div class="col-md-3 col-lg">
              <li class="nav-item">
                <a class="nav-link navNombre" href="./index.php">Inicio</a>             
              </li>
            </div>

            <div class="col-md-3 col-lg">
              <li class="nav-item">
              <a class="nav-link navNombre" href="' . VIEW . 'productos.php ">Productos</a>
              </li>
            </div>
          ';

          if ($_SESSION['usuario']['rol'] == 'moderador' || $_SESSION['usuario']['rol'] == 'admin') {
            echo '

              <div class="col-md-3 col-lg">
                <li class="nav-item">
                  <a class="nav-link navNombre" href="./ventas.php">Ventas</a>
                </li>
              </div>

              <div class="col-md-3 col-lg">
                <li class="nav-item">
                  <a class="nav-link navNombre" href="./albaran.php">Albaranes</a>
                </li>
              </div>
            ';
          } 
        }
      ?>
      
      </ul>

  </div>

</nav>