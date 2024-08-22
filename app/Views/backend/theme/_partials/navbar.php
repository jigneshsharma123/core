<?php echo view('backend/theme/_base/head'); ?>

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('backend/dashboard/index') ?>" class="site_title"> <span> Admin Panel!  </span></a>
            </div>

            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                    <?php $active_modules = array_keys(unserialize(ACTIVE_MODULES)); ?>
                    <?php if (in_array('blog',$active_modules)) { ?>
                      <li><a href="<?=base_url('/admin/blogs')?>">Blogs </a></li>
                      <?php } ?>
                      <li><a href="<?=base_url('admin/categories')?>">Categories</a></li>
                      <li><a href="<?=base_url('admin/pages')?>">Pages</a></li>
                      <li><a href="<?=base_url('admin/pages/add')?>">Add Page</a></li>
                    <?php if (in_array('profile',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/profile_management')?>">Profiles</a></li>
                      <?php } ?>
                    <?php if (in_array('video',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/video_management')?>">Videos</a></li>
                      <?php } ?>
                    <?php if (in_array('service',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/service_management')?>">Services</a></li>
                    <?php } ?>
                    <?php if (in_array('resource',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/resource_management')?>">Resources</a></li>
                    <?php } ?>
                    <?php if (in_array('partner',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/partner_management')?>">Partners</a></li>
                    <?php } ?>
                    <?php if (in_array('job',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/job_management')?>">Careers</a></li>
                    <?php } ?>
                    <?php if (in_array('banner',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/banner_management')?>">Banners</a></li>
                    <?php } ?>
                    <?php if (in_array('gallery',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/gallery_management')?>">Galleries</a></li>
                    <?php } ?>
                    <?php if (in_array('media_library',$active_modules)) { ?>
                      <li><a href="<?=base_url('admin/media_library')?>">Media Library</a></li>
                    <?php } ?>
                      <li><a><i class="fa fa-cogs"></i> CMS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?=base_url('admin/menus')?>"><i class="fa fa-list"></i> Menus</a></li>
                          <li><a href="<?=base_url('admin/cms/widgets')?>"><i class="fa fa-file"></i> Widgets</a></li>
                          <!-- <li><a href="<?=base_url('admin/cms/settings')?>"><i class="fa fa-file"></i> Settings</a></li> -->
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
              <a href="<?=base_url()?>/backend/dashboard/logout" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
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
                    <?php $current_user_details = current_user_details(); ?>
                    <img src="<?php echo base_url('/assets/admin/images/userlogo.png'); ?>" alt=""><?=$current_user_details['name']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url('/admin/dashboard/change_password')?>"> Change Password</a></li>
                    <li><a href="<?=base_url('backend/dashboard/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
