<?php
        
    if (file_exists('juegos.xml')) {
        $xml = simplexml_load_file('juegos.xml');
        
?>
        <table border="1">
            <thead>
                <?php
                    
                    $filaSuperior = array("JUEGO", "ID", "DISPONIBILIDAD", "DISPOSITIVOS");
                
                    // Valores fila superior
                    foreach ($filaSuperior as $clave => $value) {
                        echo "<th>$value</th>";
                    }
                ?>
            </thead>
            
            <tbody>
                <?php                                               
    
                        // Rellenar las celdas
                        foreach ($xml as $elemento) {

                            echo "<tr style = text-align:center>";
                                echo "<td>" . $elemento->nombre . "</td>"; // Obtiene el hijo 'nombre' de 'juego'
                                echo "<td>" . $elemento['id'] . "</td>"; // Obtiene el atributo 'id'
                                echo "<td>" . $elemento['disponible'] . "</td>"; // Obtiene el atributo 'disponible'
                                echo "<td>";
                                    echo "<ul style=margin:5px>";

                                    foreach ($elemento as $hijos => $nombre) {

                                        foreach ($nombre as $dispositivos) {
                                            echo "<li>" . $dispositivos . "</li>"; // Muestra todos los dispositivos del juego
                                        }
                                    }

                                    echo "</ul>";
                                echo "</td>";
        
                            echo "</tr>";
                        }



                    // echo "</tr>";
                    
                            
                        
                ?>
            </tbody>
        </table>
<?php                                       
                                    
    } else {
?>
    <span class="error">El fichero no existe</span>
<?php
    }
?>
