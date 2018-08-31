/**
 * Created by jordy on 31/08/18.
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