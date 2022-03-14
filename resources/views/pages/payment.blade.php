<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}} ">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/sstyles/contact_responsive.css')}}">
@extends('layouts.app')

@section('content')
@include('layouts/menubar')
@php
$charge=DB::table('settings')->first();
$scharge= $charge->shipping_charge;
$vat= $charge->vat;
@endphp

<style>
  bor{
    border: 2px, solid;
    color: gray;
    border-radius: 10px;
    
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
          <form action="{{route('payment.process')}}" method="post">
            @csrf
            <div class="form-group icon_parent">
                <label for="uname">Name</label>
               <input id="name" type="text" class="form-control" name="name" 
                required autocomplete="name" autofocus placeholder="Full Name">
            </div>
            <div class="form-group icon_parent">
                <label for="uname">Phone</label>
               <input id="phone" type="text" class="form-control" name="phone" 
                required  autofocus placeholder="Enter your phone number">
            </div>
            <div class="form-group icon_parent">
                <label for="uname">Email</label>
               <input id="email" type="email" class="form-control" name="email" 
                required  autofocus placeholder="Enter your email">
            </div>
            <div class="form-group icon_parent">
                <label for="uname">Address</label>
               <input id="address" type="text" class="form-control" name="address" 
                required autocomplete="name" autofocus placeholder="Enter your address">
            </div>
            <div class="form-group icon_parent">
                <label for="uname">City</label>
               <input id="city" type="text" class="form-control" name="city" 
                required autocomplete="name" autofocus placeholder="Enter your city">
            </div>
            <div class="contact_form_title text-center">Payment By </div>
            <div class="form-group">
              <ul class=" logo-list" style="display: flex">
                {{-- <li class="mr-3"> <input type="radio" name="payment" value="jazzcash">
                  <img src="{{asset('public/frontend/images/jazz.jpg')}} "
                  style="height: 60px; width:100px;" alt=""> </li> --}}
                <li class="mr-3"> <input type="radio" name="payment" value="stripe">
                  <img src="{{asset('public/frontend/images/master_card.png')}} "
                  style="height: 60px; width:100px;" alt=""> </li>
                {{-- <li> <input type="radio" name="payment" value="payment">
                  <img src="{{asset('public/frontend/images/logos_2.png')}} "
                  style="height: 60px; width:100px;" alt=""> </li> --}}
               
              </ul>
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Pay Now</button>
            </div>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
