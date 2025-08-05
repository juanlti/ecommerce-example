<?php

namespace App\Livewire\Todos;

use App\Livewire\Forms\Todo\TodoForm;
use App\Models\Todo;
use Livewire\Component;

class UpdatedTodo extends Component
{
    public Todo $todo;
    public TodoForm $form;


    public function mount(Todo $todo): void
    {

        $this->todo = $todo;
        $this->form->setTodo($todo);


    }

    public function save(): void
    {
        $this->form->update();

        session()->flash('status', 'La tarea se ha modificado correctamente');
        $this->redirect(route('todos.index'));

    }

    public function render()
    {
        return view('livewire.todos.todo-form', ['textButton' => __('Actualizar')]);
    }

}
