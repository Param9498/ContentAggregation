<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_topics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('description', 191);
			$table->string('youtube_link', 191);
			$table->text('notes');
			$table->integer('unit_id');
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
		Schema::drop('sub_topics');
	}

}
