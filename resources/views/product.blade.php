@extends('layouts.app')
@section("content")

<form method="post" action="{{route('addcart',$product->id)}}">
@csrf
<h1 style=text-align:center>Product</h1>
<div class="row justify-content-center">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"><li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<ol>
<div class="carousel-inner">
@if($product->image_url)
@foreach($product->image_url as $png)
@if(count($product->image_url)==1)
<div class="item active">
<img src="{{url($png)}}" height=80>
</div>
@endif
<div class="item">
<img src="{{url($png)}}" height=80>
</div>
@endforeach
@endif
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left"></span>
   <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
{{$product->name}}<br/>
RM{{$product->price}}<br/>
{{$product->description}}
<div class="input-group justify-content-center">
<div class="col-xs-3">
<input type="input" name="quantity" list="quantity" class="form-control input-sm" placeholder="Quantity">
<datalist id="quantity">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</datalist>
</div>

</div>

<button type="submit" class="btn btn-outline-danger  ">Purchase</button>
</div>
</form>
@endsection