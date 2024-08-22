<?php

namespace App\Models;

use CodeIgniter\Model;

class Lead_model extends Model
{
    protected $table='leads';
    protected $primaryKey = 'id';
    protected $allowedFields =
		[

         'salutation', 
          'first_name', 
          'last_name',
          'title',
          'mobile',
          'website',
          'do_not_call',
          'account_name',
          'email',
          'tags',
          'primary_address_street',
          'alt_address_street',
          'primary_address_city',
          'alt_address_city',
          'primary_address_state',
          'alt_address_state',
          'primary_address_postal_code',
          'alt_address_postal_code',
          'primary_address_country',
          'alt_address_country',
          'department',
          'office_phone',
          'custom_form_id',
          'fax',
          'twitter_account',
          'description',
          'lead_status',
          'status_description',
          'lead_source',
          'lead_source_description',
          'assigned_to',
          'opportunity_amount',
          'last_contact',
          'contacted_by',
          'last_in',
          'last_out',
          'education',
          'education_additional',
          'previous_jobs',
          'company_size',
          'industry',
          'company_location',
          'company_description',
          'year_founded',
          'industry_tags',
          'naics_code',
          'sic_code',
          'fy_end',
          'annual_rev',
          'facebook_link',
          'twitter_link',
          'company_facebook',
          'company_twitter',
          'date_created',
          'created_by_id',
          'date_modified',
          'modified_by_id'
        ];
}


?>