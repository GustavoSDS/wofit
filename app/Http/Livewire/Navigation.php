<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    protected $listeners = ['postAdded'];

    public function render()
    {
        $this->emit('postAdded');
        return view('livewire.navigation');
    }
}
