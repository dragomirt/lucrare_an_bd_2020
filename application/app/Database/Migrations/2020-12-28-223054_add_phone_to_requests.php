<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhoneToRequests extends Migration
{
	public function up()
	{
		$this->forge->addColumn('requests', [
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ]
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropColumn('requests', 'phone');
	}
}
