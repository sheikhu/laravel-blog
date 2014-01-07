<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100);
			$table->text('content');
			$table->text('slug')->unique();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade');

			$table->foreign('category_id')
					->references('id')
					->on('categories')
					->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
