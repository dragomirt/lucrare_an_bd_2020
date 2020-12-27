<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateListings extends Migration
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

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false
            ],

            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],

            'location_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],

            'pricing_id' => [
                'type' => 'INT',
                'constraint' => 5
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

        $this->db->disableForeignKeyChecks();
		$this->forge->addForeignKey('location_id', 'locations', 'id');
//		$this->db->enableForeignKeyChecks();


		$this->forge->addForeignKey('user_id', 'users', 'id');

		$this->forge->createTable('listings');
	}

	//--------------------------------------------------------------------

	public function down()
	{
	    $this->forge->dropTable('listings');
	}
}
