<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Account extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;
    public $address;
    public $age;
    public $parents_name;
    public $gender = "not specified";



    public function updateProfile()
    {



        $this->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email,".auth()->user()->id,
            "phone"=>"required",
            "address"=>"required",
            "age"=>"required|numeric",
            "parents_name"=>"required",
            "gender"=>"required|in:male,female,not specified",
            // "selectedCamp"=>"required|exists:camps,id"
        ]);

        if($this->password){
            $this->validate([
                "password"=>"required|min:8|confirmed",
                "password_confirmation"=>"required|same:password",
            ]);
        }



        auth()->user()->update([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            "age" => $this->age,
            "parents_name" => $this->parents_name,
            "gender" => $this->gender
        ]);

        if ($this->password) {
            auth()->user()->update([
                "password" => bcrypt($this->password)
            ]);
        }

        $this->dispatchBrowserEvent("show-status",["message"=>"Profile updated successfully!","type"=>"success","toast"=>true]);
    }


    public function mount()
    {

        $this->setAccountInfo();
    }

    public function setAccountInfo()
    {

        $user = auth()->user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->age = $user->age;
        $this->parents_name = $user->parents_name;
        $this->gender = $user->gender;
    }

    public function render()
    {
        return view('livewire.profile.account');
    }
}
