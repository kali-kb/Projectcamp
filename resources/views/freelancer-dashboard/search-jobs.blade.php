@extends('freelancer-dashboard.dashboard')

@section("content")
    <livewire:jobs-component :freelancer="$freelancer" />
@endsection