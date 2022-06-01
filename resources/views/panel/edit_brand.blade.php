@extends('panel_layout')

@section('panelContent')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Forms</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand Form</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/update-brand',$brand_info->brand_id)}}" method="post">
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label"> brand Name </label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="brand_name" value="{{$brand_info->brand_name}}" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">brand Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="brand_image" type="file">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Brand Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="brand_description" rows="3">{{$brand_info->brand_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update changes</button>
                        </div>
                    </fieldset>

                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->

@endsection
