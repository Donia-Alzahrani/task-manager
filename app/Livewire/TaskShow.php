<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
#[Layout('layouts.app')] 
class TaskShow extends Component
{
    public function render()
    {
        return view('livewire.task-show');
    }

    public $task;

public function mount($task)
{
    $this->task = $task;
}
}
