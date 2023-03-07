<?php 
/***************************************************************************************/
require_once(__DIR__ . '/../models/Patient.php');
/***************************************************************************************/
/***************************************************************************************/
try {
    $idAppointment = intval(filter_input(INPUT_GET, 'idAppointment ', FILTER_SANITIZE_NUMBER_INT));
    // Appel à la méthode statique permettant de récupérer les patients
    $patients = Patient::getAll();
    /*************************************************************/
} catch (\Throwable $th) {
    header('Location: /controllers/errorCtrl.php');
    die;
}
/***************************************************************************************/
/* ************* AFFICHAGE DES VUES **************************/

    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/appointments/upDateRdv.php');
    include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/