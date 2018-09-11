<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configTranslation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('config_id')->unsigned();
            $table->string('key');
            $table->text('value');
            $table->foreign('config_id')->references('id')->on('config')->onDelete('cascade');
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
        Schema::dropIfExists('configTranslation');
    }
}
