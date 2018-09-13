/**
 * Created by jordy on 13/09/18.
 */

function addToBasket(item_id, csrf_token)
{
    $("#item_form").submit(function (event) {
        event.preventDefault() ;
    }) ;
    var quantity = $("#quantity_input").val() ;
    var stock = $("#item_stock").val() ;
    var unit_price = $("#unit_price").val() ;

    console.log("quantité: "+quantity);
    console.log("stock: "+stock);
    if(quantity > 0)
    {
        var request = $.ajax(
        {
            url: "/basket/create",
            dataType: "json",
            data: {
                item_id: item_id,
                item_quantity: quantity,
                item_price:unit_price,
                _token: csrf_token
            },
            type: "POST"
        }) ;
        request.done(function (response) {
            console.log(response) ;
            // Mise à jour de l'affichage
            $("#cart_count").text(response.total_item) ;
            $("#cart_price").text(response.item_total_price+" FCFA") ;
            alert("Produit ajouté au panier !") ;
        }) ;
    }
}