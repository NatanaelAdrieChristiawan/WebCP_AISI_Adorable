<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_company_page(): void
    {
        $response = $this->get('/company');
        $response->assertStatus(200);
    }

    public function test_products_page(): void
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_blog_page(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
    }

    public function test_gallery_page(): void
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
    }

    public function test_contact_page(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_contact_form_submission(): void
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '0812345678',
            'company' => 'ACME Corp',
            'subject' => 'Inquiry',
            'message' => 'Hello, I want to ask about products.',
        ]);

        $response->assertRedirect('/contact');
        $this->assertDatabaseHas('contact_submissions', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }
}
