<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Value extends Component
{

    public $icons;
    public $headings;
    public $paragraphs;
    /**
     * Create a new component instance.
     */
    public function __construct($icons,$headings,$paragraphs)
    {
        $this->icons = $icons;
        $this->headings = $headings;
        $this->paragraphs = $paragraphs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.value');
    }
}
