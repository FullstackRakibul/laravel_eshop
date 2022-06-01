<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;

session_start();

class ProductController extends Controller
{
    public function add_product()
    {
        $this->adminAuthcheck();

        return view('panel.add_product');
    }

    public function save_product(Request $request)
    {
        $this->adminAuthcheck();

        $data = array();
        $data['product_id'] = $request->product_id;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('product_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/slider/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('tbl_products')->insert($data);
                Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center"  >Product Added successfully.<p/>');
                return Redirect::to('/add-product');

            }
        }
        $data['product_image'] = '';

        DB::table('tbl_products')->insert($data);
        Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center"  >Product Added successfully.<p/>');
        return Redirect::to('/add-product');

//        return view('panel.add_product');
    }

    public function all_product()
    {
        $this->adminAuthcheck();

        $all_product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->get();
        $manage_product = view('panel.all_product')
            ->with('all_product_info' , $all_product_info);


        return view('panel_layout')
            ->with('panel.all_product',$manage_product);
    }


    public function inactive_product($product_id)
    {
        $this->adminAuthcheck();

        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
        Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center" > Inactive Successfully </p>');
        return Redirect::to('/all-product');

    }

    public function active_product($product_id)
    {

        $this->adminAuthcheck();

        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
        Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center" > Active Successfully </p>');
        return Redirect::to('/all-product');

    }


    public function edit_product($product_id)
    {

        $this->adminAuthcheck();


        $product_info = DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->first();
        $product_info = view('panel.edit_product')
            ->with('product_info', $product_info);

        return view('panel_layout')
            ->with('panel.edit_product', $product_info);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->adminAuthcheck();


        $data = array();
        $data['product_id'] = $request->product_id;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('product_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('tbl_products')->insert($data);
                Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center"  >Product Added successfully.<p/>');
                return Redirect::to('/all-product');

            }
        }
        $data['product_image'] = '';

        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update($data);

        Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center" > Update Successfully </p>');
        return Redirect::to('/all-product');
    }


    public function delete_product($product_id)
    {
        $this->adminAuthcheck();

        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();
        Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center" > Deleted Successfully </p>');
        return Redirect::to('/all-product');
    }


}
