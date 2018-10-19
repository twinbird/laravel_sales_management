<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfilePageTest.php extends TestCase
{
	use RefreshDatabase;

	protected $user;

	public function setUp()
	{
		parent::setUp();
		$this->artisan('db:seed');
		$this->user = User::where('email', 'test@example.com')->first();
	}

    public function testRedirectLoginPageAccessByNoLoginUser()
    {
		$response = $this->get('/products');
		$response->assertRedirect('/login');
    }

    public function testAccessProfilePage()
    {
		$response = $this->actingAs($this->user)
							->get(route('profiles.edit'), $this->user->id);
		$response->assertOk();
    }
}
