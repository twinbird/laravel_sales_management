<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Product;

class ProductCRUDTest extends TestCase
{
	protected $user;
	protected $product;

	public function setUp()
	{
		parent::setUp();
		$this->user = factory(User::class)->create();
		$this->product = factory(Product::class)->create(['user_id' => $this->user->id]);
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

	public function testEditProductPage()
	{
		$response = $this->actingAs($this->user)
							->get(route('products.edit', ['id' => $this->product->id]));
		$response->assertOk();
	}
}
