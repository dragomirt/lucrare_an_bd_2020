<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ListingModel;
use App\Models\OptionModel;

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
        $location = $req->getPost('location');
        $pricing = $req->getPost('pricing');
        $options = array_filter($req->getPost(), function($x) {return strpos($x, "option") !== false;}, ARRAY_FILTER_USE_KEY);

        $listingObject = new ListingModel();
        $data = array(
            'name' => $name,
            'user_id' => $user_id,
            'location' => $location,
            'pricing' => $pricing
        );

        if ($listingId = $listingObject->insert($data)) {
            $optionModel = new OptionModel();

            foreach ($options as $option => $value) {
                $exploded = explode("_", $option);
                $id = $exploded[1];
                $raw_value = $value;
                $final_value = 0;
                if ($raw_value === 'on') {
                    $final_value = 1;
                }

                $option_values = array(
                    "listing_id" => $listingId,
                    'type_id' => (int) $id,
                    'value' => $final_value
                );
                $optionModel->insert($option_values);
            }


            $allEntries = (new ListingModel())->findAll();
            $createResponse = "Oferta \" $name \" a fost cu succes creata!";
            return view('admin/listings/index', compact('allEntries', 'createResponse'));
        }
    }

    public function remove($id) {
        $listingModel = new ListingModel();
        $entry = $listingModel->find($id);
        if ($entry) {
            $name = $entry->getName();

            $entry->removeAllOptions();

            if ($listingModel->delete($id)) {
                $allEntries = (new ListingModel())->findAll();
                $createResponse = "Oferta \" $name \" a fost cu succes stearsa!";
                return view('admin/listings/index', compact('allEntries', 'createResponse'));
            }
        }

        $this->index();
    }

    public function showEdit($id) {
        $listingModel = new ListingModel();
        $listingDataRaw = $listingModel->find($id);
        if ($listingDataRaw) {
            $listingData = (object) $listingDataRaw;
            return view('admin/listings/create', compact('listingData'));
        }

        return view('admin/listings/index', ['createResponse' => "Nu exista oferta cu identificatorul $id!"]);
    }

    public function edit() {
        $req = $this->request;
        $id = $req->getPost('id');
        $name = $req->getPost('name');
        $user_id = $req->getPost('user_id');
        $location = $req->getPost('location');
        $pricing = $req->getPost('pricing');
        $options = array_filter($req->getPost(), function($x) {return strpos($x, "option") !== false;}, ARRAY_FILTER_USE_KEY);

        $listingObject = new ListingModel();
        $data = array(
            'name' => $name,
            'user_id' => $user_id,
            'location' => $location,
            'pricing' => $pricing
        );

        $listingModel = new ListingModel();
        $entity = $listingModel->find($id);
        $entity->removeAllOptions();

        if ($listingObject->update($id, $data)) {
            $optionModel = new OptionModel();

            foreach ($options as $option => $value) {
                $exploded = explode("_", $option);
                $optionId = $exploded[1];
                $raw_value = $value;
                $final_value = 0;
                if ($raw_value === 'on') {
                    $final_value = 1;
                }

                $option_values = array(
                    "listing_id" => $id,
                    'type_id' => (int) $optionId,
                    'value' => $final_value
                );
                $optionModel->insert($option_values);
            }


            $allEntries = (new ListingModel())->findAll();
            $createResponse = "Oferta \" $name \" a fost cu succes editata!";
            return view('admin/listings/index', compact('allEntries', 'createResponse'));
        }
    }

    public function show($id) {
        $listingModel = new ListingModel();
        $listingDataRaw = $listingModel->find($id);
        if ($listingDataRaw) {
            $listingData = (object) $listingDataRaw;
            return view('admin/listings/show', compact('listingData'));
        }

        return view('admin/listings/index', ['createResponse' => "Nu exista oferta cu identificatorul $id!"]);
    }
}