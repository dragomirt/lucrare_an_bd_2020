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

            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false
            ],

            'pricing' => [
                'type' => 'FLOAT',
                'constraint' => 11
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

		$this->forge->addForeignKey('user_id', 'users', 'id');

		$this->forge->createTable('listings');
	}

	//--------------------------------------------------------------------

	public function down()
	{
	    $this->forge->dropTable('listings');
	}
}
