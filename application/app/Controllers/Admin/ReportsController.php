<?php


namespace App\Controllers\Admin;


use App\Models\ExchangeModel;
use App\Models\ListingModel;

class ReportsController extends \CodeIgniter\Controller
{
    public function index() {
        return view('admin/reports/index');
    }

    public function showTime() {
        return view('admin/reports/time');
    }

    public function time() {
        $req = $this->request;
        $startDate = $req->getPost('start_date');
        $finalDate = $req->getPost('final_date');

        $nrOfExchanges = 0;
        $profitSum = 0;

        $exchangeModel = new ExchangeModel();
        $entities = $exchangeModel->where("created_at >=", $startDate)->where("created_at <=", $finalDate)->findAll();

        foreach ($entities as $entity) {
            $nrOfExchanges += 1;
            $profitSum += $entity->getProfit();
        }

        $response = "$startDate - $finalDate\n\nSuma profitului a $nrOfExchanges tranzactii este de $profitSum$!";

        return view('admin/reports/time', compact('response'));
    }

    public function showListings() {
        return view('admin/reports/listings');
    }

    public function listings() {
        $req = $this->request;
        $listingId = $req->getPost('listing_id');

        $nrOfExchanges = 0;
        $profitSum = 0;

        $listingModel = new ListingModel();
        $listingEntity = $listingModel->find($listingId);

        if (!$listingEntity) {
            $response = "Oferta cu idul $listingId nu exista!";

            return view('admin/reports/listings', compact('response'));
        }

        $exchangeModel = new ExchangeModel();
        $entities = $exchangeModel->where("listing_id1", $listingId)->orWhere("listing_id2", $listingId)->findAll();

        foreach ($entities as $entity) {
            $nrOfExchanges += 1;
            $profitSum += $entity->getProfit();
        }

        $listingName = $listingEntity->getName();
        $response = "Oferta cu idul $listingId si numele \"$listingName\" a figurat in $nrOfExchanges tranzactii. \n\n Profitul este de $profitSum$!";

        return view('admin/reports/listings', compact('response'));
    }

}