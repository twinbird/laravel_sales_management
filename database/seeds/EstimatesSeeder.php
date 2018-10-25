<?php

use Illuminate\Database\Seeder;

class EstimatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// testユーザ向け
		$test_user = App\User::where('email', 'test@example.com')->first();
		$test_user_id = $test_user->id;
		$test_user_customer_id = $test_user->customers()
									   ->withoutGlobalScopes()
									   ->first()->id;
		$test_user_product_id = $test_user->products()
									  ->withoutGlobalScopes()
									  ->first()->id;
        // 見積を16件作成
		factory(App\Estimate::class, 20)->create([
			'user_id' => $test_user_id,
			'customer_id' => $test_user_customer_id,
		])->each(function($estimate) use ($test_user_id, $test_user_product_id) {
			factory(App\EstimateDetail::class, 5)->create([
				'user_id' => $test_user_id,
				'estimate_id' => $estimate->id,
				'product_id' => $test_user_product_id,
			]);
		});

		// 別ユーザ向け
		$other_user = App\User::where('email', 'other@example.com')->first();
		$other_user_id = $other_user->id;
		$other_user_customer_id = $other_user->customers()
									   ->withoutGlobalScopes()
									   ->first()->id;
		$other_user_product_id = $other_user->products()
									  ->withoutGlobalScopes()
									  ->first()->id;
        // 見積を14件作成
		factory(App\Estimate::class, 20)->create([
			'user_id' => $other_user_id,
			'customer_id' => $other_user_customer_id,
		])->each(function($estimate) use ($other_user_id, $other_user_product_id) {
			factory(App\EstimateDetail::class, 5)->create([
				'user_id' => $other_user_id,
				'estimate_id' => $estimate->id,
				'product_id' => $other_user_product_id,
			]);
		});
    }
}
