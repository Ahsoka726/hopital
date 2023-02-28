<?php
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../models/Appointment.php');

try {
    $appointments = true;
    //On ne controle que s'il y a des données envoyées 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
        /************************* ID *************************/
        //**** NETTOYAGE ****/
        $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_NO_ENCODE_QUOTES));
    
        //**** VERIFICATION ****/
        if (empty($id)) {
            $errors['id'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($id, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_DATE_HOUR . '/')));
            if (!$isOk) {
                $errors['id'] = 'Le date n\'est pas valide, le format attendu est JJ/MM/AAAA';
            }
        }
        /***********************************************************/
    
    
        /************************* DATEHOUR ***********************/
        //**** NETTOYAGE ****/
        $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    
        //**** VERIFICATION ****/
        if (empty($dateHour)) {
            $errors['dateHour'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($dateHour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_DATE_HOUR . '/')));
            if (!$isOk) {
                $errors['dateHour'] = 'Le prénom n\'est pas valide';
            }
        }
        /***********************************************************/
    
    
        /************************ IDPATIENTS ************************/
        //**** NETTOYAGE ****/
        $idPatients = trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_NO_ENCODE_QUOTES));
    
        //**** VERIFICATION ****/
        if (empty($idPatients)) {
            $errors['idPatients'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($idPatients, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_DATE . '/')));
            if (!$isOk) {
                $errors['idPatients'] = 'Merci de choisir un nom valide';
            }
        }if (empty($errors)) {
    
        //**** HYDRATATION ****/
        $appointment = new Appointment;
        $appointment->setId($id);
        $appointment->setDateHour($dateHour);
        $appointment->setIdPatients($idPatients);

        $response = $appointment->insert();

        if ($response) {
            $errors['global'] = 'Le rendez-vous a bien été ajouté';
        }
    }
    

}
}catch (\Throwable $th) {
    header('Location: /controllers/errorCtrl.php');
    die;
}


/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include_once(__DIR__ . '/../views/appointments/add-appointment.php');
include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/