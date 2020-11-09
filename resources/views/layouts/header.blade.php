<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Commerce</title>
    <link href={{asset("css/bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{asset("css/prettyPhoto.css")}} rel="stylesheet">
    <link href={{asset("css/price-range.css")}} rel="stylesheet">
    <link href={{asset("css/animate.css")}} rel="stylesheet">
	<link href={{asset("css/main.css")}} rel="stylesheet">
	<link href={{asset("css/responsive.css")}} rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href=""><i class="fa fa-shopping-cart"></i> Cart</a></li>
							{{-- {{route('showCart')}} --}}
								@if (Auth::check())
									<li><a href="/dashboard"><i class="fa fa-lock"></i> Profile</a></li>
								@else
									<li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
								@endif	
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="" method="get">
                                {{-- {{route('searchProducts')}} --}}
								<input type="text" placeholder="Search" name="searchProducts"/>
							
							</form>
						</div>
					</div>
				</div>
				{{-- @if (session('status'))
                    <div class="alert alert-success message_succes" role="alert" >
                        {{ session('status') }}
                    </div>
				@endif
				@if (session('success'))
				<div class="alert alert-success message_succes" >{{session('success')}}</div>
				@endif --}}
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	