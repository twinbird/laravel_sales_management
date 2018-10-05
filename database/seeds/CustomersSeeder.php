<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// testユーザに対するダミー顧客
		App\Customer::create([
			'user_id' => App\User::where('email', 'test@example.com')->first()->id,
			'name' => '株式会社Laravel',
			'address1' => '東京都港区',
			'address2' => 'xxx-yyy',
			'tel' => '03-1234-5678',
			'fax' => '03-9876-5432',
			'payment_term' => '月末締め翌々月末払い',
		]);
		App\Customer::create([
			'user_id' => App\User::where('email', 'test@example.com')->first()->id,
			'name' => 'ララーベル株式会社',
			'address1' => '石川県金沢市',
			'address2' => 'xxx-yyy',
			'tel' => '090-1234-5678',
			'fax' => '090-9876-5432',
			'payment_term' => '月末締め翌月15日払い',
		]);

		// 別ユーザの顧客を30作成
		$other_user_id = App\User::where('email', 'other@example.com')->first()->id;
		factory(App\Customer::class, 30)->create([
			'user_id' => $other_user_id,
		]);
    }
}
