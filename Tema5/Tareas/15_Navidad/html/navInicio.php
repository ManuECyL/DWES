<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

  <div class="navbar row container-fluid d-flex text-center">

      <ul class="navbar-nav row row-cols">

        <div class="col-md-6 col-lg">
          <li class="nav-item">

            <?php
              if (isset($_SESSION['usuario'])) {
                echo "<a class='nav-link navNombre' href='./homeUser.php'>Inicio</a>";

              } else {
                echo "<a class='nav-link navNombre' href='./index.php'>Inicio</a>";
              }
            ?>
            
          </li>
        </div>

        <div class="col-md-6 col-lg">
          <li class="nav-item">
            <a class="nav-link navNombre" href="./productos.php">Productos</a>
          </li>
        </div>

      </ul>

  </div>

</nav>