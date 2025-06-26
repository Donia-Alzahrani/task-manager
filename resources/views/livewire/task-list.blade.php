<div class="space-y-5">
@forelse ($tasks as $task)
    <div class="p-4 bg-white rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-indigo-700">{{ $task->title }}</h2>
        <p class="text-gray-500 mt-1">{{ $task->description }}</p>
        <div class="text-sm mt-2">
            Status: 
            <span class="px-2 py-1 rounded-full text-white 
                {{ $task->status === 'completed' ? 'bg-green-500' : ($task->status === 'in_progress' ? 'bg-yellow-500' : 'bg-purple-500') }}">
                {{ ucwords(str_replace('_', ' ', $task->status)) }}
            </span>
        </div>
    </div>
@empty
    <p class="text-center text-gray-500">🌧 No tasks found. Go create something amazing!</p>
@endforelse
</div>
