<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

#[\Livewire\Attributes\Layout('layouts.app')]
class TaskDashboard extends Component
{
    public $confirmingId = null;

   public function deleteTask($id)
{
    logger('🛠 deleteTask called with ID: ' . $id);

    $task = Task::find($id);

    if (!$task || $task->user_id !== auth()->id()) {
        logger('❌ Unauthorized or not found');
        session()->flash('message', '⛔ Unauthorized or not found');
        return;
    }

    $task->delete();
    logger('✅ Deleted Task ID: ' . $id);

    // ✅ Force Livewire to re-render the component
    $this->dispatch('$refresh');

    session()->flash('message', '🗑 Task deleted!');
}


    public function render()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('livewire.task-dashboard', compact('tasks'));
    }
}
