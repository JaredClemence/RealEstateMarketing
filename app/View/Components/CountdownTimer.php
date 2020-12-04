<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CountdownTimer extends Component
{
    public $days;
    public $hours;
    public $minutes;
    public $seconds;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($days=0, $hours=0, $minutes=0, $seconds=0)
    {
        $this->days = $days;
        $this->hours= $hours;
        $this->minutes= $minutes;
        $this->seconds= $seconds;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.countdown-timer');
    }
}
