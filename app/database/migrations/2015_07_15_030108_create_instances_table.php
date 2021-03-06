<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('elder_id')->unsigned();
			$table->enum('referred', ['presidency_inass', 'social_welfare', 'health', 'cssr', 'other']);
			$table->string('address');
			$table->date('visit_date');
			$table->string('description')->nullable();
			$table->enum('state', ['waiting', 'reject', 'confirmed']);

      $table->foreign('elder_id')->references('id')->on('elders')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instances');
	}

}
