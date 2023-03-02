<?php

/***************************************************************************************/
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Patient.php');
/***************************************************************************************/
/***************************************************************************************/
$patients = Patient::getAll();
/***************************************************************************************/
try {
    $appointments = true;
    //On ne controle que s'il y a des données envoyées 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //**** NETTOYAGE DATE ****/
            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
            //**** NETTOYAGE HOUR****/
            $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS);
            //**** NETTOYAGE IDPATIENTS ****/
            $idPatients = filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT);

            $dateHour = $date.' '.$hour;
    
        /************************* DATE *************************/
        //**** VERIFICATION ****/
        if (empty($date)) {
            $errors['date'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_DATE . '/')));
            if (!$isOk) {
                $errors['date'] = 'Le date n\'est pas valide, le format attendu est JJ/MM/AAAA';
            }
        }
        /***********************************************************/

        /************************* HOUR *************************/
        //**** VERIFICATION ****/
        if (empty($hour)) {
            $errors['hour'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($hour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_HOUR . '/')));
            if (!$isOk) {
                $errors['hour'] = 'L\'heure n\'est pas valide';
            }
        }
        /***********************************************************/
        
        /************************ IDPATIENTS ************************/
        //**** VERIFICATION ****/
        if (empty($idPatients)) {
            $errors['idPatients'] = 'Le champ est obligatoire';
        }
        
        if (empty($errors)) {
    
        //**** HYDRATATION ****/
        $appointment = new Appointment;
        $appointment->setDateHour($dateHour);
        $appointment->setIdPatients($idPatients);
        $appointment->insert($idPatients);

        $messageOk = 'nouveau RDV enregistré.';
        
    }
}
}catch (\Throwable $th) {
    header('Location: /controllers/errorCtrl.php');
    die;
}
/***************************************************************************************/
/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/appointments/add-appointment.php');
include(__DIR__ . '/../views/templates/footer.php');
/*************************************************************/