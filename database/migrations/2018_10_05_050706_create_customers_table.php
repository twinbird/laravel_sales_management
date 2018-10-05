<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->comment('ユーザID');
			$table->string('name')->comment('顧客名');
			$table->string('address1')->comment('住所1');
			$table->string('address2')->comment('住所2');
			$table->string('tel')->comment('TEL');
			$table->string('fax')->comment('FAX');
			$table->string('payment_term')->comment('支払条件');
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
        Schema::dropIfExists('customers');
    }
}
