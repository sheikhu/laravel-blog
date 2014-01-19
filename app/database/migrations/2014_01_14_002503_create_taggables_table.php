<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taggables', function(Blueprint $table){

			$table->increments('id');
			$table->morphs('taggable');
			$table->integer('tag_id')->unsigned();

			$table->foreign('tag_id')
					->references('id')
					->on('tags')
					->onDelete('cascade');

			$table->unique(array('taggable_type', 'taggable_id', 'tag_id'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('taggables');
	}

}
