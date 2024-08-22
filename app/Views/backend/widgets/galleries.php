
    <div class="x_panel" id="widget<?php echo $customsection; ?>">
      <div class="x_title">
        <h2>Gallery</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: block;">
        <select id="gallery_id" name="gallery" class="form-control">
          <option value="0">Select Gallery</option>
        <?php foreach($records as $gallery) { ?>
          <option value="<?php echo $gallery->id; ?>" <?php echo ($selected_value == $gallery->id) ? 'selected' : ''; ?>><?php echo $gallery->title; ?></option>
        <?php } ?>
        </select>
        <div>Paste the below code where you want the Gallery to be displayed<br>[[GALLERY]]</div>
      </div>
    </div>
    
