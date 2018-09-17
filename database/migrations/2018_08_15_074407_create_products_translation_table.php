<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTranslationTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('productsTranslation', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('products_id')->unsigned();
			$table->string('name');
			$table->string('slug');
			$table->text('info');
			$table->text('description');
			$table->longText('info_sale_product');
			$table->string('locale');
			$table->tinyInteger('status');
			$table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('productsTranslation');
	}
}
