<?php
    // Mostrar los campos en el encabezado de la tabla
    foreach ($camposTabla as $columna) {
        echo "<th>" . $columna . "</th>";
    }
        echo "<th> Modificar </th>";
        echo "<th> Borrar </th>";

    echo "</tr>";

    // Mostrar los datos de la tabla
    while ($fila = $consulta -> fetch_assoc()) {
        
        echo "<tr>";

        foreach ($camposTabla as $columna) {
            echo "<td>" . $fila[$columna] . "</td>";
        }
    }
?>