<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePricing extends Migration
{
	public function up()
	{
	    $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],

            'listing_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'price' => [
                'type' => 'FLOAT',
                'constraint' => 11
            ],

            'fee' => [
                'type' => 'FLOAT',
                'constraint' => 11
            ],

            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
                'on create' => 'NOW()'
            ],

            'updated_at' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
                'on update' => 'NOW()'
            ]
        ]);

	    $this->forge->addKey('id', true);
	    $this->forge->addForeignKey('listing_id', 'listings', 'id');
	    $this->forge->createTable('pricing');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pricing');
	}
}
