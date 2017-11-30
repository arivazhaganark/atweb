<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar"> 
    <div class="image" style="text-align:center; padding:5px;">

    </div>
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu" id="sildermenu_id">
           <li class="header">MAIN NAVIGATION</li>
                    <li @if(Request::segment('2')=='home') class="active" @endif>
                        <a href="{{ url('admin/home') }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='setting') class="active" @endif>
                        <a href="{{ url('admin/setting') }}">
                            <i class="fa fa-cog"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li class="treeview @if(Request::segment('2')=='user' || Request::segment('2')=='customer_support' || Request::segment('2')=='customer_survey') active @endif">
                       <a href="javascript:">
                            <i class="fa fa-user"></i>
                            <span>Customers</span>
                        </a>
                        <ul class="treeview-menu menu-open" @if(Request::segment('2')=='user' || Request::segment('2')=='customer_support' || Request::segment('2')=='customer_survey') style="display: block;" @endif>
                            <li><a href="{{ url('admin/user') }}"><i class="fa fa-circle-o"></i> All Customer</a></li>
                            <li><a href="{{ url('admin/customer_support') }}"><i class="fa fa-circle-o"></i> Customer Support</a></li>
                            <li><a href="{{ url('admin/customer_survey') }}"><i class="fa fa-circle-o"></i> Customer Survey</a></li>
                        </ul>
                    </li>
                    <li @if(Request::segment('2')=='partner' || Request::segment('2')=='deal' || Request::segment('2')=='reseller') class="active" @endif>
                        <a href="{{ url('admin/partner') }}">
                            <i class="fa fa-user"></i>
                            <span>Partners</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='employee') class="active" @endif>
                        <a href="{{ url('admin/employee') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>Employee</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='visitor') class="active" @endif>
                        <a href="{{ url('admin/visitor') }}">
                            <i class="fa fa-user"></i>
                            <span>Visitor</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='demo_request') class="active" @endif>
                       <a href="{{ url('admin/demo_request') }}">
                            <i class="fa fa-paper-plane"></i>
                            <span> Demo Request Form</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='demo_feedback') class="active" @endif>
                       <a href="{{ url('admin/demo_feedback') }}">
                            <i class="fa fa-comments-o"></i>
                            <span> Demo Feedback Form</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='categories') class="active" @endif>
                       <a href="{{ url('admin/categories') }}">
                            <i class="fa fa-tags"></i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='cms') class="active" @endif>
                       <a href="{{ url('admin/cms') }}">
                            <i class="fa fa-book"></i>
                            <span>CMS</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='testimonials') class="active" @endif>
                       <a href="{{ url('admin/testimonials') }}">
                            <i class="fa fa-list"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='blog') class="active" @endif>
                       <a href="{{ url('admin/blog') }}">
                            <i class="fa fa-rss"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <!--<li @if(Request::segment('2')=='gallery') class="active" @endif>
                       <a href="{{ url('admin/gallery') }}">
                            <i class="fa fa-list"></i>
                            <span>Gallery</span>
                        </a>
                    </li>-->
                    <li @if(Request::segment('2')=='client') class="active" @endif>
                       <a href="{{ url('admin/client') }}">
                            <i class="fa fa-user-secret"></i>
                            <span>Our Clients</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='product') class="active" @endif>
                       <a href="{{ url('admin/product') }}">
                            <i class="fa fa-exchange"></i>
                            <span>Product</span>
                        </a>
                    </li>
                    <li class="treeview @if(Request::segment('2')=='filemanager' || Request::segment('2')=='filepermission') active @endif">
                       <a href="javascript:">
                            <i class="fa fa-file-text-o"></i>
                            <span>File Management</span>
                        </a>
                        <ul class="treeview-menu menu-open" @if(Request::segment('2')=='filemanager' || Request::segment('2')=='filepermission') style="display: block;" @endif>
                            <li><a href="{{ url('admin/filemanager') }}"><i class="fa fa-circle-o"></i> File Manager</a></li>
                            <li><a href="{{ url('admin/filepermission') }}"><i class="fa fa-circle-o"></i> File Permission</a></li>
                        </ul>
                    </li>
                   
                    <li @if(Request::segment('2')=='banner') class="active" @endif>
                       <a href="{{ url('admin/banner') }}">
                            <i class="fa fa-picture-o"></i>
                            <span>Banners</span>
                        </a>
                    </li>
                    <li @if(Request::segment('2')=='career') class="active" @endif>
                       <a href="{{ url('admin/career') }}">
                            <i class="fa fa-at"></i>
                            <span>Careers</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="javascript:">
                            <i class="fa fa-envelope"></i>
                            <span>Email Template</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:">
                            <i class="fa fa-bars"></i>
                            <span>Report</span>
                        </a>
                    </li> --}}
                    <li @if(Request::segment('2')=='change_password') class="active" @endif>
                        <a href="{{ url('admin/change_password') }}">
                            <i class="fa fa-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/logout') }}">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
        </ul>
        <div style="height:70px;">&nbsp;</div>
    </section>
    <!-- /.sidebar -->
</aside>