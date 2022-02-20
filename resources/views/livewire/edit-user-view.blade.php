<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <form action="/dashboard/users/{{ $user->id }}" method="post">
                @csrf
                @method('put')
                <h3 class="box-title">Edit User</h3>
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" wire:model="nama" placeholder="Masukkan Nama" autocomplete="off">
                </div>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" wire:model="username" placeholder="Masukkan Username" autocomplete="off">
                </div>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label class="form-label mb-1" for="username">Role</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="admin" value="Admin" {{ $user->role == 'Admin' ? 'checked' : '' }}>
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="manager" value="Manager" {{ $user->role == 'Manager' ? 'checked' : '' }}>
                    <label class="form-check-label" for="manager">Manager</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="cashier" value="Cashier" {{ $user->role == 'Cashier' ? 'checked' : '' }}>
                    <label class="form-check-label" for="cashier">Cashier</label>
                </div>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if(!$changePassword)
                <div class="profile-wrapper mb-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined" wire:model="changePassword">
                    <label class="btn btn-outline-primary shadow-none" for="btn-check-outlined">Ganti Password</label><br>
                </div>
                @else
                <div class="profile-wrapper mb-2">
                    <label class="form-label mb-1" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" wire:model="password" placeholder="Masukkan Password Baru">
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-wrapper mb-2">
                    <input class="form-check-input" type="checkbox" id="show-password" onclick="showPasswordHandler()">
                    <label class="form-check-label" for="show-password">Tampilkan Password</label>
                </div>
                @endif
                <button class="btn btn-primary shadow-none mt-2">Edit</button>
                <a href="/dashboard/users" class="btn btn-danger text-white shadow-none mt-2 ms-2">Kembali</a>
            </form>
        </div>
    </div>
</div>