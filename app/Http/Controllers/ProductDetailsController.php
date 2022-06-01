<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class ProductDetailsController extends Controller
{
    public function product_details($product_id){

        $product_info = DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->first();
        $product_info = view('pages.product_details')
            ->with('product_info', $product_info);

        return view('basePage')
            ->with('pages.product_details', $product_info);

        return view('pages.product_details');
    }
}
