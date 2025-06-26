<div class="space-y-6">
@forelse ($tasks as $task)
    <div x-data="{ open: false }" class="p-5 bg-pink-50 rounded-xl shadow-md hover:shadow-lg transition">
        <h3 class="text-xl font-bold text-pink-700">{{ $task->title }}</h3>

        <button @click="open = !open"
                class="text-sm text-pink-500 hover:underline focus:outline-none mt-1">
            <span x-show="!open">📫 Show Details</span>
            <span x-show="open">📬 Hide Details</span>
        </button>

        <div x-show="open" x-transition>
            <p class="text-gray-600 mt-2">{{ $task->description }}</p>
            <span class="text-xs mt-2 inline-block px-2 py-1 rounded-full
                {{ $task->status === 'completed' ? 'bg-green-200 text-green-800' : ($task->status === 'in_progress' ? 'bg-yellow-200 text-yellow-800' : 'bg-purple-200 text-purple-800') }}">
                💫 Status: {{ ucwords(str_replace('_', ' ', $task->status)) }}
            </span>
        </div>

        <div class="flex gap-2 mt-4">
            <a href="{{ url('/tasks/'.$task->id) }}"
               class="px-4 py-1 bg-indigo-400 text-white rounded-full text-sm hover:bg-indigo-500 transition">
                👁 View
            </a>
            <a href="{{ url('/edit-task/'.$task->id) }}"
               class="px-4 py-1 bg-blue-400 text-white rounded-full text-sm hover:bg-blue-500 transition">
                ✏ Edit
            </a>
            <button wire:click="deleteTask({{ $task->id }})"
                    class="px-4 py-1 bg-red-400 text-white rounded-full text-sm hover:bg-red-500 transition">
                🗑 Delete
            </button>
        </div>
    </div>
@empty
    <p class="text-gray-500 text-center">💤 You have no tasks yet.</p>
@endforelse
</div>
