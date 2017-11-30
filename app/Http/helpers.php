<?php

use App\User;
use App\Model\backend\Category;
use App\Model\backend\Setting;
use App\Model\backend\Cms_Model;

function getCategory() {
	$category = Category::where('parent', 0)->get();
	return $category;
}

function getSubCategory($id) {
	$subcategory = Category::where('parent', $id)->orderBy('position', 'asc')->get();
	return $subcategory;	
}

function getSubSubCategory($id) {
	$subsubcategory = Category::where('parent', $id)->orderBy('position', 'asc')->get();
	return $subsubcategory;	
}

function setting() {
	$setting = Setting::where('id', 1)->first();
	return $setting;
}

function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') {
	if (!is_array($user_tree_array))
	$user_tree_array = array();

	$category = Category::where('parent', '=', $parent)->get();
	foreach($category as $row) {
	  $user_tree_array[] = array("id" => $row->id, "name" => $spacing . $row->name);
	  $user_tree_array = fetchCategoryTree($row->id, $spacing . '&brvbar;&brvbar;&nbsp;&nbsp;', $user_tree_array);
	}	
	return $user_tree_array;
}

function getCategoryName($cat_id) {
	$cat_count = Category::where('id', $cat_id)->count();
	if($cat_count>0) {
		$cat = Category::where('id', $cat_id)->first();
		return $cat->name;
	} else 
		return '---';
}

function getParent($id) {
	$parent_count = Category::where('id', $id)->select('parent')->count();
	if($parent_count>0) {
		$cat = Category::where('id', $id)->select('parent')->first();
		return $cat->parent;
	} else 
		return '';
}

function getParentName($id) {
	$parent_count = Category::where('id', $id)->select('name')->count();
	if($parent_count>0) {
		$cat = Category::where('id', $id)->select('name')->first();
		return $cat->name;
	} else 
		return '---';
}

function seo_setting(){
	if(@Request::segment(3)!='')
		$slug = @Request::segment(3);
	else if(@Request::segment(2)!='')
		$slug = @Request::segment(2);
	else
		$slug = @Request::segment(1);

	$title = urldecode(Request::segment(1));
	$seo_count = Cms_Model::where('footer_title', $title)->count();
	if($seo_count>0) {
		$seo = Cms_Model::where('footer_title', $title)->select('seo_title', 'seo_description', 'seo_keywords')->first();
		return $seo;
	} else {
		$seo_count = Cms_Model::where('slug', $slug)->count();
		if($seo_count>0) {
		$seo = Cms_Model::where('slug', $slug)->select('seo_title', 'seo_description', 'seo_keywords')->first();
		return $seo;
		}
	}
}

function categorySlugById($id) {
	$cat_count = Category::where('id', $id)->select('slug')->count();
	if($cat_count>0) {
		$cat = Category::where('id', $id)->select('slug')->first();
		return $cat->slug;
	} else 
		return '';
}

function displaydate($date){
	$displaydate = date("M d, Y", strtotime($date));
	return $displaydate;
}

function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-&]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

function getUserNameById($id) {
	$user_count = User::where('id', $id)->select('first_name', 'last_name')->count();
	if($user_count>0) {
		$user = User::where('id', $id)->select('first_name', 'last_name')->first();
		return $user->first_name.' '.$user->last_name;
	} else 
		return '';
}

function getUserNameByEmail($email) {
	$user_count = User::where('email', $email)->select('first_name', 'last_name')->count();
	if($user_count>0) {
		$user = User::where('email', $email)->select('first_name', 'last_name')->first();
		return $user->first_name.' '.$user->last_name;
	} else 
		return '';
}

function getUserTypeById($id) {
	$user_count = User::where('id', $id)->select('type')->count();
	if($user_count>0) {
		$user = User::where('id', $id)->select('type')->first();
		return $user->type;
	} else 
		return '';
}