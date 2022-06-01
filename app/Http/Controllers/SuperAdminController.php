<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SuperAdminController extends Controller
{
    public function logout(){
        Session::flush();
        return Redirect::to('/panel');
    }

//This method is already define in main Controller by Rakibul Hasan
//    public function adminAuthcheck(){
//        $admin_id=Session::get('admin_id');
//        if ($admin_id){
//            return;
//        }
//        else{
//            return Redirect::to("/panel")->send();
//        }
//    }

    public function dashboard(){
        $this->adminAuthcheck();
        return view('panel.panel');
    }
}
