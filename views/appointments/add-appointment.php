<div class="container-fluid h-100"><!--CONTAINER START-->
    <div class="row h-100 align-items-center"><!--ROW START-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1"><!--COL START-->
            <div class="card"><!--CARD START-->
                <div class="card-body">
                    <h5 class="card-title text-center">Ajouter un Rendez-vous</h5>
                    <!--=======================FORM START===========================-->
                        <form method="POST" id="signUpForm" novalidate>
                            <div class="mt-1">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date"  required>
                                <small><?= $errors['date']  ?? '' ?></small>
                            </div>
                            <div class="form-group">
                                <label for="hour">Heure de rendez-vous:</label>
                                <input type="time" class="form-control"  id="hour" name="hour"  required/>
                                <small><?= $errors['hour']  ?? '' ?></small>
                            </div>
                            <div>
                                <label for="idPatients">Patient:</label>
                                <select class="form-control mb-4" name="idPatients" id="idPatients">
                                    <option selected disabled>Veuillez sélectionner un patient</option>
                                        <?php foreach ($patients as $patient) { ?>
                                            <option value="<?= $patient->id ?>"><?= $patient->lastname ?> <?= $patient->firstname ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                                <small><?= $errors['idPatients']  ?? '' ?></small>
                            </div>
                            <div class="col text-center mt-2">
                                <button type="submit" class="btn btn-primary text-light ">Ajouter</button>
                            </div>
                        </form>
                    <!--=======================FORM END===========================-->
                </div>                
            </div><!--CARD END-->
        </div><!--COL END-->
    </div><!--ROW END-->
</div><!--CONTAINER END-->