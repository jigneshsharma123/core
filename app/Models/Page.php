<?php

namespace App\Models;

use CodeIgniter\Model;

class Page extends Model
{
  protected $table='pages';
  protected $primaryKey = 'id';
  protected $allowedFields = ['title', 'slug', 'meta_title','meta_keyword','meta_description' ,'banner_id' ,'report', 'page_content','template','status','banner' ,'media_element_id','home_page','only_for_page_section','image_alt_tag','banner_class'];
      
  public function get_pages_section($id)
  {
    $db = \Config\Database::connect();
    //  	$builder = $db->table('pages');
    // $query=$builder->select('pages.*,pages_relatedpages.*')
    // ->join('pages_relatedpages', 'pages.id = pages_relatedpages.page_id')->get();
    //  //echo $this->db->getLastQuery(); die;
    //   return $query->getResult();
    $query="	SELECT * from pages JOIN pages_relatedpages ps on pages.id=ps.relatedpage_id WHERE ps.page_id=$id";
    
    $query="SELECT pages_relatedpages.*, pages.title,pages.slug,pages.meta_title,pages.meta_keyword,pages.meta_description,pages.banner_id,pages.report,pages.page_content,pages.template,pages.status,pages.banner,pages.media_element_id,pages.home_page,pages.only_for_page_section,pages.image_alt_tag,pages.banner_class  from pages JOIN pages_relatedpages on pages.id=pages_relatedpages.relatedpage_id WHERE pages_relatedpages.page_id=$id order by sort_order";
    //echo " <br><br>".$query;

    $blogDb	= $db->query($query);
    return $blogDb->getResult();
  }

  public function get_pages($q) 
  {
    $db   = \Config\Database::connect();
    $queryBuilder= $db->table('pages');
    $queryBuilder->Where("status",1);
    $queryBuilder->Where("only_for_page_section",0);
    $queryBuilder->like('LOWER(title)',strtolower($q));
    $query = $queryBuilder->get();
    $count_all=$queryBuilder->countAll();
    $row_set=array();
    if($count_all > 0){
      foreach ($query->getResultArray() as $row){

      $row1['label'] = htmlentities(stripslashes($row['title']));

      $row1['value'] = htmlentities(stripslashes($row['title']));

      $row1['id'] = $row['id'];

      $row_set[] = $row1;

      }
      echo json_encode($row_set); //format the array into json data
    }
  }

  public function get_all_page($q) 
  {
    $db   = \Config\Database::connect();
    $queryBuilder= $db->table('pages');
    $queryBuilder->Where("status",1);
    $queryBuilder->like('LOWER(title)',strtolower($q));
    $query = $queryBuilder->get();
    $count_all=$queryBuilder->countAll();
    $row_set[]=array();
    if($count_all > 0){
      foreach ($query->getResultArray() as $row){
        $row1['label'] = htmlentities(stripslashes($row['title']));
        $row1['value'] = htmlentities(stripslashes($row['title']));
        $row1['id'] = $row['id'];
        $row_set[] = $row1;
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function get_page_modules($page) 
  {
    $db   = \Config\Database::connect();
    $queryBuilder= $db->table('pages');
    $queryBuilder->Where("status",1);
    $queryBuilder->like('LOWER(title)',strtolower($q));
    $query = $queryBuilder->get();
    $count_all=$queryBuilder->countAll();
    $row_set[]=array();
    if($count_all > 0){
      foreach ($query->getResultArray() as $row){

      $row1['label'] = htmlentities(stripslashes($row['title']));

      $row1['value'] = htmlentities(stripslashes($row['title']));

      $row1['id'] = $row['id'];

      $row_set[] = $row1;

      }
      echo json_encode($row_set); //format the array into json data
    }
  }
}
?>
