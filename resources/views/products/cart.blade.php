

@extends('layouts.main')

@section('content')
    

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="{{route('allProducts')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
                        @foreach ($cartItems->items as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src={{asset('storage/'.$item['data']->image)}} alt="" style="max-width: 25%; max-height: 25%"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$item['data']->name}}</a></h4>
                                    <p>{{$item['data']->description}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{$item['data']->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
										<a class="cart_quantity_up" href="{{route('increaseSingleProduct',['id'=>$item['data']['id']])}}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="{{route('decreaseSingleProduct',['id'=>$item['data']['id']])}}"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{$item['totalSinglePrice']}}</p>
                                </td>
                                <td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('deleteItemFromCart',['id'=>$item['data']['id']])}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                         @endforeach
					</tbody>
				</table>
			</div>
		</div>
    </section> <!--/#cart_items-->
    <section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
                            <li>Quantity<span>{{$cartItems->totalQauntity}}</span></li>
                            <li>Total <span>{{$cartItems->totalPrice}}</span></li>
						</ul>
                            <a class="btn btn-default check_out" href="{{route('checkoutProducts')}}" >Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection




















{{-- @foreach ($cartItems->items as $item)


 <p>Name: {{$item['data']->name}}</p>
 <p>Price: {{$item['data']->price}}</p>
<p>{{$item['quantity']}}</p>
 @endforeach
 --}}

