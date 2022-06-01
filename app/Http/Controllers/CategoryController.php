<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    public function add_category(){
        $this->adminAuthcheck();
        return view ('panel.add_category');
    }


    public function all_category(){
        $this->adminAuthcheck();

        $all_category_info=DB::table('tbl_category')->get();
        $manage_category = view('panel.all_category')
            ->with('all_category_info' , $all_category_info);
        return view('panel_layout')
            ->with('panel.all_category',$manage_category);


        //return view ('panel.all_category');
    }

    public function save_category(Request $request){
        $this->adminAuthcheck();

        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center"  >Category Added successfully.<p/>');
        return Redirect::to('/add-category');
    }



    public function inactive_category($category_id){
        $this->adminAuthcheck();


        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status'=>0]);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Inactive Successfully </p>');
        return Redirect::to('/all-category');

    }

    public function active_category($category_id){
        $this->adminAuthcheck();

        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status'=>1]);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Active Successfully </p>');
        return Redirect::to('/all-category');

    }


    public function edit_category($category_id){
        $this->adminAuthcheck();

        $category_info = DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->first();
        $category_info = view('panel.edit_category')
            ->with('category_info' , $category_info);

        return view('panel_layout')
            ->with('panel.edit_category',$category_info);

        //return view ('panel.edit_category');
    }

    public function update_category(Request $request ,$category_id){
        $this->adminAuthcheck();


        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);

        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Update Successfully </p>');
        return Redirect::to('/all-category');
    }


    public function delete_category($category_id){
        $this->adminAuthcheck();


        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->delete();
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Deleted Successfully </p>');
        return Redirect::to('/all-category');
    }



}
