<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-1 col-md-10 col-lg-5">
            <div class="card"><!--CARD START-->
                <div class="card-body">
                    <h5 class="card-title text-center">Profil du patient</h5>
                    <p>Nom de Famille: <?= $profile->lastname ?></p>
                    <p>Prénom: <?= $profile->firstname ?></p>
                    <p>Date de naissance: <?= date('d.m.Y', strtotime($profile->birthdate)) ?></p>
                    <p>Téléphone: <?= $profile->phone ?></p>
                    <p>Email : <?= $profile->mail ?></p>
                </div>
            </div>
        </div>
    </div>
</div>