/**
 * Created by jordy on 31/08/18.
 */

/**
 * Affiche dans un modal le formulaire de modification d'un produit.
 * Le code HTML est récupérer via une requête AJAX.
 * @param id Identifiant d'un produit
 */
function callItemUpdateForm(id)
{
    var request = $.ajax(
        {
            url: '/admin/items/'+id+'/update',
            type: "GET",
            data: {id: id},
            dataType: "html"
        }
    );
    request.done( function (msg) {
        $('#itemUpdateForm').html(msg)
    })
}

/**
 * Lit les données depuis une URL.
 * @param input Une entrée de formulaire (<input type=file/>)
 * @param id L'identifiant de l'entrée
 */
function preview(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id)
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}