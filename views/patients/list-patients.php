<div class="container-fluid">
    <div class="row">
        <h5 class="card-title text-center">Liste des patients</h5>
        <div class="col-sm-12">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nom de Famille</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Détails</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($patients as $patient) {
                    ?>
                        <tr>
                            <td><?= htmlentities($patient->lastname) ?></td>
                            <td><?= htmlentities($patient->firstname) ?></td>
                            <td><?= htmlentities(date('d.m.Y', strtotime($patient->birthdate))) ?></td>
                            <td><?= htmlentities($patient->phone) ?></td>
                            <td><a href="mailto:<?= htmlentities($patient->mail) ?>"><?= htmlentities($patient->mail) ?></a></td>
                            <td><a href="../../controllers/profil-patientsCtrl.php?idPatient=<?=$patient->id ?>"><button type="button" class="btn btn-primary btn-sm">Profil Patient</button></a></td>
                            <td><a href="../../controllers/profil-patientsCtrl.php?idPatient=<?=$patient->id ?>"><button type="button" class="btn btn-primary btn-sm">Modifier</button></a></td>
                            <td><a href="../../controllers/deletePatientCtrl.php?idPatient=<?=$patient->id ?>"><button type="button" class="btn btn-primary btn-sm">Supprimer</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <a href="../controllers/add-patientCtrl.php"><button type="button" class="btn btn-primary">Ajouter un patient</button></a>
        </div>
    </div>
</div>




