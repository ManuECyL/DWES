<?php
    include("./validaciones.php");

    require('../../../fpdf186/fpdf.php');
    require('./HeaderC.php');

    $contadorFactura = 0;

    // Crear objeto PDF usando la clase de Header que extiende de FPDF
    $pdf = new HeaderC;

    // Añadir una página
    $pdf -> AddPage();

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
        array("Cazadora Nike",1,80),
        array("Pantalon Adidas",2,75),
        array("Sudadera Supreme",1,250),
        array("Camiseta Nike",4,35),
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
    creaFactura($productos,$pdf);
    
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
    function creaFactura($productos,$pdf) {

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
        

        // Resto de celdas recorriendo el array
        foreach ($productos as $producto) {
            $pdf -> SetX(5);
            
            foreach ($producto as $datos) {
                $pdf -> Cell(40,10,$datos,1,0,'C', false);
            }

            // Salto de línea
            $pdf -> Ln();
        }
    }
?>