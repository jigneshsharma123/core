
<?php echo form_open_multipart('admin/media_library/do_upload');?>

<div class="col-md-55"><input name="userfile[]" id="userfile" type="file" multiple="" /></div>
<div class="col-md-55"><input type="submit" name="subupload" value="Upload"></div>

<?php echo form_close() ?>

<div class="row thumbnails">
<?php foreach ($galleries_list as $m){?>
  <div class="col-md-2">
    <div class="thumbnail">
      <div class="image view view-first">
        <?php $titles = explode("/",$m['media']); ?>
        <div class="thumbimg" id="content_<?php echo $m['id']; ?>"> <a id="<?php echo $m['id'];?>" class="selectcontent"  href="javascript:void(0)" title=""> <img style="display: block;" src="<?php echo base_url(); ?>/<?php echo $m['thumb'];?>" alt="<?php echo $titles[count($titles) - 1];?>" /> </a>
        </div>
        <div class="mask">
        </div>
      </div>
      <p style="color:black;text-align:center"><?php echo $m['media'];?></p>
    </div>
  </div>
<?php } ?>
</div>

<style>
.thumbnails{height:300px;overflow:auto}
.thumbimg img{width:100%}
</style>

<script>
$(".thumbnails").on("click",".selectcontent",function(){
  contentid = $(this).attr("id")
  contentname = $("#content_"+contentid).html()
  $("#MediaLibraryModal").find(".close:first").trigger('click')
  $("#<?=$element_id?>_type").val("image")
  $("#<?=$element_id?>_id").val(contentid)
  $("#<?=$element_id?>_name").html(contentname+'<a class="removemedia" href="javascript:void(0)">Remove</a>')
  $("#<?=$element_id?>_alt_tag_section").show()
  $("#<?=$element_id?>_name").show()
})
</script>
