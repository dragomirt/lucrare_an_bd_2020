<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTimeFields extends Migration
{
	public function up()
	{
		$this->forge->modifyColumn('requests', [
            'created_at datetime default current_timestamp'
        ]);

        $this->forge->modifyColumn('listings', [
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->modifyColumn('pricing', [
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->modifyColumn('users', [
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->modifyColumn('locations', [
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
