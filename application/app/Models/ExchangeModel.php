<?php


namespace App\Models;


class ExchangeModel extends \CodeIgniter\Model
{
    protected $table      = 'exchanges';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Exchange';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['listing_id1', 'listing_id2', 'profit', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}