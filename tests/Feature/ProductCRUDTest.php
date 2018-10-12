<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ProductCRUDTest extends TestCase
{
	protected $user;

	public function setUp()
	{
		parent::setUp();
		$this->user = factory(User::class)->create();
	}

    public function testRedirectLoginPageAccessByNoLoginUser()
    {
		$response = $this->get('/products');
		$response->assertRedirect('/login');
    }

	public function testListingProducts()
	{
		$response = $this->actingAs($this->user)
						 ->get('/products');
		$response->assertOk();
	}

	public function testCreateProductPage()
	{
		$response = $this->actingAs($this->user)
						 ->get('/products/create');
		$response->assertOk();
	}
}
