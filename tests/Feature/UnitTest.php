<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    use WithFaker;
    protected $user;
    public function setUp(): void
    {   // Setup akun dummy
        parent::setUp();
        $this->setUpFaker();
        $email = $this->faker->unique()->safeEmail();
        $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $this->user = User::create([
            'name' => $this->faker->name(),
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $this->actingAs($this->user, 'api');
    }
    /*
        Test akses halaman CRUD artikel
    */
    public function testArticlesPage()
    {
        $response = $this->get('articles');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticlesListPage()
    {
        $response = $this->get('articles/list');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticle1Page()
    {
        $response = $this->get('article/1');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticle1UpdatePage()
    {
        $response = $this->get('article/1/update');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticle1DeletePage()
    {
        $response = $this->get('article/1/delete');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    /*
        Test akses API CRUD artikel
    */
    public function testArticlesApi()
    {
        $response = $this->get('api/v1/articles');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticlesListApi()
    {
        $response = $this->get('api/v1/articles/list');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticlesCreateApi()
    {
        $response = $this->post('api/v1/article/create', [
            'title' => 'Article Title',
            'content' => 'Article Content',
            'image' => 'Article Image',
            'category' => 'Article Category',
        ]);
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticlesDetailApi()
    {
        $response = $this->get('api/v1/article/1');
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticlesUpdateApi()
    {
        $response = $this->post('api/v1/article/1/update', [
            'title' => 'Article Title 2',
        ]);
        $this->assertAuthenticated();
        $response->assertOk();
    }
    public function testArticlesDeleteApi()
    {
        $response = $this->post('api/v1/article/1/delete');
        $this->assertAuthenticated();
        $response->assertOk();
    }
}
