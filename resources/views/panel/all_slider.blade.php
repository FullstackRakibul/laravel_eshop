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
                        <th>Slider ID</th>
                        <th>Slider Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach( $all_slider as $v_slider )

                        <tbody>
                        <tr>
                            <td class="center">{{$v_slider->slider_id}}</td>
                            <td><img src="{{URL::to($v_slider->slider_image)}}" height="80" width="200"></td>
                            <td class="center">
                                @if($v_slider->publication_status==1)
                                    <span class="label label-success p-3">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($v_slider->publication_status==1)
                                    <a class="btn btn-success"
                                       href="{{URL::to('/inactive-slider/'.$v_slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @else
                                    <a class="btn btn-danger" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif


                                <a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}" id="delete">
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



