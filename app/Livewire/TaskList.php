<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class TaskList extends Component
{
    public function render()
    {
        $tasks = Task::all();

        return view('livewire.task-list', [
            'tasks' => $tasks
        ]);
    }
}
