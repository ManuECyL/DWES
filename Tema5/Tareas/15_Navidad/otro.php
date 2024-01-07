<form action="./carrito.php" method="post" name="formularioCarrito" enctype="multipart/form-data" class="formularioCarrito text-center mx-auto">
    <table>
        <tr>
            <?php
            // Mostrar los campos en el encabezado de la tabla
            foreach ($camposTabla as $columna) {
                echo "<th>" . $columna . "</th>";
            }
            echo "<th> Eliminar </th>";
            ?>
        </tr>
        
        <?php
        $total = 0;
        // Mostrar los datos de la tabla
        while ($fila = $consulta->fetch_assoc()) {
            echo "<tr>";
            foreach ($camposTabla as $columna) {
                if ($columna == 'cantidad') {
                    echo "<td>";
                    echo "<input type='hidden' name='cod_Prod[]' value='" . $fila['cod_Prod'] . "'>";
                    echo "<input type='number' name='cantidad[]' value='" . $fila['cantidad'] . "'>";
                    echo "</td>";
                } elseif ($columna == 'total') {
                    $total += $fila[$columna];
                    echo "<td>" . $fila[$columna] . "</td>";
                } else {
                    echo "<td>" . $fila[$columna] . "</td>";
                }
            }
            echo "<td>";
            echo "<button type='submit' name='eliminarProducto_" . $fila['cod_Prod'] . "' value='" . $fila['cod_Prod'] . "'>Eliminar</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>

    <h5>Total: <?php echo $total; ?> €</h5>

    <br>

    <input type="submit" value="Actualizar Cantidad" name="actualizarCantidad" class="inputCarrito">
    <input type="submit" value="Vaciar Carrito" name="vaciar" class="inputCarrito">

    <br><br>

    <button type="submit" id="realizarPedido" name="realizarPedido" class="btn bg-primary bg-gradient formu">Realizar Pedido</button>
</form>
