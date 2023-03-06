<?php
/***************************************************************************************/
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Patient.php');
/***************************************************************************************/
/***************************************************************************************/
$idAppointment = abs(intval(filter_input(INPUT_GET, 'idAppointment')));
$appointment = Appointment::getAppointment($idAppointment);

var_dump($appointment);
die;
/***************************************************************************************/
/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/appointments/appointment.php');
include(__DIR__ . '/../views/templates/footer.php');

/*************************************************************/