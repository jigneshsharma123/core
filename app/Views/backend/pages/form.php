<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>

<script>
$( document ).ready(function() {
  $(".removegalleryitem").click(function(){
    element_id = $(this).attr("id");
    
    pdf=$(this).attr("pdf");
    $.ajax({
      url: '<?echo base_url()?>admin/pages/delete_pdf',
      type: 'get',
      data: {
        pdf: pdf,
        id: element_id
      },
      success: function(response) {
        $("#pdf"+pdf).hide()
      },
      error: function(response) {
        window.console.log(response);
      }
    });
  })
});
</script>

<form name="Formpage" action="<?php echo base_url();?>/admin/pages/<?=(isset($form_action)) ? $form_action : ''?>" method="post" accept-charset="utf-8" enctype="multipart/form-data"  >
  
  <?php 
            $section_count = 0;
  if (isset($page) and isset($page['id']))
  {
  ?>
  <input type="hidden" name="id" id="pageid" value="<?php echo $page['id']; ?>" />
  <?php 
  }
  ?>
  <div class="col-lg-9">
    <div>
      <div class="form-group">
        <input type="title" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?=(isset($page)) ? set_value("title", $page['title']) : set_value("title")?>">
      </div>
      <?php if (isset($page)) { ?>
      <div class="form-group">
        <div id="showslug">
        Permalink: <?=base_url()?>/<span id="curslug"><?php echo $page['slug']?></span>/ <a href="javascript:void(0)" id="editslug">edit</a>
        </div>
        <div id="openslug" style="display:none;">
          <div style="float:left;">Permalink: <?=base_url()?>/</div><input type="title" id="slug" placeholder="Enter Title" name="slug" value="<?=(isset($page)) ? $page['slug'] : ''?>" style="border: 1px solid #999;border-radius: 0;float: left;height: 20px;"><div>/ <button id="updateslug" style="border: 1px solid #999;border-radius: 0;height: 20px;">OK</button> <a href="#" id="cancelslug">cancel</a></div>
        </div>  
      </div>
      <?php  } ?>
      <div class="form-group">
        <label for="description">Content</label>    
        <textarea name="page_content" id="editor1" rows="15" cols="80" >
        <?=(isset($page)) ? set_value("page_content", $page['page_content']) : set_value("page_content"); ?>    
         </textarea>
         <script>       
            //CKEDITOR.replace( 'editor1' );
             CKEDITOR.replace('editor1', {
                toolbar: <?php echo json_encode($toolbar); ?>,
                height: '<?php echo $height; ?>',
                width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',extraAllowedContent: '<?php echo $extraAllowedContent; ?>',startupOutlineBlocks: '<?php echo $startupOutlineBlocks; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
            });
         </script>  
        <span class="err" id="err_desc"></span><br>   
      </div>
      
      <div class="form-group">
        <label for="volume">Meta-Title</label><span class="err" id="err_volume"></span><?php //echo form_error('meta_title'); ?>
        <input type="text"  class="form-control"  placeholder="Enter Meta-Title" name="meta_title" value="<?=(isset($page)) ? $page['meta_title'] : ''?>">
      </div>
      
      <div class="form-group">
        <label for="volume">Meta-Keyword</label><span class="err" id="err_volume"></span><?php //echo form_error('meta_keyword'); ?>
        <input type="text"  class="form-control"  placeholder="Enter Keywords seprated By Comma(,)" name="meta_keyword" value="<?=(isset($page)) ? $page['meta_keyword'] : ''?>">
      </div>
      
      <div class="form-group">
        <label for="title">Meta-Description</label><span class="err" id="err_brief"></span><?php //echo form_error('meta_description'); ?><br>
        <textarea class="form-control" id="brief" placeholder="Enter Meta-Description" name="meta_description"><?=(isset($page)) ? $page['meta_description'] : ''?></textarea>  
      </div>
      
      <div class="form-group">
        <label for="title">Banner-Class</label><span class="err" id="err_banner_class"></span><?php //echo form_error('banner_class'); ?><br>
        <input type="text"  class="form-control"  placeholder="Enter Banner Class" name="banner_class" value="<?=(isset($page)) ? $page['banner_class'] : ''?>">
      </div>
    </div>
  
    <div>
      <?php if (isset($page) and isset($templates[$page['template']]) and $templates[$page['template']]['is_sectional'] == "yes") { ?>
      <label for="description">Sections</label>
      
      <div>
        <div >
          <div class="box1">
            <div class="form-group sections">
              <?php 
              if (isset($sections_exists) and $sections_exists > 0)
              {
                foreach($page_rel_sections as $page_section)
                {
                  $section_count = $section_count + 1;
                  $records['page_section'] = $page_section;
                  $records['section'] = $section_count;
                  echo view('backend/pages/section', $records);
                }
              }
              
              if ($section_count == 0)
              {
              $section_count = $section_count + 1;
              $records['page_section'] = array();
              $records['section'] = $section_count;
              echo view('backend/pages/section', $records);
              } 
              
              ?>
            </div>
            
            <div class="form-group">
              <div class="col-md-9 col-md-offset-3">
                <button type="submit" id="addsection" class="btn btn-success pull-right">Add Section</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>    
  </div>
  <div class="col-lg-3">
    <div class="x_panel">
      <div class="x_title">
        <h2>Publish</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: block;">
        <div class="form-group">
          <input type="checkbox" name="status" id="status" value="1" <?php echo (isset($page) && $page['status'] == 1) ? 'checked' : ''; ?> /> Publish
        </div>
        <div class="form-group" style="display:none">
          <input type="checkbox" name="only_for_page_section" id="only_for_page_section" value="1" <?php echo (isset($page) && $page['only_for_page_section'] == 1) ? 'checked' : ''; ?> /> Page Only for the Section on Other Page.
        </div>
        <div class="form-group">
          <?php if(isset($page) and $page['only_for_page_section'] == 0) { ?>
          <a href="<?php echo base_url() ?>/<?=$page['slug']?>" target="_blank" class="btn pull-left btn-default" title="">Preview</a>
          <?php } ?>
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
      </div>
    </div>
    
    <?php if (count($templates) > 1) { ?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Template</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: block;">
        <select id="template" name="template" class="form-control">
          <option value="0">Select Template</option>
        <?php foreach($templates as $template=>$template_detail) { ?>
          <option value="<?php echo $template; ?>" <?php echo (isset($page) and ($page['template'] == $template)) ? 'selected' : ''; ?>><?php echo $template_detail['name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <?php } else { ?>
      <?php foreach($templates as $template=>$template_detail) { ?>
      <input type="hidden" name="template" id="template" value="<?php echo $template; ?>" />
      <?php } ?>
    <?php } ?>
    
    <div class="x_panel">
      <div class="x_title">
        <h2>Featured Image</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: block;">
        <?php $allowed_types = array("image");?>
        <?php
        helper("application_helper");
        if (isset($page) && isset($page['media_element_id']))
          echo media_library_button($allowed_types, 'image', $page['media_element_id'], $page['image_alt_tag'], 'page', 'image');
        else
          echo media_library_button($allowed_types, '', 0, '', 'page', 'image');
        ?>
      </div>
    </div>
  
    <?php if (isset($sections) && count($sections) > 0) { ?>
      <?php foreach($sections as $module=>$widget) { ?>
        <?php if (in_array($module,$active_page_sections)) { ?>
            <?php 
            $data_widget['records'] = $widget['data'];
            ?>
            <?php echo view('backend/sections/'.$widget['file'],$data_widget) ?>
        <?php } ?>
      <?php } ?>
    <?php } ?>
  
  </div>

  
</form>
  


<script>
$(function(){  
  $(".read_more_link_type").change(function(){
    console.log($(this).attr("name"))
    let sibling_name = $(this).attr("name").replace("_type","")
    console.log(sibling_name)
    var select = $(this);
    var neededInput = select.siblings('input[name="'+sibling_name+'"]');
    if ($(this).val() == "self" || $(this).val() == "none")
    {
      neededInput.hide()
    }
    else
    {
      if (neededInput.val() == "")
      {
        if ($(this).val() == "internal")
        {
          neededInput.attr("placeholder","without website url")
        }
        else
        {
          neededInput.attr("placeholder","with http://")
        }
      }
      neededInput.show()
    }
  });
   
  var total_sections = <?php echo $section_count; ?>;
  $("#editslug").click(function(){
      $("#showslug").hide()
      $("#openslug").show()
  });
  $("#cancelslug").click(function(){
      $("#showslug").show()
      $("#openslug").hide()
      $("#slug").val($("#curslug").text())
  })
  
  $("#updateslug").click(function(){  
  var slug =  $("#slug").val(); 
  var id=$("#pageid").val(); 
    $.ajax({
      method: "POST", 
      url: "<?php echo base_url(); ?>/admin/pages/updateslug",
      data: { slug: slug, id: id }
    }).done(function( msg ) {
        $("#showslug").show()
        $("#openslug").hide()
        $("#curslug").text(msg)
        return false;
      });
    return false;
  })
  
  $("#addsection").click(function(){
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>/admin/pages/section",
      data: { section: total_sections + 1 }
    }).done(function( msg ) {
        $(".sections").append(msg)
        
        total_sections = total_sections + 1
        return false;
      });
    return false;
  });
  
  $(".sections").on('click','.removesection',function(){
  if (confirm('Click OK to confirm deletion.'))
      $(this).parent().parent().parent().remove()
  })
});
</script>


<?= $this->endSection() ?>
