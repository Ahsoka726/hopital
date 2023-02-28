<div class="container-fluid">
    <div class="row">
        <h5 class="card-title text-center">Liste des patients</h5>
        <div class="col-sm-12">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Date et heure</th>
                        <th>Nom de famille</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($appointments as $appointment) {
                    ?>
                        <tr>
                            <td><?= $appointment->dateHour ?></td>
                            <td><?= $appointment->lastname ?></td>
                            <td><?= $appointment->firstname ?></td>
                            <td><?= $appointment->birthdate ?></td>
                            <td>
                                <a href="/controllers/edit-patientCtrl.php?id=<?= htmlentities($patient->id) ?>"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <a href="../controllers/add-patientCtrl.php"><button type="button" class="btn btn-primary">Ajouter un rendez-vous</button></a>
        </div>
    </div>
</div>

