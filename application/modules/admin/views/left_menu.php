<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <!-- <a href="index.html" class="site_title"><i class="fa fa-folder-o"></i> <span><?php echo $esg->meta['title'] ?></span></a> -->
    <a href="" class="site_title"><img src="<?php echo base_url() ?>images/smk_user.jpeg" alt="..." style="width: 25px;"> SMK ASSA'IDIYAH</a>
  </div>
  <div class="clearfix"></div>
  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="<?php echo base_url() ?>images/user.png" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2><?php echo $this->session->userdata(base_url().'_logged_in')['username']; ?></h2>
    </div>
  </div>
  <br />
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <?php
        foreach ($esg->left_menu as $key => $value)
        {
          $data = $value['list'];
          ?>
          <li>
            <a><i class="fa <?php echo $value['icon'] ?>"></i> <?php echo $key ?> <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <?php
              foreach ($data as $dkey => $dvalue)
              {
                echo '<li><a href="'.$dvalue['link'].'">'.$dvalue['title'].'</a></li>';
              }
              ?>
            </ul>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('admin/user/logout') ?>">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
</div>