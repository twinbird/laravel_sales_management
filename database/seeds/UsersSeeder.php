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
		App\User::create([
			'name' => 'テストユーザ',
			'email' => 'test@example.com',
			'password' => Hash::make('password'),
			'remember_token' => str_random(10),
		]);
		App\User::create([
			'name' => '別ユーザ',
			'email' => 'other@example.com',
			'password' => Hash::make('password'),
			'remember_token' => str_random(10),
		]);
		// ダミーユーザーを20作成
		factory(App\User::class, 20)->create();
    }
}
