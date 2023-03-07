<div class="container-fluid">
    <div class="row">
        <h5 class="card-title text-center">Liste des rendez-vous</h5>
        <div class="col-sm-12">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Date et heure</th>
                        <th>Nom de famille</th>
                        <th>Prénom</th>
                        <th>Détails</th>
                        <th>Modification</th>
                        <th>Suppression</th>
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
                            <td><a href="../../controllers/appointmentCtrl.php?idAppointment=<?=$appointment->idAppointment ?>"><button type="button" class="btn btn-primary btn-sm">Détails rendez-vous</button></a></td>
                            <td><a href="../../controllers/upDateRdvCtrl.php?idAppointment=<?=$appointment->idAppointment ?>"><button type="button" class="btn btn-primary btn-sm">Modifier</button></a></td>
                            <td><a href="../../controllers/deleteRdvCtrl.php?idAppointment=<?=$appointment->idAppointment ?>"><button type="button" class="btn btn-primary btn-sm">Supprimer</button></a></td>
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