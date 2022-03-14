<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}">

@extends('layouts.app')
@section('content')
@include('layouts/menubar')

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
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total + Tax:</div>
								<div class="order_total_amount">${{Cart::total()}}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">All Cancel</button>
							<a href="{{route('checkout.cart')}} "class="button cart_button_checkout">Checkout</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection


<script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
