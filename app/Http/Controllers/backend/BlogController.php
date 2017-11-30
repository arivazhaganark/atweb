<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\backend\Blog;
use Session;
use Redirect;
use DB;

class BlogController extends Controller
{
    public function index(){
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $index = Blog::where('post_status', '0')->get();
        
        } else {
            $index = Blog::where('post_status', '1')->get();

        }
        $active_count = Blog::where('post_status', '1')->count();
        $inactive_count = Blog::where('post_status', '0')->count();
        return view('backend.blog.index', compact('index', 'active_count', 'inactive_count'));
    }

    public function add(){
    	return view('backend.blog.add');
    }

    public function check_blogname(Request $request){
        $inputs = Input::all();
        $name = $inputs['name'];
        $check_name_exist = Blog::where('post_title', $name)->count();
        if($check_name_exist > '0'){
            return 'false';
        }else{
            return 'true';
        }
    }

    public function store(Request $request){
    	$inputs = Input::all();
    	$data = Blog::create([
    		'post_title' => $inputs['name'],
    		'post_slug' => $inputs['slug'],
    		'post_content' => $inputs['description'],
    		'post_date' => date('Y-m-d'),
    		'post_author' => '1',
    		'post_status' => '1'
    		]);

        $id = $data->id;

        $files = $request->file('image');
        if(isset($files) && $files != '')  
        {            
            $file_count = count($files);
            $uploadcount = 0;
            foreach($files as $file) {
               $diretory_dir = getcwd().'/uploads/blog_image/' . $id; 
                if (!is_dir($diretory_dir)) {
                    mkdir($diretory_dir, 0777);
                }
                $temp_dir = $diretory_dir."/temp";
                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777);
                }                                        
                $original_image_path = 'uploads/blog_image/'.$id."/temp";
                $resize_destinationPath = 'uploads/blog_image/'.$id;
                $filename_value = time().rand(100000, 10000);
                $filename = md5($filename_value).".".$file->getClientOriginalExtension(); 
                $file->move($original_image_path, $filename);  
                
                $oldPath = $original_image_path."/".$filename; 
                $newName = $resize_destinationPath."/".$filename;
                copy($oldPath , $newName);                                       
                
                $image = Image::make(sprintf($resize_destinationPath.'/%s', $filename))->resize(300, 200)->save(); 
                if($uploadcount == 0) {
                    $image_arr['deal_image'] = 1;
                }
                $image_arr = array('logo'=> $filename);    
                DB::table('blog_image')->insert(array('blog_id' => $id, 'image' => $filename, 'status' => 1));                   
                $uploadcount++;
            }            
        }
    	Session::flash('message','Blog added Successfully.');
    	Session::flash('alert-class','alert-success');
    	return redirect::to('/admin/blog/add');
    }

    public function edit(Request $request,$id){
    	$edit_blog = Blog::find($id);
    	return view('backend.blog.edit',compact('edit_blog'));
    }

    public function update(Request $request){
    	$inputs = Input::all();
    	$id = $inputs['id'];
        $files = $request->file('image');
        if(isset($files) && $files != '') 
        {
            $file_count = count($files);
            $uploadcount = 0;
            foreach($files as $file) {
               $diretory_dir = getcwd().'/uploads/blog_image/' . $id; 
                if (!is_dir($diretory_dir)) {
                    mkdir($diretory_dir, 0777);
                }
                $temp_dir = $diretory_dir."/temp";
                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777);
                }                                        
                $original_image_path = 'uploads/blog_image/'.$id."/temp";
                $resize_destinationPath = 'uploads/blog_image/'.$id;
                $filename_value = time().rand(100000, 10000);
                $filename = md5($filename_value).".".$file->getClientOriginalExtension(); 
                $file->move($original_image_path, $filename);  
                
                $oldPath = $original_image_path."/".$filename; 
                $newName = $resize_destinationPath."/".$filename;
                copy($oldPath , $newName);                                       
                
                $image = Image::make(sprintf($resize_destinationPath.'/%s', $filename))->resize(300, 200)->save(); 
                if($uploadcount == 0) {
                    $image_arr['deal_image'] = 1;
                }
                $image_arr = array('logo'=> $filename);    
                DB::table('blog_image')->insert(array('blog_id' => $id, 'image' => $filename, 'status' => 1));                   
                $uploadcount++;
            }            
        }
    	$data = array(
    		'post_title' => $inputs['name'],
    		'post_slug' => $inputs['slug'],
    		'post_content' => $inputs['description'],
    		'post_date' => date('Y-m-d'),
    		'post_author' => '1',
    		'post_status' => '1'
    		);

    	Blog::where('id',$id)->update($data);
    	Session::flash('message','Blog updated Successfully.');
    	Session::flash('alert-class','alert-success');
    	return redirect::to('/admin/blog');
    }

    public function show(Request $request,$id){
    	$show_blog = Blog::find($id);
    	return view('backend.blog.show',compact('show_blog'));
    }

    public function image_delete(Request $request) {
        $blog_id = $request->segment(4);
        $image_id = $request->segment(5);
        $img = DB::table('blog_image')->where('id', $image_id)->first();        
        $photo =  $img->image;

        if (file_exists(getcwd() . '/uploads/blog_image/' . $blog_id . '/' . $photo)) {
            unlink(getcwd() . '/uploads/blog_image/' . $blog_id . '/' . $photo);
        }
        if (file_exists(getcwd() . '/uploads/blog_image/' . $blog_id . '/temp/' . $photo)) {
            unlink(getcwd() . '/uploads/blog_image/' . $blog_id . '/temp/' . $photo);
        }
        DB::table('blog_image')->where('id', $image_id)->delete();

        Session::flash('message', 'Blog image deleted');
        Session::flash('alert-class', 'alert-success');
        $prev_url = url()->previous();
        return Redirect::to($prev_url);
    }


    public function actionupdate(Request $request) {
        $inputs = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action = $inputs['action'];
        if ($action == 'Inactive') {
            $column_name = "post_status";
            $action_value = "0";
            $msg_value = "Blog has been successfully inactivated.";
            $redirect_value = "admin/blog";
            
        } else if ($action == 'Active') {
            $column_name = "post_status";
            $action_value = "1";
            $msg_value = "Blog has been successfully activated.";
            $redirect_value = "admin/blog/?token=inactive";
            
        } else if ($action == 'Delete') {
            $msg_value = "Blog has been successfully deleted.";
            $redirect_value = "admin/blog/?token=inactive";
            
        }
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );           
                Blog::select('*')->where('id', $update_id)->update($data);     
            } else {
                $cms_data = Blog::find($update_id);
                $cms_data->delete();

                $img_count = DB::table('blog_image')->where('blog_id', $update_id)->count();  
                $image =  DB::table('blog_image')->where('blog_id', $update_id)->first();

                $image_file = $image->image;
                if($img_count>0) {   
                    $img = DB::table('blog_image')->where('blog_id', $update_id)->get();  
                    foreach($img as $i) {
                        
                        if (file_exists(getcwd() . '/uploads/blog_image/' . $update_id . '/')) {
                            unlink(getcwd() . '/uploads/blog_image/' . $update_id . '/' . $i->image);
                        }
                        if (file_exists(getcwd() . '/uploads/blog_image/' . $update_id . '/temp/')) {
                            unlink(getcwd() . '/uploads/blog_image/' . $update_id . '/temp/'. $i->image);
                        }   
                        DB::table('blog_image')->where('id', $i->id)->delete();
                    } 
                }
            }
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }
}
