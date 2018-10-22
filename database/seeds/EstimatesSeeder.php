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
        // 見積を20作成
		$other_user = App\User::where('email', 'other@example.com')->first();
		$other_user_id = $other_user->id;
		$other_user_customer_id = $other_user->withoutGlobalScopes()->first()->id;
		factory(App\Estimate::class, 20)->create([
			'user_id' => $other_user_id,
			'customer_id' => $other_user_customer_id,
		])->each(function($estimate) use ($other_user_id) {
			factory(App\EstimateDetail::class, 5)->create([
				'user_id' => $other_user_id,
				'estimate_id' => $estimate->id,
			]);
		});
    }
}
