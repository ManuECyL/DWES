<?php
 
    if (function_exists('enviado')) {

        function mostrarTodo() {
            // NOMBRE
            echo "<strong>Nombre:</strong> " .$_REQUEST['nombre'];
    
            // EXPEDIENTE
            echo "<br><strong>Expediente:</strong> " .$_REQUEST['expediente'];
    
            // SELECT
            echo "<br><strong>Curso:</strong> " . $_REQUEST['cursos'];
    
            // CHECKBOX
            echo "<br>";
            echo "<br><strong>Asignaturas:</strong> ";
    
            foreach ($_REQUEST["asignaturas"] as $clave => $asignatura) {
                echo "<br>- " . $asignatura;
            }
        }
    } 
    mostrarTodo();
?>