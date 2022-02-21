<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateMenuView extends Component
{
    public $nama_menu;
    public $harga;
    public $deskripsi;
    public $ketersediaan;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'nama_menu' => 'required|max:255|min:3',
            'harga' => 'required',
            'deskripsi' => 'required|max:500|min:15',
            'ketersediaan' => 'required'
        ]);
    }
    
    public function render()
    {
        return view('livewire.create-menu-view');
    }
}
