<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateUserView extends Component
{
    public $nama;
    public $username;
    public $password;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'nama' => 'required|max:255|min:3',
            'username' => 'required|max:55|min:5|unique:users',
            'password' => 'required|min:5'
        ]);
    }

    public function render()
    {
        return view('livewire.create-user-view');
    }
}
