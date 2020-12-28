<?php namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		return view('homepage');
	}

	public function addUser()
    {
        $data = [
            'first_name' => 'Borea',
            'last_name' => "Suppet",
            'bio' => 'cul boi',
            'email'    => 'd.vader@theempire.com',
            'phone' => "+373 682421165"
        ];

        $userModel = new UserModel();
        echo $userModel->insert($data);
    }

	//--------------------------------------------------------------------

    public function contact()
    {
        $req = $this->request;

        $firstName = $req->getPost('firstName');
        $lastName = $req->getPost('lastName');
        $email = $req->getPost('email');
        $message = $req->getPost('message');
        $phone = $req->getPost('phone');

        $data = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'message' => $message,
            'phone' => $phone
        );

        $requestModel = new RequestModel();

        if ($requestModel->insert($data)) {
            return view('homepage', ['contactResponse' => "All good! We'll get back to you soon!"]);
        }
    }
}
