  <section class="novedades ">
  <?php
    foreach (ProductoDAO::findAll() as $key => $value) {
        echo '
        <article>
            <a href="./?producto='.$value->codigo.'">
            <div class="card " style="width: 18rem; ">
                <div class="card-header text-center mb-3 ">
                <h3 class="card-text">
                    '.$value->titulo.'
                </h3>
                </div>
                <img src="'.$value->imagen_url.'" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">
                    '.$value->descripcion.'
                </p>
                </div>
                <div class="card-footer text-center bg-success fs-4 ">
                <p class="card-text fw-bold precio ">Precio:
                    '.$value->precio.'€
                </p>
                </div>
            </div>
            </a>
        </article>';
    }
    ?>
   
  </section>
    



