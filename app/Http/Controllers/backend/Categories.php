<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\Admin;
use DB;
use App\Model\backend\Category;
use App\Model\backend\Cms_Model;
use Input;
use Redirect;
use Session;

class Categories extends Controller {

    public function index() {
        $category = Category::select('*')->get();
        return view('backend.category.index', compact('category'));
    }

    public function create() {
        $category = Category::select('*')->where('parent', '0')->get();
        return view('backend.category.add', compact('category'));
    }

    public function store(Request $request) { 
        $inputs = $request->all();
        if (!empty($inputs['slug'])) {
            $slug_value = str_slug($inputs['slug'], "-");
        } else {
            $slug_value = str_slug($inputs['title'], "-");
        }
        if (!empty($inputs['parent_status'])) {
            $parent_value = 0;
        } else {
            $parent_value = $inputs['parent'];
        }

        if(isset($inputs['position'])) {
            $position = $inputs['position'];
        } else {
            $position = '';
        }

        $data = Category::create([
                    'parent' => $parent_value,
                    'name' => $inputs['title'],
                    'slug' => $slug_value,
                    'position' => $inputs['position']
                   // $position
        ]);

        Session::flash('message', 'Category has been added successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/categories/add');
    }

    public function show($id) {
        $category = Category::find($id);
        return view('backend.category.show', compact('category'));
    }

    public function edit($id) {
        $category = Category::find($id);
        $load_category = Category::select('*')->where('parent', '0')->get();
        return view('backend.category.edit', compact('category', 'load_category'));
    }

    public function update() {
        $id = $_POST['hidid'];
        if (!empty($_POST['slug'])) {
            $slug_value = str_slug($_POST['slug'], "-");
        } else {
            $slug_value = str_slug($_POST['title'], "-");
        }
        if (empty($_POST['parent'])) {
            $parent_value = 0;
        } else {
            $parent_value = $_POST['parent'];
        }

        if(isset($inputs['position'])) {
            $position = $inputs['position'];
        } else {
            $position = '';
        }

        $item = Category::findOrFail($id);
        $item->name = $_POST['title'];
        $item->slug = $slug_value;
        $item->parent = $parent_value;
       // $item->position = $position;
        $item->position = $_POST['position'];
        $item->save();

        return Redirect::route('category');
    } 
    
    public function categories_delete($id) {
        $cat = Category::where('id', $id)->select('parent')->first();
        $cms_exists = Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                      ->where('categories.id', $id)
                      ->select('categories.*')
                      ->count(); 
        if($cat->parent==0) {
            Session::flash('message', 'Parent category cannot be deleted');
            Session::flash('alert-class', 'alert-error');
            return Redirect::to('admin/categories');
        } else if($cms_exists!=0) {
            Session::flash('message', 'This category has posts. Are you sure want to delete the cms data for this category?');
            Session::flash('alert-class', 'alert-warning');
            return Redirect::to('admin/categories/?cat_id='.$id);  
        } else {
            $cat = Category::find($id);
            $cat->delete();            
            Session::flash('message', 'Category has been deleted');
            Session::flash('alert-class', 'alert-error');
            return Redirect::to('admin/categories');
        }
    }

    public function delete_post_by_cat(Request $request) {
        $id = $request->catid;        
        $cms = Cms_Model::where('cat_id', '=', $id)->delete();
        $cat = Category::find($id);
        $cat->delete(); 
        echo 'success';
    }

    public function isCategoryExist() {
        $input = Input::all();
        $category_title = $input['title'];
        $category_id = $input['category_id'];
        if (!empty($category_id)) {
            $user_exist_count = Category::where('name', $category_title)->where('id', '!=', $category_id)->count();
        } else {
            $user_exist_count = Category::where('name', $category_title)->count();
        }
        if ($user_exist_count == 1) {
            return "false";
        } else {
            return "true";
        }
    }
    
    public function category_status(Request $request) {
        $status = $request->segment(4);
        $id = $request->segment(5);
        if ($status == 'active') {
            Category::where('id', '=', $id)->update(['is_active' => 1]);
        } else {
            Category::where('id', '=', $id)->update(['is_active' => 0]);
        }
        return Redirect::to('admin/categories');
    }

    public function categoryexist(Request $request)
    {
        $inputs = $request->all();       
        $name = $inputs['title'];
        $id = isset($inputs['id'])?$inputs['id']:'';
        $check_name = Category::where('name', $name)->where('id', '!=', $id)->first();
        if($check_name != ''){
            $get_name = $check_name->name;
            if($get_name != $name){
                return "true";
            }
            else{
                return "false";
            }
        }
        else{
            return "true";
        }
    }

    public function treeview() {
        $res = Category::get()->toArray();    
        //iterate on results row and create new index array of data
        foreach($res as $row) {
          $data[] = $row;
        }
        $itemsByReference = array();
        // Build array of item references:
        foreach($data as $key => &$item) {
           $itemsByReference[$item['id']] = &$item;
        }
        // Set items as children of the relevant parent item.
        foreach($data as $key => &$item)  {    
           if($item['parent'] && isset($itemsByReference[$item['parent']])) {
              $itemsByReference [$item['parent']]['nodes'][] = &$item;
            }
        }
        // Remove items that were added to parents elsewhere:
        foreach($data as $key => &$item) {
           if($item['parent'] && isset($itemsByReference[$item['parent']]))
              unset($data[$key]);
        }
        // Encode:
        echo json_encode($data);
    }

}
