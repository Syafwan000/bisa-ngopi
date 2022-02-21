<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditMenuView extends Component
{
    public $menu;
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

    public function mount($menu)
    {
        $this->menu = $menu;
        $this->nama_menu = $menu->nama_menu;
        $this->harga = $menu->harga;
        $this->deskripsi = $menu->deskripsi;
        $this->ketersediaan = $menu->ketersediaan;
    }

    public function render()
    {
        return view('livewire.edit-menu-view', [
            'menu' => $this->menu
        ]);
    }
}
