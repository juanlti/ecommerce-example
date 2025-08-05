<?php

namespace App\Livewire\Todos;

use App\Livewire\Forms\Todo\TodoForm;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateTodo extends Component
{

    public TodoForm $form;



    public function save(): void
    {
       // Todo::create($this->only(['title', 'description', 'done']));
        $this->form->create();

        session()->flash('status', 'La tarea se ha creado correctamente');
        $this->redirect(route('todos.index'));

    }


    public function render(): View
    {
        return view('livewire.todos.todo-form',['textButton'=>__('Crear')]);
    }
}
