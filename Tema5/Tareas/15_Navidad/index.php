<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tienda Navidad</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>

<!-- HEADER -->
        <?php
            include_once("./html/header.php");
        ?>
          
<!-- NAV -->
        <?php
            include_once("./html/nav.php");
        ?>
    
<!-- MAIN -->
        <main>
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
                <img src="./imagenes/inicio/inicio1.jpg" class="d-block mx-auto w-100 imgC" alt="inicio1"> 
              </div>
  
              <div class="carousel-item">               
                <img src="./imagenes/inicio/inicio2.jpg" class="d-block mx-auto w-100 imgC" alt="inicio2">                    
              </div>
  
              <div class="carousel-item">
                <img src="./imagenes/inicio/inicio3.jpg" class="d-block mx-auto w-100 imgC" alt="inicio3"> 
              </div>

              <div class="carousel-item">
                <img src="./imagenes/inicio/inicio4.jpg" class="d-block mx-auto w-100 imgC" alt="inicio4"> 
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
            include_once("./html/footer.php");
        ?>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>