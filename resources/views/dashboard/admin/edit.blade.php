@extends('dashboard.layout.master')

@section('page-dashboard')

<livewire:edit-user-view :user="$user" />

@endsection