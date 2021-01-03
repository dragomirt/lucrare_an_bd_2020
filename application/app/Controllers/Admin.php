<?php


namespace App\Controllers;


use App\Models\OptionTypeModel;
use App\Models\RequestModel;
use App\Models\UserModel;

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

    public function users()
    {
        $userModel = new UserModel();
        $allEntries = $userModel->orderBy('created_at', 'desc')->findAll();

        return view('admin/users/index', ['allEntries' => $allEntries]);
    }

    public function showCreate()
    {
        return view('admin/users/create');
    }

    public function processUserCreate()
    {
        $req = $this->request;


        $firstName = $req->getPost('firstName');
        $lastName = $req->getPost('lastName');
        $email = $req->getPost('email');
        $dob = $req->getPost('dob');
        $phone = $req->getPost('phone');
        $bio = $req->getPost('bio');

        $data = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'dob' => $dob,
            'bio' => $bio,
            'phone' => $phone
        );

        $usersModel = new UserModel();

        if ($usersModel->insert($data)) {
            $allEntries = $usersModel->orderBy('created_at', 'desc')->findAll();
            return view('admin/users/index', ['createResponse' => "All good! $firstName $lastName has been successfully saved!", 'allEntries' => $allEntries]);
        }

        return view('admin/users/create', ['error' => "Something went wrong, please recheck the data!"]);
    }

    public function usersShow($id)
    {
        $usersModel = new UserModel();
        $userDataRaw = $usersModel->find($id);
        if ($userDataRaw) {
            $userData = (object) $userDataRaw;
            return view('admin/users/show', compact('userData'));
        }

        return view('admin/users/index', ['createResponse' => "There is no user with id $id!"]);
    }

    public function usersEdit($id)
    {
        $usersModel = new UserModel();
        $userDataRaw = $usersModel->find($id);
        if ($userDataRaw) {
            $userData = (object) $userDataRaw;
            return view('admin/users/create', compact('userData'));
        }

        return view('admin/users/index', ['createResponse' => "There is no user with id $id!"]);
    }

    public function usersEditProcessing()
    {
        $req = $this->request;

        $id = $req->getPost('id');
        $firstName = $req->getPost('firstName');
        $lastName = $req->getPost('lastName');
        $email = $req->getPost('email');
        $dob = $req->getPost('dob');
        $phone = $req->getPost('phone');
        $bio = $req->getPost('bio');

        $data = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'dob' => $dob,
            'bio' => $bio,
            'phone' => $phone
        );

        $usersModel = new UserModel();

        if ($usersModel->update($id, $data)) {
            return $this->usersShow($id);
        }

    }

    public function showOptionTypes()
    {
        $optionTypes = new OptionTypeModel();
        $allEntries = $optionTypes->findAll();

        return view('admin/option_types/index', compact('allEntries'));
    }

    public function addOptionTypeShow()
    {
        return view('admin/option_types/create');
    }

    public function processOptionTypeCreate()
    {
        $req = $this->request;

        $name = $req->getPost('name');

        $data = array(
            'name' => $name
        );

        $optionTypeModel = new OptionTypeModel();
        if ($optionTypeModel->insert($data)) {
            $allEntries = $optionTypeModel->findAll();
            return view('admin/option_types/index', ['createResponse' => "Totul ok! Optiunea \" $name \" a fost cu success adaugata ;)", 'allEntries' => $allEntries]);
        }

        return view('admin/option_types/create', ['error' => "Something went wrong, please recheck the data!"]);
    }

    public function removeOptionType($id)
    {
        $optionTypesModel = new OptionTypeModel();
        $entry = $optionTypesModel->find($id);
        if ($entry) {
            $name = $entry['name'];
            if ($optionTypesModel->delete($id)) {
                $allEntries = $optionTypesModel->findAll();
                return view('admin/option_types/index', ['createResponse' => "Optiunea cu denumirea \" $name \" a fost cu success stearsa!", 'allEntries' => $allEntries]);
            }
        }

        $this->showOptionTypes();
    }
}