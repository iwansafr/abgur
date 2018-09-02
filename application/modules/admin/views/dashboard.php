<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('meta') ?>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('left_menu') ?>
        </div>
        <div class="top_nav">
          <div class="nav_menu" style="background: #519836;">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url() ?>images/user.png" alt=""><?php echo $this->session->userdata(base_url().'_logged_in')['name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('admin/user/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <?php $this->load->view($esg->content) ?>
            </div>
          </div>
        </div>
        <footer>
          <div class="pull-right">
            Copyright © 2018 | SMK ASSA'IDIYAH KUDUS All Right Reserved | Powered by  <a href="<?php echo $esg->meta['developer_link'] ?>"><?php echo $esg->meta['developer'] ?></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
	<?php $this->load->view('footer') ?>
</body>
<img src="<?php echo base_url('assets/build/images/loading.gif') ?>" id="loading" style="display: none;">
</html>