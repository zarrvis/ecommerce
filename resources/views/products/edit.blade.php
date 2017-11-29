@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Products</div>

                <div class="panel-body">
                  <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" id="" placeholder="" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" rows="10" cols="30" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <button class="form-control btn btn-success">Update Product</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
