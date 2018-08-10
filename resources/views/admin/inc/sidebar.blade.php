 
 
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
              @if(empty($admin['avatar']) ||  $admin['avatar'] !== 'default.png')
                <img src="{{ asset('/uploads/') }}/avatar/{{Auth::guard('admin')->user()->avatar}}" style ="width: 45px; height: 45px" class="img-circle" alt="User Image">
              @else
                <img src="{{ asset('/uploads') }}/avatar/default.png" class="user-image img-circle" alt="User Image">
                <span class="hidden-xs">{{ $admin->name }}</span>
              @endif
          
        </div>
        <div class="pull-left info">
          <p>{{ auth()->guard('admin')->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
         
   
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-server"></i> <span>Setting</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu">
              <li><a href="/admin/settings"><i class="fa fa-circle-o"></i>Setting</a></li>    
            </ul>
          </li> 



        @if($registration_setting == 'active')
          <li class="treeview ">
              <a href="#">
                <i class="fa fa-user"></i> <span>User</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a> 
              <ul class="treeview-menu">
                <li><a href="/admin/user"><i class="fa fa-circle-o"></i>User</a></li>     
              </ul>
            </li>
        @endif

 
        @if($contact_setting == 'active')
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-phone"></i> <span>Contact</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="/admin/contact/edit"><i class="fa fa-circle-o"></i>Contact</a></li>   
            </ul>
          </li> 
        @endif


 
        @if($page_setting == 'active')
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-sticky-note-o"></i> <span>Page</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="/admin/page"><i class="fa fa-circle-o"></i>Page</a></li>   
            </ul>
          </li> 
        @endif 



        @if($social_setting == 'active')
          <li class="treeview ">
              <a href="#">
                <i class="fa fa-users"></i> <span>Social</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a> 
              <ul class="treeview-menu">
                <li><a href="/admin/social"><i class="fa fa-circle-o"></i>Social</a></li>     
              </ul>
            </li>
        @endif

 
        @if($product_setting == 'active')
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-phone"></i> <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="/admin/product"><i class="fa fa-circle-o"></i>Product</a></li>   
            </ul>
          </li> 
        @endif

 
        @if($category_setting == 'active')
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-phone"></i> <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="/admin/category"><i class="fa fa-circle-o"></i>Category</a></li>   
            </ul>
          </li> 
        @endif

 
        @if($subcategory_setting == 'active')
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-phone"></i> <span>subcategory</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="/admin/subcategory"><i class="fa fa-circle-o"></i>subcategory</a></li>   
            </ul>
          </li> 
        @endif

 
        @if($brand_setting == 'active')
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-phone"></i> <span>brand</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="/admin/brand"><i class="fa fa-circle-o"></i>brand</a></li>   
            </ul>
          </li> 
        @endif


  


 
    </section>
    <!-- /.sidebar -->
  </aside> 