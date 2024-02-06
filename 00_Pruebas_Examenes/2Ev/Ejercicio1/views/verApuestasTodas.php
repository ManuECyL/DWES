<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<br>

<table>
    <thead>
        <th>id_Apuesta</th>
        <th>id_Usuario</th>
        <th>Numero 1</th>
        <th>Numero 2</th>
        <th>Numero 3</th>
        <th>Numero 4</th>
        <th>Numero 5</th>
        <th>Fecha Apuesta</th>
    </thead>

    <tbody>
        <?php

            foreach ($array_apuestas as $apuesta) {
                echo "<tr>";

                        echo "<input type='hidden' name='id' value='".$apuesta -> id_Apuesta."'>";
                        echo "<td>". $apuesta -> id_Apuesta ."</td>";
                        echo "<td>". $apuesta -> id_Usuario ."</td>";
                        echo "<td>". $apuesta -> numero1 ."</td>";
                        echo "<td>". $apuesta -> numero2 ."</td>";
                        echo "<td>". $apuesta -> numero3 ."</td>";
                        echo "<td>". $apuesta -> numero4 ."</td>";
                        echo "<td>". $apuesta -> numero5 ."</td>";
                        echo "<td>". $apuesta -> fechaApuesta ."</td>";

                echo "</tr>";
            }
        ?>
    </tbody>    
</table>

<br>

<form action="" method="post">
    <input type="submit" value="Volver" name="volver">
</form>