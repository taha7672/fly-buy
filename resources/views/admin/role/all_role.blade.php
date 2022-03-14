@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="container-fluid">

   <!-- ########## START: MAIN PANEL ########## -->
   
   <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Brands Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand List 
          <a href="{{route('new.user')}}" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Add New</a>

        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Phone</th>
                <th class="wd-15p">Role</th>
                <th class="wd-20p">Action</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($role as $key=>$row)
                  
          
              <tr>
                <td>{{$key+1}} </td>
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>
                  @if ($row->category==1)
                  <span class="badge btn-success">category</span>
                  @else
                      
                  @endif
                  @if ($row->coupon==1)
                  <span class="badge btn-info">coupon</span>
                  @else
                      
                  @endif
                  @if ($row->porder==1)
                  <span class="badge btn-warning">order</span>
                  @else
                      
                  @endif
                  @if ($row->product==1)
                  <span class="badge btn-success">product</span>
                  @else
                      
                  @endif
                  @if ($row->stock==1)
                  <span class="badge btn-info">stock</span>
                  @else
                      
                  @endif
                  @if ($row->report==1)
                  <span class="badge btn-danger">report</span>
                  @else
                      
                  @endif
                  @if ($row->oreturn==1)
                  <span class="badge btn-warning">return</span>
                  @else
                      
                  @endif
                  @if ($row->message==1)
                  <span class="badge btn-info">Message</span>
                  @else
                      
                  @endif
                  @if ($row->blog==1)
                  <span class="badge btn-success">Blog</span>
                  @else
                      
                  @endif
                  @if ($row->message==1)
                  <span class="badge btn-warning">Message</span>
                  @else
                      
                  @endif
                  @if ($row->contact==1)
                  <span class="badge btn-info">Contact</span>
                  @else
                      
                  @endif
                  @if ($row->other==1)
                  <span class="badge btn-success">Other</span>
                  @else
                      
                  @endif
             
                </td>
            
                <td>
                    
                <a href="{{ URL::to('edit/admin/'.$row->id)}}" class="btn btn-sm btn-info" >Edit</a>
                <a href="{{ URL::to('delete/admin/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
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