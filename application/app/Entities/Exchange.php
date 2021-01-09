<?php


namespace App\Entities;


class Exchange extends \CodeIgniter\Entity
{
    protected $attributes = array(
        'id' => null,
        'listing_id1' => null,
        'listing_id2' => null,
        'profit' => null,
        'created_at' => null,
        'updated_at' => null
    );

    public function getId() {
        return $this->attributes['id'];
    }

    public function getListingId1() {
        return $this->attributes['listing_id1'];
    }

    public function getListingId2() {
        return $this->attributes['listing_id2'];
    }

    public function getProfit() {
        return $this->attributes['profit'];
    }

    public function getCreatedAt() {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt() {
        return $this->attributes['updated_at'];
    }
}