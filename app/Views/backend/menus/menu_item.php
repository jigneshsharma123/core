<?php foreach($menu_items as $menu_item) { ?>
  <li class="dd-item dd3-item" data-id="<?=$menu_item->id?>">    
    <div class="x_panel">
      <div class="dd-handle dd3-handle"></div>
      <div class="x_title">
        <h2><?=$menu_item->label?></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><?=($menu_item->type == "link") ? "custom" : $menu_item->module?><i class="fa fa-chevron-down"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: none;">
        <form class="form-horizontal form-label-left">
        <?php if ($menu_item->type == "link") { ?>
        <div class="form-group">
          <label for="title">URL</label><span class="err" id="err_link"></span><?php //echo form_error('link'); ?>
          <input type="text" class="form-control" id="menu_link<?=$menu_item->id?>" name="menu_link" value="<?=$menu_item->url?>" mid="<?=$menu_item->id?>">
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="title">Link Text</label><span class="err" id="err_menu_name"></span><?php // echo form_error('menu_name'); ?>
          <input type="text" class="form-control" id="menu_name<?=$menu_item->id?>" placeholder="Menu Item" name="menu_name" value="<?=$menu_item->label?>" mid="<?=$menu_item->id?>">
        </div>
        <div class="form-group" id="actions<?=$menu_item->id?>">
          <a href="javascript:void(0);" id="mid<?=$menu_item->id?>" mid="<?=$menu_item->id?>" class="remove">remove</a> | 
          <a href="javascript:void(0);" class="updatemenu" mid="<?=$menu_item->id?>">save</a>
        </div>
        <div class="form-group" style="display:none;" id="process<?=$menu_item->id?>">
          saving ...
        </div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
    
    <!-- second level menu starts -->
    <?php $menu_items = new App\Models\Menu_item();
    $second_level_items = $menu_items->get_menu_items($menu_item->menu_id,$menu_item->id);
    if (isset($second_level_items) and count($second_level_items) > 0) { ?>
    <ol class="dd-list">
    <?php foreach($second_level_items as $sub_menu_item) { ?>
      <li class="dd-item dd3-item" data-id="<?=$sub_menu_item->id?>">   
        <div class="x_panel">
          <div class="dd-handle dd3-handle"></div>
          <div class="x_title">
            <h2><?=$sub_menu_item->label?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><?=($sub_menu_item->type == "link") ? "custom" : $sub_menu_item->module?><i class="fa fa-chevron-down"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: none;">
            <form class="form-horizontal form-label-left">
            <?php if ($sub_menu_item->type == "link") { ?>
            <div class="form-group">
              <label for="title">URL</label><span class="err" id="err_link"></span><?php //echo form_error('link'); ?>
              <input type="text" class="form-control" id="menu_link<?=$sub_menu_item->id?>" name="menu_link" value="<?=$sub_menu_item->url?>" >
            </div>
            <?php } ?>
            <div class="form-group">
              <label for="title">Link Text</label><span class="err" id="err_menu_name"></span><?php //echo form_error('menu_name'); ?>
              <input type="text" class="form-control" id="menu_name<?=$sub_menu_item->id?>" placeholder="Menu Item" name="menu_name" value="<?=$sub_menu_item->label?>">
            </div>
            <div class="form-group" id="actions<?=$sub_menu_item->id?>">
              <a href="javascript:void(0);" id="mid<?=$sub_menu_item->id?>" mid="<?=$sub_menu_item->id?>" class="remove">remove</a> | 
              <a href="javascript:void(0);" class="updatemenu" mid="<?=$sub_menu_item->id?>">save</a>
            </div>
            <div class="form-group" style="display:none;" id="process<?=$sub_menu_item->id?>">
              saving ...
            </div>
            </form>
          </div>
          <div class="clear"></div>
        </div>
        <!-- third level menu starts -->
        <?php $menu_items = new App\Models\Menu_item();
        $third_level_items = $menu_items->get_menu_items($sub_menu_item->menu_id,$sub_menu_item->id);
        if (isset($third_level_items) and count($third_level_items) > 0) { ?>
        <ol class="dd-list">
        <?php foreach($third_level_items as $sub_menu_item1) { ?>
          <li class="dd-item dd3-item" data-id="<?=$sub_menu_item1->id?>">
            <div class="x_panel">
              <div class="dd-handle dd3-handle"></div>
              <div class="x_title">
                <h2><?=$sub_menu_item1->label?></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><?=($sub_menu_item1->type == "link") ? "custom" : $sub_menu_item1->module?><i class="fa fa-chevron-down"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content" style="display: none;">
                <form class="form-horizontal form-label-left">
                <?php if ($sub_menu_item1->type == "link") { ?>
                <div class="form-group">
                  <label for="title">URL</label>
                  <input type="text" class="form-control" id="menu_link<?=$sub_menu_item1->id?>" name="menu_link" value="<?=$sub_menu_item1->url?>">
                </div>
                <?php } ?>
                <div class="form-group">
                  <label for="title">Link Text</label>
                  <input type="text" class="form-control" id="menu_name<?=$sub_menu_item1->id?>" placeholder="Menu Item" name="menu_name" value="<?=$sub_menu_item1->label?>">
                </div>
                <div class="form-group" id="actions<?=$sub_menu_item1->id?>">
                  <a href="javascript:void(0);" id="mid<?=$sub_menu_item1->id?>" mid="<?=$sub_menu_item1->id?>" class="remove">remove</a> | 
                  <a href="javascript:void(0);" class="updatemenu" mid="<?=$sub_menu_item1->id?>">save</a>
                </div>
                <div class="form-group" style="display:none;" id="process<?=$sub_menu_item1->id?>">
                  saving ...
                </div>
                </form>
              </div>
              <div class="clear"></div>
            </div>
          </li>
        <?php } ?>
        </ol>
        <?php } ?>
        <!-- third level menu ends -->       
        
      </li>
    <?php } ?>
    </ol>
    <?php } ?>
    <!-- second level menu ends -->
    
  </li>
<?php } ?>
