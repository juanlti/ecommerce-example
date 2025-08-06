<?php

/*
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
*/

use App\Livewire\Todos\CreateTodo;
use App\Models\User;

test('view create todo  component renders', function () {

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


test('create todo  component renders', function () {

    $user = User::factory()->create([
        'name' => 'Juan',
        'email' => 'delete@prueba.com'
    ]);
    $action = Livewire::actingAs($user);
    $action->test(CreateTodo::class)
        ->set('form.title', 'comprar pan')
        ->set('form.description', 'ir a la panaderia y comprar pan')
        ->assertSee('Completada')
        ->set('form.done', false)
        ->assertSee('Crear')
        ->call('save')
        ->assertRedirect(route('todos.index'));
    //verificamos que le dato se encuentre efectivamente en la bd
    $this->assertDatabaseHas('todos', [
        'title' => 'comprar pan',
        'description' => 'ir a la panaderia y comprar pan',
        'done' => false
    ]);


})->group('create-todo', 'todos');


