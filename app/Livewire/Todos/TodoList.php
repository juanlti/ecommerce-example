<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public ? Todo $todoToDelete=null;

    public function edit(Todo $todo):void
    {
      $this->redirect(route('todos.edit',['todo'=>$todo]));
    }

    public function toggle(Todo $todo):void
    {

       $todo->done=!$todo->done;
       $todo->save();

    }


    public function preDelete(Todo $todo):void
    { //disparo el evento al componente modal
        $this->todoToDelete=$todo;
        $this->dispatch('open-modal','confirm-todo-deletion');

    }

    #[On('delete-todo')]
    public function delete():void{
        $this->todoToDelete->delete();
        $this->todoToDelete=null;

        session()->flash('status','La tarea se ha eliminado correctamente');

        $this->redirect(route('todos.index'));




    }


    public function render():View
    {
        $todos=auth()->user()->todos()->paginate(10);
        return view('livewire.todos.todo-list',['todos'=>$todos]);
    }

}
