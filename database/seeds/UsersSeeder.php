<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// 開発用
		App\Profile::create([
			'company_name' => 'テストユーザ株式会社',
			'postal_code' => '999-9999',
			'address1' => '東京都xxx',
			'address2' => 'yyy-zzz',
			'tel' => '090-0000-0000',
			'fax' => '090-0000-1111',
			'user_id' => App\User::create([
		                 	'name' => 'テストユーザ',
		                 	'email' => 'test@example.com',
		                 	'password' => Hash::make('password'),
		                 	'remember_token' => str_random(10),
		                 ])->id,
		]);   
		
		App\Profile::create([
			'company_name' => '別ユーザ株式会社',
			'postal_code' => '000-0000',
			'address1' => '京都府xxx',
			'address2' => 'yyy-zzz',
			'tel' => '090-0000-0000',
			'fax' => '090-0000-1111',
			'user_id' => App\User::create([
		                 	'name' => '別ユーザ',
		                 	'email' => 'other@example.com',
		                 	'password' => Hash::make('password'),
		                 	'remember_token' => str_random(10),
		                 ])->id,
		]);
		
		// ダミーユーザーを20作成
		factory(App\User::class, 20)->create();
    }
}
