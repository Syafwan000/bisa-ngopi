<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditUserView extends Component
{
    public $nama;
    public $username;
    public $password;
    public $user;
    public $changePassword = false;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'nama' => 'required|max:255|min:3',
            'username' => 'required|max:55|min:5',
            'password' => 'min:5'
        ]);
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->nama = $user->nama;
        $this->username = $user->username;
    }

    public function render()
    {
        return view('livewire.edit-user-view', [
            'user' => $this->user
        ]);
    }
}
