<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\backend\BannerModel;
use App\Model\backend\Testimonials;
use App\Model\backend\OurClient;
use App\Model\backend\Cms_Model;
use App\Model\backend\Category;
use App\Model\backend\Product;
use App\Model\backend\Gallery;
use App\Model\backend\Blog;
use App\Model\backend\FileManagerModel;
use App\Model\frontend\User;
use Redirect;
use DB;
use Session;
use Mail;
use App\Mail\ForgotPass;
use App\Mail\ResetPass;
use App\Mail\CareerAdmin;
use App\Mail\CareerUser;
use App\Mail\CustomerSupport;
use App\Mail\CustomerSupportAdmin;
use App\Mail\ResellerAdmin;
use App\Mail\ResellerUser;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $banner = BannerModel::where('status', 'Y')->orderBy('position', 'asc')->get();
        $testi = Testimonials::where('status', 'Y')->take(7)->get();
        $client = OurClient::where('status', 'Y')->get(); 
        $exp = Category::where('id', 1)->first();    
        $whatwedo = Category::where('id', 2)->first();  
        $partner = Category::where('id', 3)->first();    
        $indust = Category::where('id', 4)->first();            
        return view('frontend.home', compact('banner', 'testi', 'client', 'exp', 'whatwedo', 'partner', 'indust'));
    }

    public function search() {
        $search_count = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                          ->where('cms.content', 'LIKE', '%' . $_GET['q'] . '%')
                          ->OrWhere('categories.name', 'LIKE', '%' . $_GET['q'] . '%')
                          ->select('categories.name', 'cms.content', 'cms.slug')
                          ->get(); 
        if(count($search_count)>0) {
            $search_data = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                          ->where('cms.content', 'LIKE', '%' . $_GET['q'] . '%')
                          ->OrWhere('categories.name', 'LIKE', '%' . $_GET['q'] . '%')
                          ->select('categories.name', 'cms.content', 'cms.slug')
                          ->get(); 
        } else {
            $search_data = Cms_Model::where('cms.content', 'LIKE', '%' . $_GET['q'] . '%')
                           ->where('cms.content', '!=', "")
                           ->select('footer_title', 'content', 'slug')
                           ->get();
        }

        return view('frontend.search', compact('search_data'));
    }
    
    public function subpage(Request $request) {
        if(@$request->segment(3)!='')
            $slug = @$request->segment(3);
        else if(@$request->segment(2)!='')
            $slug = @$request->segment(2);
        else
            $slug = @$request->segment(1);

        $string = str_replace("-", " ", @$slug);
        $title = $string;            
        $cmscount = Cms_Model::where('footer_title', 'LIKE', '%' . $title . '%')
                 ->select('id', 'slug', 'columns', 'footer_title', 'content')
                 ->count();                 
        if($cmscount>0) {
            $cms = Cms_Model::where('footer_title', 'LIKE', '%' . $title . '%')
                 ->select('id', 'slug', 'columns', 'footer_title', 'content')
                 ->first();
            return view('frontend.footer_content', compact('cms'));
        } else {
            $cms_data_count = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
            ->where('cms.slug', $slug)
            ->select('cms.parent', 'cms.cat_id', 'cms.slug', 'categories.id', 'categories.name', 'cms.content')
            ->count(); 
            if($cms_data_count>0) {
                $cms_data = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                ->where('cms.slug', $slug)
                ->select('cms.parent', 'cms.cat_id', 'cms.slug', 'categories.id', 'categories.name', 'cms.content','cms.short_desc')
                ->first(); 
                return view('frontend.subpage', compact('cms_data'));
            } else {
                return response()->view('errors.404', [], 404);
            }
        }
    }

    public function product() {
        $product = Product::where('status', 'Y')->take(1)->first();
        $product_image = DB::table('product_image')->where('product_id', $product->id)->get();
        return view('frontend.product', compact('product', 'product_image'));
    }


    public function product_subpage(Request $request,$str,$sstr) {
        $slug = $request->segment(4);   
        if($slug != ''){
            $slug1 = $request->segment(3);
            $product_getid = Product::where('slug',$slug)->where('status','Y')->orderby('id','asc')->first();
        $product_id = $product_getid->id;
        $product_file = DB::table('product_file')->where('product_id', $product_id)->first();
        $product_image = DB::table('product_image')->where('product_id', $product_id)->get();
        $cms_data = Category::where('id', $product_getid->cms_id)
                    ->select('categories.name','categories.id')
                    ->first();
        $cms_main = DB::table('categories as c')
                    ->select('*')
                    ->leftjoin('categories as c1','c.parent','=','c1.id')
                    ->where('c.id',$cms_data->id)
                    ->first();

        return view('frontend.product_subpage', compact('product_getid', 'product_id', 'product_file', 'product_image', 'cms_data','slug1', 'cms_main'));
        }    
        $slug1 = '';
        $product_getid = Product::where('slug',$sstr)->where('status','Y')->orderby('id','asc')->first();
        $product_id = $product_getid->id;
        $product_file = DB::table('product_file')->where('product_id', $product_id)->first();
        $product_image = DB::table('product_image')->where('product_id', $product_id)->get();
        $cms_data = Category::where('id', $product_getid->cms_id)
                    ->select('categories.name')
                    ->first();
        return view('frontend.product_subpage', compact('product_getid', 'product_id', 'product_file', 'product_image', 'cms_data', 'slug1'));
    }

    public function endorse_reg() {
        return view('frontend.endorse_reg');
    }

    public function endorse_reg_save(Request $request) {
        $inputs = $request->all();
        $data = array(
            'name' => $inputs['name'],
            'designation' => $inputs['designation'],
            'email' => $inputs['email'],
            'website' => $inputs['website'],
            'location' => $inputs['location'],
            'testi_title' => $inputs['testi_title'],
            'description' => $inputs['testimonial'],
            'status' => 'N'
        ); 
        Testimonials::create($data);

        Session::flash('message', 'Testimonial has been saved successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('endorse_reg');
    }

    public function endorse_email_exist(Request $request) {
        $user_email = $request->input('email');
        $user_exist_count = Testimonials::where('email', $user_email)->count();
        if($user_exist_count==1) {
            return "false";
        } else {
            return "true";
        }
    }
    
    public function category(Request $request) {
        $catcount = Category::where('categories.slug', $request->segment(2))->select('id', 'name')->count(); 
        if($catcount>0) {
            $cat = Category::where('categories.slug', $request->segment(2))->select('id', 'name')->first(); 
            $cat_id = $cat->id;
            $cat_name = $cat->name;
            $catlist = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
               ->where('categories.parent', $cat_id)
               ->where('cms.status', 'Y')
               ->select('categories.name', 'cms.id', 'cms.slug', 'cms.short_desc')
               ->get();
        } else {
            return response()->view('errors.404', [], 404);
        }
        return view('frontend.category', compact('cat_name', 'catlist'));
    }   

    /*public function footer_content(Request $request) {
        $string = str_replace("-", " ", @$request->segment(2));
        $title = $string;            
        $cmscount = Cms_Model::where('footer_title', 'LIKE', '%' . $title . '%')
                 ->select('id', 'slug', 'columns', 'footer_title', 'content')
                 ->count();                 
        if($cmscount>0) {
            $cms = Cms_Model::where('footer_title', 'LIKE', '%' . $title . '%')
                 ->select('id', 'slug', 'columns', 'footer_title', 'content')
                 ->first();
        } else {
            return response()->view('errors.404', [], 404);
        }                      
        return view('frontend.footer_content', compact('cms'));
    }*/

    public function sublink_page(Request $request) {
        $slug = $request->segment(2);  
        $cmscount = Cms_Model::where('slug', $slug)
                 ->select('id', 'slug', 'footer_title', 'content')
                 ->count();                 
        if($cmscount>0) {
            $cms = Cms_Model::where('slug', $slug)
                 ->select('id', 'slug', 'footer_title', 'content')
                 ->first();
        } else {
            return response()->view('errors.404', [], 404);
        }                      
        return view('frontend.sublink_page', compact('cms'));
    }

    function forgot_pass() {
        return view('frontend.forgot_pass');
    }

    public function forgot_password_submit(Request $request) {
        $email = $request->email;
        $email_count = User::where('email', $email)->count();
        if($email_count>0) {            
            User::where('email', $email)->update(array('pass_token' => 'yes'));
            $user = User::where('email', $email)->first();
            Mail::to($user)->queue(new ForgotPass); 
            echo 'success';
        } else {
            echo 'fail';
        }        
    }

    function reset_password(Request $request) {
        if($_POST) {
            $user = User::select('id', 'pass_token')->where('email', $request->email)->first();
            if($user->pass_token=='no') {
                $current_url = $request->current_url; 
                Session::flash('message', 'Password reset token is Invalid.');
                Session::flash('alert-class', 'alert-danger');            
                return Redirect::to($current_url);              
            } else {
                User::where('email', $request->email)->update(array('pass_token' => 'no', 'password' => bcrypt($request->passwrd)));
                $current_url = $request->current_url;
                $usr = User::where('email', $request->email)->first();
                Mail::to($usr)->queue(new ResetPass); 
                Session::flash('message', 'Your password has been changed successfully.');
                Session::flash('alert-class', 'alert-success');            
                return Redirect::to($current_url);              
            }
        }
        return view('frontend.reset_password');
    }


    public function blog_detail(Request $request,$str) {
       $slug = $request->segment(2);
       $get_blog_detail = Blog::where('post_slug',$slug)->where('post_status',1)->first();
       return view('frontend.blog_detail',compact('get_blog_detail'));
    }

    public function gallery() {       
        return view('frontend.gallery');
    }

    public function gallery_fm() {
        $type = 'im';
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id']);
        }
        if(@$_POST['file_id']=='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', '=', 0);
        }
        $roc_filemanager = $roc_filemanager->where('permission', $type)->get();

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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      //$imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      //$imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
          
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a class="fancybox" href="'.$roc_filename.'" rel="ligthbox"> <img class="img-responsive" src="'.$roc_filename.'" alt=""></a>
                         <div class="text-center">
                            <p class="imgtitle">'.@$f->title.'</p>
                         </div>                        
                      </div>
                    </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function emp_photograph() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'PHOTOGRAPH')->where('permission', 'LIKE', '%E%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs_pgh('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);          
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg_pgh('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function emp_material() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'EXHIBITION-MATERIALS')->where('permission', 'LIKE', '%E%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs_mtl('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg_mtl('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';                    
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function emp_logo() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'LOGO')->where('permission', 'LIKE', '%E%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs_logo('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg_logo('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';                    
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function emp_diagram() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'DIAGRAMS')->where('permission', 'LIKE', '%E%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs_dgm('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg_dgm('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';                    
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function emp_product() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'PRODUCT')->where('permission', 'LIKE', '%E%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs_pro('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg_dgm('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';                    
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function emp_solution() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'SOLUTION')->where('permission', 'LIKE', '%E%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3" style="padding:5px;">
                      <div class="gallery-frame">
                         <a href="javascript:" onclick="return fnTs_sol('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                      </div>
                    </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg_dgm('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';                    
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function visitor_fm() {
        //get filemanager
        $filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $filemanager = $filemanager->where('parent_id', $_POST['file_id']);
            $filemanager = $filemanager->where('permission', 'LIKE', '%G%');
        }
        if(@$_POST['file_id']=='') {
            $filemanager = $filemanager->where('parent_id', 0);
            $filemanager = $filemanager->where('permission', 'LIKE', '%G%');
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
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;
                if (is_dir($path . '/' . $f->file_name)) {          
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

    public function ajaxfm() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'BROCHURES')->where('permission', 'LIKE', '%G%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                       </div>
                     </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function datasheet() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'DATASHEET')->where('permission', 'LIKE', '%G%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                       </div>
                     </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function video() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'VIDEO')->where('permission', 'LIKE', '%G%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                       </div>
                     </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }

    public function presentation() {
        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        $roc_filemanager = $roc_filemanager->where('file_name', 'PRESENTATION')->where('permission', 'LIKE', '%G%')->first();
        $roc_file_id = $roc_filemanager->file_id;

        $roc_filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $roc_filemanager = $roc_filemanager->where('parent_id', $_POST['file_id'])->get();
        } else {
            $roc_filemanager = $roc_filemanager->where('parent_id', $roc_file_id)->get();
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
        $cls = '';
        if(count($roc_filemanager)>0) {
            foreach ($roc_filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {        
                    if($f->parent_id=='0')
                        $cls = 'brochures';
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder '.$cls.'" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                       </div>
                     </div>';
                 } else { 
                    $roc_file = $path . $f->file_name;
                    if($dir!='') {
                      $roc_filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $roc_filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($roc_file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$roc_filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
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
        $file_count = FileManagerModel::where('file_path', $request->child)->select('file_id')->count();
        if($file_count>0) {
          $file = FileManagerModel::where('file_path', $request->child)->select('file_id')->first();
          echo $file->file_id;  
        } else {
          echo '';
        }     
    }

    function info() {
        phpinfo();
    }

    public function reseller()
    {  
        if(Auth::guard('user')->user() && Auth::guard('user')->user()->type=='P')
          return view('frontend.reseller');
        else
          return Redirect::to('.');
    }

    public function reseller_store(Request $request) {
        $inputs = $request->all();

        $data = array(
            'user_id' => Auth::guard('user')->user()->id,
            'frimname' => $inputs['frimname'],
            'address' => $inputs['address'],
            'citypin' => $inputs['citypin'],
            'phone' => $inputs['phone'],
            'email' => $inputs['email'],
            'state' => $inputs['state'],
            'fax' => $inputs['fax'],
            'mobile' => $inputs['mobile'],
            'in_yr' => $inputs['in_yr'],
            'emp' => $inputs['emp'],
            'equity' => $inputs['equity'],
            'totalsales' => $inputs['totalsales'],
            'roc' => $inputs['roc'],
            'gst' => $inputs['gst'],
            'itpan' => $inputs['itpan'],
            'roc_file' => '',
            'gst_file' => '',
            'itpan_file' => '',
            'type_reseller' => @$inputs['type_reseller'],
            'prop_name' => $inputs['prop_name'],
            'prop_address' => $inputs['prop_address'],
            'prop_city' => $inputs['prop_city'],
            'prop_mobile' => $inputs['prop_mobile'],
            'part_name' => $inputs['part_name'],
            'part_address' => $inputs['part_address'],
            'part_city' => $inputs['part_city'],
            'part_mobile' => $inputs['part_mobile'],
            'dir_name' => $inputs['dir_name'],
            'dir_address' => $inputs['dir_address'],
            'dir_city' => $inputs['dir_city'],
            'dir_mobile' => $inputs['dir_mobile'],
            'sales_name' => $inputs['sales_name'],
            'sales_contact' => $inputs['sales_contact'],
            'sales_email' => $inputs['sales_email'],
            'accounts_name' => $inputs['accounts_name'],
            'accounts_contact' => $inputs['accounts_contact'],
            'accounts_email' => $inputs['accounts_email'],
            'logistics_name' => $inputs['logistics_name'],
            'logistics_contact' => $inputs['logistics_contact'],
            'logistics_email' => $inputs['logistics_email'],
            'tech_name' => $inputs['tech_name'],
            'tech_contact' => $inputs['tech_contact'],
            'tech_email' => $inputs['tech_email'],
            'support_name' => $inputs['support_name'],
            'support_contact' => $inputs['support_contact'],
            'support_email' => $inputs['support_email'],
            'bank_name' => $inputs['bank_name'],
            'ifsc_code' => $inputs['ifsc_code'],
            'cheque_file' => '',
            'bank_contact' => $inputs['bank_contact'],
            'bank_address' => $inputs['bank_address'],
            'bank_phone' => $inputs['bank_phone'],
            'credit_limit' => $inputs['credit_limit'],
            'ac_no' => $inputs['ac_no'],
            'type' => $inputs['type'],
            'amount' => $inputs['amount'],
            'optradio' => @$inputs['optradio'],
            'trade_name1' => $inputs['trade_name1'],
            'trade_address1' => $inputs['trade_address1'],
            'trade_citypin1' => $inputs['trade_citypin1'],
            'trade_phone1' => $inputs['trade_phone1'],
            'trade_state1' => $inputs['trade_state1'],
            'trade_fax1' => $inputs['trade_fax1'],
            'trade_name2' => $inputs['trade_name2'],
            'trade_address2' => $inputs['trade_address2'],
            'trade_citypin2' => $inputs['trade_citypin2'],
            'trade_phone2' => $inputs['trade_phone2'],
            'trade_state2' => $inputs['trade_state2'],
            'trade_fax2' => $inputs['trade_fax2'],
            'date' => $inputs['date'],
            'place' => $inputs['place'],
            'signature_seal' => '',
            'status' => 'Y',
            'created_at' => date('Y-m-d h:i:s')
        ); 
        $id = DB::table('reseller')->insertGetId($data);
        $destinationPath = getcwd() . '/uploads/reseller/'.$id.'/';

        $roc_file = @$inputs['roc_file'];
        if (isset($roc_file) && $roc_file != '') {
            $file = $request->file('roc_file');   
            $filename_value = time() . rand(100000, 10000);
            $roc_filename = md5($filename_value) . "." . $file->getClientOriginalExtension();           
            $file->move($destinationPath,$roc_filename);
            DB::table('reseller')->where('resel_id', $id)->update(array('roc_file' => $roc_filename));
        }

        $gst_file = @$inputs['gst_file'];
        if (isset($gst_file) && $gst_file != '') {
            $file = $request->file('gst_file');   
            $filename_value = time() . rand(100000, 10000);
            $gst_filename = md5($filename_value) . "." . $file->getClientOriginalExtension();           
            $file->move($destinationPath,$gst_filename);
            DB::table('reseller')->where('resel_id', $id)->update(array('gst_file' => $gst_filename));
        }

        $itpan_file = @$inputs['itpan_file'];
        if (isset($itpan_file) && $itpan_file != '') {
            $file = $request->file('itpan_file');   
            $filename_value = time() . rand(100000, 10000);
            $itpan_filename = md5($filename_value) . "." . $file->getClientOriginalExtension();           
            $file->move($destinationPath,$itpan_filename);
            DB::table('reseller')->where('resel_id', $id)->update(array('itpan_file' => $itpan_filename));
        }

        $cheque_file = @$inputs['cheque_file'];
        if (isset($cheque_file) && $cheque_file != '') {
            $file = $request->file('cheque_file');   
            $filename_value = time() . rand(100000, 10000);
            $cheque_filename = md5($filename_value) . "." . $file->getClientOriginalExtension();           
            $file->move($destinationPath,$cheque_filename);
            DB::table('reseller')->where('resel_id', $id)->update(array('cheque_file' => $cheque_filename));
        }

        $signature_seal = @$inputs['signature_seal'];
        if (isset($signature_seal) && $signature_seal != '') {
            $file = $request->file('signature_seal');   
            $filename_value = time() . rand(100000, 10000);
            $signature_seal_fn = md5($filename_value) . "." . $file->getClientOriginalExtension();           
            $file->move($destinationPath,$signature_seal_fn);
            DB::table('reseller')->where('resel_id', $id)->update(array('signature_seal' => $signature_seal_fn));
        }

        $limit_comp = $request->file('limit_comp');
        if(isset($limit_comp) && $limit_comp!='') {
            $file_count = count($limit_comp);
            $uploadcount = 0;
            foreach($limit_comp as $file) {
                $rules = array('file' => 'required');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . rand(100000, 10000).'.'.$extension;
                $file->move($destinationPath, $fileName);
                $uploadcount ++;
                DB::table('reseller_doc_limited_company')->insert([
                    'reseller_id' => $id,
                    'limit_comp' => $fileName
                ]);
            }
        }

        $partnership_firm = $request->file('partnership_firm');
        if(isset($partnership_firm) && $partnership_firm!='') {
            $file_count = count($limit_comp);
            $uploadcount = 0;
            foreach($partnership_firm as $file) {
                $rules = array('file' => 'required');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . rand(100000, 10000).'.'.$extension;
                $file->move($destinationPath, $fileName);
                $uploadcount ++;
                DB::table('reseller_doc_partnership_firm')->insert([
                    'reseller_id' => $id,
                    'partnership_firm' => $fileName
                ]);
            }
        }

        $sole_proprietor = $request->file('sole_proprietor');
        if(isset($sole_proprietor) && $sole_proprietor!='') {
            $file_count = count($limit_comp);
            $uploadcount = 0;
            foreach($sole_proprietor as $file) {
                $rules = array('file' => 'required');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . rand(100000, 10000).'.'.$extension;
                $file->move($destinationPath, $fileName);
                $uploadcount ++;
                DB::table('reseller_doc_sole_proprietor')->insert([
                    'reseller_id' => $id,
                    'sole_proprietor' => $fileName
                ]);
            }
        }

        $admin_email = 'sales@atnetindia.net';
        Mail::to($admin_email)->queue(new ResellerAdmin); // To Admin

        $user_email = $inputs['email'];
        Mail::to($user_email)->queue(new ResellerUser); // To User

        Session::flash('message', 'Form has been saved successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('reseller');
    }

    public function reseller_email_exist(Request $request) {
        $user_email = $request->input('email');
        $user_exist_count = DB::table('reseller')->where('email', $user_email)->count();
        if($user_exist_count==1) {
            return "false";
        } else {
            return "true";
        }
    }

    public function online_job_app()
    {  
        return view('frontend.online_job_app');
    }

    public function career_store(Request $request) {
        $inputs = $request->all();

        $data = array(
            'cname' => $inputs['cname'],
            'address' => $inputs['address'],
            'phoneno' => $inputs['phoneno'],
            'email' => $inputs['email'],
            'dob' => $inputs['dob'],
            'age' => $inputs['age'],
            'yearofpass' => $inputs['yearofpass'],
            'major' => $inputs['major'],
            'marks_grade' => $inputs['marks_grade'],
            'uni_clg' => $inputs['uni_clg'],
            'graduation_yearofpass' => $inputs['graduation_yearofpass'],
            'graduation_major' => $inputs['graduation_major'],
            'graduation_marks_grade' => $inputs['graduation_marks_grade'],
            'graduation_clg' => $inputs['graduation_clg'],
            'hs_yearofpass' => $inputs['hs_yearofpass'],
            'hs_major' => $inputs['hs_major'],
            'hs_marks_grade' => $inputs['hs_marks_grade'],
            'hs_clg' => $inputs['hs_clg'],
            'sec_yearofpass' => $inputs['sec_yearofpass'],
            'sec_major' => $inputs['sec_major'],
            'sec_marks_grade' => $inputs['sec_marks_grade'],
            'sec_clg' => $inputs['sec_clg'],
            'last_salary' => $inputs['last_salary'],
            'last_ctc' => $inputs['last_ctc'],
            'travel_in' => $inputs['travel_in'],
            'travel_out' => $inputs['travel_out'],
            'relocate' => $inputs['relocate'],
            'relocate_country' => $inputs['relocate_country'],
            'father_name' => $inputs['father_name'],
            'father_occp' => $inputs['father_occp'],
            'mother_name' => $inputs['mother_name'],
            'mother_occp' => $inputs['mother_occp'],
            'dependent' => $inputs['dependent'],
            'siblings' => $inputs['siblings'],
            'siblings_emp' => $inputs['siblings_emp'],
            'marital_status' => $inputs['marital_status'],
            'spouse_name' => $inputs['spouse_name'],
            'spouse_emp_status' => $inputs['spouse_emp_status'],
            'emp_status' => $inputs['emp_status'],
            'salary_expected' => $inputs['salary_expected'],
            'notice_period' => $inputs['notice_period'],
            'place' => $inputs['place'],
            'date' => $inputs['date'],
            'name' => $inputs['name'],
            'signature' => $inputs['signature'],
            'created_at' => date('Y-m-d h:i:s')
        );

        $id = DB::table('career')->insertGetId($data);

        //career work experience
        for($i=0;$i<count($inputs['company']);$i++) {
          if($inputs['company'][$i]!='') {
            $career_exp = array(
                'career_id' => $id, 
                'company' => $inputs['company'][$i], 
                'description' => $inputs['description'][$i], 
                'periodofservice' => $inputs['periodofservice'][$i], 
                'location' => $inputs['location'][$i], 
                'natureofjob' => $inputs['natureofjob'][$i], 
                'salary_drawn' => $inputs['salary_drawn'][$i]
            );
            DB::table('career_work_exp')->insert($career_exp);
          }
        }

        //career project
        for($i=0;$i<count($inputs['pro_company']);$i++) {
          if($inputs['pro_company'][$i]!='') {
            $career_project = array(
                'career_id' => $id, 
                'company' => $inputs['pro_company'][$i], 
                'description' => $inputs['pro_description'][$i]
            );
            DB::table('career_project')->insert($career_project);
          }
        }

        //career dependant
        for($i=0;$i<count($inputs['child_name']);$i++) {
          if($inputs['child_name'][$i]!='') {
            $career_dependant = array(
                'career_id' => $id, 
                'child_name' => $inputs['child_name'][$i], 
                'child_age' => $inputs['child_age'][$i], 
                'child_school' => $inputs['child_school'][$i]
            );
            DB::table('career_dependant')->insert($career_dependant);
          }
        }

        //career contact
        for($i=0;$i<count($inputs['child_name']);$i++) {
          if($inputs['child_name'][$i]!='') {
            $career_contact = array(
                'career_id' => $id, 
                'related_person' => $inputs['related_person'][$i], 
                'related_cnumber' => $inputs['related_cnumber'][$i]
            );
            DB::table('career_contact')->insert($career_contact);
          }
        }

        //signature
        $signature = @$inputs['signature'];
        if (isset($signature) && $signature != '') {
            $file = $request->file('signature');   
            $filename_value = time() . rand(100000, 10000);
            $signature_filename = md5($filename_value) . "." . $file->getClientOriginalExtension(); 
            $destinationPath = getcwd() . '/uploads/career/'.$id.'/';          
            $file->move($destinationPath,$signature_filename);
            DB::table('career')->where('c_id', $id)->update(array('signature' => $signature_filename));
        }

        $hr_email = 'hr@atnetindia.net';
        Mail::to($hr_email)->queue(new CareerAdmin); // To Admin

        $user_email = $inputs['email'];
        Mail::to($user_email)->queue(new CareerUser); // To User

        Session::flash('message', 'Your job application has been received successfully. We will contact you soon.');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('online_job_app');
    }

    public function visitors()
    {  
        if(!Auth::guard('user')->user())
          return view('frontend.visitors');
        else
          return Redirect::to('user/dashboard');
    }

    public function visitors_signin()
    { 
        if(!Auth::guard('user')->user())
          return view('frontend.visitors_signin');
        else
          return Redirect::to('user/dashboard');
    }

    public function customer_support(Request $request) {
        $inputs = $request->all();
        $data = array(
            'customerid' => $inputs['customerid'],
            'subject' => $inputs['subject'], 
            'product_type' => $inputs['product_type'],
            'product_name' => $inputs['product_name'],
            'p_serial_no' => $inputs['p_serial_no'],
            'physical_condition' => $inputs['physical_condition'],           
            'p_complaint' => $inputs['p_complaint'],
            'locally' => $inputs['locally'],
            'purchase' => $inputs['purchase'],
            'specify' => $inputs['specify'],
            'support_desc' => $inputs['support_desc'],
            'status' => 'Y',
            'created_date' => date('Y-m-d h:i:s')
        ); 
        $id = DB::table('customer_support')->insert($data); 

        $user_email = $inputs['customerid'];
        Mail::to($user_email)->queue(new CustomerSupport);
        $support_email = 'support@atnetindia.net';
        Mail::to($support_email)->queue(new CustomerSupportAdmin);

        echo 'success';
    }

    public function customer_email_check(Request $request) {
        $user_email = $request->input('customerid');
        $user_exist_count = User::where('email', $user_email)->where('type', 'C')->count();
        if($user_exist_count==1) {
            return "true";
        } else {
            return "false";
        }
    }

}
