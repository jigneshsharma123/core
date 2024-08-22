<div class="row thumbnails">
<?php foreach ($galleries_list as $m){?>
  <div class="col-md-4">
    <div class="thumbnail">
      <div class="image view view-first">
        <div class="thumbimg" id="content_<?php echo $m->id;?>"><img style="display: block;" src="<? echo base_url(); ?><?php echo $m->thumb;?>" alt="image" /></div>
        <div class="mask">
        <p><br></p>
        <div class="tools tools-bottom">
      
          <a id="<?php echo $m->id;?>" class="selectcontent"  href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?=(isset($m->mark_available) and $m->mark_available == 1) ? "Make Unavailable" : "Make Available"?>"><i class="fa fa-check text-success"></i></a>
      
        </div>
        </div>
      </div>
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
  $("#myModal").find(".close:first").trigger('click')
  $("#<?=$element_id?>_type").val("image")
  $("#<?=$element_id?>_id").val(contentid)
  $("#<?=$element_id?>_name").html(contentname)
  $("#<?=$element_id?>_name").show()
})
</script>
