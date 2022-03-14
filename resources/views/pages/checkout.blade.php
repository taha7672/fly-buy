<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}">

@extends('layouts.app')
@section('content')
@include('layouts/menubar')

   @php
	   $charge=DB::table('settings')->first();
	   $scharge= $charge->shipping_charge;
	   $vat= $charge->vat;
   @endphp


	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach ($cart as $row)
                                    
                               
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="{{asset($row->options->image)}} " alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{$row->name}}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style=""></span>{{$row->options->color}}</div>
										</div>
                                        @if ($row->options->size == Null)
                                            
                                        @else
                                            
                                      
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{$row->options->size}}</div>
										</div>
                                        @endif
                                       
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
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
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{$row->price}} </div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">${{$row->price*$row->qty}} </div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text"> <a href="{{url('remove/cart/'.$row->rowId)}} " class="btn btn-sm btn-danger">x</a> </div>
										</div>
									</div>
								</li>
							</ul>
						</div>
                        @endforeach
						<!-- Order Total -->
						@if (Session::has('coupon'))
							
						@else
							
					
					   <div class="order-total-content">
						   <h4>Apply Coupon</h4>
						   <br>
						   <form action="{{route('apply.coupon')}} " method="POST">
							@csrf
							   <div class="form-group col-lg-4">
								   <input type="text" required name="coupon" class="form-control" placeholder="Enter your coupon">
							   </div>
							   <br>
							 <button href="#" class="btn btn-danger mi-2" type="submit">Submit</button>

						   </form>
					   </div>
					   @endif
					   <ul class="list-group col-lg-4" style="float: right;">
						@if (Session::has('coupon'))
						<li class="list-group-item">Subtotal : <span style="float: right;">$ {{session::get('coupon')['Balance']}} </span></li>
						<li class="list-group-item">Coupon {{session::get('coupon')['Name']}} : <a href="{{url('remove/coupon')}}  " class="btn btn-sm btn-danger"> x </a>  <span style="float: right;">$ {{session::get('coupon')['Discount']}}</span></li>			
            			@else
						<li class="list-group-item">Subtotal : <span style="float: right;">$ {{ Cart::subtotal() }} </span></li>
	
						@endif
						@if (Cart::count()== 0)
							
						@else
						<li class="list-group-item">Shipping Charge : <span style="float: right;">$ {{$scharge}} </span></li>
						<li class="list-group-item">Vat : <span style="float: right;">$ {{$vat}} </span></li>

	
						@endif
											@if (Session::has('coupon'))
						<li class="list-group-item">Total : <span style="float: right;">$ {{session::get('coupon')['Balance'] + $scharge + $vat }} </span></li>

						@else
							
						
					
					<li class="list-group-item">Total : <span style="float: right;">$ {{Cart::subtotal() + $scharge + $vat }} </span></li>
					@endif
					</ul>
					</div>
				</div>
			</div>
		</div>
		<style>
			.mar{
				margin-right: 200px;
			}
		</style>

						<div class="cart_buttons">
							<div class="mar">
							<button type="button" class="button cart_button_clear">All Cancel</button>
							<a href="{{route('payment.page')}} "class="button cart_button_checkout ">Final Step</a>
						</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection


<script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
