<?php
/***************************************************************************************/
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Patient.php');
/***************************************************************************************/
/***************************************************************************************/
$idPatient = abs(intval(filter_input(INPUT_GET, 'idPatient', FILTER_SANITIZE_NUMBER_INT)));
$profile = Patient::getPatient($idPatient);

/***************************************************************************************/
/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/profile/profil-patients.php');
include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/