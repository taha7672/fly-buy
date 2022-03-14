	@extends('layouts.app')
    @section('content')
	@php
		$featured=DB::table('products')->where('status',1)->orderBy('id','ASC')->limit(8)->get();
		$onsale=DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','ASC')->limit(8)->get();
		$bestrated=DB::table('products')->where('status',1)->where('best_rated',1)->orderBy('id','ASC')->limit(8)->get();
		$hotnew=DB::table('products')->where('status',1)->where('hot_new',1)->orderBy('id','ASC')->limit(8)->get();
         $hot=DB::table('products')
		 ->join('brands','products.brand_id','brands.id')
		 ->join('subcategories','products.subcategory_id','subcategories.id')
		 ->select('products.*','brands.brand_name','subcategories.subcategory_name')
		 ->where('status',1)->where('hot_deal',1)->orderBy('id','ASC')->limit(3)->get();

    
@endphp
        
@include('layouts/menubar')    
@include('layouts/slider')    
	
<br>
<br>
<br>
<br>
<br>

<!-- Characteristics -->

	{{-- <div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('public/frontend/images/char_1.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('public/frontend/images/char_2.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('public/frontend/images/char_3.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{asset('public/frontend/images/char_4.png')}}" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								@foreach ($hot as $row)
									
							
								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="{{$row->image_one}}" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">{{$row->subcategory_name}}</a></div>
											<div class="deals_item_price_a ml-auto">${{$row->selling_price}} </div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name"><div><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}} "> {{$row->product_name}} </a> </div></div>
											<div class="deals_item_price ml-auto">${{$row->discount_price}}</div>
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">Available: <span>{{$row->product_quantity}}</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
									<li>On Sale</li>
									<li>Best Rated</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($featured as $row)
										

									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}"> <img src="{{$row->image_one}}" alt="" style="height: 140px; width:130px"> </a></div>
											<div class="product_content">
												<div class="product_price discount">${{$row->discount_price}}<span>${{$row->selling_price}} </span></div>
												<div class="product_name"><div><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}} </a></div></div>
												<div class="product_extras">
													
													<button id="{{$row->id}}" data-toggle="modal" data-target="#cartmodal" class="product_cart_button " onclick="productview(this.id)">Add to Cart</button>
												</div>
											</div>

											<button class="addwishlist" data-id="{{$row->id}} ">
												<div class="product_fav"><i class="fas fa-heart"></i>
												</div>
											</button>
											<ul class="product_marks">
												<li class="product_mark product_discount">
													@php
														$amount = (int)$row->selling_price - (int)$row->discount_price;
														$discount= $amount/(int)$row->selling_price*100;
													@endphp
													
												{{intval ($discount) }}%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
									@endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($onsale as $row)
										
								
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}"><img src="{{$row->image_one}}" alt="" style="height: 140px; width:130px " ></a>  </div>
											<div class="product_content">
												<div class="product_price discount">${{$row->discount_price}}<span>${{$row->selling_price}}</span></div>
												<div class="product_name"><div><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}} </a></div></div>
												<div class="product_extras">
													
													<button class="product_cart_button addtocart" data-id="{{$row->id}}" >Add to Cart</button>
												</div>
											</div>
											<button class="addwishlist" data-id="{{$row->id}} ">
												<div class="product_fav"><i class="fas fa-heart"></i>
												</div>
											</button>

											<ul class="product_marks">
												<li class="product_mark product_discount">
													@php
														$amount = (int)$row->selling_price - (int)$row->discount_price;
														$discount= $amount/(int)$row->selling_price*100;
													@endphp
													
												{{intval ($discount) }}%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
									@endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($bestrated as $row)
										
								
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}"><img  src="{{$row->image_one}}" alt="" style="height: 140px; width:130px"></a>  </div>
											<div class="product_content">
												<div class="product_price discount">${{$row->discount_price}}<span>${{$row->selling_price}}</span></div>
												<div class="product_name"><div><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}} </a></div></div>
												<div class="product_extras">
													
													<button class="product_cart_button addtocart" data-id="{{$row->id}}" >Add to Cart</button>
												</div>
											</div>
											<button class="addwishlist" data-id="{{$row->id}} ">
											{{-- <a href="{{URL::to('add/wishlist/'.$row->id)}} "> --}}
												<div class="product_fav"><i class="fas fa-heart"></i>
												</div>
											{{-- </a> --}}
											</button>

											<ul class="product_marks">
												<li class="product_mark product_discount">
													@php
													$amount = (int)$row->selling_price - (int)$row->discount_price;
													$discount= $amount/(int)$row->selling_price*100;
												@endphp
												
											{{intval ($discount) }}%</li>
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
									@endforeach
								
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Popular Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full catalog</a></div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							@php
								$category = DB::table('categories')->get();
							@endphp
							@foreach ($category as $cat)
								
						
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="{{asset('public/frontend/images/popular_1.png')}}" alt=""></div>
									<div class="popular_category_text">{{$cat->category_name}} </div>
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				@php
					 $midslider=DB::table('products')
		 ->join('brands','products.brand_id','brands.id')
		 ->join('subcategories','products.subcategory_id','subcategories.id')
		 ->select('products.*','brands.brand_name','subcategories.subcategory_name')
		 ->where('status',1)->where('mid_slider',1)->orderBy('id','ASC')->limit(3)->get();
				@endphp
				@foreach ($midslider as $mid)
					
			
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">{{$mid->subcategory_name}} </div>
										<div class="banner_2_title">{{$mid->product_name}} </div>									
										<div class="banner_2_title">{{$mid->brand_name}} </div>										
										<div class="button banner_2_button"><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="{{$mid->image_one}}" height="300px" width="250px" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot New Arrivals</div>
							<br><br>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach ($hotnew as $row)
											
		
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"> <a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}"> <img src="{{$row->image_one}}" height="130px" width="120px" alt=""> </a></div>
												<div class="product_content">
													<div class="product_price">$ {{$row->discount_price}} </div>
													<div class="product_name"><div><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}}</a></div></div>
													<div class="product_extras">
														<button class="addwishlist" data-id="{{$row->id}} ">
														<div class="product_fav"><i class="fas fa-heart"></i>
														</div>
														</button>
														<button class="product_cart_button addtocart" data-id="{{$row->id}}" >Add to Cart</button>
													</div>
												</div>

													<button class="addwishlist" data-id="{{$row->id}} ">
													<div class="product_fav"><i class="fas fa-heart"></i>
													</div>
											</button>
												<ul class="product_marks">
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
										@endforeach
									
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							
							</div>

						

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>
	<!-- Hot New Arrivals -->


	@php
	$cats=DB::table('categories')->skip(1)->first();
	$catid=$cats->id;
     $wofahions=DB::table('products')->where('category_id',$catid)->where('status',1)->orderBy('id','ASC')->limit(8)->get();

	@endphp

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">{{$cats->category_name}} </div>
							<br><br>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach ($wofahions as $row)
											
		
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}"> <img src="{{$row->image_one}}" height="130px" width="120px"  alt=""> </a></div>
												<div class="product_content">
													<div class="product_price">$ {{$row->discount_price}} </div>
													<div class="product_name"><div><a href="{{URL('product/details/'.$row->id.'/'.$row->product_name)}}">{{$row->product_name}}</a></div></div>
													<div class="product_extras">
														<button class="addwishlist" data-id="{{$row->id}} ">
														<div class="product_fav"><i class="fas fa-heart"></i>
														</div>
														</button>
														<button class="product_cart_button addtocart" data-id="{{$row->id}}" >Add to Cart</button>
													</div>
												</div>

													<button class="addwishlist" data-id="{{$row->id}} ">
													<div class="product_fav"><i class="fas fa-heart"></i>
													</div>
											</button>
												<ul class="product_marks">
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
										@endforeach
									
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							
							</div>

						

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>


	<!-- Trends -->
	@php
			$trend=DB::table('products')
		 ->join('brands','products.brand_id','brands.id')
		 ->select('products.*','brands.brand_name')
		 ->where('status',1)->where('trend',1)->orderBy('id','ASC')->limit(3)->get();
	@endphp

	<div class="trends">
		<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trends Product</h2>
						<div class="trends_text"><p>These are the trending products of this year.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">
                
							@foreach ($trend as $row)
								
					
							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{$row->image_one}}" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">{{$row->brand_name}} </a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">{{$row->product_name}}</a></div>
											<div class="trends_price">${{$row->discount_price}} </div>
											<br>
											<br>
											<a href=""class="btn btn-sm btn-danger ml-3 addtocart" data-id="{{$row->id}}" >Add to Cart</a>

										</div>
									</div>
									<ul class="trends_marks">
										{{-- <li class="trends_mark trends_discount">-25%</li> --}}
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							@endforeach

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>




	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_1.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_2.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_3.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_4.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_5.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_6.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_7.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_8.jpg')}}" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{asset('public/frontend/images/send.png')}}" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="{{route('store.newslater')}} " method="POST" class="newsletter_form">
							@csrf
								<input type="email" name="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button type="submit" class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>





    @endsection
<!-- Modal -->
<div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLongTitle">Product short Detail</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="{{route('insert.into.cart')}}  " method="POST" >
		@csrf
		<input type="hidden" id="product_id" name="product_id">
		<div class="modal-body">
		  <div class="row">
			  <div class="col-md-4">
				  <div class="cart">
					  <img src="" alt="">
					  <div class="cart-body">

						  <div class="img">
							  <img src="" alt="" id="pimage" style="height:200px; width:200px;">
						  </div>
						  <br>
						  <h4  class="text-center" id="pname" > </h4>

					  </div>
				  </div>
			  </div>
	
		  <div class="col-md-4">
			  <ul class="list-group">
				<li class="list-group-item"  >Code : <span id="cname"> </span> </li>
				<li class="list-group-item">Category : <span id="catname"> </span> </li>
				<li class="list-group-item">Subcategory : <span id="subname"> </span> </li>
				<li class="list-group-item">Brand : <span id="bname"> </span> </li>
				<li class="list-group-item">Status : <span class="badge" style="background: green;color:white;">Available </span> </li>
			  </ul>
		  </div>
		  <div class="col-md-4">
			  <div class="form-group">
				<label for="inputState">Color</label>
				<select id="inputState" class="form-control " name="color" >						
				</select>
			  
		</div>
		<div class="form-group">
			<label for="inputState">Size</label>
			<select id="inputState" class="form-control " name="size" >
					

			</select>
		  
	</div>
	<div class="form-group">
		<label for="inputState">Quantity</label>
		<input type="number" class="form-control" value="1" name="qty" pattern="[0-9] ">
	  
</div>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="submit" class="btn btn-primary">Add To Cart</button>
		</div>
	  </div>
	</div>
</form>
  </div>
</div>








											{{-- end  --}}



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script  type="text/javascript" >
    function productview(id){
			$.ajax({
         url: "{{url('/cart/product/view/')}}/"+id,
		 type:"GET",
		 dataType:"json",
		 success:function(data){
			$('#pname').text(data.product.product_name);
			 $('#cname').text(data.product.product_code);
			 $('#catname').text(data.product.category_name);
			 $('#subname').text(data.product.subcategory_name);
			 $('#bname').text(data.product.brand_name);
			 $('#product_id').val(data.product.id);
			 $('#pimage').attr('src',data.product.image_one);
			 var d = $('select[name="color"]').empty();
       $.each(data.color,function(key,value){
       $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>'); 
        });

          var d = $('select[name="size"]').empty();
       $.each(data.size,function(key,value){
       $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>'); 
        });
		 }
			})

		}
		  
	</script>
	
	 

	<script type="text/javascript">
    
		$(document).ready(function(){
		  $('.addwishlist').on('click', function(){
			 var id = $(this).data('id');
			 if (id) {
				 $.ajax({
					 url: " {{ url('add/wishlist/') }}/"+id,
					 type:"GET",
					 datType:"json",
					 success:function(data){
				  const Toast = Swal.mixin({
					   toast: true,
					   position: 'top-end',
					   showConfirmButton: false,
					   timer: 3000,
					   timerProgressBar: true,
					   onOpen: (toast) => {
						 toast.addEventListener('mouseenter', Swal.stopTimer)
						 toast.addEventListener('mouseleave', Swal.resumeTimer)
					   }
					 })
	 
				  if ($.isEmptyObject(data.error)) {
	 
					 Toast.fire({
					   icon: 'success',
					   title: data.success
					 })
				  }else{
					  Toast.fire({
					   icon: 'error',
					   title: data.error
					 })
				  }
	  
	 
					 },
				 });
	 
			 }
			 else{
				 alert('danger');
			 }
		  });
	 
		});
	 
	 
	 </script>

	<script type="text/javascript">
    
		$(document).ready(function(){
		  $('.addtocart').on('click', function(){
			 var id = $(this).data('id');
			 if (id) {
				 $.ajax({
					 url: " {{ url('add/cart/') }}/"+id,
					 type:"GET",
					 datType:"json",
					 success:function(data){
				  const Toast = Swal.mixin({
					   toast: true,
					   position: 'top-end',
					   showConfirmButton: false,
					   timer: 3000,
					   timerProgressBar: true,
					   onOpen: (toast) => {
						 toast.addEventListener('mouseenter', Swal.stopTimer)
						 toast.addEventListener('mouseleave', Swal.resumeTimer)
					   }
					 })
	 
				  if ($.isEmptyObject(data.error)) {
	 
					 Toast.fire({
					   icon: 'success',
					   title: data.success
					 })
				  }else{
					  Toast.fire({
					   icon: 'error',
					   title: data.error
					 })
				  }
	  
	 
					 },
				 });
	 
			 }
			 else{
				 alert('danger');
			 }
		  });
	 
		});
	 
	 
	 </script>
	 