<?php
if (isset($_SESSION['palabra'])) {
    echo "Palabra: " . $_SESSION['palabra']['palabra'];
    echo "<br>";
    echo "Oculta: " . $_SESSION['palabraOculta'];
    if (isset($sms))
        echo $sms;
}
?>
<p>Intentos:
    <?php echo $_SESSION['intentos'] ?>
</p>
<form action="" method="post">
    <label for="min">Minimo de letras
        <input type="text" name="letra" id="letra" maxlength="1">
    </label>
    <input type="submit" name="Partida_ProbarLetra" value="Prueba letra">
</form>