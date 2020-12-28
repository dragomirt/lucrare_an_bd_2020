<?php


namespace App\Controllers;


use App\Models\RequestModel;

class Admin extends BaseController
{
    public function main()
    {
        return view('admin/admin_main');
    }

    public function requests()
    {
        $requestModel = new RequestModel();
        $allEntries = $requestModel->orderBy('created_at', 'desc')->findAll();

        return view('admin/requests', ['allEntries' => $allEntries]);
    }


}