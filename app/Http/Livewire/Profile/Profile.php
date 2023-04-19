<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Profile extends Component
{

    public $activeTab = 'profileTab';

    public $orders;

    public function changeTab($tab){
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.profile.profile');
    }
}
