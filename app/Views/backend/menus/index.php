<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<style type="text/css">
.cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
* html .cf { zoom: 1; }
*:first-child+html .cf { zoom: 1; }
/**
* Nestable
*/
.dd .box-header {padding-left:35px;}
.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 90%; list-style: none; font-size: 13px; line-height: 20px; }
.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }
.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 10px; }
.dd-handle { display: block; height: 20px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
background: #fafafa;
background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
background:         linear-gradient(top, #fafafa 0%, #eee 100%);
-webkit-border-radius: 3px;
        border-radius: 3px;
box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }
.dd-item > button { display: block; position: absolute; cursor: pointer; float: left; width: 10px; height: 10px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; z-index: 999999999;}
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }
.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                  -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                     -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                          linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
background-size: 60px 60px;
background-position: 0 0, 30px 30px;
}
.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
-webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}
/**
* Nestable Extras
*/
.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }
#nestable-menu { padding: 0; margin: 20px 0; }
#nestable-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

@media only screen and (min-width: 700px) {
.dd { float: left; width: 90%; }
.dd + .dd { margin-left: 2%; }
}
.dd-hover > .dd-handle { background: #2ea8e5 !important; }
/**
* Nestable Draggable Handles
*/
.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
background: #fafafa;
background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
background:         linear-gradient(top, #fafafa 0%, #eee 100%);
-webkit-border-radius: 3px;
        border-radius: 3px;
box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }
.dd-dragel > .dd3-item > .dd3-content { margin: 0; }
.dd3-item > button { margin-left: 30px; }
.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 20px; text-indent: 100%; white-space: nowrap; overflow: hidden;
border: 1px solid #aaa;
background: #ddd;
background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
background:         linear-gradient(top, #ddd 0%, #bbb 100%);
border-top-right-radius: 0;
border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }
.menuheader {    height: 50px;    padding: 10px;}
</style>

<script>
$(document).ready(function()
{
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
});
</script>
 
<script>
var updateOutput = function(e)
{
    var list   = e.length ? e : $(e.target),
        output = list.data('output');
    if (window.JSON) {
        output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
    } else {
        output.val('JSON browser support required for this demo.');
    }
}; 

$(function(){  

  $(".updatemenu").click(function(){
    var mid = $(this).attr('mid')
    $("#actions"+mid).hide()
    $("#process"+mid).show()
    var linkurl = $("#menu_link"+mid).val()
    var linktext = $("#menu_name"+mid).val()
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>/admin/menus/updatemenuitem",
      data: { linktext: linktext, linkurl: linkurl, mid: mid }
    }).done(function( msg ) {
      $("#actions"+mid).show()
      $("#process"+mid).hide()
    });
    return false;
  });

  $("#input").blur(function(){
    var mid = $(this).attr('mid')
    $("#actions"+mid).hide()
    $("#process"+mid).show()
    var linkurl = $("#menu_link"+mid).val()
    var linktext = $("#menu_name"+mid).val()
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>/admin/menus/updatemenuitem",
      data: { linktext: linktext, linkurl: linkurl, mid: mid }
    }).done(function( msg ) {
      $("#actions"+mid).show()
      $("#process"+mid).hide()
    });
    return false;
  });
  
  $("#addlinktomenu").click(function(){   
    var mid = $("#mid").val()
    var linkurl = $("#linkurl").val()
    var linktext = $("#linktext").val()
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>/admin/menus/addmenuitem",
      data: { linktext: linktext, linkurl: linkurl, mid: mid, type: 'link' }
    }).done(function( msg ) {
        $("#dd-list").append(msg)
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        
        $(".collapse-link").on("click", function() {
            var e = $(this).closest(".x_panel"),
                t = $(this).find("i"),
                n = e.find(".x_content");
            e.attr("style") ? n.slideToggle(200, function() {
                e.removeAttr("style")
            }) : (n.slideToggle(200), e.css("height", "auto")), t.toggleClass("fa-chevron-up fa-chevron-down")
        }), $(".close-link").click(function() {
            var e = $(this).closest(".x_panel");
            e.remove()
        })
        return false;
        
      });
    return false;
  });
  
  $("#addpagetomenu").click(function(){   
    var mid = $("#mid").val()
    var pageid = $("#page_id").val()
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>/admin/menus/addmenuitem",
      data: { module_id: pageid, mid: mid, module: 'page', type: 'module' }
    }).done(function( msg ) {
        $("#dd-list").append(msg)
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        $(".collapse-link").on("click", function() {
            var e = $(this).closest(".x_panel"),
                t = $(this).find("i"),
                n = e.find(".x_content");
            e.attr("style") ? n.slideToggle(200, function() {
                e.removeAttr("style")
            }) : (n.slideToggle(200), e.css("height", "auto")), t.toggleClass("fa-chevron-up fa-chevron-down")
        }), $(".close-link").click(function() {
            var e = $(this).closest(".x_panel");
            e.remove()
        })
        return false;
      });
    return false;
  });
  
  $("#addservicetomenu").click(function(){
    var mid = $("#mid").val()
    var serviceid = $("#service_id").val()
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>/admin/menus/addmenuitem",
      data: { module_id: serviceid, mid: mid, module: 'service', type: 'module' }
    }).done(function( msg ) {
        $("#dd-list").append(msg)
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        $(".collapse-link").on("click", function() {
            var e = $(this).closest(".x_panel"),
                t = $(this).find("i"),
                n = e.find(".x_content");
            e.attr("style") ? n.slideToggle(200, function() {
                e.removeAttr("style")
            }) : (n.slideToggle(200), e.css("height", "auto")), t.toggleClass("fa-chevron-up fa-chevron-down")
        }), $(".close-link").click(function() {
            var e = $(this).closest(".x_panel");
            e.remove()
        })
        return false;
      });
    return false;
  });
  
  $(".remove").click(function(){   
    var mid = $(this).attr("mid")  
    var eid = $(this).attr("id")
    $.ajax({
      method: "GET",
      url: "<?php echo base_url();?>/admin/menus/delmenuitem",
      data: { mid: mid }
    }).done(function( msg ) {
        $("#"+eid).parent().parent().parent().parent().remove()
        updateOutput($('#nestable').data('output', $('#nestable-output')));
      });
  });

  $("#page_title").autocomplete({
    source: "<?php echo base_url();?>/admin/menus/get_page", // path to the get_author method
    minLength: 2,
    select: function( event, ui ) {
      $("#page_id").val(ui.item.id)
    }
  });

  $("#service_title").autocomplete({
    source: "<?php echo base_url();?>/admin/menus/get_service", // path to the get_author method
    minLength: 2,
    select: function( event, ui ) {
      $("#service_id").val(ui.item.id)
    }
  });
});
</script>
<div class="row-fluid">
  <div class="col-lg-12">
    <div class="x_panel">
      <form method="get" action="<?php echo base_url();?>/admin/menus/" role="form" name="Formsmenu">
      
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Select a menu to edit:</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <select name="mid" id="mid" class="form-control">
            <?php if (!isset($current_menu)) { ?>
              <option value="">Select</option>
            <?php  } ?>
            <?php  if (isset($menus_list) and count($menus_list) > 0) { ?>
            <?php foreach($menus_list as $menu) { ?>
              <option value="<?=$menu->id?>" <?=(isset($current_menu) and $current_menu['id'] == $menu->id) ? "selected" : ""?>><?=$menu->menu_name?></option>
            <?php } ?>
            <?php } ?>
            <option value="0">Add New Menu</option>
        </select>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <button type="submit" class="btn btn-success pull-right">Select</button> 
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row-fluid">
    <div class="col-lg-4">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pages</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: block;">
            <br>
            <form class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Search</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="text" <?=$active?> class="form-control" id="page_title" name="page_title" >
                  <input type="hidden" <?=$active?> class="form-control" id="page_id" name="page_id" >
                </div>
              </div>
              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                  <button type="submit" id="addpagetomenu" <?=$active?> class="btn btn-success pull-right">Add to Menu</button>
                </div>
              </div>
            </form>
          </div>
          <div class="clear"></div>
          <br>
        </div>
        
       
        <div class="x_panel">
          <div class="x_title">
            <h2>Services</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: block;">
            <br>
            <form class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Search</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="text" <?=$active?> class="form-control" id="service_title" name="service_title" >
                  <input type="hidden" <?=$active?> class="form-control" id="service_id" name="service_id" >
                </div>
              </div>
              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                  <button type="submit" id="addservicetomenu" <?=$active?> class="btn btn-success pull-right">Add to Menu</button>
                </div>
              </div>
            </form>
          </div>
          <div class="clear"></div>
          <br>
        </div>
        
       

        <div class="x_panel">
          <div class="x_title">
            <h2>Links</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: block;">
            <br>
            <form class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">URL</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="text" class="form-control" <?=$active?> id="linkurl" name="menu_link" value="http://">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Link Text</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="text" class="form-control" <?=$active?> id="linktext" placeholder="Menu Item" name="menu_name" >
                </div>
              </div>
              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                  <button type="submit" id="addlinktomenu" <?=$active?> class="btn btn-success pull-right">Add to Menu</button>
                </div>
              </div>

            </form>
          </div>
        </div>
    </div>
    <!--/span-->

    <div class="col-lg-8">
        <div class="x_panel">
            <div class="box-header x_panel menuheader" data-original-title="">
              <form method="post" action="<?php echo base_url();?>/admin/menus/<?=(isset($current_menu)) ? 'update' : 'create'?>" role="form" name="Formsmenu">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Menu Name</label>
                  <?php if (isset($current_menu)) { ?>
                    <input type="hidden" name="id" value="<?=$current_menu['id']?>" >
                  <?php } ?>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <input type="text" id="menu_name" placeholder="Enter menu name here" name="menu_name" value="<?=(isset($current_menu)) ? $current_menu['menu_name'] : ''?>" class="form-control">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <select name="menu_position" class="form-control">
                        <option value="">Menu Position</option>
                      <?php foreach($positions as $menu_position=>$menu_name){ ?>
                        <option value="<?=$menu_position?>" <?=(isset($current_menu) and $current_menu['position']==$menu_position) ? "selected" : ""?>><?=ucwords($menu_name)?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <button type="submit" class="btn btn-default pull-right"><i class="fa fa-save"></i></button>
                    <?php if (isset($current_menu)) {?>
                    <a href="<?php echo base_url();?>/admin/menus/delete/<?=$current_menu['id']?>"><span class="btn btn-default pull-right"><i class="fa fa-remove"></i></span></a>
                    <?php } ?>
                  </div>
                <div class="clearfix"></div>
                </div>
                <textarea id="nestable-output" style="display:none;" name="menu_items"></textarea>
              </form>
            </div>
            <div id="menucontent" class="box-content">
                <h1>Menu Structure</h1>

                <p>Add menu items from the column on the left.</p>
                <p class="text-danger">Save after changing the order of the menus.</p>
                <?php 
                if (isset($menu_items)) { ?>
                <div class="dd" id="nestable">
                  <ol class="dd-list" id="dd-list">
                  <?php echo view($menu_item_panel) ?>
                  </ol>
                </div>
                <div class="clear"></div>
                
                <?php } ?>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->

<div class="clearfix"></div>
<?= $this->endSection() ?>
