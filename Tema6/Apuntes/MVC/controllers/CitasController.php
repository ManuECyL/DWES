<?php

    if (isset($_REQUEST['Cita_Pedir'])) {
        $_SESSION['vista'] = VIEW . 'pedirCita.php';
    
    } elseif (isset($_REQUEST['Cita_GuardaCita'])) {
        
        $errores = array();

        if (validaFormularioNuevaCita($errores)) {
            // Insertar
            $cita = new Cita(null, $_REQUEST['especialista'], $_REQUEST['motivo'], $_REQUEST['fecha'], true, $_SESSION['usuario'] -> codUsuario);
            
            if (!CitaDAO::insert($cita)) {
                $errores['insertar'] = "No se ha podido generar su cita";

            } else {
                $sms = "Cita registrada con éxito";
                $array_citas = CitaDAO::findByPaciente($_SESSION['usuario']);
                $_SESSION['vista'] = VIEW . 'verCitas.php';
            }
            
        }
    
    } elseif (isset($_REQUEST['Cita_Ver_Anterior'])) {
        $array_citas = CitaDAO::findByPacienteH($_SESSION['usuario']);


    } elseif (isset($_REQUEST['Cita_VerCitasTodas'])) {
        $array_citas = CitaDAO::findAll();


    } elseif (isset($_REQUEST['Cita_Ver'])) {
        $cita = CitaDAO::findById($_REQUEST['id']);

        if (isAdmin()) {
            $paciente = UserDAO::findById($cita -> paciente);
        }

        $_SESSION['vista'] = VIEW . 'verCita.php';
    
    } else {
        $array_citas = CitaDAO::findByPaciente($_SESSION['usuario']);
        $_SESSION['vista'] = VIEW . 'verCitas.php';
    }

?>

