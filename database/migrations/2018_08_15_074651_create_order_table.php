<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('Customers_id')->unsigned();
			$table->float('total_amount');
			$table->integer('total_qty');
			$table->text('order_note');
			$table->integer('payment');
			$table->integer('transport');
			$table->string('name');
			$table->string('address');
			$table->string('phone');
			$table->tinyInteger('status');
			$table->foreign('Customers_id')->references('id')->on('Customers')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order');
	}
}
