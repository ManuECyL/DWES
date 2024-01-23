<?php
    if (isAdmin()) {
?>
        <p>Paciente: <?php echo $paciente -> descUsuario ?></p>
        <p>Especialista: <?php echo $cita -> especialista ?></p>
        <p>Fecha: <?php echo $cita -> fecha ?></p>
        <p>Motivo: <?php echo $cita -> motivo ?></p>
        <p>Estado: 
<?php
            if ($cita -> activo == 1) {
                echo "Activo";
            
            } else {
                echo "Cancelada";
            }
?>
        </p>
<?php
    }

?>