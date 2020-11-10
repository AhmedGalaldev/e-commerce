@extends('layouts.main')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="panel-group category-products" id="accordian">
				
							<div class="panel panel-default">
								<div class="panel-heading">
									<h2 class="panel-title">
										<span >Categories</span>
                                    </h2>
                                    
                                     <ul class="nav nav-pills nav-stacked">
                                          @foreach ($categories as $category)
											<li><a href="{{route('productsCategory',['id'=>$category->id])}}" > {{$category->name}}</a></li>
										 @endforeach   
                                    </ul>
								</div>
							</div>	
						</div>	
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
