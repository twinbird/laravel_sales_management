<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// testユーザ向けのダミー商品
		$test_user_id = App\User::where('email', 'test@example.com')->first()->id;
		App\Product::create([
			'user_id' => $test_user_id,
			'name' => 'サンプル商品A',
			'standard_price' => 129000,
		]);
		App\Product::create([
			'user_id' => $test_user_id,
			'name' => 'サンプル商品B',
			'standard_price' => 300000,
		]);

		// testユーザ向けにランダムに20商品作成
		factory(App\Product::class, 20)->create([
			'user_id' => $test_user_id,
		]);

		// 別ユーザ向けに30個商品作成
		$other_user_id = App\User::where('email', 'other@example.com')->first()->id;
		factory(App\Product::class, 30)->create([
			'user_id' => $other_user_id,
		]);
    }
}
