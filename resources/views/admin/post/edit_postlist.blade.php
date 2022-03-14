@extends('admin.admin_layouts')
@section('admin_content')


@php
   $blogcategory= DB::table('post_category')->get();
 
@endphp

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Fly Buy</a>
      <span class="breadcrumb-item active">Create Blog Post</span>
    </nav>

    <div class="sl-pagebody">
      
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create Blog Post 
          <a href="{{route('post.list')}} "class="btn btn-sm btn-warning" style="float: right" >All Blog Post</a>
        </h6>
        <p class="mg-b-20 mg-sm-b-30"></p>
   <form action="{{url('update/blog/post/'. $postlist->id)}} " method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">category_id: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Post Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach ($blogcategory as $row)
                    <option value="{{$row->id}} " <?php if ($row->id == $postlist->category_id) {
                      echo 'selected';
                   }?> >{{$row->category_name_en}} </option>
                   @endforeach
                    </select>              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Post title English: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="post_title_en" value="{{$postlist->post_title_en}}" >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Post title Urdu: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="post_title_ur" value="{{$postlist->post_title_ur}}" >
              </div>
            </div><!-- col-4 -->             
           
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Detail English: <span class="tx-danger">*</span></label>
               <textarea class="form-control" name="details_en"  id="summernote" cols="30" rows="10">
                {!! $postlist->details_en !!}
               </textarea>
              </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Detail Urdu: <span class="tx-danger">*</span></label>
               <textarea class="form-control" name="details_ur" cols="30" rows="10">
                {!! $postlist->details_ur !!}
               </textarea>
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label>
                <label class="custom-file">
                  <input type="file" id="file" name="post_image" onchange="readURL(this); " required class="custom-file-input">
                  <span class="custom-file-control"></span>
                  <img src="#" alt="" id="one">
                </label>             
               </div>
               </div>
         <br>
         <br>
         <br>
         <br>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Old Post Image: <span class="tx-danger">*</span></label>
                <label class="custom-file">
                  <img src="{{URL::to($postlist->post_image)}} " height="80px" ,  width="90px" alt="" id="one">
                  <input type="hidden" name="old_image" value="{{$postlist->post_image}} ">
                </label>            
                </div>
                </div>
            
                <br>
            <br>
           
          </div><!-- row -->
            </div>
            <br>
            <br>
          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Add Post</button>
            <button class="btn btn-secondary">Cancel</button>
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
