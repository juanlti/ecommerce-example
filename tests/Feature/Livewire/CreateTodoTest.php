<?php

/*
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
*/

use App\Livewire\Todos\CreateTodo;
use App\Models\User;

test('create todo  component renders', function () {

    $user = User::factory()->create([
        'name' => 'Juan',
        'email' => 'delete@prueba.com'
    ]);
    $action = Livewire::actingAs($user);
    $action->test(CreateTodo::class)
        ->assertSee('Titulo')
        ->assertSee('Descripcion')
        ->assertSee('Completada')
        ->assertSee('Crear');


})->group('create-todo', 'todos');
