@extends('dashboard.layout.master')

@section('page-dashboard')

<livewire:create-transaksi-view :menus="$menus" />

@endsection