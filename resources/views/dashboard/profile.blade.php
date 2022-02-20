@extends('dashboard.layout.master')

@section('page-dashboard')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Profile</h3>
            <div class="profile-wrapper mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" value="{{ Auth::user()->nama }}" disabled readonly>
            </div>
            <div class="profile-wrapper mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled readonly>
            </div>
            <div class="profile-wrapper mb-3">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" value="{{ Auth::user()->role }}" disabled readonly>
            </div>
            <div class="profile-wrapper mb-3">
                <label class="form-label">Dibuat pada</label>
                <input type="text" class="form-control" value="{{ Auth::user()->created_at }}" disabled readonly>
            </div>
        </div>
    </div>
</div>

@endsection