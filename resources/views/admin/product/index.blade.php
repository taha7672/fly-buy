@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Fly Buy</a>
      <span class="breadcrumb-item active">Products</span>
    </nav>

    <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Products Table</h5>
          </div><!-- sl-page-title -->
    
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product List 
              <a href="{{route('create.product')}} "class="btn btn-sm btn-warning" style="float: right" >Add New</a>
    
            </h6>
    
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">ID</th>
                    <th class="wd-15p">Product Code</th>
                    <th class="wd-15p">Product Name</th>    
                    {{-- <th class="wd-15p">Image</th>  --}}
                    <th class="wd-15p">Category</th>
                    <th class="wd-15p">Brand</th>
                    <th class="wd-15p">Quantity</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-20p">Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($product as $key=>$row)
                      
              
                  <tr>
                    <td>{{$key+1}} </td>
                    <td >{{$row->product_code}} </td>
                    <td >{{$row->product_name}} </td>
                    {{-- <td><img src="{{ URL::to($row->image_one)}} "  alt="" height="50px" width="50px">  <td>  --}}
                      <td >{{$row->category_name}} </td>
                      <td >{{$row->brand_name}} </td>
                      <td >{{$row->product_quantity}} </td>
                      <td >

                      @if ($row->status==1)
                      <span class="badge badge-success ">Active</span>
                          
                      @else
                      <span class="badge badge-danger ">Inctive</span>
                      @endif
                      </td>    
                      <td>                        
                     <a href="{{ URL::to('edit/product/'.$row->id)}}" title="Edit" class="btn btn-sm btn-info" > <i class="fa fa-edit"> </i> </a>
                    <a href="{{ URL::to('delete/product/'.$row->id)}}" title="Delete" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i>  </a> 
                    <a href="{{ URL::to('show/product/'.$row->id)}}"  title="Show" class="btn btn-sm btn-warning" ><i class="fa fa-eye"></i>  </a>

                    @if ($row->status==1)
                    <a href="{{ URL::to('inactive/product/'.$row->id)}}" title="Inactive"  class="btn btn-sm btn-info"><i class="fa fa-thumbs-down"></i>  </a> 

                    @else
                    <a href="{{ URL::to('active/product/'.$row->id)}}" title="Active"  class="btn btn-sm btn-info" ><i class="fa fa-thumbs-up"></i>  </a> 

                    @endif
                  </td>
                  @endforeach
                  </tr>
                 
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
    
           
    
         
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->

@endsection
