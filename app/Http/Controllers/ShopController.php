<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ShopController extends Controller
{
    public function shop(){

        $product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.publication_status', 1)
            ->get();
        $manage_product = view('pages.shop')
            ->with('product_info' , $product_info);


        return view('basePage')
            ->with('pages.shop',$manage_product);

    }


}
