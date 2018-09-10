<div class="box box-info">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ajouter un nouveau produit</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/items/add')  }}" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                    <label for="wording" class="col-sm-2 control-label">Libellé <i style="color: red">*</i></label>
                    <div class="col-sm-5">
                        <input class="form-control" id="wording" type="text" name="wording" placeholder="Coca cola zéro" value="{{ old("wording") }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" class="form-control" placeholder="Soda allégé sans sucre">
                            {{ old("description") }}
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Prix <i style="color: red">*</i></label>
                    <div class="col-sm-5">
                        <input id="price" type="number" value="{{ old("price") }}" class="form-control" name="price" min="1" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantity" class="col-sm-2 control-label">Quantité <i style="color: red">*</i></label>
                    <div class="col-sm-5">
                        <input id="quantity" type="number" name="quantity" value="{{ old("quantity") }}" class="form-control" min="1" required>
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
                    <label for="tags" class="col-sm-2 control-label">Tags</label>
                    <div class="col-sm-5">
                        <input id="tags" type="text" class="form-control" value="{{ old("tags") }}" name="tags" placeholder="coca,sprite,soda,boisson gazeuse">
                    </div>
                </div>

                <div class="form-group">
                    <label for="picture" class="col-sm-2 control-label">
                        Image <small class="text-info">(format jpeg/jpg ou png, taille max: 110ko)</small>
                    </label>
                    <div class="col-sm-5">
                        <input id="picture" type="file" placeholder="Taille maximale 110 ko" name="picture" accept="image/png image/jpg image/jpeg" size="200">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Annuler</button>
                <button type="submit" class="btn btn-info pull-right">Valider</button>
            </div>
            <!-- /.box-footer -->
        </form>

    </div>