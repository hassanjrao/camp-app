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
    public $emergency_contact_name;
    public $emergency_contact_phone;
    public $parents_email;
    public $parents_phone;
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
            'emergency_contact_name'=>'required',
            'emergency_contact_phone'=>'required|unique:users,emergency_contact_phone',
            "parents_email"=>"required|email|unique:users,parents_email",
            "parents_phone"=>"required|unique:users,parents_phone",
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
            "emergency_contact_name"=>$this->emergency_contact_name,
            "emergency_contact_phone"=>$this->emergency_contact_phone,
            "parents_email"=>$this->parents_email,
            "parents_phone"=>$this->parents_phone,

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
