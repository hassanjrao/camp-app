<?php

namespace App\Http\Livewire\Auth;

use App\Models\Camp;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;
    public $address;
    public $age;
    public $parents_name;
    public $gender="not specified";
    public $selectedCamp;
    public $camps=[];


    public function register(){



        $this->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|min:8|confirmed",
            "password_confirmation"=>"required|same:password",
            "phone"=>"required",
            "address"=>"required",
            "age"=>"required|numeric",
            "parents_name"=>"required",
            "gender"=>"required|in:male,female,not specified",
            // "selectedCamp"=>"required|exists:camps,id"
        ]);


       $user= User::create([
            "name"=>$this->name,
            "email"=>$this->email,
            "password"=>bcrypt($this->password),
            "phone"=>$this->phone,
            "address"=>$this->address,
            "age"=>$this->age,
            "parents_name"=>$this->parents_name,
            "gender"=>$this->gender,
            // "camp_id"=>$this->selectedCamp,
        ]);

        $user->assignRole("client");

        $camp=Camp::find($this->selectedCamp);

        auth()->login($user);

        return redirect()->route("camp.index");

    }


    public function mount(){

        $this->camps=Camp::all();

    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
