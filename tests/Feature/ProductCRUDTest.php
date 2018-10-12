<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ProductCRUDTest extends TestCase
{
    public function testRedirectLoginPageAccessByNoLoginUser()
    {
		$response = $this->get('/products');
		$response->assertRedirect('/login');
    }

	public function testListingProducts()
	{
		$user = factory(User::class)->create();
		$response = $this->actingAs($user)
						 ->get('/products');
		$response->assertOk();
	}
}
