<div class="container-fluid h-100"><!--CONTAINER START-->
    <div class="row h-100 align-items-center"><!--ROW START-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1"><!--COL START-->
            <div class="card"><!--CARD START-->
                <div class="card-body">
                    <h5 class="card-title text-center">Ajouter un Rendez-vous</h5>
                    <!--=======================FORM START===========================-->
                        <form method="POST" id="signUpForm" novalidate>
                            <div class="mt-1">
                                <label for="dateHour">Date:</label>
                                <input type="date" class="form-control" id="dateHour" name="dateHour" <?=REGEXP_DATE?> required>
                            </div>
                            <div class="form-group">
                                <label for="dateHour">Heure de rendez-vous:</label>
                                <input type="text" class="form-control"  id="dateHour" name="dateHour" placeholder="8:00" <?=REGEXP_DATE_HOUR?> required/>
                            </div>
                            <div>
                                <label for="idPatients">Patient:</label>
                                <input type="text" class="form-control" id="idPatients" name="idPatients" pattern="<?=REGEXP_LASTNAME?>" required>
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