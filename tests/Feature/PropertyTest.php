<?php

namespace Tests\Feature;


use App\Models\Property;
use App\Notifications\ContactRequestNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class PropertyTest extends TestCase
{

    use RefreshDatabase;

    public function test_send_not_found_on_non_existent_property(): void
    {
        $response = $this->get('/biens/appartement-de-merde-55');

        $response->assertStatus(404);
    }

    public function test_redirect_on_bad_slug_property(): void
    {
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->get("/biens/apparemment-" . $property->id);
        $response->assertRedirectToRoute('property.show', ['property' => $property->id, 'slug' => $property->getSlug()]);
    }

    public function test_ok_on_property(): void
    {
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->get("/biens/{$property->getSlug()}-{$property->id}");
        $response->assertOk();
        $response->assertSee($property->title);
    }

    public function test_error_on_contact(): void
    {
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->post("/biens/{$property->id}/contact", [
            "firstName" => "Neuneu",
            "lastName" => "Goldfish",
            "phone" =>  "0655555555",
            "email" => "Neuneu",
            "message" => "Pouvez vous me recontacter"
        ]);
        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        $response->assertSessionHasInput('email', 'Neuneu');
    }

    public function test_ok_on_contact(): void
    {
        Notification::fake();
        /** @var Property $property */
        $property = Property::factory()->create();
        $response = $this->post("/biens/{$property->id}/contact", [
            "firstName" => "Neuneuu",
            "lastName" => "Goldfish",
            "phone" =>  "0655555555",
            "email" => "Neuneu@sfr.fr",
            "message" => "Pouvez vous me recontacter"
        ]);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
        Notification::assertSentOnDemand(ContactRequestNotification::class);
    }
}
