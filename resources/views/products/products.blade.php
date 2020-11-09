@extends('layouts.main')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										{{-- <a  href="{{route('menProducts')}}"> --}}
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Men
										{{-- </a> --}}
									</h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										{{-- <a  href="{{route('womenProducts')}}"> --}}
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Women
										{{-- </a> --}}
									</h4>
								</div>
							</div>
							
							
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
						</div><!--/brands_products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						@if (Auth::user())
							
						<h1>{{$userData->name}}</h1>
						@endif
						<h2 class="title text-center">Features Items</h2>
						

						@foreach ($products as $product)
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src={{Storage::disk('local')->url('images/'.$product->image)}} alt="" />
											<h2>{{$product->price}}</h2>
											<p>{{$product->name}}</p>
											<a href="{{route('addToCart',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$product->price}}</h2>
												<p>{{$product->name}}</p>
												<a href="{{route('addToCart',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach	
								
					</div><!--features_items-->					
				</div>
			</div>
		</div>
    </section>
    
@endsection
