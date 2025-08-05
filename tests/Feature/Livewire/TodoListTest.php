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
    // primero debemos estar logeados, creamos un usuario con Livewire::actingAs
    Livewire::actingAs(User::factory()->create())
        ->test(TodoList::class)
        ->assertSee('No hay tareas a realizar');

    // segundo, en el metodo test(), indicamos el componente a testear
    //tercero, en el metodo  assertSee(), indicamos la informacion a validar, debe existir
})->group('todo-list','todos');

// agrupacion de metodos --> todo-list

