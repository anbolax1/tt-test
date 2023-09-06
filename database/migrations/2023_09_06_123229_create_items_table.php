<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('рандомный текст из 10-30 символов');
            $table->integer('category')->comment('рандомное число от 1 до 10');
            $table->integer('price')->comment('рандомное число от 1 до 10 000');
            $table->string('currency')->comment('рандомное значение (EUR или USD)');
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
        Schema::dropIfExists('items');
    }
}
