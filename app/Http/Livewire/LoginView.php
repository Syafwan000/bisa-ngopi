<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginView extends Component
{
    public $username;
    public $password;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'username' => 'required|max:55|min:5',
            'password' => 'required'
        ]);
    }

    public function render()
    {
        return view('livewire.login-view');
    }
}
