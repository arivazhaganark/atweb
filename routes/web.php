<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/info', 'HomeController@info');
    Route::get('/search', 'HomeController@search');
    Route::get('reseller', 'HomeController@reseller');
    Route::get('visitors', 'HomeController@visitors');
    Route::get('visitors_signin', 'HomeController@visitors_signin');
    Route::get('visitors', 'HomeController@visitors');
    Route::post('visitor/save', 'frontend\Auth\RegisterController@saveRegisterForm');
    Route::post('/visitor_reg/email_exist', 'frontend\Auth\RegisterController@isEmailExist');
    Route::post('visitor/authenticate', 'frontend\Auth\LoginController@visitor_authenticate');
    Route::get('/visitor_success', function(){ return view('frontend.visitor_success'); });
    
    Route::post('reseller/store', 'HomeController@reseller_store');
    Route::post('reseller/email_exist', 'HomeController@reseller_email_exist');
    Route::get('online_job_app', 'HomeController@online_job_app');
    Route::post('career/store', 'HomeController@career_store');
    
    Route::get('/product', 'HomeController@product');
    Route::get('/product/{str}/{sstr}', 'HomeController@product_subpage');
    Route::get('/product/{str}/{sstr}/{ssstr}', 'HomeController@product_subpage');   
    Route::get('/blog_detail/{str}','HomeController@blog_detail');
    Route::get('/gallery','HomeController@gallery');
   
    Route::get('/partner_reg', 'HomeController@partner_reg');
    Route::get('/endorse_reg', 'HomeController@endorse_reg');
    Route::post('/endorse_reg_save', 'HomeController@endorse_reg_save');
    Route::post('/endorse_reg/email_exist', 'HomeController@endorse_email_exist');
    Route::get('/category/{str}', 'HomeController@category');
    //Route::get('/footer_content/{str}', 'HomeController@footer_content');
    Route::get('/sublink_page/{str}', 'HomeController@sublink_page');

    Route::post('/dealregistrationstore', 'frontend\UserController@dealregistrationstore');
    Route::post('/deal_reg/email_exist', 'frontend\UserController@deal_email_exist');

    // ADMIN
    Route::get('admin', 'backend\Auth\LoginController@getLoginForm');
    Route::get('admin/login', 'backend\Auth\LoginController@getLoginForm');
    Route::post('admin/authenticate', 'backend\Auth\LoginController@authenticate');

    // USER
    Route::get('user/login', 'frontend\Auth\LoginController@getLoginForm');
    Route::post('user/authenticate', 'frontend\Auth\LoginController@authenticate');
    Route::post('partner/authenticate', 'frontend\Auth\LoginController@partner_authenticate');
    Route::get('user/forgot_password', 'HomeController@forgot_pass');
    Route::post('user/forgot_password_submit', 'HomeController@forgot_password_submit');
    Route::get('password/reset/{str}', 'HomeController@reset_password');
    Route::post('password/reset/{str}', 'HomeController@reset_password');

    Route::get('/client_reg', 'frontend\Auth\RegisterController@getRegisterForm');
    Route::any('client_reg/save', 'frontend\Auth\RegisterController@saveRegisterForm');
    Route::post('/client_reg/email_exist', 'frontend\Auth\RegisterController@isEmailExist');
    Route::get('/client_success', function(){ return view('frontend.client_success'); });

    Route::any('partner_reg/save', 'frontend\Auth\RegisterController@saveRegisterForm');
    Route::post('/partner_reg/email_exist', 'frontend\Auth\RegisterController@isEmailExist');
    Route::get('/partner_success', function(){ return view('frontend.partner_success'); });

    Route::post('brochure/filemanager/ajaxfm', 'HomeController@ajaxfm');
    Route::post('brochure/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('datasheet/filemanager/ajaxfm', 'HomeController@datasheet');
    Route::post('datasheet/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('video/filemanager/ajaxfm', 'HomeController@video');
    Route::post('video/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('presentation/filemanager/ajaxfm', 'HomeController@presentation');
    Route::post('presentation/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('gallery/filemanager/ajaxfm', 'HomeController@gallery_fm');

    Route::post('emp_photograph/filemanager/ajaxfm', 'HomeController@emp_photograph');
    Route::post('emp_photograph/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('emp_material/filemanager/ajaxfm', 'HomeController@emp_material');
    Route::post('emp_material/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('emp_logo/filemanager/ajaxfm', 'HomeController@emp_logo');
    Route::post('emp_logo/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('emp_diagram/filemanager/ajaxfm', 'HomeController@emp_diagram');
    Route::post('emp_diagram/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('emp_product/filemanager/ajaxfm', 'HomeController@emp_product');
    Route::post('emp_product/filemanager/parentinfo', 'HomeController@parentinfo');
    Route::post('emp_solution/filemanager/ajaxfm', 'HomeController@emp_solution');
    Route::post('emp_solution/filemanager/parentinfo', 'HomeController@parentinfo');

    Route::post('visitor/filemanager/ajaxfm', 'HomeController@visitor_fm');
    Route::post('visitor/filemanager/parentinfo', 'HomeController@parentinfo');

    Route::get('/customer_support', function () { return view('frontend.customer_support'); });
    Route::post('customer_support/save', 'HomeController@customer_support');
    Route::get('/customer_support_success', function () { return view('frontend.customer_support_success'); });
    Route::post('customer_support/email_check', 'HomeController@customer_email_check');

    Route::get('/partners', function(){ return view('frontend.partner_register'); });
});


Route::group(['middleware' => ['user']], function () {
    Route::post('user/logout', 'frontend\Auth\LoginController@getLogout');
    Route::get('user/logout', 'frontend\Auth\LoginController@getLogout');
    Route::get('user/dashboard', 'frontend\UserController@dashboard');
    Route::post('user/dashboard/dealinfo', 'frontend\UserController@dealinfo');

    Route::get('user/myprofile', 'frontend\UserController@myprofile');
    Route::post('user/myprofile/save', 'frontend\UserController@myprofile_submit');
    Route::post('user/myprofile_partner/save', 'frontend\UserController@myprofile_partner_submit');
    Route::post('user/myprofile_emp/save', 'frontend\UserController@myprofile_emp_submit');

    Route::get('user/change_password', 'frontend\UserController@change_password');
    Route::post('user/change_password/password_check', 'frontend\UserController@OldPasswordCheck');
    Route::post('user/change_password/new_password_check', 'frontend\UserController@NewPasswordCheck');
    Route::post('user/change_password/store', 'frontend\UserController@change_password_store');

    Route::get('user/resources', 'frontend\UserController@files');

    Route::post('user/filemanager/ajaxfm', 'frontend\UserController@ajaxfm');
    Route::post('user/filemanager/parentinfo', 'frontend\UserController@parentinfo');    

    Route::post('demo_request_form/save', 'frontend\UserController@demo_request_form');
    Route::post('demo_feedback/save', 'frontend\UserController@demo_feedback');

    Route::post('customer_survey/save', 'frontend\UserController@customer_survey');
});    
 

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/home', 'backend\AdminController@home');
    Route::get('admin/logout', 'backend\Auth\LoginController@getLogout');
    Route::post('admin/logout', 'backend\Auth\LoginController@getLogout');
    Route::get('admin/setting', 'backend\SettingController@index');
    Route::post('/admin/setting/store', 'backend\SettingController@store');
    Route::get('admin/change_password', 'backend\ChangePassController@index');
    Route::post('/admin/change_password/store', 'backend\ChangePassController@store');
    Route::post('/admin/change_password/password_check', 'backend\ChangePassController@OldPasswordCheck');
    Route::get('admin/footer_links', 'backend\FooterLinksController@index');

    // CMS Route
    Route::get('admin/cms', 'backend\CmsController@index');
    Route::get('admin/cms/add', 'backend\CmsController@create');
    Route::get('admin/cms/check_slug_exist', 'backend\CmsController@check_slug_exist');
    Route::post('admin/cms/store', 'backend\CmsController@store');
    Route::get('admin/cms/edit/{id}', 'backend\CmsController@edit');
    Route::get('admin/cms/show/{id}','backend\CmsController@show');
    Route::post('admin/cms/update', 'backend\CmsController@update');
    Route::post('admin/cms/actionupdate','backend\CmsController@actionupdate');

    // Client Route
    Route::get('admin/user', 'backend\UserController@index');
    Route::get('admin/user/edit/{id}', 'backend\UserController@edit');
    Route::post('admin/client_email_exist', 'backend\UserController@client_email_exist');
    Route::post('admin/user/update', 'backend\UserController@update');
    Route::get('admin/user/show/{id}','backend\UserController@show');
    Route::post('admin/user/actionupdate', 'backend\UserController@actionupdate');

    // Partner Route
    Route::get('admin/partner', 'backend\PartnerController@index');
    Route::get('admin/partner/edit/{id}', 'backend\PartnerController@edit');
    Route::post('admin/partner_email_exist', 'backend\PartnerController@partner_email_exist');
    Route::post('admin/partner/update', 'backend\PartnerController@update');
    Route::get('admin/partner/show/{id}','backend\PartnerController@show');
    Route::post('admin/partner/actionupdate', 'backend\PartnerController@actionupdate');
    Route::get('admin/deal/view/{id}', 'backend\DealController@index');
    Route::post('admin/deal/dealinfo', 'backend\DealController@dealinfo');
    Route::get('admin/deal/deal_approve/{id}', 'backend\DealController@deal_approve');
    Route::get('admin/deal/deal_reject/{id}', 'backend\DealController@deal_reject');
    Route::post('admin/deal/actionupdate', 'backend\DealController@actionupdate');
    Route::get('admin/reseller/view/{id}', 'backend\ResellerController@index');
    Route::post('admin/reseller/resel_info', 'backend\ResellerController@resel_info');
    Route::post('admin/reseller/actionupdate', 'backend\ResellerController@actionupdate');

    // Testimonials Route
    Route::get('admin/testimonials', 'backend\TestimonialsController@index');
    Route::get('admin/testimonials/add', 'backend\TestimonialsController@create');
    Route::post('admin/testimonials/store', 'backend\TestimonialsController@store');
    Route::get('admin/testimonials/edit/{id}', 'backend\TestimonialsController@edit');
    Route::get('admin/testimonials/show/{id}','backend\TestimonialsController@show');
    Route::post('admin/testimonials/update', 'backend\TestimonialsController@update');
    Route::post('admin/testimonials/actionupdate','backend\TestimonialsController@actionupdate');
    Route::post('admin/check_name', 'backend\TestimonialsController@check_name');
    Route::post('admin/testi_email_check', 'backend\TestimonialsController@testi_email_check');

    // Category Route
    Route::get('/admin/categories',array('as'=>'category','uses'=>'backend\Categories@index'));
    Route::get('/admin/categories/add', 'backend\Categories@create');
    Route::post('/admin/categories/store', 'backend\Categories@store');
    Route::get('/admin/categories/show/{id}', ['as'   => 'category.show','uses' => 'backend\Categories@show']);
    Route::get('/admin/categories/edit/{id}', ['as'   => 'category.edit','uses' => 'backend\Categories@edit']);
    Route::post('/admin/categories/update', 'backend\Categories@update');
    Route::get('/admin/categories/status/active/{id}', ['as'   => 'category.status.active','uses' => 'backend\Categories@category_status']);
    Route::get('/admin/categories/status/inactive/{id}', ['as'   => 'category.status.inactive','uses' => 'backend\Categories@category_status']);
    Route::get('/admin/categories/delete/{id}', ['as'   => 'category.delete','uses' => 'backend\Categories@categories_delete']);
    Route::post('admin/categories/categoryexist', 'backend\Categories@categoryexist');
    Route::get('admin/categories/treeview', 'backend\Categories@treeview');
    Route::post('admin/categories/delete_post_by_cat', 'backend\Categories@delete_post_by_cat');

    // Banner Route
    Route::get('admin/banner', 'backend\BannerController@index');
    Route::get('admin/banner/add', 'backend\BannerController@create');
    Route::post('admin/banner/store', 'backend\BannerController@store');
    Route::get('admin/banner/edit/{id}', 'backend\BannerController@edit');
    Route::post('admin/banner/update', 'backend\BannerController@update');
    Route::get('admin/banner/show/{id}','backend\BannerController@show');
    Route::post('admin/banner/actionupdate','backend\BannerController@actionupdate');
    Route::post('admin/banner/banner_attachment', 'backend\BannerController@banner_attachment');

    // Client Route
    Route::get('admin/client', 'backend\OurClientController@index');
    Route::get('admin/client/add', 'backend\OurClientController@create');
    Route::post('admin/client/store', 'backend\OurClientController@store');
    Route::get('admin/client/edit/{id}', 'backend\OurClientController@edit');
    Route::post('admin/client/update', 'backend\OurClientController@update');
    Route::get('admin/client/show/{id}','backend\OurClientController@show');
    Route::post('admin/client/actionupdate','backend\OurClientController@actionupdate');
    Route::post('admin/client/banner_attachment', 'backend\OurClientController@banner_attachment');

    // Product Route
    Route::get('admin/product', 'backend\ProductController@index');
    Route::get('admin/product/add', 'backend\ProductController@create');
    Route::post('admin/product/store', 'backend\ProductController@store');
    Route::get('admin/product/edit/{id}', 'backend\ProductController@edit');
    Route::get('admin/product/show/{id}','backend\ProductController@show');
    Route::post('admin/product/update', 'backend\ProductController@update');
    Route::post('admin/product/actionupdate','backend\ProductController@actionupdate');
    Route::post('admin/product', 'backend\ProductController@check_name');
    Route::get('admin/product/image_delete/{product_id}/{image_id}', 'backend\ProductController@image_delete');

    // Employee Route
    Route::get('admin/employee', 'backend\EmployeeController@index');
    Route::get('admin/employee/add', 'backend\EmployeeController@create');
    Route::post('admin/employee/store', 'backend\EmployeeController@store');
    Route::get('admin/employee/edit/{id}', 'backend\EmployeeController@edit');
    Route::post('admin/employee/update', 'backend\EmployeeController@update');
    Route::get('admin/employee/show/{id}','backend\EmployeeController@show');
    Route::post('admin/employee/actionupdate','backend\EmployeeController@actionupdate');
    Route::post('admin/emp_email_exist', 'backend\EmployeeController@emp_email_exist');

    // File Manager Route
    Route::get('admin/filemanager', 'backend\FileManager@index');
    Route::post('admin/filemanager', 'backend\FileManager@index');
    Route::post('admin/filemanager/store', 'backend\FileManager@store');
    Route::post('admin/filemanager/create_folder', 'backend\FileManager@create_folder');
    Route::post('admin/filemanager/create_file', 'backend\FileManager@create_file');
    Route::post('admin/filemanager/ajaxfm', 'backend\FileManager@ajaxfm');
    Route::post('admin/filemanager/rename', 'backend\FileManager@rename');
    Route::post('admin/filemanager/delete', 'backend\FileManager@delete');
    Route::post('admin/filemanager/parentinfo', 'backend\FileManager@parentinfo');
    Route::post('admin/filemanager/add_title', 'backend\FileManager@add_title');
    Route::post('admin/filemanager/get_title_fileid', 'backend\FileManager@get_title_fileid');
    Route::get('admin/filemanager/get_all_parents', 'backend\FileManager@get_all_parents');

    // File Permission Route
    Route::get('admin/filepermission', 'backend\FilePermission@index');
    Route::post('admin/filepermission/ajaxfm', 'backend\FilePermission@ajaxfm');
    Route::post('admin/filepermission/parentinfo', 'backend\FilePermission@parentinfo');
    //Route::post('admin/filepermission/unset', 'backend\FilePermission@unset_folder');

    //Blog Route
    Route::get('/admin/blog','backend\BlogController@index');
    Route::get('/admin/blog/add','backend\BlogController@add');
    Route::get('/admin/blog/check_blogname','backend\BlogController@check_blogname');
    Route::post('/admin/blog/store','backend\BlogController@store');
    Route::get('/admin/blog/edit/{id}','backend\BlogController@edit');
    Route::post('/admin/blog/update','backend\BlogController@update');
    Route::get('/admin/blog/show/{id}','backend\BlogController@show');
    Route::post('/admin/blog/actionupdate','backend\BlogController@actionupdate');
    Route::get('/admin/blog/image_delete/{str}/{sstr}','backend\BlogController@image_delete');

    //Gallery Route
    Route::get('/admin/gallery','backend\GalleryController@index');
    Route::get('/admin/gallery/add','backend\GalleryController@add');
    Route::get('/admin/gallery/check_galleryname','backend\GalleryController@check_galleryname');
    Route::post('/admin/gallery/store','backend\GalleryController@store');
    Route::get('/admin/gallery/edit/{id}','backend\GalleryController@edit');
    Route::post('/admin/gallery/update','backend\GalleryController@update');
    Route::get('/admin/gallery/show/{id}','backend\GalleryController@show');

    // Visitor Route
    Route::get('admin/visitor', 'backend\VisitorController@index');
    Route::get('admin/visitor/edit/{id}', 'backend\VisitorController@edit');
    Route::post('admin/visitor_email_exist', 'backend\VisitorController@visitor_email_exist');
    Route::post('admin/visitor/update', 'backend\VisitorController@update');
    Route::get('admin/visitor/show/{id}','backend\VisitorController@show');
    Route::post('admin/visitor/actionupdate', 'backend\VisitorController@actionupdate');
    Route::get('admin/demo_request', 'backend\DemRequest@index');
    Route::get('admin/demo_request/show/{id}','backend\DemRequest@show');
    Route::post('admin/demo_request/actionupdate', 'backend\DemRequest@actionupdate');
    Route::get('admin/demo_feedback', 'backend\DemFeedback@index');
    Route::get('admin/demo_feedback/show/{id}','backend\DemFeedback@show');
    Route::post('admin/demo_feedback/actionupdate', 'backend\DemFeedback@actionupdate');
    
    // Career Route
    Route::get('admin/career', 'backend\CareerController@index'); 
    Route::get('admin/career/show/{id}','backend\CareerController@show');
    Route::post('admin/career/actionupdate', 'backend\CareerController@actionupdate');

    // Customer Support Route
    Route::get('admin/customer_support', 'backend\CustomerSupportController@index'); 
    Route::get('admin/customer_support/show/{id}','backend\CustomerSupportController@show');
    Route::post('admin/customer_support/actionupdate', 'backend\CustomerSupportController@actionupdate');

    // Customer Survey Route
    Route::get('admin/customer_survey', 'backend\CustomerSurveyController@index'); 
    Route::get('admin/customer_survey/show/{id}','backend\CustomerSurveyController@show');
    Route::post('admin/customer_survey/actionupdate', 'backend\CustomerSurveyController@actionupdate');
});

Route::get('/{str}', 'HomeController@subpage');
Route::get('/{str}/{sstr}', 'HomeController@subpage');
Route::get('/{str}/{sstr}/{ssstr}', 'HomeController@subpage');