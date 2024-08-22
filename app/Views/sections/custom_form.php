<?php 
  $form_id = $custom_forms[0]['id'];
  $customForm = new \App\Models\Custom_form();
  $formElement = new \App\Models\Form_element();
  $formElementOption = new \App\Models\Form_element_option();
  $custom_form = $custom_forms[0];

  $form_elements = $formElement->asObject()->where("custom_form_id",$custom_form['id'])->orderBy("sort_order",'asc')->findAll();
  $custom_form_html = '<div class="'.$custom_form['css_class'].'" style="'.$custom_form['custom_css'].'"><h5>'.$custom_form['title'].'</h5>';
  $custom_form_html.= '<form name="frm'.$custom_form['name'].'" id="frm'.$custom_form['id'].'" method="post" action="'.base_url().'frontend/custom_forms/submit">';
  $custom_form_html.= '<input type="hidden" name="fid" value="'.$form_id.'">';
  $date_field_available = 0;
  $submitbuttonstatus = 1;
  $captchaparentclass = '';
  $rules = array();
  $custom_form_html .= '<div class="row">';
  foreach($form_elements as $form_element)
  {
    $element_html = '';
    if ($form_element->is_required)
    {
      $rules["cfele[".$form_element->id."]"]['required'] = true;
    }
    
    switch($form_element->element_type)
    {
      case 'textbox':
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  
                  if ($form_element->show_title)
                    $element_html .= '<label>'.$form_element->title.(($form_element->is_required) ? ' *' : '').'&nbsp;</label>';
                    
                  $element_html .= '<input type="text" name="cfele['.$form_element->id.']" id="cfele_'.$form_element->id.'" value="'.$form_element->default_value.'" placeholder="'.$form_element->placeholder_text.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>';
                  $element_html .= '</div>';
                  
                  break;
      case 'email':
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  
                  if ($form_element->show_title)
                    $element_html .= '<label>'.$form_element->title.(($form_element->is_required) ? ' *' : '').'&nbsp;</label>';
                  
                  $element_html .= '<input type="email" placeholder="'.$form_element->placeholder_text.'" name="cfele['.$form_element->id.']" id="cfele_'.$form_element->id.'" value="'.$form_element->default_value.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>';
                  $element_html .= '</div>';
                  
                  $rules["cfele[".$form_element->id."]"]['email'] = true;
                  break;
      case 'date':
                  $date_field_available = 1;
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  
                  if ($form_element->show_title)
                    $element_html .= '<label>'.$form_element->title.(($form_element->is_required) ? ' *' : '').'&nbsp;</label>';
                  
                  $element_html .= '<input type="date" placeholder="'.$form_element->placeholder_text.'" readonly name="cfele['.$form_element->id.']" id="cfele_'.$form_element->id.'" value="'.$form_element->default_value.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>';
                  $element_html .= '</div>';
                  break;
      case 'textarea':
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  
                  if ($form_element->show_title)
                    $element_html .= '<label>'.$form_element->title.(($form_element->is_required) ? ' *' : '').'&nbsp;</label>';
                    
                  $element_html .= '<textarea name="cfele['.$form_element->id.']" id="cfele_'.$form_element->id.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" placeholder="'.$form_element->placeholder_text.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>';
                  $element_html .= $form_element->default_value;
                  $element_html .= '</textarea>';
                  $element_html .= '</div>';
                  break;
      case 'dropdown':
                  $form_element->form_element_option->include_join_fields()->get();
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  
                  if ($form_element->show_title)
                    $element_html .= '<label>'.$form_element->title.(($form_element->is_required) ? ' *' : '').'&nbsp;</label>';
                    
                  $element_html .= '<select name="cfele['.$form_element->id.']" id="cfele_'.$form_element->id.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>"';
                  foreach($form_element->form_element_option as $form_element_option)
                  {
                    $element_html .= '<option value="'.$form_element_option->option_value.'">'.$form_element_option->option_value.'</option>';
                  }
                  $element_html .= '"</select>';
                  $element_html .= '</div>';
                  break;
      case 'heading':
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  $element_html .= '<h3 class="'.$form_element->css_class.'" style="'.$form_element->custom_css.'">'.$form_element->title.'</h3>';
                  $element_html .= '</div>';
                  break;
      case 'submitbutton':
                  $element_html = '';
                  if ($custom_form['include_captcha']) {
					          $captchaparentclass = $form_element->parent_css_class;
                    $element_html .= '<div class="col-md-12"><br><div class="'.$form_element->parent_css_class.'"><div class="g-recaptcha" style="width:100%" data-sitekey="'.GOOGLE_RECAPTCHA_SITE_KEY.'" data-callback="onCaptcha"></div></div></div>';
                  }
                  $submitbuttonstatus = 0;
                  $element_html .= '<div class="'.$form_element->parent_css_class.'">';
                  $element_html .= '<input type="submit" name="submit'.$form_element->id.'" id="submit'.$form_element->id.'" value="'.$form_element->title.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>';
                  $element_html .= '</div>';
                  break;
      default:
                  $element_html = '<div class="'.$form_element->parent_css_class.'">';
                  
                  if ($form_element->show_title)
                    $element_html .= '<label>'.$form_element->title.(($form_element->is_required) ? ' *' : '').'&nbsp;</label>';
                    
                  $element_html .= '<input placeholder="'.$form_element->placeholder_text.'" type="'.$form_element->element_type.'" name="cfele['.$form_element->id.']" id="cfele_'.$form_element->id.'" value="'.$form_element->default_value.'" class="'.$form_element->element_type.' '.$form_element->css_class.'" style="'.$form_element->custom_css.'" '.(($form_element->is_required) ? 'required' : '').'>';
                  $element_html .= '</div>';
                  break;
    }
    $custom_form_html .= $element_html;
  }
  if ($custom_form['by_ajax'])
  {
    $custom_form_html.= '<div class="text-center" id="frmresult'.$custom_form['id'].'"></div>';
  }
  $custom_form_html.= '</form></div></div><div class="clearfix"></div>';
  
  $custom_script = '<script src="'.base_url().'assets/<?php echo $theme_name; ?>/js/jquery.validate.js"></script>';
  $custom_script .= '<script src="'.base_url().'assets/<?php echo $theme_name; ?>/js/additional-methods.js"></script>';
  if ($date_field_available == 1)
  {
    $custom_script .= '<link href="'.base_url().'assets/<?php echo $theme_name; ?>/css/jquery.datetimepicker.css" rel="stylesheet"><script src="'.base_url().'assets/<?php echo $theme_name; ?>/js/jquery.datetimepicker.js"></script><script>';
    $custom_script .= "
    $( document ).ready(function() {
      $('.date').datetimepicker({
          dateFormat:'m/d/Y',
          format: 'm/d/Y',
          formatDate: 'm/d/Y',
          timepicker: false,
          closeOnDateSelect: true,
          scrollMonth : false,
          scrollInput : false
      });
    });</script>";
  }

  $custom_script .= '<script>
                    $("#submit'.$form_element->id.'").click(function(){
                      $("#frmresult'.$custom_form['id'].'").hide();
                    })</script>';
                    
  $custom_script .= '<script>$("#frm'.$custom_form['id'].'").validate({
    rules: '.json_encode($rules);
  if ($custom_form['by_ajax'])
  {
    $custom_script .= ',submitHandler: function(form) {
        $("#frmresult'.$custom_form['id'].'").hide();
        $.ajax({
          url: $(form).attr("action"),// point to server-side PHP script // point to server-side PHP script 
          dataType: "json", // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: new FormData($(form)[0]),
          type: "POST",
          success: function(json){
            grecaptcha.reset();
            if (json["status"] == "1")
            {
              $("#frm'.$custom_form['id'].'")[0].reset();
              $("#frmresult'.$custom_form['id'].'").html("<div class=\'text-success\'>"+json[\'message\']+"</div>");
            }
            else
            {
              $("#frmresult'.$custom_form['id'].'").html("<div class=\'text-danger\'>"+json[\'message\']+"</div>");
            }
            $("#frmresult'.$custom_form['id'].'").show();
          }
        });
        return false;
      }';
  }
  $custom_script .= '})';
  $custom_script .= '</script>';
  
  echo $custom_form_html.$custom_script;
?>
