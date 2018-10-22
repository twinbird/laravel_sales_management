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
		$other_user_id = App\User::where('email', 'other@example.com')->first()->id;
		factory(App\Estimate::class, 20)->create([
			'user_id' => $other_user_id,
		]);
    }
}
