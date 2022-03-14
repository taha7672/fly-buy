<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_responsive.css')}}">


@extends('layouts.app')
@section('content')
@include('layouts/menubar')


	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ asset($product->image_one)}} "><img src="{{ asset($product->image_one)}}" alt=""></li>
						<li data-image="{{ asset($product->image_two)}}"><img src="{{ asset($product->image_two)}}" alt=""></li>
						<li data-image="{{ asset($product->image_three)}}"><img src="{{ asset($product->image_three)}}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset($product->image_one)}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{$product->category_name}} > {{$product->subcategory_name}} </div>
						<div class="product_name">{{$product->product_name}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{!!$product->product_detail!!} </p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{url('add/tocart/product/'.$product->id)}} " method="POST">
								@csrf
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
												<label for="inputState">Color</label>
												<select id="inputState" class="form-control " name="color" >
													@foreach ($product_colour as $color)
													<option value="{{$color}} ">{{$color}} </option>
														
													@endforeach
												</select>
											  
										</div>
									</div>
									@if ($product->product_size ==Null)
										
									@else
										
									
									<div class="col-lg-4">
										<div class="form-group">
												<label for="inputState">Size</label>
												<select id="inputState" class="form-control " name="size" >
													@foreach ($product_size as $size)
													<option value="{{$size}} ">{{$size}} </option>
														
													@endforeach
												</select>
											  
										</div>
									</div>
									@endif
									<div class="col-lg-4">
										<div class="form-group">
												<label for="inputState">Quantity</label>
												<input type="number" class="form-control" value="1" name="qty" pattern="[0-9] ">
											  
										</div>
									  </div>
									 </div>
									</div>
								</div>
								

								<div class="product_content">
									<div class="product_price discount">${{$product->discount_price}}<span>${{$product->selling_price}}</span></div>
								          </div>					
										  <div class="button_container">
									<button type="submit" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Product Details</h3>
						
					</div>

					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
						  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Detail</a>
						</li>
						<li class="nav-item" role="presentation">
						  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Video Link</a>
						</li>
						<li class="nav-item" role="presentation">
						  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Product Review</a>
						</li>
					  </ul>
					  <div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">{!!$product->product_detail!!}</div>
						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><a >{{$product->video_link}} </a></div>
						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

							<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
						</div>
					  </div>
				</div>
			</div>
		</div>
	</div>
	{{-- https://developers.facebook.com/docs/plugins/comments#configurator --}}
	

@endsection

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="J1RbsRPT"></script>

<script src="{{ asset('public/frontend/js/product_custom.js')}}"></script>
