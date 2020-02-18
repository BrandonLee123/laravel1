@extends('layouts.app')
@section("content")
<h1>Shopping Cart</h1>
<form method="POST" action="{{route('cartitem.update')}}">
@csrf
<table class="table table-hover text-center">


<thead class="thead-dark">
<tr>
<th scope="col">Product Name</th>
<th scope="col">Product Price</th>
<th scope="col">Quantity</th>
<th scope="col"></th>

</tr>
</thead>
@foreach($cart_items as $c)
<tbody>
<tr>
<td>{{$c->name}}</td>
<td>{{$c->price}}</td>
<td><input type="text" class="form-control" name="quantity[{{$c->id}}]" value="{{old('quantity',$c->quantity)}}"></td>
<td><a href="{{route('deleteitem',$c->id)}}" class="btn btn-danger streched-link " onclick="return confirm('Are you sure')">Delete</a><td>
</tr>
</tbody>
@endforeach
<tr>
<td colspan="4">
<button type="submit" class="btn btn-warning">Update</button>
</td>
</tr>
<tr>
<td colspan="4">
<button type="button" class="btn btn-warning" disable>Total: RM{{$cart_total}}</button>
</td>
</tr>
</table>

<a href="{{route('checkout')}}" class="btn btn-primary btn-lg btn-block">Check Out</a>
</form>
@endsection