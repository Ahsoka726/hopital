<div class="container-fluid h-100"><!--CONTAINER START-->
    <div class="row h-100 align-items-center"><!--ROW START-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1"><!--COL START-->
            <div class="card"><!--CARD START-->
                <div class="card-body">
                    <h5 class="card-title text-center">Ajouter un patient</h5>
                    <!--=======================FORM START===========================-->
                        <form method="POST" id="signUpForm" novalidate>
                            <div>
                                <label for="lastname">Nom de Famille :</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" pattern="<?=REGEXP_LASTNAME?>" required>
                            </div>
                            <div class="mt-1">
                                <label for="firstname">Prenom :</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" pattern="<?=REGEXP_FIRSTNAME?>" required>
                            </div>
                            <div class="mt-1">
                                <label for="birthdate">Date de Naissance :</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                            </div>
                            <div class="mt-1">
                                <label for="phone">Votre téléphone :</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                             </div>
                             <div class="mt-1">
                                 <label for="mail">Votre email :</label>
                                 <input type="email" class="form-control" id="mail" name="mail" pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" required>
                             </div>
                             <div class="col text-center mt-2">
                                 <button type="submit" class="btn btn-primary text-light " >Ajouter</button>
                            </div>
                        </form>
                    <!--=======================FORM END===========================-->
                </div>                
            </div><!--CARD END-->
        </div><!--COL END-->
    </div><!--ROW END-->
</div><!--CONTAINER END-->