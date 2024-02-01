<?if(isset($sms)){
        echo $sms;
    }
?>
<table>
    <thead>
        <th>Especialista</th>
        <th>Fecha</th>
        <?php
         if(isAdmin() && isset($_REQUEST['Citas_verCitasToda'])){
            echo "<th>Paciente</th>";
        }
            ?>
        <th>Ver</th>
        <th>Cancelar</th>
    </thead>
    <tbody>
        <?
foreach ($array_citas as $cita) {
    echo "<tr>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='id'  value='".$cita->id."' >";
        echo "<td>".$cita->especialista."</td>";
        echo "<td>".$cita->fecha."</td>";
        if(isAdmin() && isset($_REQUEST['Citas_verCitasToda'])){
            echo "<td>".$cita->paciente."</td>";
        }
        echo "<td><input type='submit' name='Cita_Ver'  value='Ver' ></td>";
        echo "<td><input type='submit' name='Cita_Cancelar'  value='Cancelar' ></td>";
        echo "</form>";
    echo "</tr>";
}
?>
</tbody>
<table>
<form action="" method="post">
    <input type="submit" value="Pedir Cita" name="Cita_Pedir">
    <input type="submit" value="Ver Citas anteriores" name="Cita_VerAnterior">
</form>