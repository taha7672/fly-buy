@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="container-fluid">

   <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>CategoryTable</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category List 

        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Category Name</th>
                <th class="wd-20p">Post title En</th>
                <th class="wd-20p">Post Image</th>
                <th class="wd-20p">Action</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($postlist as $key=>$row)
                  
          
              <tr>
                <td>{{$key+1}} </td>
                <td>{{$row->category_name_en}} </td>
                <td>{{$row->post_title_en}} </td>
                <td><img src="{{URL::to($row->post_image)}} " alt="" height="70px" width="70px"> </td>
                <td>              
                <a href="{{ URL::to('edit/postlist/'.$row->id)}} " class="btn btn-sm btn-info" >Edit</a>
                <a href="{{ URL::to('delete/blog/post/'.$row->id)}} " class="btn btn-sm btn-danger" id="delete">Delete</a>
              </td>
              @endforeach
              </tr>
             
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

       

     
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->
</div>



    
@endsection