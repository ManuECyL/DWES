

<h1>Pedir Cita</h1>
<form action="" method="post">
    
    <label for="especialista">Especialista:
        <input type="text" name="especialista" id="especialista">
    </label>
    <p class="error">
        <?php 
        if(isset($errores))
            errores($errores, 'especialista'); ?>
    <p>
    <br>
    <label for="fecha">Pass:
        <input type="date" name="fecha" id="fecha">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'fecha'); ?>
    <p>
    <br>
    <label for="motivo"> Motivo:
        <textarea name="motivo" id="motivo"></textarea>
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'motivo'); ?>
    <p>
    <br>
    <?php 
        if(isset($errores)){           
            errores($errores, 'insertar');            
        }?>
    
    <input type="submit" name="Cita_GuardaCita" value="Solicitar"  >
    </form>