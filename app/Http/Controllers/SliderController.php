<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use DB;
use Session;

session_start();

class SliderController extends Controller
{
    public function add_slider()
    {
        $this->adminAuthcheck();


        return view('panel.add_slider');
    }


    public function save_slider(Request $request)
    {
        $this->adminAuthcheck();

        $data = array();
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('slider_image');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'slider/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('tbl_slider')->insert($data);
                Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center"  >Slider Added successfully.<p/>');
                return Redirect::to('/add-slider');

            }
        }
        $data['slider_image'] = '';

        DB::table('tbl_slider')->insert($data);
        Session::put('message', '<p class="alert-success" style="padding: 10px; text-align: center"  >Slider Added Without image .<p/>');
        return Redirect::to('/add-slider');

    }

    public function all_slider(){
        $this->adminAuthcheck();


        $all_slider=DB::table('tbl_slider')->get();
        $manage_slider = view('panel.all_slider')
            ->with('all_slider' , $all_slider);
        return view('panel_layout')
            ->with('panel.all_slider',$manage_slider);
    }

    public function inactive_slider($slider_id){
        $this->adminAuthcheck();


        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status'=>0]);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Inactive Successfully </p>');
        return Redirect::to('/all-slider');

    }



    public function active_slider($slider_id){
        $this->adminAuthcheck();

        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status'=>1]);
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Active Successfully </p>');
        return Redirect::to('/all-slider');

    }



    public function delete_slider($slider_id){
        $this->adminAuthcheck();

        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();
        Session::put('message','<p class="alert-success" style="padding: 10px; text-align: center" > Deleted Successfully </p>');
        return Redirect::to('/all-slider');

    }

}
