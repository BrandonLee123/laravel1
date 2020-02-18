@extends('layouts.app')

@section('content')
<h1 style="text-align:center;color:black">Check Out</h1>

<form method="post" action="{{route('payment')}}">
@csrf
   <div calss="form-group @error('user_name') has-error @enderror">         
    <label for="fname">Full Name</label>
    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Brandon Lee" value="{{old('user_name',Auth::user()->name)}}"/>
    @error('user_name')
     <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="for-group @error('email') has-error @enderror">
  <label for="email"><i class="fa fa-envelope"></i> Email</label>
  <input type="email" class="form-control" id="email" name="email" placeholder="brandon@example.com" value="{{old('email',Auth::user()->email)}}"/>
  @error('email')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
  <div class="form-group @error('phonenum') has-error @enderror">
  <label for="hpnum">Phone Number</label>
  <input type="text" class="form-control" id="hpnum" name="phonenum" maxlength=11 value="{{old('phonenum',Auth::user()->phonenum)}}"/>
  @error('phonenum')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
  <div class="form-group @error('address') has-error @enderror">
  <label for="adr">Address</label>
  <input type="text" id="adr" class="form-control" name="address" placeholder="3,lorong ampang" value="{{old('address',Auth::user()->address)}}" />
  @error('address')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
  <div class="form-row">
  <div class="form-group col-md-4 @error('city') has-error @enderror">
  <label for="city"><i class="fa fa-institution"></i> City</label>
  <input type="input" id="city" class="form-control" name="city" placeholder="Bayan Lepas" />
  @error('city')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>

  <div class="form-group col-md-4 @error('state') has-error @enderror">
  <label for="state">State</label>
  <input type="input" name="state" list="state" class="form-control input-sm" placeholder="State" >
  <datalist id="state">
  <option>Penang</option>
  <option>Perlis</option>
  <option>Perak</option>
  <option>Pahang</option>
  <option>Negeri Sembilan</option>
  <option>Kuala Lumpur</option>
  <option>Kelantan</option>
  <option>Kedah</option>
  <option>Terengganu</option>
  <option>Malacca</option>
  <option>Johor</option>
  <option>Selangor</option>
  <option>Sabah</option>
  <option>Sarawak</option>
  </datalist>
  @error('state')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>

  <div class="form-group col-md-2 @error('zip') has-error @enderror">
  <label for="zip">Post Code</label>
  <input type="text" class="form-control" id="zip" name="zip" class="form-control" />
  @error('state')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
 
  <div class="form-group @error('cardname') has-error @enderror">
  <h3>Payment</h3>
  <label for="card">Accepted Cards</label>
  <br/>
  <img src="{{url('/img/creditcard.png')}}" class="img-thumbnail" width="25%" height="15%">
  <br/>
  <label for="cname">Card Holder Name</label>
  <input type="text" id="cname" class="form-control" name="cardname" placeholder="BRANDON LEE Z X"/>
  @error('cardname')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
 
  <div class="form-group @error('cardnumber') has-error @enderror">
  <label for="ccnum">Credit Card number</label>
  <input type="text" id="ccnum" class="form-control" name="cardnumber" placeholder="4032 6578 2021 8940"/>
  @error('cardnumber')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
  <div class=form-row>

  <div class="form-group col-md-4 @error('cardnumber') has-error @enderror">
  <label for="expmonth">Expired Month</label>
  <input type="input" name="expmonth" list="month" class="form-control input-sm" placeholder="January">
  <datalist id="month">
  <option>January</option>
	<option>February</option>
	<option>March</option>
	<option>April</option>
	<option>May</option>
	<option>June</option>
	<option>July</option>
	<option>August</option>
	<option>September</option>
	<option>October</option>
	<option>November</option>
	<option>December</option>
  </datalist>
  @error('expmonth')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>

  <div class="form-group @error('expyear') has-error @enderror">
  <label for="expyear">Expired Year</label>
  <input type="text" id="expyear" name="expyear" class="form-control" maxlength=4 palceholder="2020"/>
  @error('expyear')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>
  <div class="form-group col-xs-2 @error('cvv') has-error @enderror">
  <label for="cvv">CVV</label>
  <input type="text" class="form-control" id="cvv" name="cvv" placeholder="352"maxlength=3/>
  @error('cvv')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>

  </div>

  

  <div class="container">
      <h4 style=>Cart</h4>
      
      <table class="table  table-borderless text-center">
     
      <thead>
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      </tr>
      </thead>
     
      @foreach($cart_items as $c)
      <tbody>
      <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$c->name}}</td>
      <td>{{$c->quantity}}</td>
      <td>{{$c->price}}</td>
      </tr>
      </tbody>
      @endforeach
      <tr>
      <td colspan="4">
      Total: RM{{$total}}
      </td>
      </tr>
      </table>
    
  </div>

  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
  
  
</form>
@endsection