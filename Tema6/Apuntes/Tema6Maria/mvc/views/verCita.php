
<?php   
    if(isAdmin()){?>
<p>Paciente: <?echo $paciente->descUsuario?></p>
<?}?>
<p>Especialista: <?echo $cita->especialista;?></p>
<p>Fecha: <?echo $cita->fecha;?></p>
<p>Motivo: <?echo $cita->motivo;?></p>
<p>Estado: <? if($cita->activo == 1)
                echo "Activa";
                else
                echo "Cancelada"?></p>

