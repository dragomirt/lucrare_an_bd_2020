<?php


namespace App\Controllers\Admin;


use App\Models\ExchangeModel;

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
}