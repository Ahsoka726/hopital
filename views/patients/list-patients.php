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
                            <td>
                                <a href="/controllers/edit-patientCtrl.php?id=<?= htmlentities($patient->id) ?>"><i class="far fa-edit"></i></a>
                            </td>
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




