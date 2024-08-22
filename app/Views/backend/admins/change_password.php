<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>  
    <form action="<?php echo base_url('admin/update_password');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="Formgalleries" >    
        <div class="form-group">
            <label class='col-sm-2 control-label' for="name">Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input id="name" name="name" class="form-control" type="text" placeholder="Name" value="<?=(isset($admin)) ?  set_value("name", $admin['name']) : set_value("name");?>" required>
              <?php if(isset($validation)) : ?>
                <span class="text-danger"><?= $error = $validation->getError('name'); ?>
              <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="email">Email <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input id="email" name="email" class="form-control" type="email" placeholder="Email" value="<?=(isset($admin)) ?  set_value("email", $admin['email']) : set_value("email");?>" required>
              <?php if(isset($validation)) : ?>
                <span class="text-danger"><?= $error = $validation->getError('email'); ?>
              <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="password">Password <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input id="password" name="password" class="form-control" type="password" placeholder="Password" required>
              <?php if(isset($current_password_error)) : ?>
                <span class="text-danger"><?= $error = $current_password_error; ?>
              <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-12 control-label' for="newpassword"><u>Provide New Password & Confirm Password, if you want to change the password</u></label>
        </div><br><br>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="newpassword">New Password</label>
            <div class="col-sm-10">
              <input id="newpassword" name="newpassword" class="form-control" type="password" placeholder="New Password">
              <?php if(isset($validation)) : ?>
                <span class="text-danger"><?= $error = $validation->getError('newpassword'); ?>
              <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="confirmpassword">Confirm Password</label>
            <div class="col-sm-10">
              <input id="confirmpassword" name="confirmpassword" class="form-control" type="password" placeholder="Confirm Password">
              <?php if(isset($validation)) : ?>
                <span class="text-danger"><?= $error = $validation->getError('confirmpassword'); ?>
              <?php endif; ?> <br>
            </div>
        </div>
        <?php
        if (isset($admin))
        {
        ?>
            <input type="hidden" name="id" value="<?php echo $admin['id']; ?>" />
        <?php
        }
        ?>
        <?php
        if (isset($admin_id))
        {
        ?>
            <input type="text" name="id" value="<?php echo $admin_id; ?>" />
        <?php
        }
        ?>
        <div class="form-group ">
            <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
<?= $this->endSection() ?>