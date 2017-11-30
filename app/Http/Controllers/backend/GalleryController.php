<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use App\Model\backend\Gallery;
use Session;
use Redirect;
use DB;

class GalleryController extends Controller
{
    public function index(){
    	$inputs = Input::all();
    	if(isset($inputs['token']) && $inputs['token'] == 'inactive'){
    		$index = Gallery::where('status',0)->get();
    	}else{
    		$index = Gallery::where('status',1)->get();
    	}
    	$active_count = Gallery::where('status',1)->count();
    	$inactive_count = Gallery::where('status',0)->count();
    	return view('backend.gallery.index',compact('index','active_count','inactive_count'));
    }


    public function add(){
    	return view('backend.gallery.add');
    }

    public function check_galleryname(Request $request){
    	$inputs = Input::all();
    	$name = $inputs['name'];
    	$check_gallery_exist = Gallery::where('title',$name)->where('status',1)->count();
    	if($check_gallery_exist > '0'){
    		return "false";
    	}else{
    		return "true";
    	}
    }

    public function store(Request $request){
    	$inputs = Input::all();
    	$data = Gallery::create([
    		'title' => $inputs['name'],
    		'slug' => $inputs['slug'],
    		'status' => '1'
    		]);

    	$id = $data->id;

    	$imagefile = $request->image;
        if($imagefile != ''){
           $destinationPath = public_path(). '/uploads/gallery_image';
           $extension = $imagefile->getClientOriginalExtension(); 
           $filename_value = time().rand(100000, 10000);
           $filename = md5($filename_value).".".$imagefile->getClientOriginalExtension(); 
           $file = $imagefile->move($destinationPath,$filename);
           $image = Image::make(sprintf($destinationPath.'/%s', $filename))->resize(320, 320)->save(); 
           $image = array('image'=>$filename);
           Gallery::where('id',$id)->update($image);
        }

        Session::flash('message','Gallery added Successfully.');
        Session::flash('alert-class','alert-success');
        return redirect::to('/admin/gallery/add');
    }

    public function edit(Request $request,$id){
    	$edit_gallery = Gallery::find($id);
    	return view('backend.gallery.edit',compact('edit_gallery'));
    }

    public function update(Request $request){
    	$inputs = Input::all();
    	$id = $inputs['id'];
    	$data = array(
    		'title' => $inputs['name'],
    		'slug' => $inputs['slug'],
    		'status' => '1'
    		);

    	Gallery::where('id',$id)->update($data);

    	if($request->file('image') != ''){
    	   $imagefile = $request->file('image');
    	   $get_photo = Gallery::where('id',$id)->first();
    	   $photo = $get_photo->image;
	       if (file_exists(getcwd() . '/uploads/gallery_image/' . $photo)) {
	            unlink(getcwd() . '/uploads/gallery_image/' . $photo);
	       }
    	   $destinationPath = public_path(). '/uploads/gallery_image';
           $extension = $imagefile->getClientOriginalExtension(); 
           $filename_value = time().rand(100000, 10000);
           $filename = md5($filename_value).".".$imagefile->getClientOriginalExtension(); 
           $file = $imagefile->move($destinationPath,$filename);
           $image = Image::make(sprintf($destinationPath.'/%s', $filename))->resize(320, 320)->save(); 
           $image = array('image'=>$filename);
           Gallery::where('id',$id)->update($image);
    	} 

    	Session::flash('message','Gallery updated Successfully.');
        Session::flash('alert-class','alert-success');
        return redirect::to('/admin/gallery');

    }


    public function show(Request $request,$id){
    	$show_gallery = Gallery::find($id);
    	return view('backend.gallery.show',compact('show_gallery'));
    }
}
