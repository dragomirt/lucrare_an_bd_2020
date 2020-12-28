<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImagesToListings extends Migration
{
	public function up()
	{
		$this->forge->addColumn('listings', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropColumn('listings', 'image');
	}
}
