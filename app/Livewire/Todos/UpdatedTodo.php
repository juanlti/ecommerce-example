<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;

class UpdatedTodo extends Component
{
    public Todo $todo;
    public string $title = '';
    public string $description = '';
    public bool $done = false;


    public function mount(Todo $todo): void
    {

        $this->todo = $todo;
        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->done = $todo->done;

    }

    public function save(): void
    {
        $this->todo->update(
            $this->only(['title', 'description', 'done'])
        );

        session()->flash('status', 'La tarea se ha modificado correctamente');
        $this->redirect(route('todos.index'));

    }

    public function render()
    {
        return view('livewire.todos.updated-todo');
    }

}
