<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
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
        Schema::table('customers', function (Blueprint $table) {
			$table->string('address1')->nullable(false)->change();
			$table->string('address2')->nullable(false)->change();
			$table->string('tel')->nullable(false)->change();
			$table->string('fax')->nullable(false)->change();
        });
    }
}
