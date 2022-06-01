<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function adminAuthcheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return;
        }
        else{
            return Redirect::to("/panel")->send();
        }
    }

    public function customerAuthcheck(){

        $customer_id=Session::get('customer_id');
        if ($customer_id){
            return;
        }
        else{
            return Redirect::to("/login")->send();
        }
    }
}
