<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionDetailTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('User_Permission_detail', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('Permission_detail_id')->unsigned();
			$table->integer('User_id')->unsigned();
			$table->foreign('Permission_detail_id')->references('id')->on('Permission_detail')->onDelete('cascade');
			$table->foreign('User_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('User_Permission_detail');
	}
}
