@extends('layouts.app')
@section("content")
<form method="POST" action="{{route('admin.products.save',$product->id)}}" enctype="multipart/form-data">
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Please insert correct data and try again</strong>
    <ul>
     @foreach($errors->all() as $error)
     <li>{{$error}}</li>
     @endforeach
    </ul>
</div>
@endif
@csrf
<h1>Products</h1>
<div class="form-group mx-sm-3 mb-2 @error('name') has-error @enderror">
<label for="name">Name</label>
<input class="form-control" name="name" id="name" value="{{old('name',$product->name)}}"/>
@error('name')
<div class="alert alert-danger">{{$message}}</div>
@enderror
</div>

<div class="form-group mx-sm-3 mb-2 @error('description') has-error @enderror">
<label for="Description">Description</label>
<input class ="form-control" name="description" id="description" value="{{$product->description}}"/>
@error('description')
<div class="alert alert-danger">{{$message}}</div>
@enderror
</div>

<div class="form-group mx-sm-3 mb-2 @error('price') has-error @enderror">
<label for="Price">Price</label>
<input class="form-control" name="price" id="price" value="{{old('price',$product->price)}}"/>
@error('price')
<div class="alert alert-danger">{{$message}}</div>
@enderror
</div>
<input type="file" multiple="multiple" name="photo[]">
<button type="submit" class="btn btn-primary mx-sm-3 mb-2">Save</button>
</form>
@endsection
