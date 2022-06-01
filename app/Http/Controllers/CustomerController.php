<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;


class CustomerController extends Controller
{
    public function log_in()
    {
        return view('pages.login');
    }


    public function sign_in(Request $request)
    {

        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);
        $result = DB::table('tbl_customer')
            ->where('customer_email', $customer_email)
            ->where('customer_password', $customer_password)
            ->first();
        if ($result) {
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_phone', $result->customer_phone);
            return Redirect::to('/');

        } else {
            Session::put('messege', '<h2 style="text-align: center; color: #ff2832">Email or Password Invalid</h2>');
            return Redirect::to('/login');

        }
    }

    public function registrations()
    {
        return view('pages.registration');
    }


    public function signup(Request $request)
    {

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')
            ->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/login');
    }


    public function logout(){
        Session::flush();
//        Cart::destroy();
        return Redirect::to('');
    }
}
