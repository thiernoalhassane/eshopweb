


<div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">OPENTRADE INSCRIPTION</div>
                <div class="panel-body">
                    <form name="myform" action="" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



                        <div class="form-group">
                            <label for="myName">Nom </label>
                            <input id="myName" name="myName" class="form-control" type="text" required>
                            <span id="error_name" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Prénom </label>
                            <input id="lastname" name="lastname" class="form-control" type="text">
                            <span id="error_lastname" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="pseudo">Pseudo </label>
                            <input id="pseudo" name="pseudo"  class="form-control" type="text"  required >
                            <span id="error_age" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de Passe</label>
                            <input id="password" name="password"  class="form-control" type="text"  required >
                            <span id="error_lastname" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <span id="error_phone" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="tel" name="tel" id="tel" class="form-control" required>
                            <span id="error_dob" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label> Sexe</label
                            </br>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                              Masculin
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                Feminin
                                            </label>
                                          </div>

                                        </div>



                        <div class="form-group">
                            <label for="flooz">Numéro Flooz</label>
                            <input type="flooz" name="flooz" id="flooz" class="form-control">
                            <span id="error_dob" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="tmoney">Numéro Tmoney</label>
                            <input type="tmoney" name="tmoney" id="tmoney" class="form-control">
                            <span id="error_dob" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                                          <label for="exampleInputFile">Votre Photo</label>
                                          <input type="file"  id="exampleInputFile">


                                        </div>




                        <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


