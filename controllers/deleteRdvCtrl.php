<?php 
/***************************************************************************************/
require_once(__DIR__ . '/../models/Appointment.php');
/***************************************************************************************/
/***************************************************************************************/
try {
    $idAppointment = intval(filter_input(INPUT_GET, 'idAppointment', FILTER_SANITIZE_NUMBER_INT));
    // Appel à la méthode statique permettant de supprimer le rendez-vous.
    $isDeleted = Appointment::deleteAppointment($idAppointment);
    
    header('location: /controllers/list-appointmentCtrl.php');
    die;
    /*************************************************************/
   
} catch (\Throwable $th) {
    var_dump($th);
    die;
    // header('Location: /controllers/errorCtrl.php');
    // die;
}
/***************************************************************************************/
