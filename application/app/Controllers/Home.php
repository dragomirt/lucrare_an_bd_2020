<?php namespace App\Controllers;

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

}
