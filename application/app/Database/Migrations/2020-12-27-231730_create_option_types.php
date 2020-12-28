<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOptionTypes extends Migration
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
                'constraint' => 250
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('option_types');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('option_types');
	}
}
