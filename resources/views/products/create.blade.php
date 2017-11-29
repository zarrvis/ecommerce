@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                  <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" id="" placeholder="" name="price" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" rows="10" cols="30" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                      <button class="form-control btn btn-success">Save Product</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
