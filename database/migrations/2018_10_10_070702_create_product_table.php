<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->comment('ユーザID');
			$table->string('name')->comment('商品名');
			$table->decimal('standard_price', 13, 3)->comment('標準単価');
            $table->timestamps();

			$table->foreign('user_id')
				  ->references('id')
			      ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
