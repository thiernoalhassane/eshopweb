<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OpenTrade</a></div>
                    </div>
                    <div class="footer_phone">numéro de téléphone</div>
                    <div class="footer_contact_text">
                        <p>Lieu de travail</p>

                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">

                    <div class="footer_title">Les Catégories</div>
                    <ul class="footer_list">
                        @foreach($footer as $nom)
                            <li><a href="{{ url("/search?category={$nom->id}") }}">{!! $nom->description !!}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>


            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title"> Nos Partenaires</div>
                    <ul class="footer_list">
                        <!-- Listes des gros vendeurs du sites et si possible leurs sites -->
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Désinger Par <i class="fa fa-heart" aria-hidden="true"></i>  BARRY Thierno Alhassane</a>

                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <!--mettre le logo de nos moyens de paiements -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>