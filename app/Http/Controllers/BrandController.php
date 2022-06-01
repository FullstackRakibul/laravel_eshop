<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class BrandController extends Controller
{
    public function add_brand(){
        $this->adminAuthcheck();

        return view ('panel.add_brand');
    }


    public function all_brand(){
        $this->adminAuthcheck();

        $all_brand_info=DB::table('tbl_brand')->get();
        $manage_brand = view('panel.all_brand')
            ->with('all_brand_info' , $all_brand_info);
        return view('panel_layout')
            ->with('panel.all_brand',$manage_brand);


        //return view ('panel.all_category');
    }

    public function save_brand(Request $request){
        $this->adminAuthcheck();


        $data=array();
        $data['brand_id']=$request->brand_id;
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center"  > Brand Added successfully.<p/>');
        return Redirect::to('/add-brand');
    }



    public function inactive_brand($brand_id){
        $this->adminAuthcheck();

        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->update(['publication_status'=>0]);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Inactive Successfully </p>');
        return Redirect::to('/all-brand');

    }

    public function active_brand($brand_id){
        $this->adminAuthcheck();


        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->update(['publication_status'=>1]);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Active Successfully </p>');
        return Redirect::to('/all-brand');

    }


    public function edit_brand($brand_id){
        $this->adminAuthcheck();


        $brand_info = DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->first();
        $brand_info = view('panel.edit_brand')
            ->with('brand_info' , $brand_info);

        return view('panel_layout')
            ->with('panel.edit_brand',$brand_info);

        //return view ('panel.edit_category');
    }

    public function update_brand(Request $request ,$brand_id){
        $this->adminAuthcheck();

        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;

        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->update($data);

        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Update Successfully </p>');
        return Redirect::to('/all-brand');
    }


    public function delete_brand($brand_id){
        $this->adminAuthcheck();


        DB::table('tbl_brand')
            ->where('brand_id',$brand_id)
            ->delete();
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Deleted Successfully </p>');
        return Redirect::to('/all-brand');
    }



}
