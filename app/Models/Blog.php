<?php

namespace App\Models;

use CodeIgniter\Model;

class Blog extends Model
{
    protected $table='blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'category_id','brief','image','blog_content', 'featured_image','publish_at' , 'author' ,'designation','is_active'];


    function fetch_blog()
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('blogs');
        $query=$builder->select('categories.title as cat_title, blogs.featured_image as image, blogs.slug, blogs.category_id, blogs.title, blogs.publish_at, blogs.is_active, blogs.id')
        ->join('categories', 'blogs.category_id = categories.id')->get();
        return $query->getResult();
    }     

    function latest_blogs()
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('blogs');
        $query=$builder->select('categories.title as category, blogs.featured_image as image, blogs.slug, blogs.category_id, blogs.title, blogs.publish_at')
        ->join('categories', 'blogs.category_id = categories.id')->orderBy('publish_at desc')->get(2);
        return $query->getResultArray();
    }     
    
    function latest_blogs_by_category()
    {
        $db = \Config\Database::connect();

        $query ="select categories.title as category, blogs.featured_image as image, blogs.slug, blogs.category_id, blogs.title, blogs.publish_at from blogs, categories,            (select category_id,max(publish_at) as publish_at                 from blogs where is_active = true                 group by category_id) latest_resources              where blogs.publish_at=latest_resources.publish_at and blogs.category_id=latest_resources.category_id and categories.id = blogs.category_id order by publish_at";
        $blogDb = $db->query($query);
        return $blogDb->getResultArray();
    }
}



?>