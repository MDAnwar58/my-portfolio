<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submission(): void
    {
        Mail::fake();
        Log::spy();

        $response = $this->post('/contact', [
            'f_name' => 'John',
            'l_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'Contact form submitted successfully!',
        ]);

        $this->assertDatabaseHas('contacts', [
            'f_name' => 'John',
            'l_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message',
        ]);

        Mail::assertSent(\App\Mail\ContactReceived::class);
    }

    public function test_contact_form_validation(): void
    {
        $response = $this->post('/contact', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['f_name', 'l_name', 'email', 'subject', 'message']);
    }
}
