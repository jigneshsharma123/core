<?php

namespace App\Models;

use CodeIgniter\Model;

class Form_element_option extends Model
{
    protected $table='form_element_options';
    protected $primaryKey = 'id';
    protected $allowedFields =
	[
      'name', 
      'title', 
      'description',
      'css_class',
      'custom_css',
      'by_ajax',
      'successfull_message',
      'mail_to',
      'mail_subject',
      'mail_content',
      'include_form_data_in_mail',
      'include_captcha',
      'form_class',
      'thankyou_url',
      'customer_mail_subject',
      'customer_mail_content',
      'include_form_data_in_customer_email',
      'parent_class'
    ]; 	
}
 ?>   