<?php
    // session_start();

    require_once('./config/conexionBD.php');
    require_once('./config/config.php');
    require_once('./core/funciones.php');

    if (!comprobarBD()) {
        crearScript();
    }

    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
          
      $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);
      
      if ($usuario) {
        
        $_SESSION['usuario'] = $usuario;
        $contraseña = $_REQUEST['pass'];
            
      } else {
        $_SESSION['errorInicioSesion'] = "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
      }
    
    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    
    } elseif (isset($_SESSION['usuario'])) {

      if (existe('perfil')) {
        header('Location: ./perfil.php');
        exit;

      } elseif (existe('pedidos')) {
        header('Location: ./pedidos.php');
        exit;

      } elseif (existe('modificarProductos')) {
        header('Location: ./modificarProductos.php');
        exit;
    
    } elseif (existe('cerrarSesion')) {
        cerrarSesion();
      }

    // Si no se ha iniciado sesión
    } else {

      if (existe('registrarse')) {
        header('Location: ./registro.php');
        exit;

      } elseif (existe('comprar')) {
          echo "<div class='alert alert-danger text-center'><b>Debe iniciar sesión para comprar</b></div>";
      
      } elseif (existe('carrito')) {
          echo "<div class='alert alert-danger text-center'><b>Debe iniciar sesión para acceder al carrito</b></div>";
      } 
    }

    // Comprueba si se ha pulsado el icono del carrito
    existeCarrito('carrito');
 
    // Muestra el mensaje de error de inicio de sesión fallido
    if (isset($_SESSION['errorInicioSesion'])) {
      echo $_SESSION['errorInicioSesion'];
      unset($_SESSION['errorInicioSesion']);
    
    // Muestra el mensaje de error de carrito si no se ha iniciado sesión
    } elseif (isset($_SESSION['mensaje'])) {
      echo $_SESSION['mensaje'];
      unset($_SESSION['mensaje']);  
    }
    
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>MVC - Tienda Navidad</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href= "<?= CSS . 'estilos.css' ?>" >
    </head>

    <body>

<!-- HEADER -->
        <?php
            require_once HTML . 'header.php';
        ?>
          
<!-- NAV -->
        <?php
            require_once HTML . 'nav.php';
        ?>
    
<!-- MAIN -->
        <main>

        <?php

          // Si por lo que sea la sesion tiene datos (que es un error)
          if (isset($_SESSION['error'])) {
            echo "<span style='color:red'>". $_SESSION['error'] ."</span>";
          }
        ?>

    <!-- CARRUSEL -->
          <div id="miCarousel" class="carousel carousel-dark slide mx-auto" data-bs-ride="true" style="width:100%;">
  
            <ol class="carousel-indicators">
              <li type="button" data-bs-target="#miCarousel" data-bs-slide-to="0" class="active"></li>
              <li type="button" data-bs-target="#miCarousel" data-bs-slide-to="1"></li>
              <li type="button" data-bs-target="#miCarousel" data-bs-slide-to="2"></li>
              <li type="button" data-bs-target="#miCarousel" data-bs-slide-to="3"></li>
            </ol>
  
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= IMGI . 'inicio1.jpg' ?>" class="d-block mx-auto w-100 imgC" alt="inicio1"> 
              </div>
  
              <div class="carousel-item">               
                <img src="<?= IMGI . 'inicio2.jpg' ?>" class="d-block mx-auto w-100 imgC" alt="inicio2">                    
              </div>
  
              <div class="carousel-item">
                <img src="<?= IMGI . 'inicio3.jpg' ?>" class="d-block mx-auto w-100 imgC" alt="inicio3"> 
              </div>

              <div class="carousel-item">
                <img src="<?= IMGI . 'inicio4.jpg' ?>" class="d-block mx-auto w-100 imgC" alt="inicio4"> 
              </div>
  
            </div>
  
            <button class="carousel-control-prev" type="button" style="width: fit-content;" data-bs-target="#miCarousel" data-bs-slide="prev">
              <i class="bi bi-arrow-left-circle" style="margin-left: 80px; font-size: 250%; color: rgb(180, 123, 0);"></i>                  
              <span class="visually-hidden">Previous</span>
            </button>
  
            <button class="carousel-control-next" type="button" style="width: fit-content;" data-bs-target="#miCarousel" data-bs-slide="next">
              <i class="bi bi-arrow-right-circle" style="margin-right: 80px; font-size: 250%; color: rgb(180, 123, 0);"></i>
              <span class="visually-hidden">Next</span>
            </button>

          </div>

        </main>

<!-- FOOTER -->
        <?php
            require_once HTML . 'footer.php';
        ?>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>