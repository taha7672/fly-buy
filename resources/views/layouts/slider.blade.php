<!-- Banner -->
@php
$slider=DB::table('products')
->join('brands','products.brand_id', 'brands.id')
->select('products.*', 'brands.brand_name')
->where('main_slider',1)->orderBy('id','ASC')->first();
@endphp
<style>
    .mar{
        height: 520px;
    }
</style>
<div class="banner">
    <div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
    <div class="container ">
        <div class="row ">
            <div class="banner_product_image"><img src="{{asset($slider->image_one)}}" alt=""></div>
            <div class="col-lg-5 offset-lg-4  ">
                <div class="banner_content">
                    <h1 class="banner_text">{{$slider->product_name}} </h1>

                    <div class="banner_price"><span>${{$slider->selling_price}} </span>${{$slider->discount_price}} </div>
                    <div class="banner_product_name">{{$slider->brand_name}} </div>
                    <div class="button banner_button"><a href="{{URL('product/details/'.$slider->id.'/'.$slider->product_name)}}">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>