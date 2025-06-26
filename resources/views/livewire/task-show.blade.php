@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow space-y-4">

    <h2 class="text-2xl font-bold">{{ $task->title }}</h2>
    <p class="text-gray-600">{{ $task->description }}</p>

    <span class="text-sm px-2 py-1 rounded-full 
        {{ $task->status === 'completed' ? 'bg-green-200 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
        {{ ucfirst($task->status) }}
    </span>

    <div class="flex gap-4 mt-4">
        <a href="{{ url('/edit-task/'.$task->id) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ✏ Edit
        </a>
        <a href="{{ url('/dashboard') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Back
        </a>
    </div>

</div>
@endsection
