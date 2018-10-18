<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Product;

class ProductCRUDTest extends TestCase
{
	use RefreshDatabase;

	protected $user;
	protected $product;

	public function setUp()
	{
		parent::setUp();
		$this->artisan('db:seed');
		$this->user = User::where('email', 'test@example.com')->first();
		$this->product = factory(Product::class)->create(['user_id' => $this->user->id]);
	}

    public function testRedirectLoginPageAccessByNoLoginUser()
    {
		$response = $this->get('/products');
		$response->assertRedirect('/login');
    }

	public function testListingProductsPage()
	{
		$response = $this->actingAs($this->user)
						 ->get('/products');
		$response->assertOk();
		$response->assertSee('新しい商品の登録', 'a');
	}

	public function testSeeProductNameOnListingPage()
	{
		$response = $this->actingAs($this->user)
							->get('/products');
		$response->assertOk();
		$first_product = $this->user->products->sortBy('name')->take(1)->first();
		$response->assertSee($first_product->name);
	}

	public function testSeeEditButtonOnListingPage()
	{
		$response = $this->actingAs($this->user)
							->get('/products');
		$response->assertOk();
		$response->assertSee('編集');
	}

	public function testSeeDeleteButtonOnListingPage()
	{
		$response = $this->actingAs($this->user)
							->get('/products');
		$response->assertOk();
		$response->assertSee('削除');
	}

	public function testCreateProductPage()
	{
		$response = $this->actingAs($this->user)
						 ->get('/products/create');
		$response->assertOk();
		$response->assertSee('登録');
	}

	public function testEditProductPage()
	{
		$response = $this->actingAs($this->user)
							->get(route('products.edit', ['id' => $this->product->id]));
		$response->assertOk();
		$response->assertSee('更新');
	}

	public function testShowProductPage()
	{
		$response = $this->actingAs($this->user)
							->get(route('products.show', ['id' => $this->product->id]));
		$response->assertOk();
		$response->assertSee($this->product->name);
	}
}
