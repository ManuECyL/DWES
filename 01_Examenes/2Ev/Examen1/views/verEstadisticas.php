<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<br>

<table>
    <thead>
        <th>id_estadistica</th>
        <th>id_usuario</th>
        <th>id_palabra</th>
        <th>resultado</th>
        <th>intentos</th>
        <th>fecha</th>
    </thead>

    <tbody>
        <?php

            foreach ($array_estadisticas as $estadistica) {

                echo "<tr>";

                    echo "<td>". $estadistica -> id_estadistica ."</td>";
                    echo "<td>". $estadistica -> id_usuario ."</td>";
                    echo "<td>". $estadistica -> id_palabra ."</td>";
                    echo "<td>". $estadistica -> resultado ."</td>";
                    echo "<td>". $estadistica -> intentos ."</td>";
                    echo "<td>". $estadistica -> fecha ."</td>";

                echo "</tr>";
            }

        ?>
    </tbody>    
</table>

<br>

<form action="" method="post">
    <input type="submit" value="Volver" name="volver">
</form>
