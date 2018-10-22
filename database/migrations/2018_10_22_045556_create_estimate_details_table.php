<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_details', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->comment('ユーザID');
			$table->integer('estimate_id')->unsigned()->comment('見積ID');
			$table->string('product_name')->comment('商品名');
			$table->decimal('unit_price', 13, 3)->comment('単価');
			$table->decimal('quantity', 13, 3)->comment('数量');
			$table->decimal('price', 13, 3)->comment('金額');
            $table->timestamps();

			$table->foreign('user_id')
					->references('id')
					->on('users');
			$table->foreign('estimate_id')
					->references('id')
					->on('estimates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimate_details');
    }
}
