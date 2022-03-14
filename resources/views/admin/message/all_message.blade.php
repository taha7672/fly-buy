@extends('admin.admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
   <div class="">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>All Message</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">All Message
          {{-- <a href=""class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Add New</a> --}}

        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Phone</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Message</th>
             
               
              </tr>
            </thead>
            <tbody>
              @foreach ($message as $row)
                  
          
              <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->message}}</td>
             
             
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