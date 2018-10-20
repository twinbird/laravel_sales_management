<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('profiles', function(Blueprint $table) {
			$table->string('postal_code')->nullable()->change();
			$table->string('address1')->nullable()->change();
			$table->string('address2')->nullable()->change();
			$table->string('tel')->nullable()->change();
			$table->string('fax')->nullable()->change();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('profiles', function(Blueprint $table) {
			$table->string('postal_code')->nullable(false)->change();
			$table->string('address1')->nullable(false)->change();
			$table->string('address2')->nullable(false)->change();
			$table->string('tel')->nullable(false)->change();
			$table->string('fax')->nullable(false)->change();
		});
    }
}
