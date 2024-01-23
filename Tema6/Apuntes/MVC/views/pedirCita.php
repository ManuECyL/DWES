<h1>Pedir Cita</h1>

<form action="" method="post">
    
    <br>

    <label for="especialista"> Especialista:
        <input type="text" name="especialista" id="especialista">
    </label>

    <span class="error">
        <?php            
            if (isset($errores)) {
                errores($errores,'especialista');
            }   
        ?>
    </span>

    <br><br>

    <label for="fecha"> Fecha: 
        <input type="date" name="fecha" id="fecha">
    </label>
    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'fecha');
            }            
        ?>
    </span>

    <br><br>

    <label for="motivo"> Motivo: 
        <textarea name="motivo" id="motivo"></textarea>
    </label>
    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'motivo');
            }            
        ?>
    </span>

    <br><br>

    <span class="error">
        <?php
            if (isset($errores)) {
                errores($errores,'insertar');
                echo "<br>";
            }            
        ?>

    </span>


    <input type="submit" name="Cita_GuardaCita" value="Solicitar">

</form>