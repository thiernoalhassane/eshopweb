<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 31/08/18
 * Time: 07:35
 */
    $items = \App\Utils\Net\RestRequest::getInstance()->getItemsByUserId("5b809c6d6f9db627c638e57c") ;
    $nbre_items = count($items) ;
    $item = null ;
    for($i=0; $i<$nbre_items/2; $i++)
    {
        if($items[$i]["id"] == $id)
        {
            $item = $items[$i] ;
        }
        elseif ($items[$nbre_items-$i-1]["id"] == $id)
        {
            $item = $items[$nbre_items-$i-1] ;
        }
    }

?>

<form method="post" enctype="multipart/form-data" action="{{url("/admin/items/update")}}">
    {{ csrf_field()  }}
    <input name="id" hidden type="text" value="{{ $item['id'] }}"/>

    <div class="form-group">
        <label for="wording" class="">Libellé <i style="color: red">*</i></label>
        <input class="form-control" id="wording" type="text" name="wording" value="{{ $item["wording"] }}" required>
    </div>

    <div class="form-group">
        <label for="description" class="">Description</label>
        <textarea id="description" name="description" class="form-control">
            {{ html_entity_decode($item["description"]) }}
        </textarea>
    </div>

    <div class="form-group">
        <label for="price" class="">Prix <i style="color: red">*</i></label>
        <input id="price" type="number" value="{{ $item["price"] }}" class="form-control" name="price" min="1" required>
    </div>

    <div class="form-group">
        <label for="quantity" class="">Quantité <i style="color: red">*</i></label>
        <input id="quantity" type="number" name="quantity" value="{{ $item["quantity"] }}" class="form-control" min="1" required>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="">Catégories <i style="color: red">*</i></label>

        <select required name="category_id" class="form-control">
            <option value=""></option>
            @if($categories != null)
                @foreach($categories as $category)
                    <option value="{{ $category["id"] }}">{{ $category['description'] }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
                <img id="picturePreview" class="img-thumbnail" src="{{$item["picture"]}}"/>
            </div>
            <div class="col-sm-5">
                <label for="picture">Image <small class="text-info">(format jpeg/jpg ou png, taille max: 110ko)</small></label>
                <input id="picture" onchange="preview(this, 'picturePreview');" type="file" name="picture" accept="image/png image/jpg image/jpeg" size="200">
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer form-group">
        <button type="submit" class="btn btn-primary">Valider</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
    </div>
</form>
