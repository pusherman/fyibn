<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wishes', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('post_id')->unsigned();
			$table->foreign('post_id')->references('id')->on('posts');

            $table->integer('granted_by')->unsigned()->nullable();
			$table->foreign('granted_by')->references('id')->on('users');

            $table->integer('granted_on')->timestamp()->nullable();

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
		Schema::drop('wishes');
	}

}
