<?php
/***************************************************************************************/
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Patient.php');
/***************************************************************************************/
/***************************************************************************************/

$profile = Patient::itemizePatient();
$appointments = Appointment::getListrdv();

/***************************************************************************************/
/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/profile/profil-patients.php');
include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/