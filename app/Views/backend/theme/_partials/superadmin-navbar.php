
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url() ?>admin" class="site_title"> <span><?php echo $site_name; ?>!</span></a>
            </div>

            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?=base_url()?>admin/pages"><i class="fa fa-file"></i> Pages</a></li>
                  <li><a href="<?=base_url()?>admin/pages/sections"><i class="fa fa-file"></i> Page Sections</a></li>
                  <li><a href="<?=base_url()?>admin/media_library"><i class="fa fa-folder"></i> Media Library</a></li>
                  <li><a href="<?=base_url()?>admin/partners"><i class="fa fa-users"></i> Partners</a></li>
                  <li><a href="<?=base_url()?>admin/custom_forms"><i class="fa fa-edit"></i> Custom Forms</a></li>
                  <li><a href="<?=base_url()?>admin/custom_links"><i class="fa fa-edit"></i> Custom Links</a></li>
                  <li><a href="<?=base_url()?>admin/resource_materials"><i class="fa fa-edit"></i> Resources</a></li>
                  <li><a href="<?=base_url()?>admin/campaigns"><i class="fa fa-edit"></i> Campaigns</a></li>
                  <li><a href="<?=base_url()?>admin/leads"><i class="fa fa-edit"></i> Leads</a></li>
                  <li><a href="<?=base_url()?>admin/socials"><i class="fa fa-share-alt"></i> Socials</a></li>
                  <li>
                    <a><i class="fa fa-briefcase"></i>  Careers <span class="fa fa-chevron-down"></span> </a>
                    <ul class="nav child_menu" >
                      <li><a href="<?=base_url()?>admin/jobs">Job Listings</a></li>
                      <li><a href="<?=base_url()?>admin/resumes">Resumes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i> CMS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url()?>admin/menus"><i class="fa fa-list"></i> Menus</a></li>
                      <li><a href="<?=base_url()?>admin/cms/widgets"><i class="fa fa-file"></i> Widgets</a></li>
                      <li><a href="<?=base_url()?>admin/cms/settings"><i class="fa fa-file"></i> Settings</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-clone"></i> Blogs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url()?>admin/blogs"><i class="fa fa-list"></i> Blogs </a></li>
                      <li><a href="<?=base_url()?>admin/categories"><i class="fa fa-file"></i> Categories</a></li>
                     
                    </ul>
                  </li>
                  
                </ul>
              </div>
            </div>
            
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
              <a href="<?=base_url('/admin/dashboard/change_password')?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Password">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a href="<?=base_url('/admin/dashboard/logout')?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url('/admin/dashboard/change_password')?>"> Change Password</a></li>
                    <li><a href="<?=base_url('/admin/dashboard/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
