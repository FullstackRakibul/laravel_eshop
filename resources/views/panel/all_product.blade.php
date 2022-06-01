@extends('panel_layout')

@section('panelContent')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <?php
    $message = Session::get('message');

    if ($message) {
        echo $message;
        Session::put('message', NULL);
    }
    ?>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach ($all_product_info as $v_product )

                        <tbody>
                        <tr>
                            <td>{{$v_product->product_id}}</td>
                            <td class="center">{{$v_product->product_name}}</td>
                            <td class="center">{{$v_product->product_price}}</td>
                            <td class="center"><img src="{{URL::to($v_product->product_image)}}"
                                                    style="width: 80px; height: 80px"></td>
                            <td class="center">{{$v_product->category_name}}</td>
                            <td class="center">{{$v_product->brand_name}}</td>
                            <td class="center">
                                @if($v_product->publication_status==1)
                                    <span class="label label-success p-3">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($v_product->publication_status==1)
                                    <a class="btn btn-success"
                                       href="{{URL::to('/inactive-product/'.$v_product->product_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @else
                                    <a class="btn btn-danger"
                                       href="{{URL::to('/active-product/'.$v_product->product_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif


                                <a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_product->product_id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}"
                                   id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach

                </table>
            </div>
        </div><!--/span-->

@endsection
