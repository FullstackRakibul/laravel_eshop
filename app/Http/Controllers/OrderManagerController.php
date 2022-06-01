<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;

class OrderManagerController extends Controller
{
    public function manage_order(){

        $this->adminAuthcheck();

        $all_order_info=DB::table('tbl_order')
            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
            ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
            ->select('tbl_order.*','tbl_customer.customer_name','tbl_payment.payment_status','tbl_payment.payment_method')
            ->get();
//
//            ->join('tbl_order_details','tbl_order_details.product_id','=','tbl_products.product_id')
//            ->join('tbl_payment','tbl_products.brand_id','=','tbl_brand.brand_id')
//
//            ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
//            ->get();

        $manage_order = view('panel.manage_order')
            ->with('all_order_info' , $all_order_info);


        return view('panel_layout')
            ->with('panel.manage_order',$manage_order);
    }

    public function order_details($order_id)
    {
        $this->adminAuthcheck();

        $order_details=DB::table('tbl_order_details')
            ->where('order_id',$order_id)
//            ->join('tbl_products','tbl_products.product_id','=','tbl_order_details.product_id')
//            ->select('tbl_order_details.*','tbl_products.*')
            ->first();

        $manage_order = view('panel.order_details')
            ->with('order_details' , $order_details);
        return view('panel_layout')
            ->with('panel.order_details',$manage_order);



    }
}
