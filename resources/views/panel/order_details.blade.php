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
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Products Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center">{{$order_details->product_name}}</td>
                            <td class="center">{{$order_details->product_price}}</td>
                            <td class="center">{{$order_details->product_sales_quantity}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

@endsection
