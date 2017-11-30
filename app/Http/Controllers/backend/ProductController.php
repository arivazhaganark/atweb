<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\backend\Product;
use App\Model\backend\Category;
use Redirect;
use Session;
use DB;


class ProductController extends Controller
{
    //
    public function index(){
    	$input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $product = Product::where('status', 'N')->get();
        
        } else {
            $product = Product::where('status', 'Y')->get();

        }
        $active_count = Product::where('status', 'Y')->count();
        $inactive_count = Product::where('status', 'N')->count();
        return view('backend.product.index', compact('product', 'active_count', 'inactive_count'));
    }

    public function create() {   
        $cms_data = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.page_type', 'content')
                    ->select('cms.id', 'categories.name','cms.cat_id')
                    ->get(); 
        return view('backend.product.add', compact('cms_data'));
    }

    public function store(Request $request) {
    	$inputs=$request->all();    
         
        // echo '<pre>';
        // print_r($inputs);
        // exit();
    	$data = Product::create([
            'name' => $inputs['name'],
            'slug' => $inputs['slug'],
            'cms_id' => $inputs['cms'],
            'features' => $inputs['features'],
            'technical_specification' => $inputs['technical_specification'],
            'description' => $inputs['description'],
            'benefits' => $inputs['benefits'],
            'status' => 'Y'
        ]);    	

        $id = $data->id;


        if (isset($inputs['data_sheet']) && $inputs['data_sheet'] != '') {
            $file1 = $inputs['data_sheet'];
            $diretory_dir = getcwd() . '/uploads/data_sheet';
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $original_image_path = 'uploads/data_sheet';
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file1->getClientOriginalExtension();
            $file1->move($original_image_path, $filename);
            $values = array(
                'data_sheet' => $filename,
                );
            $data = Product::where('id',$id)->update($values);
        }




        $files = $request->file('image');
        if($files) 
        {            
            $file_count = count($files);
            $uploadcount = 0;
            foreach($files as $file) {
               $diretory_dir = getcwd().'/uploads/product/' . $id; 
                if (!is_dir($diretory_dir)) {
                    mkdir($diretory_dir, 0777);
                }
                $temp_dir = $diretory_dir."/temp";
                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777);
                }                                        
                $original_image_path = 'uploads/product/'.$id."/temp";
                $resize_destinationPath = 'uploads/product/'.$id;
                $filename_value = time().rand(100000, 10000);
                $filename = md5($filename_value).".".$file->getClientOriginalExtension(); 
                $file->move($original_image_path, $filename);  
                
                $oldPath = $original_image_path."/".$filename; 
                $newName = $resize_destinationPath."/".$filename;
                copy($oldPath , $newName);                                       
                
                $image = Image::make(sprintf($resize_destinationPath.'/%s', $filename))->resize(125, 80)->save(); 
                if($uploadcount == 0) {
                    $image_arr['deal_image'] = 1;
                }
                $image_arr = array('logo'=> $filename);    
                DB::table('product_image')->insert(array('product_id' => $id, 'image' => $filename));                   
                $uploadcount++;
            }            
        }
        // if(@$inputs['file_name']!='') {
        //     $file_name = @$inputs['file_name'];
        //     $file = @$_FILES['file']['name'];
        //     $temp_file = @$_FILES['file']['tmp_name'];
        //     $combine = array_combine($file, $temp_file);
        //     foreach($combine as $k => $v) {
        //         $fil[] = $k.'|||||||'.$v;
        //     }
        //     $comb = array_combine($file_name, $fil);
        //     if($comb) 
        //     {
        //         foreach($comb as $key => $val) {
        //             $spt = explode('|||||||', $val);
        //             $diretory_dir = getcwd().'/uploads/product_files/' . $id; 
        //             if (!is_dir($diretory_dir)) {
        //                 mkdir($diretory_dir, 0777);
        //             }                                    
        //             $file_path = 'uploads/product_files/'.$id;
        //             $filename_value = time().rand(100000, 10000);
        //             $filename = md5($filename_value).".".$spt[0]; 
        //             move_uploaded_file($spt[1], $file_path.'/'.$filename);
        //             DB::table('product_file')->insert(array('product_id' => $id, 'file_name' => $key, 'file' => $filename));     
        //         }            
        //     }        
        // }

        Session::flash('message', 'Product has been added successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/product/add');
    }

    public function show($id) {
        $product = Product::find($id);
        $cms_data = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.page_type', 'content')
                    ->select('cms.id', 'categories.name','cms.cat_id')
                    ->get(); 
        return view('backend.product.show', compact('product', 'cms_data'));
    }

    public function edit($id){
    	$product = Product::find($id);
        $cms_data = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.page_type', 'content')
                    ->select('cms.id', 'categories.name','cms.cat_id')
                    ->get(); 
        return view('backend.product.edit', compact('product', 'cms_data'));
    }

    public function update(Request $request) {
        $id = $request->get('hidid');
        $inputs = $request->all();
    	$files = $request->file('image');

        if($files) 
        {
            $file_count = count($files);
            $uploadcount = 0;
            foreach($files as $file) {
               $diretory_dir = getcwd().'/uploads/product/' . $id; 
                if (!is_dir($diretory_dir)) {
                    mkdir($diretory_dir, 0777);
                }
                $temp_dir = $diretory_dir."/temp";
                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777);
                }                                        
                $original_image_path = 'uploads/product/'.$id."/temp";
                $resize_destinationPath = 'uploads/product/'.$id;
                $filename_value = time().rand(100000, 10000);
                $filename = md5($filename_value).".".$file->getClientOriginalExtension(); 
                $file->move($original_image_path, $filename);  
                
                $oldPath = $original_image_path."/".$filename; 
                $newName = $resize_destinationPath."/".$filename;
                copy($oldPath , $newName);                                       
                
                $image = Image::make(sprintf($resize_destinationPath.'/%s', $filename))->resize(125, 80)->save(); 
                if($uploadcount == 0) {
                    $image_arr['deal_image'] = 1;
                }
                $image_arr = array('logo'=> $filename);    
                DB::table('product_image')->insert(array('product_id' => $id, 'image' => $filename));                   
                $uploadcount++;
            }            
        }

        if (isset($inputs['data_sheet']) && $inputs['data_sheet'] != '') {
            $file1 = $inputs['data_sheet'];
            $diretory_dir = getcwd() . '/uploads/data_sheet';
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $original_image_path = 'uploads/data_sheet';
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file1->getClientOriginalExtension();
            $file1->move($original_image_path, $filename);
            $values = array(
                'data_sheet' => $filename,
                );
            $data = Product::where('id',$id)->update($values);
        }


        $update_data = array(   
            'name' => $inputs['name'],
            'slug' => $inputs['slug'],
            'cms_id' => $inputs['cms'],
            'features' => $inputs['features'],
            'technical_specification' => $inputs['technical_specification'],
            'description' => $inputs['description'],
            'benefits' => $inputs['benefits'],
            'status' => 'Y'    
        );
        DB::table('product')->where('id', $id)->update($update_data);      

        // if(@$inputs['file']!='') {
        //     $file_name = @$inputs['file_name'];
        //     $file = @$_FILES['file']['name'];
        //     $temp_file = @$_FILES['file']['tmp_name'];
        //     $combine = array_combine($file, $temp_file);
        //     foreach($combine as $k => $v) {
        //         $fil[] = $k.'|||||||'.$v;
        //     }
        //     $comb = array_combine($file_name, $fil);
        //     if($comb) 
        //     {
        //         foreach($comb as $key => $val) {
        //             $spt = explode('|||||||', $val);
        //             $diretory_dir = getcwd().'/uploads/product_files/' . $id; 
        //             if (!is_dir($diretory_dir)) {
        //                 mkdir($diretory_dir, 0777);
        //             }                                    
        //             $file_path = 'uploads/product_files/'.$id;
        //             $filename_value = time().rand(100000, 10000);
        //             $filename = md5($filename_value).".".$spt[0]; 
        //             move_uploaded_file($spt[1], $file_path.'/'.$filename);
        //             DB::table('product_file')->insert(array('product_id' => $id, 'file_name' => $key, 'file' => $filename));     
        //         }            
        //     }
        // }

        Session::flash('message', 'Product has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/product/edit/'.$id);
    }

    public function actionupdate(Request $request) {
        $inputs = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action = $inputs['action'];
        if ($action == 'Inactive') {
            $column_name = "status";
            $action_value = "N";
            $msg_value = "Product has been successfully inactivated.";
            $redirect_value = "admin/product";
            
        } else if ($action == 'Active') {
            $column_name = "status";
            $action_value = "Y";
            $msg_value = "Product has been successfully activated.";
            $redirect_value = "admin/product/?token=inactive";
            
        } else if ($action == 'Delete') {
            $msg_value = "Product has been successfully deleted.";
            $redirect_value = "admin/product/?token=inactive";
            
        }
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );           
                Product::select('*')->where('id', $update_id)->update($data);     
            } else {
                $cms_data = Product::find($update_id);
                $cms_data->delete();

                $img_count = DB::table('product_image')->where('product_id', $update_id)->count();  
                $image =  DB::table('product_image')->where('product_id', $update_id)->first();

                $image_file = $image->image;
                if($img_count>0) {   
                    $img = DB::table('product_image')->where('product_id', $update_id)->get();   
                    foreach($img as $i) {
                        
                        if (file_exists(getcwd() . '/uploads/product/' . $update_id . '/')) {
                            @unlink(getcwd() . '/uploads/product/' . $update_id . '/' . $image_file);
                        }
                        if (file_exists(getcwd() . '/uploads/product/' . $update_id . '/temp/')) {
                            @unlink(getcwd() . '/uploads/product/' . $update_id . '/temp/'. $image_file);
                        }   
                        DB::table('product_image')->where('id', $i->id)->delete();
                    } 
                }
            }
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function image_delete(Request $request) {
        $product_id = $request->segment(4);
        $image_id = $request->segment(5);
        $img = DB::table('product_image')->where('id', $image_id)->first();        
        $photo =  $img->image;

        if (file_exists(getcwd() . '/uploads/product/' . $product_id . '/' . $photo)) {
            unlink(getcwd() . '/uploads/product/' . $product_id . '/' . $photo);
        }
        if (file_exists(getcwd() . '/uploads/product/' . $product_id . '/temp/' . $photo)) {
            unlink(getcwd() . '/uploads/product/' . $product_id . '/temp/' . $photo);
        }
        DB::table('product_image')->where('id', $image_id)->delete();

        Session::flash('message', 'Product image deleted');
        Session::flash('alert-class', 'alert-success');
        $prev_url = url()->previous();
        return Redirect::to($prev_url);
    }

}
