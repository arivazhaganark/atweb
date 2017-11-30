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

class FileManager extends Controller
{    
    public function index()
    {   
        $filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_GET['file_id']) && $_GET['file_id']!='') {
            $filemanager = $filemanager->where('parent_id', $_GET['file_id']);
        }
        if(isset($_POST['search_txt']) && $_POST['search_txt']!='') {
            $filemanager = $filemanager->where('file_name', 'like', '%' . $_POST['search_txt'] . '%');
        }
        if(@$_GET['file_id']=='' && @$_POST['search_txt']=='') {
            $filemanager = $filemanager->where('parent_id', 0);
        }

        $filemanager = $filemanager->get();
        return view('backend.filemanager.add', compact('filemanager'));
    }    

    function store(Request $request) {
        $inputs = $request->all();
        $file = $inputs['hid_selected_ids'];
        $files[] = explode(',', $file);
        $permission = trim($inputs['act']);
        foreach($files[0] as $file_id) {            
           $get_current_permission = FileManagerModel::where('file_id', $file_id)->select('permission')->first();
            $current_permission_value = $get_current_permission->permission;
            $current_permission_arr = explode(",", $current_permission_value);
            if(!in_array($permission, $current_permission_arr)) {  
                if($current_permission_value=='')
                  $updated_permission_value = $permission;
                else
                  $updated_permission_value = $current_permission_value.",".$permission;

                //echo $updated_permission_value;
                $data = array('file_id' => $file_id, 'permission' => $updated_permission_value);
                $data = FileManagerModel::where('file_id', $file_id)->update($data);
                //echo $file_id;

                //get filename
                $file = FileManagerModel::where('file_id', $file_id)->select('file_path')->first();
                $dir = base_path().'/public/uploads/filemanager/'.$file->file_path;
                $this->permission_decendents($dir, $updated_permission_value);

                /*$file = FileManagerModel::where('file_id', $file_id)->select('parent_id')->first();        
                $parent_id =  $file->parent_id;
                if($parent_id!='0') {
                  FileManagerModel::where('file_id', $parent_id)->update(['permission' => $updated_permission_value]);
                  $this->get_parent($parent_id, $updated_permission_value);
                }*/
            } else {
                if($current_permission_value=='')
                  $updated_permission_value = $permission;
                else
                  $updated_permission_value = $current_permission_value;

                $file = FileManagerModel::where('file_id', $file_id)->select('file_path')->first();
                $dir = base_path().'/public/uploads/filemanager/'.$file->file_path;
                $this->permission_decendents($dir, $updated_permission_value);
            }
        }
        echo 'success';
    }

    public function create_folder(Request $request) {
        $folder_name = strtoupper($request->folder_name);
        $pwd = @$request->pwd;  
        $current_url = $request->current_url;  
        
        if(isset($request->file_id) && $request->file_id!='')
          $parent_id = $request->file_id;
        else
          $parent_id = 0;

        if($pwd!='') {
            $dir = base_path().'/public/uploads/filemanager/'.$pwd.'/'.$folder_name;            
            $split_folder = explode("/", $pwd); //print_r($split_folder);
            $split_last_value = count($split_folder) -1 ;
            $split_last_before_value = count($split_folder) -2 ;    
            if(count($split_folder) <= 1) {
                $file_details = FileManagerModel::where('file_name', $split_folder[$split_last_value])->where('is_deleted', 0)->where('parent_id', '0')->first();
            } else {  
               $parent_file_details = FileManagerModel::where('file_name', $split_folder[$split_last_before_value])->where('is_deleted', 0)->first();
                $immediate_parent_id = $parent_file_details->file_id;

               $file_details = FileManagerModel::where('file_name', $split_folder[$split_last_value])->where('parent_id', $immediate_parent_id)->where('is_deleted', 0)->first();
            }    
            if(count($file_details) > 0) {
                $parent_id = $file_details->file_id;
            }            
       }
        else {
            $dir = base_path().'/public/uploads/filemanager/'.$folder_name;
        }
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            
            if($pwd!='')
              $file_path = $pwd.'/'.$folder_name;
            else
              $file_path = $folder_name; 

            $data = FileManagerModel::create(['file_name' => $folder_name, 'file_path' => $file_path, 'permission' => "", 'parent_id' => $parent_id, 'type' => 'folder']);                  
            echo 'success';
        } else {
            echo 'fail';
        }
        //return Redirect::to($current_url);
    }

   public function create_file(Request $request) {
        $folder_name = strtoupper($request->folder_name);
        $pwd = @$request->pwd;  
        $current_url = $request->current_url;  

        if(isset($request->file_id) && $request->file_id!='')
          $parent_id = $request->file_id;
        else
          $parent_id = 0;

        if($pwd!='') {
            $dir = base_path().'/public/uploads/filemanager/'.$pwd.'/'.$folder_name;
            $split_folder = explode("/", $pwd);
            $split_last_value = count($split_folder) -1 ;  
           $split_last_before_value = count($split_folder) -2 ;  
            if(count($split_folder) <= 1) {
                $file_details = FileManagerModel::where('file_name', $split_folder[$split_last_value])->where('is_deleted', 0)->where('parent_id', '0')->first();
            } else {
                $parent_file_details = FileManagerModel::where('file_name', $split_folder[$split_last_before_value])->where('is_deleted', 0)->first();
                $immediate_parent_id = $parent_file_details->file_id;

               $file_details = FileManagerModel::where('file_name', $split_folder[$split_last_value])->where('parent_id', $immediate_parent_id)->where('is_deleted', 0)->first();
            }    
           if(count($file_details) > 0) {
                $parent_id = $file_details->file_id;
            }
        }
        else {
            $dir = base_path().'/public/uploads/filemanager/'.$folder_name;
        }
        if (!empty($_FILES)) {
            $tmpFile = $_FILES['file']['tmp_name'];
            $filename = $dir.'/'.$_FILES['file']['name']; 
            if (!file_exists($filename)) {
                $actual_filename = $_FILES['file']['name'];    
                $filename = $dir.'/'.$actual_filename;      

                if($pwd!='')
                  $file_path = $pwd.'/'.$folder_name.$actual_filename;
                else
                  $file_path = $actual_filename; 

                $data = FileManagerModel::create(['file_name' => $actual_filename, 'file_path' => $file_path, 'permission' => "", 'parent_id' => $parent_id, 'type' => 'file']);    
                move_uploaded_file($tmpFile,$filename);
            } else {
                $actual_filename = $_FILES['file']['name'];            
                $filename = $dir.'/'.$actual_filename;

                if($pwd!='')
                  $file_path = $pwd.'/'.$folder_name.$actual_filename;
                else
                  $file_path = $actual_filename; 

                $data = FileManagerModel::create(['file_name' => $actual_filename, 'file_path' => $file_path, 'permission' => "", 'parent_id' => $parent_id, 'type' => 'file']);    
                move_uploaded_file($tmpFile,$filename);
            }
        }
    }

    public function ajaxfm() {
        //get filemanager
        $filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $filemanager = $filemanager->where('parent_id', $_POST['file_id']);
        }
        if(isset($_POST['search_txt']) && $_POST['search_txt']!='') {
            //if(@$_POST['dir']!='' || @$_GET['dir']!='')
            $filemanager = $filemanager->where('file_name', 'like', '%' . $_POST['search_txt'] . '%');
            //else
            //$filemanager = $filemanager->where('file_name', 'like', '%' . $_POST['search_txt'] . '%')->where('parent_id', 0);
        }
        if(@$_POST['file_id']=='' && @$_POST['search_txt']=='') {
            $filemanager = $filemanager->where('parent_id', 0);
        }
        $filemanager = $filemanager->get();

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
                  $res = "'".$f->file_path."'";
                if ($f === '.' or $f === '..') continue;
                if ($f->type=='folder') {          
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;" id="'.$f->file_id.'" class="context-menu-one">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span id="file_name_area_'.$f->file_id.'">'.$f->file_name.'</span>
                          <input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="'.$f->file_id.'" style="display: none;">
                        </div>
                     </div>';
                 } else { 
                    $file = $path . $f->file_name;

                    if($dir!='') {
                      $filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $filepath = "'".$dir.'/'.$f->file_name."'";
                    } else {
                      $filename = url('uploads/filemanager/'.$f->file_path);
                      $filepath = "'".$f->file_path."'";
                    }

                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$filepath.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
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
                        <div style="text-align: center;" id="'.$f->file_id.'" class="context-menu-one">
                          '.$ic.'
                          <span id="file_name_area_'.$f->file_id.'">'.$f->file_name.'</span>
                          <span id="file_title_area_'.$f->file_id.'" class="file_title" style="display: none;"></span>
                          <input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="'.$f->file_id.'" style="display: none;">
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
             echo '<h4 align="center">No files found</h4>';
        }
    }

    function rename(Request $request) {
        $inputs = $request->all();
        $file_id = $inputs['file_id'];
        $new_file_name = trim($inputs['new_name']);
        $old_file_name = trim($inputs['old_name']);        

        $dir = @$_POST['dir'];
        if($dir!='') {
          $old_path = getcwd().'/uploads/filemanager/'.$dir.'/'.$old_file_name;
          $new_path = getcwd().'/uploads/filemanager/'.$dir.'/'.$new_file_name;
        } else {
          $old_path = getcwd().'/uploads/filemanager/'.$old_file_name;
          $new_path = getcwd().'/uploads/filemanager/'.$new_file_name;
        }   

        rename($old_path, $new_path);

        if($dir!='')
          $file_path = $dir.'/'.$new_file_name;
        else
          $file_path = $new_file_name; 

        $data = array('file_name' => $new_file_name, 'file_path' => $file_path);
        FileManagerModel::where('file_id', $file_id)->update($data);
        unset($data);

        echo "Success";
    }

    function add_title(Request $request) {
        $inputs = $request->all();
        $file_id = $inputs['file_id'];
        $title = trim($inputs['title']);
        $data = array('title' => $title);
        FileManagerModel::where('file_id', $file_id)->update($data);
        echo "Success";
    }

    function get_title_fileid(Request $request) {
        $fm_count = FileManagerModel::where('file_id', $request->file_id)->select('title')->count();
        if($fm_count>0) {
            $fm = FileManagerModel::where('file_id', $request->file_id)->select('title')->first();
            return $fm->title;
        } else {
            return '';
        }
    }

   function delete(Request $request) {
        $inputs = $request->all();
        $file_id = $inputs['file_id'];
        $file_name = trim($inputs['file_name']);

        $dir = @$_POST['dir'];
        if($dir!='') {
          $dir = base_path().'/public/uploads/filemanager/'.$dir.'/'.$file_name;
        } else {
          $dir = base_path().'/public/uploads/filemanager/'.$file_name;
        }   
        
        if(is_dir($dir)) {
            $this->rrmdir($dir);    
        } else {
            unlink($dir);
        }        
        FileManagerModel::where('file_id', $file_id)->delete();        
        echo "success";
    }

    function rrmdir($dir) {
        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") {
                 $this->rrmdir($dir."/".$object); 
                 $file = FileManagerModel::where('file_name', $object)->select('file_id')->first();        
                 $file_id = @$file->file_id; 
                 FileManagerModel::where('file_id', $file_id)->delete();        
              } else {                
                $file = FileManagerModel::where('file_name', $object)->select('file_id')->first();        
                $file_id = @$file->file_id; 
                FileManagerModel::where('file_id', $file_id)->delete();
                unlink($dir."/".$object);
              }
            }
          }
          reset($objects);
          rmdir($dir);
        }
    }

    /*function get_all_parents($parent_id='', $fname='') {
        $file = FileManagerModel::where('file_id', $parent_id)->select('parent_id', 'file_name')->first();        
        $file_id = @$file->parent_id;
        $file_name = @$file->file_name;

        $x = array();

        if($file_id==0) {
        } else {
          $this->get_all_parents($file_id, $file_name); 
          $x[] = $file_name.'/';
        } 

        return $x;
    }*/

    function permission_decendents($dir, $updated_permission_value=null) {
        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") {
                 $x = $dir."/".$object;
                 $s = strstr($x, 'filemanager');
                 $fpath = str_replace('filemanager/', '', $s);
                 $this->permission_decendents($dir."/".$object, $updated_permission_value); 
                 $file = FileManagerModel::where('file_path', $fpath)->select('file_id', 'permission')->first();        
                 $file_id = @$file->file_id;
                 $current_permission_value = @$file->permission;
                 $current_permission_arr = explode(",", $current_permission_value);
                 if(!in_array($updated_permission_value, $current_permission_arr)) {
                    FileManagerModel::where('file_id', $file_id)->update(['permission' => $updated_permission_value]);
                 }
              } else {    
                 $x = $dir."/".$object;
                 $s = strstr($x, 'filemanager');
                 $fpath = str_replace('filemanager/', '', $s);
                 $file = FileManagerModel::where('file_path', $fpath)->select('file_id', 'permission')->first();        
                 $file_id = @$file->file_id;
                 $current_permission_value = @$file->permission;
                 $current_permission_arr = explode(",", $current_permission_value);
                 if(!in_array($updated_permission_value, $current_permission_arr)) {
                    FileManagerModel::where('file_id', $file_id)->update(['permission' => $updated_permission_value]);
                 }
              }
            }
          }
          reset($objects);
        }
    }

    function get_parent($parent_id, $updated_permission_value=null) {
        $file = FileManagerModel::where('file_id', $parent_id)->select('parent_id')->first();   
        if($file->parent_id>0) {     
          $pid =  $file->parent_id;
          FileManagerModel::where('file_id', $pid)->update(['permission' => $updated_permission_value]);
          $this->get_parent($pid); 
        }
    }

    function parentinfo(Request $request) {
        $file_count = FileManagerModel::where('file_path', $request->path)->select('file_id')->count();
        if($file_count>0) {
          $file = FileManagerModel::where('file_path', $request->path)->select('file_id')->first();
          echo $file->file_id;  
        } else {
          echo '';
        }     
    }

}