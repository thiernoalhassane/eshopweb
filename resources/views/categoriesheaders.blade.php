
<div class="cat_menu_container">
    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
        <div class="cat_burger"><span></span><span></span><span></span></div>
        <div class="cat_menu_text">Les catégories</div>
    </div>

    <ul class="cat_menu">
        <!-- placer ici les resultats du webservice-->
        @foreach($nom as $nom)
            <li><a href="{{ url("/search?category={$nom->id}") }}">{!! $nom->description !!} <i class="fas fa-chevron-right"></i></a></li>
        @endforeach
    </ul>
</div>