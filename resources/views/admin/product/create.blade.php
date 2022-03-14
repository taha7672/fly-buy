@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Fly Buy</a>
      <span class="breadcrumb-item active">Create product</span>
    </nav>

    <div class="sl-pagebody">
      
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create Product 
          <a href="{{route('all.product')}} "class="btn btn-sm btn-warning" style="float: right" >All Product</a>
        </h6>
        <p class="mg-b-20 mg-sm-b-30"></p>
   <form action="{{route('store.product')}} " method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_name" value="" required placeholder="Enter Product Name">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_code" value="" required placeholder="Enter product code">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Selling Price $: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="selling_price" value="" required placeholder="Enter selling price">
              </div>
            </div><!-- col-4 -->
         
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Category" required name="category_id">
                  <option label="Choose category"></option>
                @foreach ($category as $row)
                  <option value="{{$row->id}} ">{{$row->category_name}} </option>
                  @endforeach
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Category" required name="subcategory_id">
                  
                  @foreach ($subcat as $row)
                    <option value="{{$row->id}} ">{{$row->subcategory_name}} </option>
                    @endforeach
                  </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Brand" required name="brand_id">
                  <option label="Choose brand"></option>
                  @foreach ($brand as $row)
                  <option value="{{$row->id}} ">{{$row->brand_name}} </option>
                  @endforeach
                </select>
              </div>
            </div><!-- col-4 -->
            <br>
             
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" data-role="tagsinput" id="size" required name="product_size" value="" placeholder="Enter product Size">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" data-role="tagsinput" id="size" required  name="product_colour" value="" placeholder="Enter product colour">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Discount Price $: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="discount_price" value="" required placeholder="Enter Discount price">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Product Quantity : <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_quantity" value="" required placeholder="Enter Product Quantity">
              </div>
            </div><!-- col-4 -->
           
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Product Detail: <span class="tx-danger">*</span></label>
               <textarea class="form-control" name="product_detail" id="summernote" required cols="30" rows="15"></textarea>
                {{-- <input class="form-control" type="text" name="product_detail" value="" id="summernote"> --}}
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="video_link" value="" required placeholder="Enter Video Link">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Choose image One (Main Thumbnail): <span class="tx-danger">*</span></label>
                <label class="custom-file">
                  <input type="file" id="file" name="image_one" onchange="readURL(this); " required class="custom-file-input">
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="one">
                </label>              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Choose image Two : <span class="tx-danger">*</span></label>
                <label class="custom-file">
                  <input type="file" id="file" name="image_two" onchange="readURL2(this); " required class="custom-file-input">
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="two">
                </label>              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Choose image Three: <span class="tx-danger">*</span></label>
                <label class="custom-file">
                  <input type="file" id="file" name="image_three" onchange="readURL3(this); " required class="custom-file-input">
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="three">
                </label>              </div>
            </div><!-- col-4 -->

          </div><!-- row -->
          {{-- radio box  --}}
          <br>
          <hr>
          <br>
          <div class="row">
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="	main_slider" value="1">
                <span>Maain Slider</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="hot_deal" value="1">
                <span>Hot Deal</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="best_rated" value="1">
                <span>Best Rated</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="mid_slider" value="1">
                <span>Mid Slider</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="hot_new" value="1">
                <span>Hot New</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="trend" value="1">
                <span>Trend</span>
              </label>
            </div><!-- col-4 -->

          </div><!-- row -->
          <br><br>


          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Add Product</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </div><!-- card -->
    </form>

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
