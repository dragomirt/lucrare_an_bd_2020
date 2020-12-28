<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOptions extends Migration
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

            'type_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],

            'value' => [
                'type' => 'INT',
                'constraint' => 5
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->db->disableForeignKeyChecks();

        $this->forge->addForeignKey('type_id', 'option_types', 'id');
        $this->forge->addForeignKey('listing_id', 'listings', 'id');

        $this->forge->createTable('options');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('options');
	}
}
