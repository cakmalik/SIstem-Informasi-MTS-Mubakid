<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{   
    public $pesan = 'Hello Malik';
    public function render()
    {
        return view('livewire.hello-world');
    }
    public function clickMe()
    {
        $this->pesan = 'Hello World';
    }
}
