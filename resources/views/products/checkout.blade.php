@extends('layouts.main')
@section('content')
    
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('allProducts')}}">Home</a></li>
				  <li class="active">shopping cart</li>
				</ol>
			</div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							
							<div class="form-one">
								<form action="{{route('createOrder')}}" method="POST"> 
									   @csrf
									<div class="text-danger">{{$errors->first('email')}}</div>
									<input type="email" placeholder="Email" name="email">
									<div class="text-danger">{{$errors->first('first_name')}}</div>
									<input type="text" placeholder="First Name" name="first_name">
									<div class="text-danger">{{$errors->first('last_name')}}</div>
									<input type="text" placeholder="Last Name" name="last_name">
									<div class="text-danger">{{$errors->first('address')}}</div>
									<input type="text" placeholder="Address" name="address">
									<div class="text-danger">{{$errors->first('zip')}}</div>
									<input type="text" placeholder="Zip/Postal Code" name="zip">
									<div class="text-danger">{{$errors->first('phone')}}</div>
                                    <input type="text" placeholder="Phone" name="phone">
                                    <button class="btn btn-default check_out" type="submit" style="margin-bottom: 5rem">Procced To Payment</button>
								</form>
							</div>
							
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection