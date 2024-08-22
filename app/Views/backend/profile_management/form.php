<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<form method="post" action="<?php echo base_url();?>/admin/profile_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formprofile" id="Formprofile" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label class='col-sm-2 control-label' for="category">Category <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" id='category_id' name="category_id">
                    <option value="">Select Category</option>
                    <?php foreach($categories as $category) { ?>
                    <option value="<?= $category['id'];?>" <?=(isset($profile['category_id']) and $category['id'] == $profile['category_id']) ? "selected" : ''; ?> ><?= $category['title']; ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger">
                <?php if(isset($validation)) : ?>
                <?= $error = $validation->getError('category_id'); ?>
                <?php endif; ?> <br>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="first_name">First Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input id="fname" name="fname" class="form-control" type="text" placeholder="First Name"  value="<?=(isset($profile)) ?  set_value("fname", $profile['first_name']) : set_value("fname");?>">
                <?php if(isset($validation)) : ?>
                    <?= $error = $validation->getError('fname'); ?>
                <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="middle_name">Middle Name </label>
            <div class="col-sm-10">
              <input id="lname" name="mname" class="form-control" type="text" placeholder="Middle Name"  value="<?=(isset($profile)) ?  set_value("mname", $profile['middle_name']) : set_value("mname");?>"> <br>
            </div>  
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="last_name">Last Name</label>
            <div class="col-sm-10">
                <input id="lname" name="lname" class="form-control" type="text" placeholder="Last Name"  value="<?=(isset($profile)) ?  set_value("lname", $profile['last_name']) : set_value("lname");?>"> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="email">Email Id</label>
            <div class="col-sm-10">
                <input type="email" id="email_id" name="email_id" class="form-control" type="text" placeholder="Email Id"  value="<?=(isset($profile)) ?  set_value("email_id", $profile['email_id']) : set_value("email_id");?>" > <br>
            </div>  
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="phone">Phone Number</label>
            <div class="col-sm-10">
                <input id="phone_number" name="phone_number" class="form-control" type="text" placeholder="Phone Number" value="<?=(isset($profile)) ?  set_value("phone_number", $profile['phone_number']) : set_value("phone_number");?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> <br>
            </div>  
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="alt_phone">Alternate Phone Number</label>
            <div class="col-sm-10">
                <input id="alt_phone_number" name="alt_phone_number" class="form-control" type="text" placeholder="Alternate Phone Number"  value="<?=(isset($profile)) ?  set_value("alt_phone_number", $profile['other_phone_number']) : set_value("alt_phone_number");?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> <br>
            </div>  
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="department">Department</label>
            <div class="col-sm-10">
                <input id="department" name="department" class="form-control" type="text" placeholder="Department " value="<?=(isset($profile)) ?  set_value("department", $profile['department']) : set_value("department");?>" > <br>
            </div>  
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="designation">Designation</label>
            <div class="col-sm-10">
                <input id="designation" name="designation" class="form-control" type="text" placeholder="Designation "  value="<?=(isset($profile)) ?  set_value("designation", $profile['designation']) : set_value("designation");?>" > <br>
            </div>  
        </div>
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="practice_area">Brief</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="brief"  placeholder="Enter Brief" name="brief"><?=(isset($profile)) ?  set_value("brief", $profile['brief']) : set_value("brief");?></textarea> <br>
            </div>
        </div>   
        <div class="form-group">
            <label class='col-sm-2 control-label' for="description">Profile Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="profile_description" rows='4' placeholder="Enter Profile Description" name="profile_description"> <?=(isset($profile)) ?  set_value("profile_description", $profile['profile_description']) : set_value("profile_description");?> </textarea>
                <script>     
                    CKEDITOR.replace('profile_description', {
                        toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
                        width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
                    });
                </script> <br>
            </div>
        </div> 
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="image">Profile Image (Colored)</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" >
                <?php if (isset($profile) && isset($profile['profile_photo'])) { ?>
                    <img src="<?= base_url('/uploads/profiles/'.$profile['profile_photo'])?>" width="200px" height="100px" alt="Profile Photo">
                <?php  } ?> <br>         
            </div>  
        </div> 
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="image">Profile Image (Black & White)</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="secondary_image" name="secondary_image" >
                <?php if (isset($profile) && isset($profile['secondary_image'])) { ?>
                    <img src="<?= base_url('/uploads/profiles/'.$profile['secondary_image'])?>" width="200px" height="100px" alt="Secondary Image">
                <?php  } ?> <br>         
            </div>  
        </div> 
        <div class="form-group">
            <label class='col-sm-2 control-label' for="sort_order">Sort  Order</label>
            <div class="col-sm-10">
                <input id="sort_order" name="sort_order" class="form-control" type="text" placeholder="Profile Sort Order"  value="<?=(isset($profile)) ?  set_value("sort_order", $profile['sort_order']) : set_value("sort_order");?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> <br>
            </div>  
        </div> 
        <div class="form-group">
            <label class='col-sm-2 control-label' for="is_active">Active</label>
            <div class="col-sm-10">
                <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($profile['is_active']) && $profile['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?php echo base_url() ?>/admin/profile_management">Cancel</a>
            <button class="btn btn-info pull-right" type="submit">Save</button>
        </div>
    </div>
</form>
<script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
<?= $this->endSection() ?>
