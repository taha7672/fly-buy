<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_responsive.css')}}">

@extends('layouts.app')

@section('content')
@include('layouts/menubar')
    
    
    <!-- Home -->
 
	<div class="home">
		{{-- <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/frontend/images/shop_background.jpg')}}"></div> --}}
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src> <img src="{{asset('public/frontend/images/shop_background.jpg')}}" alt=""></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Technological Blog</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
						<!-- Blog post -->
                        @foreach ($postBlog as $row)
                            
                     
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{asset($row->post_image) }}) "></div>
							<div class="blog_text">
                                @if (Session()->get('lang') == 'english')
                                {{$row->post_title_en}} 
                                @else
                                {{$row->post_title_ur}} 
                                @endif
                                </div>
							<div class="blog_button"><a href="{{url('blog/single/'. $row->id)}} ">
                                @if (Session()->get('lang') == 'english')
                                Continue Reading
                                @else
                                پڑھنا جاری رکھو
                                @endif                        
                              
                            </a></div>
						</div>

                        @endforeach
						
					</div>
				</div>
					
			</div>
		</div>
	</div>
    @endsection
    <script src="{{asset('public/frontend/js/blog_custom.js')}}"></script>