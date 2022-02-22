@extends('dashboard.layout.master')

@section('page-dashboard')

<livewire:edit-transaksi-view :transaksi="$transaksi" />

@endsection