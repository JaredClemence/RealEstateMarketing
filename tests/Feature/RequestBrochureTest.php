<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use App\Mail\BrochureEmail;

class RequestBrochure extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoadOfferPage()
    {
        $property = Property::factory()->create();
        $url = $this->getOfferLandingPageUrl($property);
        $response = $this->get($url);

        $response->assertStatus(200);
        return [$property];
    }
    
    /**
     * @depends testLoadOfferPage
     */
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
    
    /**
     * @depends testLoadOfferPage
     */
    public function testSubmitRequest(){
        Mail::fake();
        $property = Property::factory()->create();
        $response = $this->submitFakeData($property);
        $this->assertThankYouPageLoaded($property, $response);
        $this->assertMailSent($property, $response);
    }

    protected function submitFakeData(Property $property) {
        $data = $this->getLeadData();
        $url = $this->getLeadCreationUrl($property);
        $response = $this->post($url, $data);
        $response->assertStatus(302);
        return $response;
    }

    protected function assertThankYouPageLoaded(Property $property, $response) {
        
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

}
