<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class CustomerCRUDTest extends TestCase
{

	public function testRedirectLoginPageAccessByNoLoginUser() {
		$response = $this->get('/customers');
		$response->assertRedirect('/login');
	}

	public function testListingCustomersPagination()
	{
		$user = factory(User::class)->create();
		$response = $this->actingAs($user)
						 ->get('/customers');
		$response->assertOk();
	}


}
