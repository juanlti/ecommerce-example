<?php

namespace App\Livewire\Forms\Todo;

use App\Models\Todo;
use Livewire\Form;

class TodoForm extends Form
{

    public ?Todo $todo;
    public string $title = '';
    public string $description = '';
    public bool $done = false;

    //metodo set
    public function setTodo(Todo $todo)
    {

        $this->todo = $todo;

        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->done = $todo->done;

    }


    // metodo create
    public function create()
    {

        $todo = Todo::create($this->only(['title', 'description', 'done']));


    }

    public function update()
    {
        $this->todo->update(
            $this->only(['title', 'description', 'done']),
        );
    }
}
