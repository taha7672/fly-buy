@extends('admin.admin_layouts')
@section('admin_content')
@php
    $category = DB::table('categories')->get();
    $subcat = DB::table('subcategories')->get();
    $brand = DB::table('brands')->get();
@endphp

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Fly Buy</a>
      <span class="breadcrumb-item active">Edit product</span>
    </nav>

    <div class="sl-pagebody">
      
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Product 
        </h6>
        <p class="mg-b-20 mg-sm-b-30"></p>
   <form action="{{url('update/product/withoutimg/'. $product->id)}} " method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_name" required value="{{$product->product_name}} " >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_code" required value="{{$product->product_code}}" >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Selling Price $: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="selling_price" required value="{{$product->selling_price}}" >
              </div>
            </div><!-- col-4 -->
         
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                  <option label="Choose category"></option>
                @foreach ($category as $row)
                  <option value="{{$row->id}} " <?php if ($row->id == $product->category_id) {
                     echo 'selected';
                  }?> >{{$row->category_name}} </option>
                  @endforeach
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Category" name="subcategory_id">
                  <option label="Choose category"></option>
                  @foreach ($subcat as $row)
                  <option value="{{$row->id}} " <?php if ($row->id == $product->subcategory_id) {
                    echo 'selected';
                 }?> >{{$row->subcategory_name}} </option>
                 @endforeach
                  </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                  <option label="Choose brand"></option>
                  @foreach ($brand as $row)
                  <option value="{{$row->id}} " <?php if ($row->id == $product->brand_id) {
                    echo 'selected';
                 }?> >{{$row->brand_name}} </option>
                 @endforeach
                </select>
              </div>
            </div><!-- col-4 -->
            <br>
             
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" data-role="tagsinput" required id="size"  name="product_size" value="{{$product->product_size}}" >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" data-role="tagsinput" required id="size"  name="product_colour" value="{{$product->product_colour}}" >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Discount Price $: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="discount_price" required value="{{$product->discount_price}}">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Quantity : <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_quantity" required value="{{$product->product_quantity}}">
              </div>
            </div><!-- col-4 -->
           
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Product Detail: <span class="tx-danger">*</span></label>
               <textarea class="form-control" name="product_detail" value="" required id="summernote" cols="30" rows="15">{{$product->product_detail}} </textarea>              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="video_link" required value="{{$product->video_link}}">
              </div>
            </div><!-- col-4 -->
         

          </div><!-- row -->
          {{-- radio box  --}}
          <br>
          <hr>
          <br>
          <div class="row">
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="main_slider" value="1" <?php if ($product->main_slider ==1) {
                    echo 'checked';} ?> >
                <span>Maain Slider</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="hot_deal" value="1" <?php if ($product->hot_deal ==1) {
                    echo 'checked';} ?> >
                <span>Hot Deal</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="best_rated" value="1" <?php if ($product->best_rated ==1) {
                    echo 'checked';} ?> >
                <span>Best Rated</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="mid_slider" value="1" <?php if ($product->mid_slider ==1) {
                    echo 'checked';} ?> >
                <span>Mid Slider</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="hot_new" value="1" <?php if ($product->hot_new ==1) {
                    echo 'checked';} ?> >
                <span>Hot New</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="trend" value="1" <?php if ($product->trend ==1) {
                    echo 'checked';} ?> >
                <span>Trend</span>
              </label>
            </div><!-- col-4 -->

          </div><!-- row -->
          <br><br>
         
          


          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Update Product</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </div><!-- card -->
    </form>
 
    </div>
      </div>
      {{-- images section  --}}
      <div class="sl-mainpanel">

      <div class="sl-pagebody">
       
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"> Product Images 
          </h6>
          <form action=" {{url('update/product/img/'. $product->id)}} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
          <div class="col-lg-6 col-sm-6">
              <label class="form-control-label">Choose image One (Main Thumbnail): <span class="tx-danger">*</span></label> <br>
              <label class="custom-file"> 
                <input type="file" id="file" name="image_one" onchange="readURL(this); "  class="custom-file-input">
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_one" value="{{$product->image_one}} ">
                <img src="#" alt="" id="one">
              </label>       
                   </div>
                   <div class="col-lg-6 col-sm-6">
                       <img src="{{URL::to($product->image_one)}} "  style="width: 130px; height:130px" alt="">
                   </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-6 col-sm-6">
              <label class="form-control-label">Choose image Two : <span class="tx-danger">*</span></label> <br>
              <label class="custom-file">
                <input type="file" id="file" name="image_two" onchange="readURL2(this); "  class="custom-file-input">
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_two" value="{{$product->image_two}} ">

                <img src="#" alt="" id="two">
              </label>              </div>
              <div class="col-lg-6 col-sm-6">
                <img src="{{URL::to($product->image_two)}} "  style="width: 130px; height:130px" alt="">
            </div>
          </div><!-- col-4 -->
          <br>  
          <div class="row">
            <div class="col-lg-6 col-sm-6">
              <label class="form-control-label">Choose image Three: <span class="tx-danger">*</span></label> <br>
              <label class="custom-file">
                <input type="file" id="file" name="image_three" onchange="readURL3(this); "class="custom-file-input">
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_three" value="{{$product->image_three}} ">

                <img src="#" alt="" id="three">
              </label>           </div>
              <div class="col-lg-6 col-sm-6">
                <img src="{{URL::to($product->image_three)}} "  style="width: 130px; height:130px" alt="">
            </div>
          </div><!-- col-4 -->
          <br>
          <button type="submit" class="btn btn-warning mg-r-5">Update Photos</button>

          </form>
        </div>
      </div>
      </div>

      {{-- script tags  --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
      
    <script type="text/javascript">
      $(document).ready(function(){
    $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
        
        $.ajax({
          url: "{{ url('/get/subcategory/') }}/"+category_id,
          type:"GET",
          dataType:"json",
          success:function(data) { 
          var d =$('select[name="subcategory_id"]').empty();
          $.each(data, function(key, value){
          
          $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

          });
          },
        });

      }else{
        alert('danger');
      }

        });
  });

          </script>

          <script type="text/javascript">
          function readURL(input){
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#one')
              .attr('src', e.target.result)
              .width(80)
              .height(80);
            };
            reader.readAsDataURL(input.files[0]);
          }
          }
          </script> 
          <script type="text/javascript">
          function readURL2(input){
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#two')
              .attr('src', e.target.result)
              .width(80)
              .height(80);
            };
            reader.readAsDataURL(input.files[0]);
          }
          }
          </script> 
          <script type="text/javascript">
          function readURL3(input){
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#three')
              .attr('src', e.target.result)
              .width(80)
              .height(80);
            };
            reader.readAsDataURL(input.files[0]);
          }
          }
          </script> 
@endsection
