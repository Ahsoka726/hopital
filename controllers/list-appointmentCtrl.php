<?php
require_once(__DIR__ . '/../models/Appoitment.php');

try {
    // Appel à la méthode statique permettant de récupérer les patients
    $appointments = Appointment :: getAll();
    /*************************************************************/
} catch (\Throwable $th) {
    header('Location: /controllers/errorCtrl.php');
    die;
}


/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/appointments/list-appointment.php');
include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/
