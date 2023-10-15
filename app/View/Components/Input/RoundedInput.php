<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoundedInput extends Component
{
    public $error;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($error = null)
    {
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.rounded-input');
    }
}
