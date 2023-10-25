<?php

// Array Numerico
    $arrayNum = array(10);
    print_r($arrayNum);

    echo "<br><br>";

    $array = array("Lunes", "Martes", "Miércoles");
    print_r($array);

    echo "<br><br>";

    $array = array("Lunes", 2, "Miércoles");
    var_dump($array);

    echo "<br><br>";

// Otras formas
    $arrayCorta = ["Lunes", 2];
    var_dump($arrayCorta);

    echo "<br><br>";

    $semana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes");
    print_r($semana);

    echo "<br>";

    for ($i = 0; $i < count($semana) ; $i++) { 
        echo "<br>" . $semana[$i];
    }

    echo "<br>";

// Array Dinámico -> Modifica su tamaño/contenido
    $semana[5] = "Sábado";

    for ($i = 0; $i < count($semana) ; $i++) { 
        echo "<br>" . $semana[$i];
    }

    echo "<br>";

    $semana[7] = "Fiesta";

    for ($i = 0; $i < count($semana) ; $i++) { 
        echo "<br>" . $semana[$i];
    }

    echo "<pre>";
    var_dump($semana);
    echo "</pre>";

    foreach ($semana as $key => $value) {
        echo "<br>" . $semana[$key];
        // echo "<br>" . $value; -> Es lo mismo que la forma anterior, pero más corto y rápido
    }

    echo "<br><br>";

    print_r(array_keys($semana));

    echo "<br>";
    
// Arrays Asociativos ->  Arrays con clave valor
    $notas = array("Smail" => 10, "Mario" => 9, "Manuel" => "Sobresaliente");

    foreach ($notas as $key => $value) {
        echo "<br> La nota de $key (clave) es: $value (valor)";
    }

    echo "<br>";

// Arrays Múltiples (Matrices) -> Pueden ser númericos, asociativos o mezclados
    $arrayDAW = array("PROG"=>"Programación", "DWES"=>"Desarollo Web Servidor"); // Array Asociativo cuya clave sea las siglas y el valor el string
    $arrayDAM = array("LM"=>"Lenguaje de Marcas", "PSP"=>"Programación de Servicios y Procesos");
    $arrayASIR = array("SO"=>"Sistemas Operativos", "SAD"=>"Seguridad");

    $ciclos = array("DAW" => $arrayDAW, "DAM" => $arrayDAM, "ASIR" => $arrayASIR); // Array Asociativo

    // Hecho de otra forma
        // $ciclos = array("DAW" => array("PROG"=>"Programación", "DWES"=>"Desarollo Web Servidor"), 
        //                 "DAM" => array("LM"=>"Lenguaje de Marcas", "PSP"=>"Programación de Servicios y Procesos"), 
        //                 "ASIR" => array("SO"=>"Sistemas Operativos", "SAD"=>"Seguridad")); 

        // echo "<pre>";
        // print_r($ciclos);
        // echo "</pre>";

    // Recorrerlo
    foreach ($ciclos as $key => $value) {
        echo "<br> El ciclo $key tiene las asignaturas: ";

        foreach ($value as $siglas => $nombreA) {
            echo "<br>- $siglas : $nombreA";
        }

        echo "<br>";
    }

    // Recorrerlo con funciones
        
        echo "<pre>";
        // Reset -> Ir al primero
        reset($ciclos);
        // Current -> Mostrar el valor actual, si está vacío devolverá false 
        while (current($ciclos)) {
            // print_r(current($ciclos));
            echo "<br> El ciclo " . key($ciclos) . " tiene las asignaturas: "; // Key -> Devuelve el elemento índice de la posición actual
            $ciclo = current($ciclos);
            while (current($ciclo)) {
                echo "<br>- " . key($ciclo) . ": " . current($ciclo);
                next($ciclo);    
            }
            echo "<br>";
            // Next -> Ir al siguiente valor
            next($ciclos);
        }
        echo "</pre>";






    // EXPLICACIÓN EJERCICIO 3 TAREA 05
        /* 
                    1  1
            array[i][j] = array[i - 1][j] + array[i][j - 1];
        
        */

        $tabla = array();

        for ($i = 1; $i <= 10; $i++) { 
            $tabla[$i] = array();

            for ($j = 1; $j <= 10; $j++) { 
                $tabla[$i][$j] = $i * $j;
            }
        }

        print_r($tabla);

    ?>

    <table border = ""1>
        <thead>
            <?php
                echo "<th>Tabla</th>";

                // Valores fila superior
                foreach ($tabla as $key => $value) {
                    echo "<th>$key</th>";
                }
            ?>
        </thead>

        <tbody>
            <?php
                // Valores 1ª columna
                foreach ($tabla as $key => $value) {
                    echo "<tr>";
                        echo "<td>$key</td>";

                        // Recorrer el value
                        foreach ($value as $resultado) {
                            echo "<td>$resultado</td>";
                        }

                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
           