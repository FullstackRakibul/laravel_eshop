<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {

        $product_quantity = $request->product_quantity;
        $product_id = $request->product_id;
        $product_info = DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->first();


        $data['qty'] = $product_quantity;
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);

//        echo "<pre>";
//        print_r($product_info);
//        print_r('Quantity');
//        print_r($product_quantity);
//        echo "</pre>";
        return Redirect::to('/show-cart');

    }


    public function show_cart()
    {
        $all_published_category = DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();

// context...................
        $manage_category = view('pages.cart')
            ->with('all_published_category', $all_published_category);


        return view('basePage')
            ->with('pages.cart', $manage_category);
    }

    public function remove_from_cart($rowId)
    {

        Cart::remove($rowId, 0);
        return Redirect::to('/show-cart');

    }

    public function update_cart(Request $request)
    {

        $qty = $request->product_quantity;
        $rowId = $request->rowId;

        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');

    }

    public function thankyou()
    {

        return view('/pages.thankyou');
    }

    public function save_shipping(Request $request)
    {

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_city'] = $request->shipping_city;
        $data['shipping_zip'] = $request->shipping_zip;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')
            ->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');

    }

    public function payment()
    {
        $all_published_category = DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();
// context...................
        $manage_category = view('pages.payment')
            ->with('all_published_category', $all_published_category);
        return view('basePage')
            ->with('pages.payment', $manage_category);
    }


    public function order_place(Request $request)
    {

        $payment_gateway = $request->payment_gateway;


        //...........this  session id came from basepage
        $paymentData = array();
        $paymentData['payment_method'] = $request->payment_gateway;
        $paymentData['payment_status'] = 'pending';

        $payment_id = db::table('tbl_payment')
            ->insertGetId($paymentData);

        $orderData = array();
        $orderData['customer_id'] = Session::get('customer_id');
        $orderData['shipping_id'] = Session::get('shipping_id');
        $orderData['payment_id'] = $payment_id;
        $orderData['order_total'] = Cart::total();
        $orderData['order_status'] = 'pending';

        $order_id = DB::table('tbl_order')
            ->insertGetId($orderData);

        $contents = Cart::content();
        $orderDetailsData = array();

        foreach ($contents as $v_content) {
            $orderDetailsData['order_id'] = $order_id;
            $orderDetailsData['product_id'] = $v_content->id;
            $orderDetailsData['product_name'] = $v_content->name;
            $orderDetailsData['product_price'] = $v_content->price;
            $orderDetailsData['product_sales_quantity'] = $v_content->qty;

            DB::table('tbl_order_details')
                ->insert($orderDetailsData);

        }
        $msg = '';
        if ($payment_gateway == 'COD') {

            $msg = 'COD Successfull';

        } elseif ($payment_gateway == 'bkash') {

            $msg = 'BKASH payment Successfull';

        } elseif ($payment_gateway == 'nagad') {

            $msg = 'NAGAD payment Successfull';

        } else {

            echo('no Payment methods selected');

        }


        $manage_category = view('pages.thankyou')
            ->with('msg', $msg);
        return view('basePage')
            ->with('pages.thankyou', $manage_category);

    }
}
