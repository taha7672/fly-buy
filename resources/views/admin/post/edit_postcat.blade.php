@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>CategoryTable</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Category Update
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
        <form class="pd-x-20" method="POST" action="{{url('update/post/category/'.$postcat->id)}} ">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Category Name English</label>
            <input  type="text" class="form-control" name="category_name_en" id="exampleInputEmail1"
             aria-describedby="emailHelp" value="{{$postcat->category_name_en}} " >
           
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Category Name Urdu</label>
            <input  type="text" class="form-control" name="category_name_ur" id="exampleInputEmail1"
             aria-describedby="emailHelp" value="{{$postcat->category_name_ur}} " >
           
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Update</button>
        </div>
      </form>

       

    
@endsection