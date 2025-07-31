<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public ?int $todoToDelete=null;

    public function edit(int $id):void
    {
        //redirect page edition
    }

    public function toggle(int $id):void
    {

    }
    public function preDelete(int $id):void
    { //alert modal

    }

    public function delete():void
    {

    }


    public function render()
    {
        $todos=auth()->user()->todos()->paginate(10);
        return view('livewire.todos.todo-list',['todos'=>$todos]);
    }
}
