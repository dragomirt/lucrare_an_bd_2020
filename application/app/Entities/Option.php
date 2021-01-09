<?php


namespace App\Entities;


use App\Models\ListingModel;
use App\Models\OptionTypeModel;

class Option extends \CodeIgniter\Entity
{
    protected $attributes = array(
        'id' => null,
        'listing_id' => null,
        'type_id' => null,
        'value' => null
    );

    public function getId() {
        return $this->attributes['id'];
    }

    public function getListingId() {
        return $this->attributes['listing_id'];
    }

    public function getTypeId() {
        return $this->attributes['type_id'];
    }

    public function getValue() {
        return $this->attributes['value'];
    }

    public function getListing() {
        $listingModel = new ListingModel();
        if ($listing = $listingModel->find($this->getListingId())) {
            return $listing;
        }
        return null;
    }

    public function getOptionType() {
        $optionTypeModel = new OptionTypeModel();
        if ($optionType = $optionTypeModel->find($this->getTypeId())) {
            return $optionType;
        }
        return null;
    }

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