<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsDetailTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Permission_detail', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('Permission_id')->unsigned();
			$table->string('name');
			$table->foreign('Permission_id')->references('id')->on('Permissions')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('Permission_detail');
	}
}
