<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}} ">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/sstyles/contact_responsive.css')}}">
{{-- <link rel="stylesheet" href="checkout.css" /> --}}
    {{-- <script src="checkout.js" defer></script> --}}
@extends('layouts.app')

@section('content')
@include('layouts/menubar')
@php
$charge=DB::table('settings')->first();
$scharge= $charge->shipping_charge;
$vat= $charge->vat;
$paycart=Cart::content();
$subtotal=Cart::subtotal();
@endphp

<style>
  bor{
    border: 2px, solid;
    color: gray;
    border-radius: 10px;
    
  }
  
        .StripeElement {
  box-sizing: border-box;

  height: 40px;
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

<div class="contact_form">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mr-2" style="border-radius: 10px; border:2px solid gray; padding:20px;">
        <div class="contact_form_container ">
          <div class="contact_form_title text-center">Cart Product</div>
          <div class="cart_items">
            <ul class="cart_list">
                              @foreach ($paycart as $row)
                                  
                             
              <li class="cart_item clearfix">
                <div class="cart_item_image"></div>
                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                  <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title font-weight-bold">Image</div>
                    <div class="cart_item_text"><img src="{{asset($row->options->image)}} " alt="" style="height: 70px; width:80px;"></div>
                  </div>
                  <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title font-weight-bold">Name</div>
                    <div class="cart_item_text">{{$row->name}}</div>
                  </div>
                  <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title font-weight-bold">Color</div>
                    <div class="cart_item_text"><span style=""></span>{{$row->options->color}}</div>
                  </div>
                                      @if ($row->options->size == Null)
                                          
                                      @else
                                          
                                    
                  <div class="cart_item_quantity cart_info_col">
                    <div class="cart_item_title font-weight-bold">Size</div>
                    <div class="cart_item_text">{{$row->options->size}}</div>
                  </div>
                                      @endif
                                     
                  <div class="cart_item_quantity cart_info_col">
                    <div class="cart_item_title font-weight-bold">Quantity</div>
                                          <form action="{{route('update.cart')}} " method="POST">
                                              @csrf
                                              <div class="cart_item_text">
                                                  <input type="hidden" name="productid" value="{{$row->rowId}} ">
                                              <input type="number" value="{{$row->qty}}" name="qty" style="width: 60px">
                                                  <button type="submit" class="btn btn-sm btn-success "><i class="fas fa-check-square"></i></button>
                                              </div>                                              
                                          </form>									
                                        </div>
                  <div class="cart_item_price cart_info_col">
                    <div class="cart_item_title font-weight-bold ">Price</div>
                    <div class="cart_item_text">${{$row->price}} </div>
                  </div>
                  <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title font-weight-bold">Total</div>
                    <div class="cart_item_text">${{$row->price*$row->qty}} </div>
                  </div>
                  <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title font-weight-bold">Action</div>
                    <div class="cart_item_text"> <a href="{{url('remove/cart/'.$row->rowId)}} " class="btn btn-sm btn-danger">x</a> </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
            <ul class="list-group col-lg-4" style="float: right;">
              @if (Session::has('coupon'))
              <li class="list-group-item ">Subtotal : <span style="float: right;">${{session::get('coupon')['Balance']}} </span></li>
              <li class="list-group-item">Coupon {{session::get('coupon')['Name']}} : <a href="{{url('remove/coupon')}}  " class="btn btn-sm btn-danger"> x </a>  <span style="float: right;">$ {{session::get('coupon')['Discount']}}</span></li>			
                    @else
              <li class="list-group-item">Subtotal : <span style="float: right;">${{ Cart::subtotal() }} </span></li>
    
              @endif
              @if (Cart::count()== 0)
                
              @else
              <li class="list-group-item">Ship Charge : <span style="float: right;">$ {{$scharge}} </span></li>
              <li class="list-group-item">Vat : <span style="float: right;">${{$vat}} </span></li>
  
    
              @endif
                        @if (Session::has('coupon'))
              <li class="list-group-item">Total : <span style="float: right;">${{session::get('coupon')['Balance'] + $scharge + $vat }} </span></li>
  
              @else
                
              
            
            <li class="list-group-item">Total : <span style="float: right;">${{Cart::subtotal() + $scharge + $vat }} </span></li>
            @endif
            </ul>
          </div>
                  
        </div>
      </div>
      <div class="col-lg-5 " style="border-radius: 10px; border:2px solid gray; padding:20px;">
        <div class="contact_form_container">
          <div class="contact_form_title text-center">Shipping Details</div>
          <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
            @csrf
            <div class="form-row">
              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>
            </div><br>
            <button class="btn btn-info">Pay Now</button>
            <input type="hidden" name="vat" value="{{$vat}} ">
            <input type="hidden" name="shipping" value="{{$scharge}} ">
            <input type="hidden" name="subtotal" value="{{$subtotal}} ">
            <input type="hidden" name="total" value="{{Cart::subtotal() + $scharge + $vat }} ">
            <input type="hidden" name="name" value="{{$data['name']}} "> 
            <input type="hidden" name="phone" value="{{$data['phone']}} "> 
            <input type="hidden" name="email" value="{{$data['email'] }} "> 
            <input type="hidden" name="address" value="{{$data['address']}} "> 
            <input type="hidden" name="city" value="{{$data['city']}} "> 
            <input type="hidden" name="payment" value="{{$data['payment']}} "> 
          </form>


        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   
  // Create a Stripe client.
  var stripe = Stripe('pk_test_51KL8CMESGmCMbdvwsYM0QpZCH2BZbGCemjLgqmD9kJzvlUBN9o1CQRHc9TiqYALOBokACpfh0Lc4yKqRocWWspJ100KoJ5FNqS');
  
  // Create an instance of Elements.
  var elements = stripe.elements();
  
  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
    base: {
      color: '#32325d',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
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
  
  // Create an instance of the card Element.
  var card = elements.create('card', {style: style});
  
  // Add an instance of the card Element into the `card-element` <div>.
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
  
  // Handle form submission.
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();
  
    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });
  
  // Submit the form with the token ID.
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
  
  
   </script>
  
  
  
@endsection

