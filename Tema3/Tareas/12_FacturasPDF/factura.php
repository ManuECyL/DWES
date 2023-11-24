<?php
    include("./validaciones.php");

    require('../../../fpdf186/fpdf.php');
    require('./HeaderC.php');

    $contadorFactura = 0;

    // Crear objeto PDF usando la clase de Header que extiende de FPDF
    $pdf = new HeaderC;
    
    // Añadir una página
    $pdf -> AddPage();

    // $text = "€";
    $euro = iconv('UTF-8', 'windows-1252', '€');

    // Array de clientes para insertar en una tabla
    $clientes = array(
        array("Mario Alvarez","71048321B","Vaguada, 3","49018 Zamora","Zamora, Espana")
    );

    // Llamar a la función creaCliente
    creaCliente($clientes,$pdf);

    // Grosor de las líneas
    $pdf -> SetLineWidth(1);

    // Crear una líneas verticales Cliente
    $pdf -> Line(110, 10, 110, 55);
    $pdf -> Line(205, 10, 205, 55);

    // Crear una líneas horizontales Cliente
    $pdf -> Line(110, 10, 205, 10);
    $pdf -> Line(110, 55, 205, 55);


    // Array con los Productos
    $productos = array(
        array("Cazadora Nike",2,80,21),
        array("Pantalon Adidas",3,75,10),
        array("Sudadera Supreme",1,250,21),
        array("Camiseta Nike",4,35,4),
    );


      // Crear una líneas verticales identificadorFactura
      $pdf -> Line(5, 65, 5, 95);
      $pdf -> Line(95, 65, 95, 95);
  
      // Crear una líneas horizontales identificadorFactura
      $pdf -> Line(5, 65, 95, 65);
      $pdf -> Line(5, 95, 95, 95);


    // Grosor de las líneas tabla productos
    $pdf -> SetLineWidth(0);

    // Llamar a la función identificadorFactura
    identificadorFactura($contadorFactura, $pdf);

    // Llamar a la función creaFactura
    creaFactura($productos, $pdf, $euro);
    
    // Ver Código del fichero actual
    $verCodigo = "http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'];
    $pdf -> SetFont("Courier", "B", 12);
    $pdf -> SetY(220);
    $pdf -> Cell(0,10,"Ver codigo PHP",0,1,'C',false,$verCodigo);   

    // Guardar el fichero pdf
    $pdf -> Output();

    
    // Función para insertar datos del array clientes en una tabla dentro del PDF
    function creaCliente($clientes, $pdf) {
        
        $pdf -> SetY(14);
        $pdf -> SetX(120);

        // Datos de la tabla Clientes
        $pdf -> SetFont("Courier", "B", 15);
        $pdf -> Cell(80,6,'Cliente',1,2,'C', false);

        $pdf -> SetY(22);
        $pdf -> SetX(121);
        $pdf -> SetFont("Courier", "B", 10);
        $pdf -> Cell(18,6,'Nombre:',0,2,'L', false);
        $pdf -> Cell(18,6,'CIF/NIF:',0,2,'L', false);
        $pdf -> Cell(18,6,'Calle:',0,2,'L', false);
        $pdf -> Cell(18,6,'CP:',0,2,'L', false);
        $pdf -> Cell(18,6,'Ciudad:',0,0,'L', false);

        $pdf -> SetY(22);
        $pdf -> SetX(140);
        

        $pdf -> SetFont("Courier", "", 10);
        // Resto de celdas recorriendo el array
        foreach ($clientes as $cliente) {

            foreach ($cliente as $datos) {
                $pdf -> Cell(60,6,$datos,0,2,'L', false);                
            }
        }
    }


    // Función para mostrar fecha y id de la factura
    function identificadorFactura($contadorFactura, $pdf) {

        // Fecha de hoy con formato d/m/Y
        $fecha = date("d/m/Y", strtotime("now"));
        
        // Obtener solo el año necesario para el id
        $año = date("Y", strtotime("now"));
        
        $contadorFactura ++;

        // Añadir tres ceros delante del id
        $idFactura = str_pad($contadorFactura, 4, '0', STR_PAD_LEFT);

        $pdf -> SetY(70);
        $pdf -> SetX(10);

        // Celda Factura
        $pdf -> SetFont("Courier", "B", 15);
        $pdf -> Cell(80,6,'FACTURA',1,2,'C', false);

        // Escribir fecha y id de la factura
        $pdf -> SetY(78);
        $pdf -> SetFont("Courier", "B", 10);
        $pdf -> Cell(18,6,'Numero de factura:',0,2,'L', false);
        $pdf -> Cell(18,6,'Fecha de factura:',0,0,'L', false);

        $pdf -> SetY(78);
        $pdf -> SetX(50);
        $pdf -> SetFont("Courier", "", 10);
        $pdf -> Cell(18,6,$año . "-". $idFactura,0,2,'L', false);
        $pdf -> Cell(18,6,$fecha,0,0,'L', false);
    }


    // Función para insertar datos del array productos la factura
    function creaFactura($productos,$pdf, $euro) {

        // Posición de la tabla
        $pdf -> SetY(110);
        $pdf -> SetX(5);

        $pdf -> SetFont("Courier", "B", 12);
        // Primeras 4 celdas superiores
        $pdf -> Cell(40,10,'Producto',1,0,'C', false);
        $pdf -> Cell(40,10,'Cantidad',1,0,'C', false);
        $pdf -> Cell(40,10,'Precio Ud.',1,0,'C', false);
        $pdf -> Cell(40,10,'Importe',1,0,'C', false);
        $pdf -> Cell(40,10,'IVA',1,0,'C', false);

        // Salto de línea
        $pdf -> Ln();

        $pdf -> SetFont("Courier", "", 10);

        // Variables para guardar el valor total del Importe y del IVA
        $totalBaseImponible = 0;
        $totalIVA = 0;        

        // Resto de celdas recorriendo el array
        foreach ($productos as $producto) {

            $pdf -> SetX(5);

            // Obtener última posición/índice del array Producto, es decir, la posición del IVA
            $ultimaPosicion = count($producto) - 1;

            // Posicion de los precios.Ud
            $precio = $producto[$ultimaPosicion - 1];

            // Añadir símbolo del € al precio.Ud
            $producto[$ultimaPosicion - 1] = $precio;
            
            // Obtener el importe de cada producto multiplicando la cantidad por el precio ud.
            $importe = ($producto[1] * $producto[2]);
            
            // Obtener el porcentaje de IVA del array
            $porcentajeIVA = $producto[$ultimaPosicion];

            // Calcular el IVA a pagar de cada producto
            $precioIVA = calcularIVA($importe, $porcentajeIVA);

            // Añadir el importe al array de cada producto antes del IVA
                // array_splice($producto, $ultimaPosicion, 0, $importe); // 0 son los elementos a eliminar desde el índice especificado
            $producto[$ultimaPosicion] = $importe;

            // Añadir el IVA ya calculado al array de cada producto
            $producto[$ultimaPosicion + 1] = formatearNumero($precioIVA). $euro . ' ('.$porcentajeIVA.'%)';

            // Sumamos cada Importe y cada IVA con el anterior
            $totalBaseImponible += $importe;
            $totalIVA += $precioIVA;

            
            foreach ($producto as $indice => $datos) {
                // Agregar el símbolo € después de los valores numéricos
                $datos = (($indice !== 0) && ($indice !== 1) && ($indice !== $ultimaPosicion + 1)) ? formatearNumero($datos) . $euro : $datos;

                // Insertar los datos en la tabla
                $pdf -> Cell(40,10,$datos,1,0,'C', false);                
            }           

            // Salto de línea
            $pdf -> Ln();
        }

        // Variable que calcula la suma de todos los Importes + la suma de todos los IVAs
        $totalFactura = $totalBaseImponible + $totalIVA;

        // Texto Total Base Imponible, Total IVA y TOTAL 
        $pdf -> SetY(170);
        $pdf -> SetX(120);

        $pdf -> SetFont("Courier", "B", 11);
        $pdf -> Cell(85,8,'Total Base Imponible:',1,2,'L', false);
        $pdf -> Cell(85,8,'Total IVA:',1,2,'L', false);

        $pdf -> SetFont("Courier", "B", 15);
        $pdf -> Cell(85,15,'TOTAL:',1,0,'L', false);

        // Datos Total Base Imponible, Total IVA y TOTAL
        $pdf -> SetY(170);
        $pdf -> SetX(180);

        $pdf -> SetFont("Courier", "", 11);

        $pdf -> Cell(18,8,formatearNumero($totalBaseImponible) . $euro,0,2,'L', false);
        $pdf -> Cell(18,8,formatearNumero($totalIVA) . $euro,0,2,'L', false);

        $pdf -> SetFont("Courier", "B", 15);
        $pdf -> Cell(18,15,formatearNumero($totalFactura) . $euro,0,2,'L', false);

        // Grosor de las línea
        $pdf -> SetLineWidth(1);

        // Crea una línea horizontal debajo del TOTAL
        $pdf -> Line(5, 205, 205, 205);
    }


    // Calcula el IVA de un precio
    function calcularIVA($precio, $IVA) {

        $resultado = (($precio * $IVA) / 100);

        return $resultado;
    }

    // Funcion para mostrar un numero con 2 decimales
    function formatearNumero($numero) {
        
        $numeroFormateado = number_format($numero, 2, ',', '');

        return $numeroFormateado;
    }
?>