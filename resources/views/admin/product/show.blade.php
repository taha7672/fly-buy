@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Fly Buy</a>
      <span class="breadcrumb-item active">All Product</span>
    </nav>

    <div class="sl-pagebody">
      
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">ALl Product 
        </h6>
        <p class="mg-b-20 mg-sm-b-30"></p>
  
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->product_name}} </strong>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->product_code}} </strong>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Selling Price $: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->selling_price}} </strong>
              </div>
            </div><!-- col-4 -->
         
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->category_name}} </strong>
               
              
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->subcategory_name}} </strong>
                
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->brand_name}} </strong>
               
              </div>
            </div><!-- col-4 -->
            <br>
             
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->product_size}} </strong>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->product_colour}} </strong>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Discount Price $: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->discount_price}} </strong>
               </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Quantity : <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->product_quantity}} </strong>
              </div>
            </div><!-- col-4 -->
           
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Product Detail: <span class="tx-danger">*</span></label> <br>
                {{-- <strong>{{$product->product_detail}} </strong> --}}
                <p>{!!$product->product_detail !!} </p>
                             </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label> <br>
                <strong>{{$product->video_link}} </strong>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Choose image One (Main Thumbnail): <span class="tx-danger">*</span></label>
                <label class="custom-file">  </label>   <br>
                  <img src="{{URL::to($product->image_one)}} " alt="" height="80px" width="80px">
                 
                           </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Choose image Two : <span class="tx-danger">*</span></label>
                <label class="custom-file">  </label>  <br>
                  <img src="{{URL::to($product->image_two)}} " alt="" height="80px" width="80px">

                            </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Choose image Three: <span class="tx-danger">*</span></label>
                <label class="custom-file">  </label>    <br>
                  <img src="{{URL::to($product->image_three)}} " alt="" height="80px" width="80px">

                 
                          </div>
            </div><!-- col-4 -->

          </div><!-- row -->
          {{-- radio box  --}}
          <br>
          <hr>
          <br>
          <div class="row">
            <div class="col-lg-4">
              <label class="">
                @if ($product->main_slider== 1)
                <span class="badge badge-success">Active</span>    
                @else
                <span class="badge badge-danger">Inctive</span>
                @endif
                <span>Main Slider</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="">
                @if ($product->hot_deal== 1)
                <span class="badge badge-success">Active</span>    
                @else
                <span class="badge badge-danger">Inctive</span>
                @endif
                <span>Hot Deal</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="">
                @if ($product->best_rated== 1)
                <span class="badge badge-success">Active</span>    
                @else
                <span class="badge badge-danger">Inctive</span>
                @endif
                <span>Best Rated</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="">
                @if ($product->mid_slider== 1)
                <span class="badge badge-success">Active</span>    
                @else
                <span class="badge badge-danger">Inctive</span>
                @endif
                <span>Mid Slider</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="">
                @if ($product->hot_new == 1)
                <span class="badge badge-success">Active</span>    
                @else
                <span class="badge badge-danger">Inctive</span>
                @endif
                <span>Hot New</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="">
                @if ($product->trend== 1)
                <span class="badge badge-success">Active</span>    
                @else
                <span class="badge badge-danger">Inctive</span>
                @endif
                <span>Trend</span>
              </label>
            </div><!-- col-4 -->

          </div><!-- row -->
          <br><br>
        </div><!-- form-layout -->
      </div><!-- card -->

    </div>
      </div>


      {{-- script tags  --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>



@endsection
