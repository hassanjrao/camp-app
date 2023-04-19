<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Orders extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.profile.orders');
    }
}
