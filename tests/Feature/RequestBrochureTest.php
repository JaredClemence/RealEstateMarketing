<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use App\Mail\BrochureEmail;
use Illuminate\Testing\TestResponse;
use App\Mail\LeadNotification;
use App\Mail\VirtualTour;

class RequestBrochure extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    
    public function testLoadOfferPage()
    {
        $property = Property::factory()->create();
        $url = $this->getOfferLandingPageUrl($property);
        $response = $this->get($url);

        $response->assertStatus(200);
        return [$property];
    }
    
    public function testPostLeadData(){
        Mail::fake();
        $property = Property::factory()->create();
        $data = $this->getLeadData();
        $url = $this->getLeadCreationUrl($property);
        $id = $property->id;
        $urlBase = $_SERVER['APP_URL'];
        $this->assertEquals("$urlBase/offers/$id/leads", $url);
        $response = $this->post($url, $data);
        $response->assertStatus(302);
        return [$property];
    }
    
    public function testSubmitRequest(){
        Mail::fake();
        $property = Property::factory()->create();
        $response = $this->submitFakeData($property);
        $response->assertStatus(302);
    }
    
    public function testBrochureEmailSent(){
        Mail::fake();
        $property = Property::factory()->create();
        $response = $this->submitFakeData($property);
        $this->assertMailSent($property, $response);
    }
    public function testNewLeadEmailSentToAgent(){
        Mail::fake();
        $property = Property::factory()->create();
        $response = $this->submitFakeData($property);
        Mail::assertQueued(LeadNotification::class);
    }
    public function testUserSeesThankYouPage(){
        Mail::fake();
        $property = Property::factory()->create();
        $response = $this->submitFakeData($property);
        $this->assertThankYouPageLoaded($property, $response);
    }
    public function testVirtualTourEmailSent(){
        Mail::fake();
        $property = Property::factory()->create();
        $response = $this->submitFakeData($property);
        Mail::assertQueued(VirtualTour::class);
    }
    protected function submitFakeData(Property $property) {
        $data = $this->getLeadData();
        $url = $this->getLeadCreationUrl($property);
        $response = $this->post($url, $data);
        return $response;
    }

    protected function assertThankYouPageLoaded(Property $property, $response) {
        /* @var $response TestResponse */
        $uri = $this->getThankYouUri($property);
        $response->assertRedirect($uri);
    }

    protected function assertMailSent(Property $property, $response) {
        Mail::assertQueued(BrochureEmail::class);
    }

    protected function getOfferLandingPageUrl(Property $property) {
        $url = route('offer.landing',['property'=>$property]);
        return $url;
    }
    
    protected function getLeadCreationUrl(Property $property){
        $url = route('leads.store',['property'=>$property]);
        return $url;
    }

    protected function getLeadData() {
        $data = [
            'method'=>'POST',
            'email'=>$this->faker->email,
            'name'=>$this->faker->name,
            'phone'=>$this->faker->phoneNumber
        ];
        return $data;
    }

    protected function getThankYouUri($property) {
        return route('offer.thanks',compact('property'));
    }

}
