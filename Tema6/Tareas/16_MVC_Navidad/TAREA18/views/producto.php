
    <section class="articulo ">
      <div class="tituloproducto">
        <h1>
          <?php echo $producto->titulo; ?>
        </h1>
      </div>
      <div class="d-flex row">
        <figure class="imagenproducto col-6">
          <img src="<?php echo  $producto->imagen_url; ?>" class="imagenproducto" style="max-height: 500px;" >
        </figure>
        <div class="col-6 container" style="color: black;">
          <h4>Descripcion</h4>
          <p>
            <?php echo $producto->descripcion; ?>
          </p>


          <div class="d-flex">
            <div class="card-footer text-center bg-secondary radius  me-2 p-3">
              <p class="card-text fw-bold precio pb-0  ">
                <?php echo $producto->precio; ?>€
              </p>
            </div>
            <div class="text-center ">
              <a href="./?comprar=<?php echo $producto->codigo; ?>">
                <p class="btn btn-success p-3 fw-bold me-2  ">Comprar</p>
              </a>

            </div>
          </div>
          <p class="mt-4">Stock:
            <?php echo $producto->stock; ?> unidades.
          </p>
          <p>Código de producto:
            <?php echo $producto->codigo; ?> .
          </p>

        </div>

      </div>
    </section>

