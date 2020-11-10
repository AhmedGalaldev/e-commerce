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
								<div class="total_area">
                                    <ul>
                                        @if ($payment_info['status']=='on_hold')
                                            <li>Not paid yet</li>
                                        @endif
                                        <li>Shopping Cost<span>free</span></li>
                                        <li>Total<span>{{$payment_info['price']}}</span></li>
                                    </ul>
                                     <a href="" class="btn btn-default check_out">Update</a>
                                    <a  class="btn btn-default check_out" id="paypal-button">Paypal</a>
                                </div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection


<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: //payal keyP
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,



    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: {{$payment_info['price']}},
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        
        
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>