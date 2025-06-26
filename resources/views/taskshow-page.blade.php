@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-pink-50 rounded-xl shadow space-y-4">
    <h2 class="text-3xl font-extrabold text-pink-700">{{ $task->title }}</h2>

    <p class="text-gray-600">{{ $task->description }}</p>

    <span class="inline-block px-3 py-1 text-sm rounded-full 
        {{ $task->status === 'completed' ? 'bg-green-200 text-green-800' : ($task->status === 'in_progress' ? 'bg-yellow-200 text-yellow-800' : 'bg-purple-200 text-purple-800') }}">
        💫 {{ ucwords(str_replace('_', ' ', $task->status)) }}
    </span>

    <div class="flex gap-3 mt-5">
        <a href="{{ url('/edit-task/'.$task->id) }}"
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            ✏ Edit
        </a>
        <a href="{{ url('/dashboard') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            ← Back
        </a>
    </div>
</div>
@endsection
