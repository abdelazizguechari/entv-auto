<?php


namespace App\View\Components;

use Illuminate\View\Component;

class CarCount extends Component
{
    public $carnumber;

    /**
     * Create a new component instance.
     *
     * @param  int  $carnumber
     * @return void
     */
    public function __construct($carnumber)
    {
        $this->carnumber = $carnumber;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.car-count');
    }
}
