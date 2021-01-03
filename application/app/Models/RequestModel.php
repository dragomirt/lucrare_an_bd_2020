<?php


namespace App\Models;


class RequestModel extends \CodeIgniter\Model
{
    protected $table      = 'requests';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['first_name', 'last_name', 'email', 'message', 'phone'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}