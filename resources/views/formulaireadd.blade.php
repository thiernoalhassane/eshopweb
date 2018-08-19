<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">OPENTRADE INSCRIPTION</div>
            <div class="panel-body">
                <form name="myform" action="" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="form-group">
                        <label for="myName">Nom * </label>
                        <input id="myName" name="myName" class="form-control" type="text" required>
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Prénom </label>
                        <input id="lastname" name="lastname" class="form-control" type="text">
                        <span id="error_lastname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Pseudo *</label>
                        <input id="pseudo" name="pseudo" class="form-control" type="text" required>
                        <span id="error_age" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input id="password" name="password" class="form-control" type="text" required>
                        <span id="error_lastname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        <span id="error_phone" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone *</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask='"mask": "(+999) 99-99-99-99"' data-mask required>
                        </div>
                        <span id="error_dob" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label> Sexe</label
                        <div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="M" value="M"
                                           checked>
                                    Masculin
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="M" value="M">
                                    Feminin
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Votre type </label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="Client" id="Client" checked>
                                    Client
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="Vendeur" id="Vendeur">
                                    Vendeur
                                </label>
                            </div>


                        </div>


                        <label>Moyen de paiement </label>
                        <div class="form-group">
                            <label for="flooz">Numéro Flooz</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                      <input type="checkbox" checked>
                                                    </span>
                                    <div class="input-group">

                                        <input type="text" class="form-control" data-inputmask='"mask": "(+999) 99-99-99-99"' data-mask required>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmoney">Numéro Tmoney</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                              <input type="checkbox">
                                                                            </span>
                                    <div class="input-group">

                                        <input type="text" class="form-control" data-inputmask='"mask": "(+999) 99-99-99-99"' data-mask required>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Votre Photo</label>
                            <input type="file" id="exampleInputFile">


                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>

                </form>

            </div>
        </div>
    </div>
</div>


