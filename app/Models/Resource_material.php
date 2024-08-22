<?php

namespace App\Models;

use CodeIgniter\Model;

class Resource_material extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'resource_materials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['resource_type', 'title', 'slug', 'image', 'brief', 'attachment', 'is_active', 'external_link', 'publish_date', 'created_by', 'updated_by','category_id'];

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

    function latest_resources_by_category()
    {
        $db = \Config\Database::connect();

        $query ="select resource_materials.image, resource_materials.brief, resource_materials.id, resource_materials.attachment, resource_materials.category_id, resource_materials.slug, categories.title as category, resource_materials.category_id, resource_materials.title, resource_materials.updated_at as publish_at from resource_materials, categories,            (select category_id,max(updated_at) as updated_at                 from resource_materials where is_active = true                 group by category_id) latest_resources              where resource_materials.updated_at=latest_resources.updated_at and resource_materials.category_id=latest_resources.category_id and categories.id = resource_materials.category_id";
        $blogDb = $db->query($query);
        return $blogDb->getResultArray();
    }    
}
