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

/**
 * Supprimer un produit du panier temporaire avec une requête asynchrone.
 * @param item_id L'identifiant du produit dans le panier.
 * @param csrf_token Jetton csrf
 */
function deleteOneInBasket(item_id, csrf_token)
{
    var request = $.ajax(
        {
            url: "/baskets/item/"+item_id,
            dataType: "json",
            data: {
                _token: csrf_token
            },
            type: "DELETE"
        }) ;
    request.done(function (response) {
        console.log(response) ;

        // Mise à jour de l'affichage
        $("#order_total_amount").text(response.item_total_price+" FCFA") ;
        $("#cart_count").text(response.total_item) ;
        $("#cart_price").text(response.item_total_price+" FCFA") ;
        $(".cart_list #"+item_id).fadeOut("slow");

        // Nettoyage

        if(response.total_item == 0)
        {
            $("#cart_container").html('<div class="text-center text-muted fa-2x">Votre panier est vide</div>') ;
        }
    }) ;
}

function saveBasket()
{
    var request = $.ajax({
        url:'/basket/save',
        dataType:'text',
        type:'GET',
        statusCode:{
            401: function (_this) {
                alert(_this.responseText) ;
                console.log(msg);
            },
            500: function (_this) {
                alert(_this.responseText) ;
                console.log(msg);
            }
        }
    }).done(function (msg) {
        console.log(msg);
        alert(msg) ;
    }) ;
}