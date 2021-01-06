<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ListingModel;
use App\Models\LocationModel;

class ListingsController extends BaseController
{
    public function index()
    {
        $allEntries = (new ListingModel())->findAll();
        return view('admin/listings/index', compact('allEntries'));
    }

    public function create()
    {
        return view('admin/listings/create');
    }

    public function addEntry()
    {
        $req = $this->request;
        $name = $req->getPost('name');
        $user_id = $req->getPost('user_id');
        $address = $req->getPost('address');
        $price_per_night = $req->getPost('pricing');
        $image = $req->getPost('image');

        $location = new LocationModel();
        if ($location->insert(['name' => $address, 'longitude' => '', 'latitude' => ''])) {

        }
    }
}