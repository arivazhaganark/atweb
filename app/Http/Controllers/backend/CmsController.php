<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Model\backend\Cms_Model;
use App\Model\backend\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Redirect;
use DB;
use Image;

class CmsController extends Controller
{
    public function index() {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $cms = Cms_Model::where('status', 'N')
                    ->orderBy('parent', 'ASC')
                    ->get();        
        } else {
            $cms = Cms_Model::where('status', 'Y')
                    ->orderBy('parent', 'ASC')
                    ->get();        
        }
        $active_count = Cms_Model::where('status', 'Y')->count();
        $inactive_count = Cms_Model::where('status', 'N')->count();
        return view('backend.cms.index', compact('cms', 'active_count', 'inactive_count'));
    }

    public function create() {
        $cms = Cms_Model::all();
        return view('backend.cms.add', compact('cms'));
    }

    public function check_slug_exist(Request $request){
        $inputs = Input::all();
        $id = $inputs['id'];
        if($id == '9999') {
            $slug = 'footer';
            $check_slug_exist = 0;
        } else if($id == '10000') {
            $slug = 'subpage-link';
            $check_slug_exist = 0;
        } else {
            $get_category_name = Category::where('id',$id)->first();
            $slug = $get_category_name->slug;
            $check_slug_exist = Cms_Model::where('slug',$slug)->count();
        }
        if($check_slug_exist > 0){
            return 'false';
        }else{
            return 'true';
        }
    }

    public function store(Request $request) {
        $inputs = Input::all();

        $slug_value = str_replace('¦¦', '', $inputs['slug']);
        $slug_value = trim($slug_value);
        $slug_value = str_slug($slug_value, "-");
        $insert_arr['slug'] = $slug_value;
        $insert_arr['cat_id'] = $inputs['category'];
        
        if($inputs['category']=='9999') {
            $insert_arr['parent'] = '0';
            $insert_arr['columns'] = $inputs['column'];
        } else if($inputs['category']=='10000') {
            $insert_arr['parent'] = '0';
            $insert_arr['columns'] = 'Sublink Page';
        } else {
            $insert_arr['parent'] = getParent($inputs['category']);
            $insert_arr['columns'] = '';
        }

        $insert_arr['slug'] = $slug_value;

        if($inputs['position']!='')
            $insert_arr['position'] = $inputs['position'];
        else
            $insert_arr['position'] = '0';

        $insert_arr['status'] = "Y";
        $insert_arr['page_type'] = '';
        $insert_arr['short_desc'] = $inputs['short_desc'];
        $insert_arr['content'] = $inputs['editor1'];
        $insert_arr['seo_title'] = $inputs['seo_title'];
        $insert_arr['seo_description'] = $inputs['seo_description'];
        $insert_arr['seo_keywords'] = $inputs['seo_keywords'];
  
        $insert_arr['page_link'] = '';
        $insert_arr['page_linktype'] = '';
        $insert_arr['page_type'] = $inputs['page_type'];
        $insert_arr['footer_title'] = isset($inputs['footer_title'])?$inputs['footer_title']:'';

        if ($inputs['page_type'] == 'content') {
            $insert_arr['content'] = $inputs['editor1'];
            $insert_arr['footer_title'] = isset($inputs['footer_title'])?$inputs['footer_title']:'';
            $insert_arr['short_desc'] = $inputs['short_desc'];
            $insert_arr['seo_title'] = isset($inputs['seo_title'])?$inputs['seo_title']:'';
            $insert_arr['seo_description'] = isset($inputs['seo_description'])?$inputs['seo_description']:'';
            $insert_arr['seo_keywords'] = isset($inputs['seo_keywords'])?$inputs['seo_keywords']:'';
            $insert_arr['page_link'] = "";
            $insert_arr['page_linktype'] = "";
        } else {
            $insert_arr['page_link'] = $inputs['page_link'];
            $insert_arr['page_linktype'] = $inputs['page_linktype'];
            $insert_arr['content'] = "";
            $insert_arr['seo_title'] = "";
            $insert_arr['seo_description'] = "";
            $insert_arr['seo_keywords'] = "";
        }

        $data = Cms_Model::create($insert_arr); 
        $id = $data->id;      

        $file  = $request->file('image');
        if (isset($file) && $file != '') {
            $diretory_dir = getcwd() . '/uploads/cms_icon/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = 'uploads/cms_icon/' . $id . "/temp";
            $resize_destinationPath = 'uploads/cms_icon/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $image = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(64 , 64)->save();
            Cms_Model::where('id', $id)->update(array('image' => $filename));   
        }
        
        Session::flash('message', 'CMS has been added successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/cms/add');
    }

    public function show($id) {
        $cms = Cms_Model::find($id);
        return view('backend.cms.show', compact('cms'));
    }

    public function edit($id) {
        $cms = Cms_Model::find($id);
        return view('backend.cms.edit', compact('cms'));
    }

    public function update(Request $request) {
        $id = $request->get('id');
        $inputs = $request->all();

        $slug_value = str_replace('¦¦', '', $inputs['slug']);
        $slug_value = trim($slug_value);
        $slug_value = str_slug($slug_value, "-");

        $insert_arr['slug'] = $slug_value;      
        $insert_arr['cat_id'] = $inputs['category'];
        
        if($inputs['category']=='9999') {
            $insert_arr['parent'] = '0';
            $insert_arr['columns'] = $inputs['column'];
        } else if($inputs['category']=='10000') {
            $insert_arr['parent'] = '0';
            $insert_arr['columns'] = 'Sublink Page';
        } else {
            $insert_arr['parent'] = getParent($inputs['category']);
            $insert_arr['columns'] = '';
        }

        $insert_arr['slug'] = $slug_value;
        
        if($inputs['position']!='')
            $insert_arr['position'] = $inputs['position'];
        else
            $insert_arr['position'] = '0';

        $insert_arr['status'] = "Y";
        $insert_arr['page_type'] = '';
        $insert_arr['short_desc'] = $inputs['short_desc'];
        $insert_arr['content'] = $inputs['editor1'];
        $insert_arr['seo_title'] = $inputs['seo_title'];
        $insert_arr['seo_description'] = $inputs['seo_description'];
        $insert_arr['seo_keywords'] = $inputs['seo_keywords'];
  
        $insert_arr['page_link'] = '';
        $insert_arr['page_linktype'] = '';
        $insert_arr['page_type'] = $inputs['page_type'];
        $insert_arr['footer_title'] = isset($inputs['footer_title'])?$inputs['footer_title']:'';
        if ($inputs['page_type'] == 'content') {
            $insert_arr['footer_title'] = isset($inputs['footer_title'])?$inputs['footer_title']:'';
            $insert_arr['short_desc'] = $inputs['short_desc'];
            $insert_arr['content'] = $inputs['editor1'];
            $insert_arr['seo_title'] = $inputs['seo_title'];
            $insert_arr['seo_description'] = $inputs['seo_description'];
            $insert_arr['seo_keywords'] = $inputs['seo_keywords'];
            $insert_arr['page_link'] = "";
            $insert_arr['page_linktype'] = "";
        } else {
            $insert_arr['page_link'] = $inputs['page_link'];
            $insert_arr['page_linktype'] = $inputs['page_linktype'];
            $insert_arr['content'] = "";
            $insert_arr['seo_title'] = "";
            $insert_arr['seo_description'] = "";
            $insert_arr['seo_keywords'] = "";
        }
        $updated_row_cnt = Cms_Model::select('*')->where('id', $id)->update($insert_arr);
        
        $file  = $request->file('image');
        $file = @$inputs['image'];
        if (isset($file) && $file != '') {
            //Get photo by id
            $att = Cms_Model::where('id', $id)->first();
            $photo = $att->image;
            
            //Unlink old image
            if (file_exists(getcwd() . '/uploads/cms_icon/' . $id . '/' . $photo)) {
                @unlink(getcwd() . '/uploads/cms_icon/' . $id . '/' . $photo);
            }
            if (file_exists(getcwd() . '/uploads/cms_icon/' . $id . '/temp/' . $photo)) {
                @unlink(getcwd() . '/uploads/cms_icon/' . $id . '/temp/' . $photo);
            }

            $diretory_dir = getcwd() . '/uploads/cms_icon/' . $id;
            if (!is_dir($diretory_dir)) {
                mkdir($diretory_dir, 0777);
            }
            $temp_dir = $diretory_dir . "/temp";
            if (!is_dir($temp_dir)) {
                mkdir($temp_dir, 0777);
            }
            $original_image_path = getcwd() . '/uploads/cms_icon/' . $id . "/temp";
            $resize_destinationPath = getcwd() . '/uploads/cms_icon/' . $id;
            $filename_value = time() . rand(100000, 10000);
            $filename = md5($filename_value) . "." . $file->getClientOriginalExtension();
            $file->move($original_image_path, $filename);

            $oldPath = $original_image_path . "/" . $filename;
            $newName = $resize_destinationPath . "/" . $filename;
            copy($oldPath, $newName);

            $image = Image::make(sprintf($resize_destinationPath . '/%s', $filename))->resize(64, 64)->save();
            Cms_Model::where('id', $id)->update(array('image' => $filename));      
        }

        Session::flash('message', 'CMS has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/cms/edit/' . $id);
    }

    public function actionupdate(Request $request) {
        $inputs = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action = $inputs['action'];
        if ($action == 'Inactive') {
            $column_name = "status";
            $action_value = "N";
            $msg_value = "CMS(s) has been successfully inactivated.";
            $redirect_value = "admin/cms";
            
        } else if ($action == 'Active') {
            $column_name = "status";
            $action_value = "Y";
            $msg_value = "CMS(s) has been successfully activated.";
            $redirect_value = "admin/cms/?token=inactive";
            
        } else if ($action == 'Delete') {
            $msg_value = "CMS(s) has been successfully deleted.";
            $redirect_value = "admin/cms/?token=inactive";
            
        }
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );
                Cms_Model::select('*')->where('id', $update_id)->update($data);
                
            } else {
                $cms_data = Cms_Model::find($update_id);
                $cms_data->delete();
            }
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
