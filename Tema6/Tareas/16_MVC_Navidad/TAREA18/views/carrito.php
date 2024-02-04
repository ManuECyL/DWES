
            <div class="container card mt-2  ">
                <div class="row">
                    <div class="col-12 text-center  ">
                        <h2>Resumen de compra</h2>
                    </div>
                </div>
                <div class="row mt-3 border-bottom border-black  ">
                    <div class="col-3 text-center  ">
                        <h5>Producto</h5>
                    </div>
                    <div class="col-3 text-center  ">
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-3 text-center  ">
                        <h5>Precio unitario</h5>
                    </div>
                    <div class="col-3 text-center  ">
                        <h5>Suma</h5>
                    </div>

                </div>
                <div class="row  border-bottom border-black">
                    <div class="col-3 p-4 text-center">
                        <h6>
                            <?php echo $_SESSION['producto']->titulo ?>
                        </h6>
                    </div>
                    <div class="col-3 p-4 text-center">
                        <form action="" method="post">
                            <input id="cantidad" name="cantidad" type="number" value="1" style=" width: 3em;"
                                class="text-end ">
                    </div>
                    <div class="col-3 p-4 text-center">
                        <h6>
                            <?php echo $_SESSION['producto']->precio ?>
                        </h6>
                    </div>
                    <div class="col-3 p-4 text-center">
                        <h6><span id="suma">
                                <?php echo $_SESSION['producto']->precio ?>
                            </span>€</h6>
                    </div>
                </div>
                <div class="row text-end ">
                    <div class="col-3 offset-6 p-4 text-center">
                        <h6>IVA: <span id="iva"></span>€</h6>
                    </div>
                    <div class="col-3 p-4 text-center ">
                        <h6 class="fw-bold ">TOTAL: <span id="total"></span>€</h6>
                    </div>

                </div>
                <div class="row text-center">
                    <div class="col-3 offset-9 pb-3">


                        <button type="submit" name="compra" class="btn btn-success">Confirmar compra</button>
                     
                        </form>

                    </div>
                </div>
                <p><a  href="./?volver">Volver</a></p>
            </div>

   
        <script>
            let total = document.getElementById('total');
            let precio = <?php echo $_SESSION['producto']->precio ?>;
            let cantidad = document.getElementById('cantidad');
            let suma = document.getElementById('suma');
            let iva = document.getElementById('iva');
            iva.innerHTML = ((precio * cantidad.value) * 0.21).toFixed(2);
            total.innerHTML = precio.toFixed(2);
            cantidad.addEventListener('change', () => {
                total.innerHTML = ((precio * cantidad.value)).toFixed(2);
                suma.innerHTML = ((precio * cantidad.value)).toFixed(2);
                iva.innerHTML = ((precio * cantidad.value) * 0.21).toFixed(2);
            });
        </script>
