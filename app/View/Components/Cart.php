<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class Cart extends Component
{
    public $iconclass;
    public $heading;
    public $paragraph;

    /**
     * Create a new component instance.
     */
    public function __construct($iconclass,$heading,$paragraph )
    {
        $this->iconclass = $iconclass;
        $this->heading = $heading;
        $this->paragraph = $paragraph;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart');
    }
}
