<?php
    /***************************************************************************************/
    require_once(__DIR__ . '/../models/Patient.php');
    /***************************************************************************************/
    try {
        $idPatient = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        // Appel à la méthode statique permettant de supprimer un patient.
        $isDeleted = Patient::delete($idPatient);
        var_dump($isDeleted);
        die;

        header('location: /controllers/list-patientCtrl.php');
        die;
        /*************************************************************/
       
    } catch (\Throwable $th) {
        var_dump($th);
        die;
        // header('Location: /controllers/errorCtrl.php');
        // die;
    }




    /***************************************************************************************/
