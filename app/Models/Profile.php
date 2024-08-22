<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'profiles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name','middle_name','last_name','slug','email_id','phone_number','other_phone_number','department','designation','brief' ,'profile_description','profile_photo','secondary_image','is_active','sort_order','created_by','updated_by','category_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function name() {
      //print_r($this);
    }
    
    public function get_profiles($q) 
    {
      $db   = \Config\Database::connect();
      $queryBuilder= $db->table('profiles');
      $queryBuilder->Where('is_active',1);
      $queryBuilder->like('LOWER(first_name)',strtolower($q));
      $queryBuilder->orLike('LOWER(middle_name)',strtolower($q));
      $queryBuilder->orLike('LOWER(last_name)',strtolower($q));
      $query = $queryBuilder->get();
      $count_all=$queryBuilder->countAll();
      $row_set=array();
      if($count_all > 0){
        foreach ($query->getResultArray() as $row){
          
          $full_name = $row['first_name'];
          $full_name = ($row['middle_name'] != "") ? $full_name.' '.$row['middle_name'] : $full_name;
          $full_name = ($row['last_name'] != "") ? $full_name.' '.$row['last_name'] : $full_name;
          $row1['label'] = htmlentities(stripslashes($full_name));

          $row1['value'] = htmlentities(stripslashes($full_name));

          $row1['id'] = $row['id'];

          $row_set[] = $row1;

        }
        echo json_encode($row_set); //format the array into json data
      }
    }

}
