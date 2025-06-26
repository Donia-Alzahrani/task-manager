<div class="max-w-xl mx-auto p-6 bg-pink-50 rounded-xl shadow space-y-5">
    <h2 class="text-2xl font-extrabold text-pink-700 mb-4">
        {{ $taskId ? '✏️ Edit Your Task' : '🌸 Create a Task' }}
    </h2>

    @if (session()->has('message'))
        <div class="p-2 bg-green-100 text-green-700 rounded text-sm">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <input type="text" wire:model="title" placeholder="Task Title"
               class="w-full px-4 py-2 border border-pink-300 rounded focus:ring-2 focus:ring-pink-400">
        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <textarea wire:model="description" placeholder="What is this task about?"
                  class="w-full px-4 py-2 border border-pink-300 rounded focus:ring-2 focus:ring-pink-400"></textarea>

        <label for="status" class="block text-sm font-medium text-pink-600">Status</label>
        <select id="status" wire:model="status" class="mt-1 block w-full rounded border-pink-300 focus:ring-pink-400">
            <option value="">🌟 Choose status</option>
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <button type="submit"
                class="bg-pink-500 text-white px-6 py-2 rounded-full hover:bg-pink-600 transition font-semibold">
            {{ $taskId ? '💾 Update Task' : '➕ Save Task' }}
        </button>
    </form>
</div>
