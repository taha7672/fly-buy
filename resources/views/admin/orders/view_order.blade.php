@extends('admin/admin_layouts')

    

@section('admin_content')
<br> <br>
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Order Details</h5>
        </div><!-- sl-page-title -->
        <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Order</strong> Details</div>
                <div class="cart-body">
                    <table>
                        <tr>
                            <th> Name:  </th>
                            <th> {{$order->name}} </th>
                        </tr>
                        <tr>
                            <th> Phone:  </th>
                            <th> {{$order->phone}} </th>
                        </tr>
                        <tr>
                            <th> Payment type:  </th>
                            <th> {{$order->payment_type}} </th>
                        </tr>
                        <tr>
                            <th> Payment ID:  </th>
                            <th> {{$order->payment_id}} </th>
                        </tr>
                       
                        <tr>
                            <th> Total:  </th>
                            <th> {{$order->payment_amount}} $ </th>
                        </tr>
                        
                        <tr>
                            <th> Date:  </th>
                            <th> {{$order->date}} </th>
                        </tr>
                    </table>
                </div>
            
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Shipping</strong> Details</div>
                <div class="cart-body">
                    <table>
                        <tr>
                            <th> Name:  </th>
                            <th> {{$shipping->ship_name}} </th>
                        </tr>
                        <tr>
                            <th> Phone:  </th>
                            <th> {{$shipping->ship_phone}} </th>
                        </tr>
                        <tr>
                            <th> Email:  </th>
                            <th> {{$shipping->ship_email}} </th>
                        </tr>
                        <tr>
                            <th> City:  </th>
                            <th> {{$shipping->ship_city}} </th>
                        </tr>
                       
                        <tr>
                            <th> Address:  </th>
                            <th> {{$shipping->ship_address}}  </th>
                        </tr>
                        
                        <tr>
                            <th> Status:  </th>
                            <th> 
                              @if ($order->status == 0)
                              <span class="badge badge-warning">Pending</span>
                                  @elseif($order->status == 1)
                                  <span class="badge badge-info">Accpet Payment</span>
                                  @elseif($order->status == 2)
                                  <span class="badge badge-info">Progress</span>
                                  @elseif($order->status == 3)
                                  <span class="badge badge-success">Delivered</span>
                                  @else
                                  <span class="badge badge-danger">Cancel</span>
                              @endif
                                
                            </th>
                        </tr>
                    </table>
                </div>
            
            </div>
        </div>
        <br>
        <br>
            <div class="row mt-5 ">
                <div class="card pd-20 pd-sm-40 col-lg-12 m-auto">
                    <h6 class="card-body-title">Product details
                      {{-- <a href="{{route('create.product')}} "class="btn btn-sm btn-warning" style="float: right" >Add New</a> --}}
            
                    </h6>
            
                    <div class="table-wrapper">
                      <table  class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Product ID</th>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>    
                            {{-- <th class="wd-15p">Image</th>  --}}
                            <th class="wd-15p">Colour</th>
                            <th class="wd-15p">Size</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Unit Price</th>
                            <th class="wd-15p">Total price</th>
                            {{-- <th class="wd-20p">Action</th> --}}
                           
                          </tr>
                        </thead>
                        <tbody>
                            <style>
                                .imgm{
                                    margin-right:-30px;
                                }
                            </style>
                          @foreach ($details as $key=>$row)
                              
                      
                          <tr>
                            <td>{{$key+1}} </td>
                            <td >{{$row->product_code}} </td>
                            <td >{{$row->product_name}} </td>
                            {{-- <td><img src="{{ URL::to($row->image_one)}} " class="imgm" alt="" height="50px" width="50px">  <td>  --}}
                              <td >{{$row->color}} </td>
                              <td >{{$row->size}} </td>
                              <td >{{$row->quantity}} </td>
                              <td >{{$row->singleprice}} </td>
                              <td >{{$row->totalprice}} </td>
                              
                          @endforeach
                          </tr>
                         
                        </tbody>
                      </table>
                      </div><!-- table-wrapper -->
                  </div><!-- card -->
                  <br>
                  @if ($order->status==0)
                  <a href= {{url('admin/payment/accept/'.$order->id)}} class="btn btn-info ml-5">Accept Payment</a>
                  <a href= {{url('admin/payment/cancel/'.$order->id)}} class="btn btn-danger ml-5">Cancel Payment</a>
                  @elseif($order->status==1)
                  <a href= {{url('admin/order/delivery/'.$order->id)}} class="btn btn-warning ml-5">Process Delivery</a>
                  @elseif($order->status==2)
                  <a href= {{url('admin/order/delivery/done/'.$order->id)}} class="btn btn-info ml-5">Delivery Done</a>
                  @elseif($order->status==4)
                  <h5><strong class="text-alert ml-5">This order is not vaild.</strong></h5>

                  @else
                      <h5><strong class="text-success ml-5">This product is delivered successfully .</strong></h5>
                  @endif
                 
            </div>

        </div>
      
    </div>

</div>










@endsection