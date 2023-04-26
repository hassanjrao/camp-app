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

    public $emergency_contact_name;
    public $emergency_contact_phone;
    public $parents_email;
    public $parents_phone;
    public $gender = "not specified";



    public function updateProfile()
    {



        $this->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email,".auth()->user()->id,
            "phone"=>"required|unique:users,phone,".auth()->user()->id,
            "address"=>"required",
            "age"=>"required|numeric",
            "parents_name"=>"required",
            "gender"=>"required|in:male,female,not specified",
            "parents_email"=>"required|email|unique:users,parents_email,".auth()->user()->id,
            "parents_phone"=>"required|unique:users,parents_phone,".auth()->user()->id,
            'emergency_contact_name'=>'required',
            'emergency_contact_phone'=>'required|unique:users,emergency_contact_phone,'. auth()->user()->id,


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
            "gender" => $this->gender,
            "emergency_contact_name"=>$this->emergency_contact_name,
            "emergency_contact_phone"=>$this->emergency_contact_phone,
            "parents_email"=>$this->parents_email,
            "parents_phone"=>$this->parents_phone,

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
        $this->emergency_contact_name=$user->emergency_contact_name;
        $this->emergency_contact_phone=$user->emergency_contact_phone;
        $this->parents_email=$user->parents_email;
        $this->parents_phone=$user->parents_phone;
    }

    public function render()
    {
        return view('livewire.profile.account');
    }
}
