<?php echo view('backend/login/login_header'); ?>
<body class="nav-md">
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="<?php  echo base_url('admin/login'); ?>" method="post" class="tm-login-form">
            <?php
            if (isset($admin_login)) { 
            ?>
            <div class="alert alert-info">
            <?php
              foreach ($admin_login->error->all as $e)
              {
                  echo $e . "<br />";
              }
            ?>
            </div>
            <?php
            }
            ?>
            <h1>Login Form</h1>
            <div>
              <span class="text-danger"><?= isset($validation) ? 
             $error = $validation->getError('email') : '' ?> <br></span>            
              <input type="email" class="form-control" placeholder="Username" name ="email" required="" value="<?= set_value('email'); ?>" />

            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required="" />
            </div>
            <div>
              <button type="submit" value="login" name="submit" class="btn btn-default submit">Log In</button>
            </div>

            <div class="clearfix"></div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
<script src="<?php echo base_url(); ?>/assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/admin/plugins/iCheck/icheck.min.js"></script>

</html>
