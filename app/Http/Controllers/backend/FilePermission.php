<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\backend\FileManagerModel;
use Redirect;
use Session;
use Image;
use DB;

class FilePermission extends Controller
{    
    public function index()
    {   
        return view('backend.filemanager.file_perm');
    }    

    public function ajaxfm(Request $request) 
    {
        $type = $request->type;
        $filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $filemanager = $filemanager->where('parent_id', $_POST['file_id']);
            $filemanager = $filemanager->where('permission', 'like', '%'.$type.'%')->get();
        } else {
            $filemanager = $filemanager->where('parent_id', 0);
            $filemanager = $filemanager->where('permission', 'like', '%'.$type.'%')->get();
        }

        if (isset($_POST)) {
            $dir = @$_POST['dir'];
        } else  {
            $dir = @$_GET['dir'];
        }
        
        if($dir!='') 
            $path = base_path().'/public/uploads/filemanager/'.$dir;
        else
            $path = base_path().'/public/uploads/filemanager/';

        $i = 1;
        if(count($filemanager)>0) {
            foreach ($filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {          
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'&nbsp;<input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="'.$f->file_id.'" style="display:none;" checked></span>
                         
                       </div>
                     </div>';
                 } else { 
                    $file = $path . $f->file_name;
                    if($dir!='') {
                      $filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.' &nbsp;<input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="'.$f->file_id.'" style="display:none;" checked></span>
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    function parentinfo(Request $request) {
        $file_count = FileManagerModel::where('file_name', $request->child)->select('file_id')->count();
        if($file_count>0) {
          $file = FileManagerModel::where('file_name', $request->child)->select('file_id')->first();
          echo $file->file_id;  
        } else {
          echo '';
        }     
    }

    /*public function unset_folder(Request $request) {
        $inputs = $request->all();
        $file = $inputs['hid_selected_ids'];
        $files[] = explode(',', $file);
        $permission = $inputs['act'];
        foreach($files[0] as $file_id) {     
            $get_current_permission = FileManagerModel::where('file_id', $file_id)->select('permission')->first();
            $current_permission_value = $get_current_permission->permission;
            $current_permission_arr = explode(",", $current_permission_value);
            if(!in_array($permission, $current_permission_arr)) {
              echo 'x:'.$permission;
            } else {
              echo 'y:'.$permission;
            }
        }
    }

    function permission_decendents($dir, $updated_permission_value=null) {
        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") {
                 $this->permission_decendents($dir."/".$object, $updated_permission_value); 
                 $file = FileManagerModel::where('file_name', $object)->select('file_id', 'permission')->first();        
                 $file_id = @$file->file_id;
                 $current_permission_value = @$file->permission;
                 $current_permission_arr = explode(",", $current_permission_value);
                 if(!in_array($updated_permission_value, $current_permission_arr)) {
                    //FileManagerModel::where('file_id', $file_id)->update(['permission' => $updated_permission_value]);
                 }
              } else {                
                $file = FileManagerModel::where('file_name', $object)->select('file_id')->first();        
                $file_id = @$file->file_id;
                //FileManagerModel::where('file_id', $file_id)->update(['permission' => $updated_permission_value]);
              }
            }
          }
          reset($objects);
        }
    }*/

}