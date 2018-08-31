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

<form class="form-horizontal">
    {{ csrf_field()  }}
    <input name="id" hidden type="text" value="{{ $item['id'] }}"/>

    <div class="form-group">
        <label for="wording" class="col-sm-2 control-label">Libellé <i style="color: red">*</i></label>
        <div class="col-sm-5">
            <input class="form-control" id="wording" type="text" name="wording" value="{{ $item["wording"] }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <textarea id="description" name="description" class="form-control">
                {{ html_entity_decode($item["description"]) }}
            </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="price" class="col-sm-2 control-label">Prix <i style="color: red">*</i></label>
        <div class="col-sm-5">
            <input id="price" type="number" value="{{ $item["price"] }}" class="form-control" name="price" min="1" required>
        </div>
    </div>

    <div class="form-group">
        <label for="quantity" class="col-sm-2 control-label">Quantité <i style="color: red">*</i></label>
        <div class="col-sm-5">
            <input id="quantity" type="number" name="quantity" value="{{ $item["quantity"] }}" class="form-control" min="1" required>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Catégories <i style="color: red">*</i></label>
        <div class="col-sm-5">
            <select name="category_id" class="form-control">
                @if($categories != null)
                    @foreach($categories as $category)
                        <option value="{{ $category["id"] }}">{{ $category['description'] }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="picture" class="col-sm-2 control-label">
            Image <small class="text-info">(format jpeg/jpg ou png, taille max: 110ko)</small>
        </label>
        <div class="col-sm-5">
            <input id="picture" type="file" name="picture" accept="image/png image/jpg image/jpeg" size="200">
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Valider</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
    </div>
</form>
