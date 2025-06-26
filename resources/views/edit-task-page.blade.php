@extends('layouts.app')

@section('content')
    
    @livewire('task-form', ['task' => $task])
@endsection
