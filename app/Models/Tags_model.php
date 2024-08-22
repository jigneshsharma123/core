<?php

namespace App\Models;

use CodeIgniter\Model;

class Tags_model extends Model
{ 
  protected $table='blog_tags';
  protected $allowedFields = ['blog_id', 'tag_id'];

	public function add_tag($data)
  {
  	$this->db->table('blog_tags')->insert($data);
    //$db->insert('blog_tags', $data);
    return $db->insert_id();
  }	


   public function get_tag($q)
   {
  	$db   = \Config\Database::connect();
   $queryBuilder= $db->table('tags');
    $queryBuilder->like('name',strtolower($q));
    $query = $queryBuilder->get();
    $count_all=$queryBuilder->countAll();
    $row_set[]=array();
    if($count_all > 0){
      foreach ($query->getResultArray() as $row){

      $row1['label'] = htmlentities(stripslashes($row['name']));

      $row1['value'] = htmlentities(stripslashes($row['name']));

      $row1['id'] = $row['id'];

      $row_set[] = $row1;

      }
      echo json_encode($row_set); //format the array into json data
    }

    }
    
}


?>