<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->comment('ユーザID');
			$table->string('estimate_no')->comment('見積番号');
			$table->string('title')->comment('件名');
			$table->date('issue_date')->comment('見積作成日');
			$table->date('due_date')->nullable()->comment('納期');
			$table->date('effective_date')->comment('見積有効期限');
			$table->string('payment_term')->comment('支払条件');
			$table->string('customer_name')->comment('顧客名');
			$table->string('self_company_name')->comment('自社名');
			$table->string('self_postal_code')->nullable()->comment('自社郵便番号');
			$table->string('self_address1')->nullable()->comment('自社住所1');
			$table->string('self_address2')->nullable()->comment('自社住所2');
			$table->string('self_tel')->nullable()->comment('自社TEL');
			$table->string('self_fax')->nullable()->comment('自社FAX');
			$table->string('self_pic')->comment('自社担当者');
			$table->decimal('tax_rate', 3, 2)->comment('消費税');
			$table->decimal('total_price', 13, 3)->comment('金額税込');
			$table->text('remarks')->nullable()->comment('備考');
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
        Schema::dropIfExists('estimates');
    }
}
