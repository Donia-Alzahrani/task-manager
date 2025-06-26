<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
#[Layout('layouts.app')]
class TaskForm extends Component
{
    public $taskId, $title, $description, $status ;

    protected $rules = [
    'title' => 'required|string|max:255',
    'description' => 'nullable|string',
    'status' => 'required|in:pending,completed,in_progress', // 👈 Add in_progress
];

    public function mount(Task $task = null)
    {
        if ($task && $task->user_id === Auth::id()) {
            $this->taskId = $task->id;
            $this->title = $task->title;
            $this->description = $task->description;
            $this->status = $task->status;
        }
    }

    public function save()
    {
        $this->validate();

        Task::updateOrCreate(
            ['id' => $this->taskId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
                'user_id' => Auth::id(),
            ]
        );

        session()->flash('message', '✅ Task saved successfully!');
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
