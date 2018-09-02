<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>esoftgreat | </title>
    <?php $image = base_url().'images/icon.png'; ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $image; ?>">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/'; ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url().'assets/'; ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url().'assets/'; ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url().'assets/'; ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url().'assets/'; ?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <div class="login_alert">
              <?php alert('success','login successfull',1); ?>
            </div>
            <form id="login">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                <input type="hidden" name="redirect_to" value="<?php echo $redirect_to ?>">
              </div>
              <div>
                <a class="btn btn-default submit" href="#" id="btn_login">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                	<img src="<?php echo base_url().'images/smk_user.jpeg' ?>"><hr>
                  <!-- <h1><i class="fa fa-folder-o"></i> esoftgreat</h1> -->
                  <p>Copyright © 2018 | SMK ASSA'IDIYAH KUDUS All Right Reserved | Powered by  <a href="https://esoftgreat.com">esoftgreat</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <a class="btn btn-default submit" href="#">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                	<img src="<?php echo base_url().'images/smk_user.jpeg' ?>"><hr>
                  <!-- <h1><i class="fa fa-folder-o"></i> esoftgreat</h1> -->
                  <p>Copyright © 2018 | SMK ASSA'IDIYAH KUDUS All Right Reserved | Powered by  <a href="https://esoftgreat.com">esoftgreat</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      var _URL = "<?php echo base_url() ?>";
    </script>
    <script src="<?php echo base_url('assets') ?>/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo mod_js('admin/login') ?>"></script>
  </body>
</html>
