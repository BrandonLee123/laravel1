@extends('layouts.app')
@section("content")

<form method="POST" action="{{route('admin.update')}}">
@csrf
<table>
<thead>
<tr>
<th scope="col">Order ID</th>
<th scope="col">Product Name</th>
<th scope="col">Quantity</th>
<th scope="col">status</th>
</tr>
</th>
</thead>
@foreach($orders_item as $o)
<tr>
<td>{{$o->order_id}}</td>
<td>{{$o->product_name}}</td>
<td>{{$o->quantity}}</td>
<td><input type="text" class="form-control" name="status[{{$o->order_id}}]" list="status" value="{{$o->status}}">
<datalist id="status">
<option>Processing</option>
<option>Shipped</option>
<option>Delivered</option>
</datalist>
</td>
<td><button type="submit" class="btn btn-warning">Update</button></td>
</tr>
@endforeach
</table>

</form>
@endsection