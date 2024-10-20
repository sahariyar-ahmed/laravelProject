<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcum extends Component
{
    /**
     * Create a new component instance.
     */

     public $slogan;

    public function __construct($title)
    {
        $this->slogan = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcum');
    }
}
