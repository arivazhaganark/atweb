<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\backend\BannerModel;
use Redirect;
use Session;
use Image;

class BannerController extends Controller
{
    public function index()
    {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $banner = BannerModel::where('status', 'N')->get();
        } else {
            $banner = BannerModel::where('status', 'Y')->get();

        }
        $active_count   = BannerModel::where('status', 'Y')->count();
        $inactive_count = BannerModel::where('status', 'N')->count();
        return view('backend.banner.index', compact('banner', 'active_count', 'inactive_count'));

    }

    public function create()
    {
        return view('backend.banner.add');
    }

    public function store(Request $request)
    {
        $inputs=$request->all();    
        $data = BannerModel::create([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'image' => '',
            'status' => 'Y',
            'position' => $inputs['position']
        ]);     
        $id = $data->id;

        $file  = $request->file('image');
        if (isset($file) && $file != '') {
            $diretory_dir = getcwd() . '/uploads/banner_attachment/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = 'uploads/banner_attachment/' . $id . "/temp";
            $resize_destinationPath = 'uploads/banner_attachment/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $image = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(800 , 900)->save();
            BannerModel::where('id', $id)->update(array('image' => $filename));   
        }

        Session::flash('message', 'Banner has been added successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/banner/add');
    }

    public function edit($id)
    {
        $banner = BannerModel::find($id);
        return view('backend.banner.edit', compact('banner'));
    }

    public function show($id) {
        $banner = BannerModel::find($id);
        return view('backend.banner.show', compact('banner'));
    }

    public function update(Request $request)
    {
        $id = $request->get('hidid');
        $inputs = $request->all();
        $insert_arr['name']=$inputs['name'];
    
        $insert_arr['status']='Y';
        $file  = $request->file('image');
        $file = @$inputs['image'];
        if (isset($file) && $file != '') {
            //Get photo by id
            $att = BannerModel::where('id', $id)->first();
            $photo = $att->image;
            
            //Unlink old image
            if (file_exists(getcwd() . '/uploads/banner_attachment/' . $id . '/' . $photo)) {
                @unlink(getcwd() . '/uploads/banner_attachment/' . $id . '/' . $photo);
            }
            if (file_exists(getcwd() . '/uploads/banner_attachment/' . $id . '/temp/' . $photo)) {
                @unlink(getcwd() . '/uploads/banner_attachment/' . $id . '/temp/' . $photo);
            }

            $diretory_dir = getcwd() . '/uploads/banner_attachment/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = getcwd() . '/uploads/banner_attachment/' . $id . "/temp";
            $resize_destinationPath = getcwd() . '/uploads/banner_attachment/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $image = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(800, 900)->save();
            BannerModel::where('id', $id)->update(array('image' => $filename));      
        }

        $update_data = array('name' => $inputs['name'], 'description' => $inputs['description'], 'position' => $inputs['position']);
        BannerModel::where('id', $id)->update($update_data);      

        Session::flash('message', 'Banner has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/banner/edit/'.$id);
    }

    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Inactive') {
            $column_name    = "status";
            $action_value   = "N";
            $msg_value      = "Banner(s) has been successfully inactivated.";
            $redirect_value = "admin/banner";

        } else if ($action == 'Active') {
            $column_name    = "status";
            $action_value   = "Y";
            $msg_value      = "Banner(s) has been successfully activated.";
            $redirect_value = "admin/banner/?token=inactive";

        } else if ($action == 'Delete') {
            $msg_value      = "Banner(s) has been successfully deleted.";
            $redirect_value = "admin/banner/?token=inactive";

        }
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );
                BannerModel::select('*')->where('id', $update_id)->update($data);

            } else {
                $cms_data = BannerModel::find($update_id);
                $cms_data->delete();
            }
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
