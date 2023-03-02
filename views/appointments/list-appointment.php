<div class="container-fluid">
    <div class="row justify-content-center mx-auto">
        <h5 class="card-title text-center">Liste des rendez-vous</h5>
        <div class="col-sm-10">
            <table class="table table-dark table-hover table-responsive ">
                <thead>
                    <tr>
                        <th>Date et heure</th>
                        <th>Nom de famille</th>
                        <th>Prénom</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($appointments as $appointment) {
                    ?>
                        <tr id="<?= $appointment->idAppointment?>">
                            <td><?= htmlentities(date('d.m.Y à H:i', strtotime($appointment->dateHour))) ?></td>
                            <td><?= htmlentities($appointment->lastname) ?></td>
                            <td><?= htmlentities($appointment->firstname) ?></td>
                            <td><a href="../../controllers/profil-patientsCtrl.php?idRdv=<?=$appointment->idAppointment ?>"><button type="button" class="btn btn-primary btn-sm">Profil Patient</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-10">
            <a href="../../controllers/add-appointmentCtrl.php"><button type="button" class="btn btn-primary">Ajouter un rendez-vous</button></a>
        </div>
    </div>
</div>