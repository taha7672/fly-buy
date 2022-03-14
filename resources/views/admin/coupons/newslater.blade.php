@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
   <div class="">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Subscriber Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Newslater List 
          <a href=""class="btn btn-sm btn-warning" style="float: right"
           data-toggle="modal" data-target="#modaldemo3">Delete All</a>

        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Subscription Time</th>
                <th class="wd-20p">Action</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($news as $key=>$row)
                  
          
              <tr>
                <td><input type="checkbox"> {{$key+1}} </td>
                <td>{{$row->email}} </td>
                <td>{{ \carbon\carbon::parse($row->created_at)->shortRelativeDiffForHumans() }} </td>
                <td>
                    
                    
                <a href="{{ URL::to('delete/newslater/'.$row->id)}} " class="btn btn-sm btn-danger" id="delete">Delete</a>
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