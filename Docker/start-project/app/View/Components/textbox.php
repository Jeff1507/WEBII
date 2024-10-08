<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textbox extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;
    public $disabled;
    public function __construct($name, $label, $type, $value, $disabled) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->disabled = $disabled;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textbox');
    }
}
