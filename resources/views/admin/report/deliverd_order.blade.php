@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
   <div class="">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Month Orders</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Month Orders
          {{-- <a href=""class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Add New</a> --}}

        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Payment Type</th>
                <th class="wd-15p">Transction ID</th>
                <th class="wd-15p">Subtotal</th>
                <th class="wd-15p">Vat</th>
                <th class="wd-15p">Shipping</th>
                <th class="wd-15p">Total</th>
                <th class="wd-20p">Status</th>
                <th class="wd-20p">Action</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($order as $row)
                  
          
              <tr>
                <td>{{$row->payment_type}}</td>
                <td>{{$row->blnc_transection}}</td>
                <td>$ {{$row->subtotal}}</td>
                <td>$ {{$row->vat}}</td>
                <td>$ {{$row->shipping}}</td>
                <td>$ {{$row->total}}</td>
                <td>
                  @if ($row->status == 0)
                  <span class="badge badge-warning">Pending</span>
                      @elseif($row->status == 1)
                      <span class="badge badge-info">Accpet Payment</span>
                      @elseif($row->status == 2)
                      <span class="badge badge-info">Progress</span>
                      @elseif($row->status == 3)
                      <span class="badge badge-success">Delivered</span>
                      @else
                      <span class="badge badge-danger">Cancel</span>
                  @endif
                </td>
            
                    <td>    
                <a href="{{ URL::to('admin/view/order/'.$row->id)}}" class="btn btn-sm btn-info" >View</a>
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