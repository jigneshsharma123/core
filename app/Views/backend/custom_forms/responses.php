<table id="example1" class="table table-bordered table-striped table-responsive dataTable" style="overflow-x:auto;!important"> 
  <thead>
    <tr>
      <td>Enquiry At</td>
      <?php $i = 0;?>
    <?php foreach($custom_form->form_element->order_by('id','asc')->get() as $form_element) { ?>
    <?php if ($form_element->element_type != "submitbutton" and $form_element->element_type != "cancelbutton" and $form_element->element_type != "captcha") { ?>
      <td><?php echo $form_element->title; ?></td>
    <?php $i++; } ?>
    <?php } ?>
    </tr>
  </thead>
  <tbody>
    <? $pages_count = 0; ?>
    <?php foreach ($custom_form_responses as $custom_form_response){ ?>
    <?php $custom_form_response->custom_form_response_value->order_by('form_element_id','asc')->get() ?>
    <tr>
        <td><?php echo date("d-m-Y H:i:s a",strtotime($custom_form_response->created_at)); ?></td>
      <?php $k = 0; foreach($custom_form_response->custom_form_response_value as $form_element) { ?>
        <td><?php echo $form_element->response; ?></td>
      <?php $k++;} ?>
      <?php for($t=$k; $t<$i; $t++){?>
        <td></td>
      <?php }?>

    </tr>
    <?php } ?>
  </tbody>
</table>
<script>
$(document).ready(function() {
    $('#example1').DataTable({ "bSort": false});
} );
</script>
