<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\backend\OurClient;
use Redirect;
use Session;
use Image;

class OurClientController extends Controller
{
    public function index()
    {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $client = OurClient::where('status', 'N')->get();
        } else {
            $client = OurClient::where('status', 'Y')->get();

        }
        $active_count   = OurClient::where('status', 'Y')->count();
        $inactive_count = OurClient::where('status', 'N')->count();
        return view('backend.our_client.index', compact('client', 'active_count', 'inactive_count'));

    }

    public function create()
    {
        return view('backend.our_client.add');
    }

    public function store(Request $request)
    {
        $inputs=$request->all();    
        $data = OurClient::create([
            'link' => $inputs['link'],
            'image' => '',
            'status' => 'Y'
        ]);     
        $id = $data->id;

        $file  = $request->file('image');
        if (isset($file) && $file != '') {
            $diretory_dir = getcwd() . '/uploads/clients/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = 'uploads/clients/' . $id . "/temp";
            $resize_destinationPath = 'uploads/clients/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $image = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(180 , 58)->save();
            OurClient::where('id', $id)->update(array('image' => $filename));   
        }

        Session::flash('message', 'Client has been added successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/client/add');
    }

    public function edit($id)
    {
        $client = OurClient::find($id);
        return view('backend.our_client.edit', compact('client'));
    }

    public function show($id) {
        $client = OurClient::find($id);
        return view('backend.our_client.show', compact('client'));
    }

    public function update(Request $request)
    {
        $id = $request->get('hidid');
        $inputs = $request->all();
        $insert_arr['link']=$inputs['link'];
    
        $insert_arr['status']='Y';
        $file  = $request->file('image');
        $file = @$inputs['image'];
        if (isset($file) && $file != '') {
            //Get photo by id
            $att = OurClient::where('id', $id)->first();
            $photo = $att->image;
            
            //Unlink old image
            if (file_exists(getcwd() . '/uploads/clients/' . $id . '/' . $photo)) {
                @unlink(getcwd() . '/uploads/clients/' . $id . '/' . $photo);
            }
            if (file_exists(getcwd() . '/uploads/clients/' . $id . '/temp/' . $photo)) {
                @unlink(getcwd() . '/uploads/clients/' . $id . '/temp/' . $photo);
            }

            $diretory_dir = getcwd() . '/uploads/clients/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = getcwd() . '/uploads/clients/' . $id . "/temp";
            $resize_destinationPath = getcwd() . '/uploads/clients/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $image = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(800, 900)->save();
            OurClient::where('id', $id)->update(array('image' => $filename));      
        }

        $update_data = array('link' => $inputs['link']);
        OurClient::where('id', $id)->update($update_data);      

        Session::flash('message', 'Client has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/client/edit/'.$id);
    }

    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Inactive') {
            $column_name    = "status";
            $action_value   = "N";
            $msg_value      = "Client(s) has been successfully inactivated.";
            $redirect_value = "admin/client";

        } else if ($action == 'Active') {
            $column_name    = "status";
            $action_value   = "Y";
            $msg_value      = "Client(s) has been successfully activated.";
            $redirect_value = "admin/client/?token=inactive";

        } else if ($action == 'Delete') {
            $msg_value      = "Client(s) has been successfully deleted.";
            $redirect_value = "admin/client/?token=inactive";

        }
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );
                OurClient::select('*')->where('id', $update_id)->update($data);

            } else {
                $cms_data = OurClient::find($update_id);
                $cms_data->delete();
            }
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
