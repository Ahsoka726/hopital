<div class="container-fluid">
    <div class="row justify-content-center">

        <?php if (isset($profile) && is_object($profile)) {
        ?>
        <div class="col-sm-1 col-md-10 col-lg-5">
            <div class="card"><!--CARD START-->
                <div class="card-body">
                    <h5 class="card-title text-center">Profil du patient</h5>
                    <p>Nom de Famille: <?= htmlentities($profile->lastname) ?></p>
                    <p>Prénom: <?= htmlentities($profile->firstname) ?></p>
                    <p>Date de naissance: <?= htmlentities(date('d.m.Y', strtotime($profile->birthdate))) ?></p>
                    <p>Téléphone: <?= htmlentities($profile->phone) ?></p>
                    <p>Email : <?= htmlentities($profile->mail) ?></p>
                    <p>Rendez-vous: <?= htmlentities($appointment->dateHour)?></p>
                    <?php
                    } else {
                    ?>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-12 text-center my-3">
                        <p>Une erreur s'est produite, veuillez contacter le service informatique.</p>
                    </div>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>