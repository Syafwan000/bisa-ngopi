<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <form action="/dashboard/cashier/{{ $transaksi->id }}" method="post">
                @csrf
                @method('put')
                <h3 class="box-title">Edit Transaksi</h3>
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" wire:model="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" autocomplete="off">
                </div>
                @error('nama_pelanggan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="nama_menu">Nama Menu</label>
                    <select class="form-select shadow-none" name="nama_menu" id="nama_menu" wire:model="nama_menu">
                        <option selected hidden>=== Pilih Menu ===</option>
                        @foreach($menus as $menu)
                            <option hidden value="{{ $menu->nama_menu }}">{{ $menu->nama_menu }} | Rp {{ number_format($menu->harga) }}</option>
                        @endforeach
                    </select>
                </div>
                @error('nama_menu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if($nama_menu)
                    <div class="profile-wrapper mb-2">
                        <label class="form-label mb-1" for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" wire:model="jumlah" wire:change="totalHarga" placeholder="Masukkan Jumlah" readonly>
                    </div>
                    @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
                <label class="form-label mb-1" for="total_harga">Total Harga</label>
                <div class="input-group profile-wrapper mb-2">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="number" class="form-control" name="total_harga" id="total_harga" wire:model="total_harga" placeholder="Total Harga" value="{{ $total_harga }}" aria-describedby="basic-addon1" readonly>
                </div>
                @error('total_harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" wire:model="nama_pegawai" placeholder="Nama Pegawai" value="{{ $nama_pegawai }}" readonly>
                </div>
                @error('nama_pegawai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <button class="btn btn-primary text-white shadow-none mt-2">Edit</button>
                <a href="/dashboard/cashier" class="btn btn-danger text-white shadow-none mt-2 ms-2">Kembali</a>
            </form>
        </div>
    </div>
</div>