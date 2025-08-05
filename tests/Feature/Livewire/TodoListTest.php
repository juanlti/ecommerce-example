<?php
/*
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
*/

use App\Livewire\Todos\TodoList;
use App\Models\User;

test('todo list component renders',function (){
    Livewire::actingAs(User::factory()->create())
        ->test(TodoList::class)
        ->assertSee('No hay tareas a realizar');
});

