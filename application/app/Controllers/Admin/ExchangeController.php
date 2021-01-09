<?php


namespace App\Controllers\Admin;


use App\Models\ExchangeModel;

class ExchangeController extends \CodeIgniter\Controller
{
    public function index() {
        $exchangeModel = new ExchangeModel();
        $allEntries = $exchangeModel->findAll();
        return view('admin/exchanges/index', compact('allEntries'));
    }

    public function showCreate() {
        return view('admin/exchanges/create');
    }

    public function create() {
        $req = $this->request;
        $listingId1 = $req->getPost('listing_id1');
        $listingId2 = $req->getPost('listing_id2');
        $profit = $req->getPost('profit');

        $data = array(
            'listing_id1' => $listingId1,
            'listing_id2' => $listingId2,
            'profit' => $profit
        );

        $exchangeModel = new ExchangeModel();
        if ($entry = $exchangeModel->insert($data)) {
            $allEntries = $exchangeModel->findAll();

            $createResponse = "Intrarea cu idul $entry a fost cu succes salvata!";
            return view('admin/exchanges/index', compact('allEntries', 'createResponse'));
        }

        $allEntries = $exchangeModel->findAll();
        $createResponse = "Eroare!";
        return view('admin/exchanges/index', compact('allEntries', 'createResponse'));
    }
}