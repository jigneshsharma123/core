<?php

namespace App\Models;

use CodeIgniter\Model;

class Service extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['parent_id', 'name', 'overview', 'why_us', 'powerful_strategies', 'image', 'slug', 'sort_order', 'is_active', 'template', 'created_by', 'updated_by', 'faq_group_id'];

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
    
    public function get_services($q) 
    {
      $db   = \Config\Database::connect();
      $queryBuilder= $db->table('services');
      $queryBuilder->Where('is_active',1);
      $queryBuilder->like('LOWER(name)',strtolower($q));
      $query = $queryBuilder->get();
      $count_all=$queryBuilder->countAll();
      $row_set=array();
      if($count_all > 0){
        foreach ($query->getResultArray() as $row){
          
          $full_name = $row['name'];
          $row1['label'] = htmlentities(stripslashes($full_name));

          $row1['value'] = htmlentities(stripslashes($full_name));

          $row1['id'] = $row['id'];

          $row_set[] = $row1;

        }
        echo json_encode($row_set); //format the array into json data
      }
    }
}
