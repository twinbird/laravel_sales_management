<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveEstimateIdFromEstimateDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('estimate_details', function(Blueprint $table) {
			$table->dropForeign('estimate_details_user_id_foreign');
			$table->dropColumn('user_id');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('estimate_details', function(Blueprint $table) {
			$table->integer('user_id')->unsigned()->comment('ユーザID');
			$table->foreign('user_id')
					->references('id')
					->on('users');
		});
    }
}
