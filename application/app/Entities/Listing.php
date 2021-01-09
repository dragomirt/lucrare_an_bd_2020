<?php
namespace App\Entities;

use App\Models\OptionModel;
use App\Models\UserModel;

class Listing extends \CodeIgniter\Entity
{

    protected $attributes = [
        'id' => null,
        'name' => null,
        'user_id' => null,
        'location' => null,
        'pricing' => null,
        'created_at' => null,
        'updated_at' => null,
    ];

    public function getOptions() {
        $optionsModel = new OptionModel();
        $options = $optionsModel->where('listing_id', $this->attributes['id'])->findAll();
        return $options;
    }

    public function getId() {
        return $this->attributes['id'];
    }

    public function getName() {
        return $this->attributes['name'];
    }

    public function getUserId() {
        return $this->attributes['user_id'];
    }

    public function getUser() {
        $userModel = new UserModel();
        return $userModel->find($this->getUserId());
    }

    public function getLocation() {
        return $this->attributes['location'];
    }

    public function getPricing() {
        return $this->attributes['pricing'];
    }

    public function getCreatedAt() {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt() {
        return $this->attributes['updated_at'];
    }

    public function removeAllOptions() {
        $optionModel = new OptionModel();
        $listingOptions = $optionModel->where('listing_id', $this->getId())->findAll();
        foreach ($listingOptions as $option) {
            $optionModel->delete($option->getId());
        }
        return true;
    }
}