<?php


namespace App\Entities;


use App\Models\OptionTypeModel;

class Option extends \CodeIgniter\Entity
{
    public function getName()
    {
        $optionTypeModel = new OptionTypeModel();
        $optionType = $optionTypeModel->find($this->type_id);
        if ($optionType) {
            return $optionType['name'];
        }

        return '';
    }
}