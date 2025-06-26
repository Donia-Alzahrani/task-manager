{{-- dashboard-page.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">📋 Your Tasks</h1>
    @livewire('task-dashboard')
@endsection
