<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-1 col-md-10 col-lg-5">
            <div class="card"><!--CARD START-->
                <div class="card-body">
                    <h5 class="card-title text-center">Détails des Rendez-vous</h5>
                    <p>Nom de Famille: <?= $appointment->lastname ?></p>
                    <p>Prénom: <?= $appointment->firstname ?></p>
                    <p>Rendez-vous : <?= $appointment->dateHour ?></p>
                </div>
            </div>
        </div>
    </div>
</div>