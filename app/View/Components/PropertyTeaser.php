<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PropertyTeaser extends Component {

    public $bedrooms;
    public $bathrooms;
    public $sqft;
    public $teaserText;
    public $expiration;
    public $countdown;
    public $address;
    public $city;
    public $state;
    public $zip;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        $this->bedrooms = 3;
        $this->bathrooms = 2.5;
        $this->sqft = 1680;
        $this->expiration=(now())->addDays(7);
        $this->countdown = new \stdClass();
        $this->setDays(0);
        $this->setHours(0);
        $this->setMinutes(0);
        $this->setSeconds(0);
        $this->address="3419 Christmas Tree Lane";
        $this->city = "Bakersfield";
        $this->state = "CA";
        $this->zip = "93306";
        $this->teaserText = <<<TEXT
<p>
    This property is most notable for its large yard, which the owner has 
    designed as an enchanted forest and orchard. Eleven fruit bearing trees and bushes grow there, along with several other trees that 
    will grow to create a secluded and serine environment ideal for hiding from the troubles of the busy city.
</p>
<p>The property has recently received extensive work to modernize and improve the first story. See the amazing new layout in the virtual tour.</p>
TEXT;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        $this->updateCountdownTimer();
        return view('components.property-teaser');
    }

    private function updateCountdownTimer() {
        $diff = now()->diff($this->expiration, true);
        $this->setDays($diff->d);
        $this->setHours($diff->h);
        $this->setMinutes($diff->i);
        $this->setSeconds($diff->s);
    }

    private function setDays($number) {
        $this->countdown->days = $number;
    }

    private function setHours($number) {
        $this->countdown->hours = $number;
    }

    private function setMinutes($number) {
        $this->countdown->minutes = $number;
    }

    private function setSeconds($number) {
        $this->countdown->seconds = $number;
    }

}
