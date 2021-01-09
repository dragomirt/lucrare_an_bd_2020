<?php
namespace App\Entities;

use App\Models\OptionModel;

class Listing extends \CodeIgniter\Entity
{
    public function getOptions() {
        $optionsModel = new OptionModel();
        $options = $optionsModel->where('listing_id', $this->id)->findAll();
        return $options;
    }
}