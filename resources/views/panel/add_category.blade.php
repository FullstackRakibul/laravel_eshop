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

        <?php
        $message = Session::get('message');

        if ($message) {
            echo $message;
            Session::put('message', NULL);
        }
        ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category Form</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/save-category')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label"> Category Name </label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="category_name" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Category Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="category_image" type="file">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="category_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Publication Status </label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save changes</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->

@endsection
