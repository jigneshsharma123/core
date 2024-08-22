<?php

namespace App\Models;

use CodeIgniter\Model;

class Faq extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'faqs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['faq_group_id', 'question', 'answer', 'is_active', 'sort_order', 'created_by', 'updated_by'];

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
    
    
    function fetch_fag_group()
    {
      $db = \Config\Database::connect();

      $blogDb = $db->table('faqs');

      $query = $blogDb->select('faqs.*,faq_groups.name')
      ->join('faq_groups', 'faq_groups.id = faqs.faq_group_id')->where('faqs.deleted_at is null')->get();
      return $query->getResultArray();
    }
}

