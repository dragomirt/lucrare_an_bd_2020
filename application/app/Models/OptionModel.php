<?php


namespace App\Models;


class OptionModel extends \CodeIgniter\Model
{
    protected $table      = 'options';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Option';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['listing_id', 'type_id', 'value'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}