<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">OPENTRADE INSCRIPTION</div>
            <div class="panel-body">
                <form action="{{ url('/inscription') }}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="form-group">
                        <label for="name">Nom * </label>
                        <input id="name" name="name" class="form-control" type="text" value="{{ old('name') }}"
                               required>
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="surname">Prénom * </label>
                        <input id="surname" name="surname" class="form-control" type="text"
                               value="{{ old('surname') }}">
                        <span id="error_lastname" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input id="password" name="password" class="form-control" type="text" required>
                        <span id="error_lastname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                               required>
                        <span id="error_phone" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone *</label>
                        <div class="input-group">

                            <input type="text" id="phone" name="phone" class="form-control"
                                   data-inputmask='"mask": "+999 99-99-99-99"' data-mask value="{{ old('phone') }}"
                                   required>
                        </div>
                        <span id="error_dob" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse *</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}"
                               required>
                        <span id="error_phone" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label> Sexe</label
                        <div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="M" value="M"
                                           checked>
                                    Masculin
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="F" value="F">
                                    Feminin
                                </label>
                            </div>
                        </div>


                        <label>Moyen de paiement </label>
                        <div class="form-group">
                            <label for="flooz">Numéro Flooz</label>
                            <div class="col-lg-6">
                                <div class="input-group">

                                    <div class="input-group">

                                        <input type="text" id="flooz" name="flooz" class="form-control"
                                               data-inputmask='"mask": "+999 99-99-99-99"' data-mask>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmoney">Numéro Tmoney</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group">

                                        <input type="text" id="tmoney" name="tmoney" class="form-control"
                                               data-inputmask='"mask": "+999 99-99-99-99"' data-mask>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profil">Votre Photo</label>
                            <input type="file" name="profil" id="profil">


                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>

                </form>

            </div>
        </div>
    </div>
</div>


