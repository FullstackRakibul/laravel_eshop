@extends('panel_layout')

@section('panelContent')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
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
    <?php
    $all_category = DB::table('tbl_category')
        ->where('publication_status', 1)
        ->get();
    $all_brand = DB::table('tbl_brand')
        ->where('publication_status', 1)
        ->get();
    ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/update-product',$product_info->product_id)}}"
                      method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label"> Product Name </label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_name"
                                       value="{{$product_info->product_name}}" required="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Product Price </label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_price"
                                       value="{{$product_info->product_price}}" required="">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="product_image"
                                       value="{{$product_info->product_image}}" type="file">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3"> Category </label>
                            <div class="controls">
                                <select id="selectError3" name="{{$product_info->category_id}}">
                                    @foreach($all_category as $v_category)
                                        <option
                                            value="{{$v_category->category_id}}" selected>{{$v_category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3"> Brands </label>
                            <div class="controls">
                                <select id="selectError3" name="brand_id">
                                    @foreach($all_brand as $v_brand)
                                        <option value="{{$v_brand->brand_id}}"
                                                selected>{{$v_brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea">Product Short Description</label>
                            <div class="controls">
                                <textarea name="product_short_description" rows="2"
                                          cols="50">{{$product_info->product_short_description}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Product Size </label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_size"
                                       value="{{$product_info->product_size}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Product Color </label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_color"
                                       value="{{$product_info->product_color}}">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Long Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description"
                                          rows="3">{{$product_info->product_long_description}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Publication Status </label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status"
                                       value="{{$product_info->publication_status}}">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> Add Product</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->

@endsection
