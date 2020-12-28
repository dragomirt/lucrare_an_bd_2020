<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRequests extends Migration
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

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'message' => [
              'type' => 'TEXT'
            ],

            'created_at' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
                'on create' => 'NOW()'
            ]
        ]);

	    $this->forge->addKey('id', true);
		$this->forge->createTable('requests');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('requests');
	}
}
