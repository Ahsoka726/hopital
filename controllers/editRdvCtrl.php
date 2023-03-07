<?php
/***************************************************************************************/
require_once(__DIR__ . '/../models/Appointment.php');
/***************************************************************************************/
/***************************************************************************************/
try {
        /********************************* NETTOYAGE ******************************************************/
        $idAppointment = abs(intval(filter_input(INPUT_GET, 'idAppointment', FILTER_SANITIZE_NUMBER_INT)));
        /**************************************************************************************************/
        $appointments = Appointment::updateRdv($idAppointment);
        if (!$appointments) {
            throw new Exception ('Le rendez-vous n\'existe pas');
        }

    } catch (\Throwable $th) {
        header('Location: /controllers/errorCtrl.php');
        die;
    }
/***************************************************************************************/ 
    
/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/appointments/editRdv.php');
include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/