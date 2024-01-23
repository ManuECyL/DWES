<?php
    if (isset($sms)) {
        echo $sms;
    }
?>

<br>

<table>
    <thead>
        <th>Especialista</th>
        <th>Fecha</th>
<?php
        if(isAdmin() && $_REQUEST['Cita_VerCitasTodas']) {
            echo "<th>Paciente</th>";
        }
?>
        <th>Ver</th>
        <th>Cancelar</th>
    </thead>

    <tbody>
        <?php

            foreach ($array_citas as $cita) {
                echo "<tr>";

                    echo "<form method='post'>";

                        echo "<input type='hidden' name='id' value='".$cita -> id."'>";
                        echo "<td>". $cita -> especialista ."</td>";
                        echo "<td>". $cita -> fecha ."</td>";

                        if(isAdmin() && $_REQUEST['Cita_VerCitasTodas']) {
                            echo "<td>". $cita -> paciente ."</td>";
                        }

                        echo "<td><input type='submit' name='Cita_Ver' value='Ver'</td>";
                        echo "<td><input type='submit' name='Cita_Cancelar' value='Cancelar'</td>";

                    echo "</form>";

                echo "</tr>";
            }
            
        ?>
    </tbody>    
</table>

<br>

<form action="" method="post">
    <input type="submit" value="Pedir Cita" name="Cita_Pedir">
    <input type="submit" value="Ver Citas Anteriores" name="Cita_Ver_Anterior">
</form>