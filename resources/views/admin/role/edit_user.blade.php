@extends('admin.admin_layouts')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Fly Buy</a>
      <span class="breadcrumb-item active">Create User</span>
    </nav>

    <div class="sl-pagebody">
      
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create User 
          {{-- <a href="{{route('all.product')}} "class="btn btn-sm btn-warning" style="float: right" >All Product</a> --}}
        </h6>
        <p class="mg-b-20 mg-sm-b-30"></p>
   <form action="{{route('update.user')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}} ">
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{$user->name}}" required placeholder="Enter  name">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Phone: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="phone" value="{{$user->phone}}" required placeholder="Enter Phone ">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="{{$user->email}}" required placeholder="Enter email ">
              </div>
            </div><!-- col-4 -->
            {{-- <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label"> Password: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="password" value="{{$user->password}}" required placeholder="Enter password ">
              </div>
            </div><!-- col-4 --> --}}
          

            

          </div><!-- row -->
          {{-- radio box  --}}
          <br>
          <hr>
          <br>
          <div class="row">
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="porder" value="1"
                @php
                    if($user->porder==1)
                    {
                        echo "checked";
                    }
                @endphp >
                <span>Order</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="product" value="1"
                @php
                if($user->product==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Product</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="coupon" value="1"
                @php
                if($user->coupon==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Coupon</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="category" value="1"
                @php
                if($user->category==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Category</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="stock" value="1"
                @php
                if($user->stock==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Stock</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="blog" value="1"
                @php
                if($user->blog==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Blog</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="other" value="1"
                @php
                if($user->other==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Others</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="report" value="1"
                @php
                if($user->report==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Report</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="oreturn" value="1"
                @php
                if($user->oreturn==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Return</span>
              </label>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <label class="ckbox">
                <input type="checkbox" name="message" value="1"
                @php
                if($user->message==1)
                {
                    echo "checked";
                }
            @endphp>
                <span>Message</span>
              </label>
            </div><!-- col-4 -->

          </div><!-- row -->
          <br><br>


          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Update User</button>
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
