<?php
$novedades = ProductoDAO::novedades();
$recomendados = ProductoDAO::recomendados();
?>
<div class="novedadestitulo">
      <h1>ULTIMAS NOVEDADES</h1>
    </div>
    <section class="novedades ">

      <article>
        <a href="./?producto=<?php echo $novedades[0]->codigo ?>">
          <div class="card " style="width: 18rem; ">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $novedades[0]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $novedades[0]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $novedades[0]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $novedades[0]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

      <article>
        <a href="./?producto=<?php echo $novedades[1]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $novedades[1]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $novedades[1]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $novedades[1]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $novedades[1]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

      <article>
        <a href="./?producto=<?php echo $novedades[2]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $novedades[2]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $novedades[2]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $novedades[2]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $novedades[2]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

      <article>
        <a href="./?producto=<?php echo $novedades[3]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $novedades[3]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $novedades[3]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $novedades[3]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $novedades[3]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>


    </section>
    <div class="novedadestitulo">
      <h1>RECOMENDADOS</h1>
    </div>
    <section class="novedades">
      <article>
        <a href="./?producto=<?php echo $recomendados[0]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $recomendados[0]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $recomendados[0]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $recomendados[0]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $recomendados[0]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

      <article>
        <a href="./?producto=<?php echo $recomendados[1]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $recomendados[1]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $recomendados[1]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $recomendados[1]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $recomendados[1]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

      <article>
        <a href="./?producto=<?php echo $recomendados[2]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $recomendados[2]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $recomendados[2]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $recomendados[2]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $recomendados[2]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

      <article>
        <a href="./?producto=<?php echo $recomendados[3]->codigo; ?>">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center mb-3 ">
              <h3 class="card-text">
                <?php echo $recomendados[3]->titulo; ?>
              </h3>
            </div>
            <img src="<?php echo $recomendados[3]->imagen_url; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <?php echo $recomendados[3]->descripcion; ?>
              </p>
            </div>
            <div class="card-footer text-center bg-success fs-4 ">
              <p class="card-text fw-bold precio ">Precio:
                <?php echo $recomendados[3]->precio; ?>€
              </p>
            </div>
          </div>
        </a>
      </article>

    </section>
