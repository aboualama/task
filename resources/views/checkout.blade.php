@extends('layouts.app')

@section('keywords')
 {{-- {{ $page->keywords }}  --}}
@endsection

@section('description')
 {{-- {{ $page->description }} --}}
@endsection

@section('title')
 Checkout
@endsection

@section('content')

 
 
<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2>Checkout</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- checkout -->

    <div class="checkout">
        <div class="container">

            @if (session()->has('success_message'))
                <div class="spacer"></div>
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="spacer"></div>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 

            <div class="col-lg-7"> 
                <div class="checkout-table-container">
                    <h2 style="margin-bottom: 30px">Billing Details</h2> 
                </div>
                    <div class="checkout-right">
                        <div>
                            <form  action="{{ route('pay') }}" method="POST" id="payment-form">
                                {{ csrf_field() }} 

                                <div class="form-group">
                                    <label for="email">Email Address</label> 
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                               
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->first_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="" required>
                                </div>

                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="province">Country</label>
                                        <input type="text" class="form-control" id="province" name="country" value="" required>
                                    </div>
                                </div> <!-- end half-form -->

                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="postalcode">Postal Code</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="" required>
                                    </div>
                                </div> <!-- end half-form -->    


 
                                 <input type="hidden" name="error" value="" />
                                <input type="hidden" name="total" value="{!!Cart::subtotal(0, '','') + $charge !!}" />
                                    {{-- @foreach($cart_item as $cartItem)  --}}
                                <input type="hidden" name="item_name" value="{{$cart_item}}" />
                                    {{-- @endforeach --}}
                                
                                <button class="paypal-button" type="submit">Buy Now</button> 
  
                            </form>
                        </div>
                    </div>
            </div>
         
            <div class="col-lg-offset-2 col-lg-3">
                <div class="checkout-table-container">
                    <h2>Your Order</h2> 
                </div>
                <div class="checkout-left"> 
                    <div class="checkout-left-basket" style="width: auto; float: initial;">
                        <h4>Continue to basket</h4>
                        <ul>
                            @foreach($cart_item as $cartItem)
                            <li class="tr{{$cartItem->id}}"><span style="width: 45%; float: left;">{{$cartItem->name}}</span> 
                                <i id="to1{{$cartItem->id}}">-( {{$cartItem->qty}} )-</i> 
                                <span> ${{$cartItem->price * $cartItem->qty }} </span> 
                            </li> 
                            @endforeach
                            <li class="cart-li-total" >Total Service Charges <i>-</i> <span>$ {{$charge}}</span></li>
                            <li>Total <i>-</i> <span>${!!Cart::subtotal(0, '','') + $charge !!}</span></li> 
                                {{-- Cart::subtotal(0, '','') or you can edit it from config cart --}}
                        </ul>    

                        <div class="checkout-right-basket text-center" style="float: none;"> 
                            <a href="{{url('/all-products')}}" style="padding: 10px 48px;">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping
                            </a>
                        </div>
                    </div> 
                </div> 
            </div> <!-- end checkout-table -->


        </div>
    </div>


        <div class="clearfix"> </div>
              
  

@endsection

@section('extra-js')
    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('pk_test_JKVJPMynL8ckk7ivBxoroTlT');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();
              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;
              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }
              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });
            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);
              // Submit the form
              form.submit();
            }
        })();
    </script>
@endsection