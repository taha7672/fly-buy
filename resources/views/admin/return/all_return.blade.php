@extends('admin.admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">

   <!-- ########## START: MAIN PANEL ########## -->
   <div class="">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Pending Order</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Pending Order
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
                {{-- <th class="wd-20p">Status</th> --}}
                <th class="wd-20p">Action</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($return as $row)
                  
          
              <tr>
                <td>{{$row->payment_type}}</td>
                <td>{{$row->blnc_transection}}</td>
                <td>$ {{$row->subtotal}}</td>
                <td>$ {{$row->vat}}</td>
                <td>$ {{$row->shipping}}</td>
                <td>$ {{$row->total}}</td>
                {{-- <td>
                
                 
                  @if($row->return_order==1)
                  <span class="badge badge-info">requested</span>
                  @elseif($row->return_order==2)
                  <span class="badge badge-success">success</span>
                     
                  @endif
                </td> --}}
            
                    <td>    
                        <span class="badge badge-success">Return success</span>
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