<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Customer;

class CustomerCRUDTest extends TestCase
{
	use RefreshDatabase;

	protected $user;
	protected $customer;

	public function setUp()
	{
		parent::setUp();
		$this->artisan('db:seed');
		$this->user = User::where('email', 'test@example.com')->first();
		$this->customer = factory(Customer::class)->create(['user_id' => $this->user->id]);
	}

	public function testRedirectLoginPageAccessByNoLoginUser()
	{
		$response = $this->get(route('customers.index'));
		$response->assertRedirect('/login');
	}

	public function testListingCustomers()
	{
		$response = $this->actingAs($this->user)
						 ->get(route('customers.index'));
		$response->assertOk();
	}

	public function testSeeAddNewCustomerButton()
	{
		$response = $this->actingAs($this->user)
						 ->get(route('customers.index'));
		$response->assertSee('新しい顧客を登録');
	}

	public function testSeeEditCustomerButton()
	{
		$response = $this->actingAs($this->user)
						 ->get(route('customers.index'));
		$response->assertSee('編集');
	}

	public function testSeeDeleteCustomerButton()
	{
		$response = $this->actingAs($this->user)
						 ->get(route('customers.index'));
		$response->assertSee('削除');
	}

	public function testAccessEditCustomerPage()
	{
		$customer = $this->customer;
		$response = $this->actingAs($this->user)
						 ->get(route('customers.edit', ['id' => $customer->id]));
		$response->assertSee('更新');
	}

	public function testAccessCreateCustomerPage()
	{
		$response = $this->actingAs($this->user)
						 ->get(route('customers.create'));
		$response->assertSee('登録');
	}

	public function testAccessShowCustomerPage()
	{
		$customer = $this->customer;
		$response = $this->actingAs($this->user)
						 ->get(route('customers.show', ['id' => $customer->id]));
		$response->assertSee($customer->name);
	}
}
