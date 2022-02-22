<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class EditTransaksiView extends Component
{
    public $transaksi;
    public $nama_pelanggan;
    public $nama_menu;
    public $jumlah;
    public $total_harga;
    public $nama_pegawai;

    public function totalHarga()
    {
        $menu = Menu::where('nama_menu', $this->nama_menu)->get();

        if($this->jumlah) {
            $this->total_harga = $menu[0]->harga * $this->jumlah;
        } elseif($this->jumlah == '' || $this->jumlah == 0) {
            $this->total_harga = '';
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'nama_pelanggan' => 'required|max:255|min:3',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'nama_pegawai' => 'required'
        ]);
    }

    public function mount($transaksi)
    {
        $this->transaksi = $transaksi;
        $this->nama_pelanggan = $transaksi->nama_pelanggan;
        $this->nama_menu = $transaksi->nama_menu;
        $this->jumlah = $transaksi->jumlah;
        $this->total_harga = $transaksi->total_harga;
        $this->nama_pegawai = auth()->user()->nama;
    }

    public function render()
    {
        $menus = Menu::all();

        return view('livewire.edit-transaksi-view', [
            'menus' => $menus,
            'transaksi' => $this->transaksi,
            'total_harga' => $this->total_harga,
            'nama_pegawai' => $this->nama_pegawai
        ]);
    }
}
