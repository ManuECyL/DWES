<?php

if (!isAdmin()) {

    ?>
    <form action="" method="post">
        <input type="submit" name="Juego_IniciarPartida" value="Inicar partida aleatoria">
    </form>
    <form action="" method="post">
        <label for="min">Minimo de letras
            <input type="number" name="min" id="min">
        </label>
        <input type="submit" name="Juego_IniciarPartidaMin" value="Inicar partida aleatoria">
    </form>
    <?php
    if (isset($sms))
        echo $sms;
    if (isset($estadisticas)) {
        ?>
        <table>

            <thead>
                <th>Id</th>
                <th>Id Palabra</th>
                <th>Resultado</th>
                <th>Intentos</th>
                <th>Fecha</th>
            </thead>

            <tbody>

                <?php
                foreach ($estadisticas as $estad) {
                    echo '<tr>';
                    echo '<td>' . $estad['id_estadistica'] . '</td>';
                    echo '<td>' . $estad['id_palabra'] . '</td>';
                    echo '<td>' . $estad['resultado'] . '</td>';
                    echo '<td>' . $estad['intentos'] . '</td>';
                    echo '<td>' . $estad['fecha'] . '</td>';
                    echo '</tr>';
                }

                ?>

            </tbody>
        </table>
        <?php
    }
} else {
    if (isset($estadisticas)) {
        ?>
        <table>

            <thead>
                <th>Id</th>
                <th>Id Usuario</th>
                <th>Id Palabra</th>
                <th>Resultado</th>
                <th>Intentos</th>
                <th>Fecha</th>
            </thead>

            <tbody>

                <?php
                foreach ($estadisticas as $estad) {
                    echo '<tr>';
                    echo '<td>' . $estad['id_estadistica'] . '</td>';
                    echo '<td>' . $estad['id_usuario'] . '</td>';
                    echo '<td>' . $estad['id_palabra'] . '</td>';
                    echo '<td>' . $estad['resultado'] . '</td>';
                    echo '<td>' . $estad['intentos'] . '</td>';
                    echo '<td>' . $estad['fecha'] . '</td>';
                    echo '</tr>';
                }

                ?>

            </tbody>
        </table>
        <?php
    }
}

?>