<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    public $href;
    public $text;
    public $active; 
    public function __construct($href, $text, $active)
    {
        $this->href = $href;
        $this->text = $text;
        if($active == true)
        {
            $this->active = 'active';
        }else{
            $this->active = '';
        }
    }
    
    public function render()
    {
        return view('components.menu');
    }
}
