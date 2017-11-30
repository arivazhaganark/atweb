<?php

namespace App\Http\Controllers\backend;

use App\Model\backend\User;
use App\Model\backend\Setting;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Image;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'from_email' => 'required|email|max:255|unique:email',
            'support_email' => 'required|email|max:255|unique:email'
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::select('*')->where('id', 1)->get();
        return view('backend.setting', compact('setting'));
    }

    public function store(Request $request) 
    {
        $inputs = $request->all();
        $id = 1;
        $data = array(
            'from_email' => $inputs['from_email'],
            'from_email_display_name' => $inputs['from_email_display_name'],
            'support_email' => $inputs['support_email'],
            'facebook_link' => $inputs['facebook_link'],
            'twitter_link' => $inputs['twitter_link'],
            'youtube_link' => $inputs['youtube_link'],
            'linked_in' => $inputs['linked_in'],
            'google_plus' => $inputs['google_plus'],
            'pinterest' => $inputs['pinterest'],
            'header_script' => htmlentities($inputs['header_script']),
            'footer_script' => htmlentities($inputs['footer_script'])
        );
        $update_cnt = Setting::select('*')->where('id', $id)->update($data);

        $file  = $request->file('logo');
        if (isset($file) && $file != '') {
            //Get image by id
            $att = Setting::where('id', $id)->first();
            $logo = $att->logo;
            
            //Unlink old image
            if (file_exists(getcwd() . '/uploads/logo/' . $id . '/' . $logo)) {
                @unlink(getcwd() . '/uploads/logo/' . $id . '/' . $logo);
            }
            if (file_exists(getcwd() . '/uploads/logo/' . $id . '/temp/' . $logo)) {
                @unlink(getcwd() . '/uploads/logo/' . $id . '/temp/' . $logo);
            }

            $diretory_dir = getcwd() . '/uploads/logo/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = 'uploads/logo/' . $id . "/temp";
            $resize_destinationPath = 'uploads/logo/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $logo = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(193 , 47)->save();
            Setting::where('id', $id)->update(array('logo' => $filename));   
        }

        Session::flash('message', 'Admin Settings has been updated successfully.');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/setting');
    }
}
