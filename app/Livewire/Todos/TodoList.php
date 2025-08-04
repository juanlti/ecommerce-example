<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public ?int $todoToDelete=null;

    public function edit(Todo $todo):void
    {
      $this->redirect(route('todos.edit',['todo'=>$todo]));
    }

    public function toggle(Todo $todo):void
    {

       $todo->done=!$todo->done;
       $todo->save();

    }
    public function preDelete(int $id):void
    { //alert modal

    }

    public function delete():void
    {

    }


    public function render():View
    {
        $todos=auth()->user()->todos()->paginate(10);
        return view('livewire.todos.todo-list',['todos'=>$todos]);
    }
}
