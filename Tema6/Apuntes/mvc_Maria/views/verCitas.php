
<table>
    <thead>
        <th>Especialista</th>
        <th>Fecha</th>
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
        echo "<input type='submit' name='Cita_Ver'  value='Ver' >";
        echo "<input type='submit' name='Cita_Cancelar'  value='Cancelar' >";
        echo "</form>";
    echo "</tr>";
}
?>
</tbody>