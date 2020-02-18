@extends('layouts.app')
@section('content')
<div class="container">
    
    <p> The Search results for your query <b> {{$search}} </b> are :</p>
    <table class="table table-bordered table-hover">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
        <tbody>
            @foreach($product as $p)
            <tr>
                <td>{{$p->name}}</td>
                <td>{{$p->description}}</td>
                <td>RM {{number_format($p->price,2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection