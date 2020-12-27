<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
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
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'bio' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'dob' => [
                'type' => 'DATE',
                'null' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false
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
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
