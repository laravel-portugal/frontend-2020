@extends('layouts.front')

@section('content')
    <div class="flex justify-center items-center z-50 sticky ">
        <x-notifications.success></x-notifications.success>
    </div>
    <x-hero></x-hero>
    <livewire:submit-link></livewire:submit-link>
@endsection
