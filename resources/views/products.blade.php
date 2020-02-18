@extends('layouts.app')
@section("content")

<h1>products</h1>

   <div class="row">
        @csrf
        @foreach($products as $p)
        @if($p->image_url)
        @foreach($p->image_url as $png)
        <td><img src="{{url($png)}}" height=80></td>
        @endforeach
        @endif
            <div class="col-md-4">
            <a href="{{route('products.show',$p->id)}}">{{$p->name}}</a></br>
            {{$p->price}}
            
            </div>
            @if($loop->iteration % 3 ==0)
            </div>
            <div class="row">
            @endif
        @endforeach
    </div>

@endsection