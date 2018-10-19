<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->comment('ユーザID');
			$table->string('company_name')->comment('会社名');
			$table->string('postal_code')->comment('郵便番号');
			$table->string('address1')->comment('住所1');
			$table->string('address2')->comment('住所2');
			$table->string('tel')->comment('TEL');
			$table->string('fax')->comment('FAX');
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
        Schema::dropIfExists('profiles');
    }
}
