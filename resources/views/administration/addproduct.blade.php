<div class="box box-info">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ajouter un nouveau produit</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/admin/items/add')  }}" class="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="alert-warning">
                @if(isset($errors))
                    @foreach($errors->all() as $error)
                        <span class="">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label for="wording" class=" control-label">Libellé <i style="color: red">*</i></label>

                    <input class="form-control" id="wording" type="text" name="wording" placeholder="Coca cola zéro" value="{{ old("wording") }}" required>

                </div>

                <div class="form-group">
                    <label for="description" class=" control-label">Description</label>

                    <textarea id="description" name="description" class="form-control" placeholder="Soda allégé sans sucre">
                            {{ old("description") }}
                        </textarea>

                </div>

                <div class="form-group">
                    <label for="price" class=" control-label">Prix <i style="color: red">*</i></label>

                    <input id="price" type="number" value="{{ old("price") }}" class="form-control" name="price" min="1" required>

                </div>

                <div class="form-group">
                    <label for="quantity" class=" control-label">Quantité <i style="color: red">*</i></label>
                    <div class="">
                        <input id="quantity" type="number" name="quantity" value="{{ old("quantity") }}" class="form-control" min="1" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class=" control-label">Catégories <i style="color: red">*</i></label>

                    <div class="">
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
                    <label for="tags" class=" control-label">Tags</label>

                    <input id="tags" type="text" class="form-control" value="{{ old("tags") }}" name="tags" placeholder="coca,sprite,soda,boisson gazeuse">

                </div>

                <div class="form-group">
                    <label for="picture" class=" control-label">
                        Image <small class="text-info">(format jpeg/jpg ou png, taille max: 110ko)</small>
                    </label>

                    <input id="picture" type="file" placeholder="Taille maximale 110 ko" name="picture" accept="image/png image/jpg image/jpeg" size="200">

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Annuler</button>
                <button type="submit" class="btn btn-info">Valider</button>
            </div>
            <!-- /.box-footer -->
        </form>

    </div>