<?php


namespace App\Controllers\Admin;


use App\Models\ExchangeModel;
use App\Models\ListingModel;
use App\Models\OptionModel;
use App\Models\UserModel;

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

    public function showOptions() {
        return view('admin/reports/options');
    }

    public function options() {
        $req = $this->request;
        $optionId = $req->getPost('option_id');

        $nrOfExchanges = 0;
        $profitSum = 0;

        $optionModel = new OptionModel();
        $optionEntity = $optionModel->where('type_id', $optionId)->findAll();
        $optionName = "";

        if (!$optionModel) {
            $response = "Comenzi cu optiunea cu idul $optionId nu exista!";

            return view('admin/reports/options', compact('response'));
        }

        foreach ($optionEntity as $option) {
            $optionListingIds[] = $option->listing_id;
            $optionName = $option->getName();
        }

        $exchangeModel = new ExchangeModel();
        $entities = $exchangeModel->whereIn("listing_id1", $optionListingIds)->orWhereIn("listing_id2", $optionListingIds)->findAll();

        foreach ($entities as $entity) {
            $nrOfExchanges += 1;
            $profitSum += $entity->getProfit();
        }

        $response = "Optiunea cu idul $optionId si numele \"$optionName\" a figurat in $nrOfExchanges tranzactii. \n\n Profitul este de $profitSum$!";

        return view('admin/reports/options', compact('response'));
    }

    public function showUsers() {
        return view('admin/reports/users');
    }

    public function users() {
        $req = $this->request;
        $userId = $req->getPost('user_id');

        $nrOfExchanges = 0;
        $profitSum = 0;

        $listingModel = new ListingModel();
        $listingEntity = $listingModel->where('user_id', $userId)->findAll();
        $userInstance = "";

        if (!$listingEntity) {
            $response = "Nu exista oferte pentru utilizatorul $userId!";

            return view('admin/reports/users', compact('response'));
        }

        foreach ($listingEntity as $listing) {
            $userListingIds[] = $listing->id;
            $userInstance = $listing->getUser();
        }

        $exchangeModel = new ExchangeModel();
        $entities = $exchangeModel->whereIn("listing_id1", $userListingIds)->orWhereIn("listing_id2", $userListingIds)->findAll();

        foreach ($entities as $entity) {
            $nrOfExchanges += 1;
            $profitSum += $entity->getProfit();
        }

        $fullUserName = $userInstance['first_name'] . " " . $userInstance['last_name'];
        $response = "Utilizatorul cu idul $userId si numele \"$fullUserName\" a figurat in $nrOfExchanges tranzactii. \n\n Profitul este de $profitSum$!";

        return view('admin/reports/users', compact('response'));
    }
}