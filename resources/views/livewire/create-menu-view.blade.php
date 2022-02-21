<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <form action="/dashboard/menu" method="post">
                @csrf
                <h3 class="box-title">Tambah Menu</h3>
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="nama_menu">Nama Menu</label>
                    <input type="text" class="form-control" name="nama_menu" id="nama_menu" wire:model="nama_menu" placeholder="Masukkan Nama Menu" autocomplete="off">
                </div>
                @error('nama_menu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label class="form-label mb-1" for="harga">Harga</label>
                <div class="input-group profile-wrapper mb-2">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="number" class="form-control" name="harga" id="harga" wire:model="harga" placeholder="Masukkan Harga" autocomplete="off" aria-describedby="basic-addon1">
                </div>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" wire:model="deskripsi" placeholder="Masukkan Deskripsi" rows="3"></textarea>
                </div>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="ketersediaan">Ketersediaan</label>
                    <input type="number" class="form-control" name="ketersediaan" id="ketersediaan" wire:model="ketersediaan" placeholder="Masukkan Ketersediaan">
                </div>
                @error('ketersediaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <button class="btn btn-success text-white shadow-none mt-2">Tambahkan</button>
                <a href="/dashboard/menu" class="btn btn-danger text-white shadow-none mt-2 ms-2">Kembali</a>
            </form>
        </div>
    </div>
</div>