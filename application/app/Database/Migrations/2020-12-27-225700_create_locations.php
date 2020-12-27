<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocations extends Migration
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
                'unsigned' => true
            ],

            'latitude' => [
                'type' => 'FLOAT',
                'constraint' => 10
            ],

            'longitude' => [
              'type' => 'FLOAT',
              'constraint' => 10
            ],

            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true
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
        $this->forge->createTable('locations');
    }

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('locations');
    }
}
