<a href="<?php echo $_SERVER['PHP_SELF']?>?logout=logout">Logout</a>

<?php

if(isset($sms))
    echo $sms;
    if($_SESSION['usuarioDAW205POO']->tipo=='user'){
?>




<form action="" method="post">
    <input type="submit" value="Inciar partida aleatoria" name="iniciar">
    <br>
    Minimo de letras: <input type="text"  name='numero'>
    <input type="submit" value="Inciar partida Min" name="iniciar">
</form>
<?}?>
<table>
    <thead>
        <th>id</th>
        <?if($_SESSION['usuarioDAW205POO']->tipo=='admin')
            echo "<th>id usuario</th>";?>
        <th>palabra</th>
        <th>resultado</th>
        <th>intentos</th>
        <th>fecha</th>
    </thead>
<?
foreach($partidasJugadas as $partida)
{
    echo "<tr>";
    echo "<td>".$partida['id_estadistica']."</td>";
    if($_SESSION['usuarioDAW205POO']->tipo=='admin')
            echo "<td>".$partida['id_usuario']."</td>";
    echo "<td>".$partida['palabra']."</td>";
    echo "<td>".$partida['resultado']."</td>";
    echo "<td>".$partida['intentos']."</td>";
    echo "<td>".$partida['fecha']."</td>";
    echo "</tr>";
}

?>
</table>