<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('Customers', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('images')->nullable()->default(NULL);
			$table->string('email')->unique();
			$table->string('password');
			$table->string('address');
			$table->string('phone');
			$table->tinyInteger('status');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('Customers');
	}
}
