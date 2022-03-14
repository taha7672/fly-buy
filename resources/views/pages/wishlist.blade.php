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
						<div class="cart_title">Wishlist</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach ($product as $row)
                                    
                               
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="{{asset($row->image_one)}} " alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{$row->product_name}}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style=""></span>{{$row->product_colour}}</div>
										</div>
                                        @if ($row->product_size == Null)
                                            
                                        @else
                                            
                                      
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{$row->product_size}}</div>
										</div>
                                        @endif
                                        <div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Action</div>
                                            <br>
                                            <button class="btn btn-sm btn-danger"> Add to cart</button>
										</div>
                                       
										
										
									</div>
								</li>
							</ul>
						</div>
                        @endforeach
						<!-- Order Total -->
					

						
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection


<script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
