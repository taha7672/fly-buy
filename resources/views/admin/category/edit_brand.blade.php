@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Brand Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand Update
        </h6>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="pd-x-20" method="POST" action="{{url('update/brand/'.$brand->id)}} " enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Brand Name</label>
            <input  type="text" class="form-control" name="brand_name" id="exampleInputEmail1"
             aria-describedby="emailHelp" value="{{$brand->brand_name}} " >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
            <input  type="file" class="form-control" name="brand_logo" id="exampleInputEmail1"
             aria-describedby="emailHelp"  value="{{$brand->brand_logo}}" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Old Brand Logo</label>
             <img src="{{ URL::to($brand->brand_logo)}} " alt="" height="70px" width="80px">
             <input type="hidden" name="old_logo" value="{{$brand->brand_logo}} " >
            </div>
            
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Update</button>
        </div>
      </form>

       

    
@endsection