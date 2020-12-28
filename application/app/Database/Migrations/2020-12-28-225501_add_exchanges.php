<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddExchanges extends Migration
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

            'listing_id1' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],

            'listing_id2' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],

            'profit' => [
                'type' => 'FLOAT',
                'constraint' => 10
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

	    $this->forge->addKey('id', true);
	    $this->forge->addForeignKey('listing_id1', 'listings', 'id');
	    $this->forge->addForeignKey('listing_id2', 'listings', 'id');
		$this->forge->createTable('exchanges');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropColumn('exchanges');
	}
}
