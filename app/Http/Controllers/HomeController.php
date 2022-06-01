<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;
use Cart;
session_start();

class HomeController extends Controller
{
    public function index()
    {
//.............Product data.............................
        $product_info=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
            ->where('tbl_products.publication_status', 1)
            ->limit(10)
            ->get();


// ................category product ..................
        $category_wise_product=DB::table('tbl_category')
            ->join('tbl_products','tbl_products.category_id','=','tbl_category.category_id')
            ->select('tbl_products.*','tbl_category.category_name')
            ->where('tbl_category.publication_status', 1)
            ->where('tbl_products.publication_status', 1)
            ->get();

        $all_category_info=DB::table('tbl_category')
            ->where('tbl_category.publication_status', 1)
            ->get();


        //...........slider ...................

        $all_slider=DB::table('tbl_slider')
            ->where('tbl_slider.publication_status', 1)
            ->get();



        $manage_product = view('pages.home_content')
            ->with('product_info' , $product_info)
            ->with('category_wise_product' , $category_wise_product)
            ->with('all_category_info' , $all_category_info)
            ->with('all_slider' , $all_slider);

        return view('basePage')
            ->with('pages.home_content',$manage_product);
    }

    public function gmap()
    {
        return view('pages.gmap');
    }


    public function category_product($category_id)
    {
        $category_wise_product=DB::table('tbl_category')
            ->where('tbl_category.category_id', $category_id)
            ->join('tbl_products','tbl_products.category_id','=','tbl_category.category_id')
            ->select('tbl_products.*','tbl_category.category_name')
            ->where('tbl_category.publication_status', 1)
            ->get();

        $manage_product = view('pages.category_product')
            ->with('category_wise_product' , $category_wise_product);


        return view('basePage')
            ->with('pages.category_product',$manage_product);
    }


    public function brand_product($brand_id)
    {
        $brand_wise_product=DB::table('tbl_brand')
            ->where('tbl_brand.brand_id', $brand_id)
            ->join('tbl_products','tbl_products.brand_id','=','tbl_brand.brand_id')
            ->select('tbl_products.*','tbl_brand.brand_name')
            ->where('tbl_brand.publication_status', 1)
            ->get();

        $manage_product = view('pages.brand_product')
            ->with('brand_wise_product' , $brand_wise_product);


        return view('basePage')
            ->with('pages.brand_product',$manage_product);
    }



}
