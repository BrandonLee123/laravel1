@extends('layouts.app')
@section("content")

<h1>products</h1>
<a href="{{route('admin.products.edit',0)}}"  class="btn btn-success streched-link">Add Product</a>
<table class="table table-hover">

@foreach($products as $p)
<thead>
<tr>
<th>Images</th>
@if(count($p->image_url)>1)
<th></th>
@endif
<th>Product Name</th>
<th>Price</th>
<th></th>
<th></th>
</tr>
</thead>
<tr>
@if($p->image_url)
@foreach($p->image_url as $png)
<td><img src="{{url($png)}}" height=80></td>
@endforeach
@endif
<td>{{$p->name}}</td>
<td>{{$p->price}}</td>
<td><a href="{{route('admin.products.edit',$p->id)}}" class="btn btn-primary streched-link">edit</a></td>
<td><a href="{{route('admin.products.delete',$p->id)}}" class="btn btn-danger streched-link " onclick="return confirm('Are you sure')">Delete</a></td>



</tr>
@endforeach
</table>

@endsection