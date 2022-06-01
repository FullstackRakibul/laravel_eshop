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
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Payment Status</th>
                        <th>Payment Methods</th>
                        <th>Order Status</th>
                        <th>Order Total</th>
                        <th>View Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_order_info as $v_order)
                        <tr>
                            <td class="center">{{$v_order->order_id}}</td>
                            <td class="center">{{$v_order->customer_name}}</td>
                            <td class="center">{{$v_order->payment_status}}</td>
                            <td class="center">{{$v_order->payment_method}}</td>
                            <td class="center">{{$v_order->order_status}}</td>
                            <td class="center">{{$v_order->order_total}}</td>
                            <td class="center">
                                <a class="btn btn-success " href="{{URL::to('/order-details/'.$v_order->order_id)}}"
                                   id="view">
                                    <i class="halflings-icon white eye-open"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

@endsection
