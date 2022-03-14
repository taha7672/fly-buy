@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Sub CategoryTable</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Sub Category Update
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
    <form class="pd-x-20" method="POST" action="{{url('update/subcategory/'.$subcat->id)}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sub Category Name</label>
          <input  type="text" class="form-control" name="subcategory_name" id="exampleInputEmail1"
           aria-describedby="emailHelp"value="{{$subcat->subcategory_name}} " name="subcategory_name"
            >
        </div>       
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
             <select class="form-control" name="category_id">
           
              @foreach($category as $row)
              <option value="{{ $row->id }}"
          <?php if ($row->id == $subcat->category_id ) {
           echo 'selected'; } ?> >{{ $row->category_name }}  </option> 
              @endforeach
  
             </select>
            
          </div>
          
      <div class="modal-footer">
        <button type="submit" class="btn btn-info pd-x-20">Update</button>
      </div>
    </form>

       

    
@endsection