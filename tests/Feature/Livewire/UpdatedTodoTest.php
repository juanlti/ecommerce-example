<?php
/*
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
*/

use App\Livewire\Todos\UpdatedTodo;
use App\Models\User;

test('updated todo component renders', function () {
    $user = User::factory()->create();
    $action = Livewire::actingAs($user);

    //todo a modficar
    $todoOld = $user->todos()->create([
        'title' => 'comprar helado',
        'description' => 'Ir a la heladeria y comprar helado',
        'done' => false,
    ]);

    $action->test(UpdatedTodo::class, ['todo' => $todoOld])
        ->assertSee('Titulo')
        ->assertSee('Descripcion')
        ->assertSee('Completada');


})->group('updated-todo', 'todos');

//test de validacion


// test de persistencia
test('updated todo component  persistence en database', function () {
    $user = User::factory()->create();
    $action = Livewire::actingAs($user);

    //todo a modficar
    $todoOld = $user->todos()->create([
        'title' => 'comprar helado',
        'description' => 'Ir a la heladeria y comprar helado',
        'done' => false,
    ]);


    //verificamos que el todo a modificar se encuentre en la bd
    $this->assertDatabaseHas('todos', [
        'title' => 'comprar helado',
        'description' => 'Ir a la heladeria y comprar helado',
        'done' => false,
    ]);


    //actualizamos $todoOld por el nuevo
    $action->test(UpdatedTodo::class, ['todo' => $todoOld])
        ->set('form.title', 'comprar pan')
        ->set('form.description', 'ir a la panaderia y comprar pan')
        ->set('form.done', true)
        ->call('save')
        ->assertRedirect(route('todos.index'));


    //volvemos a verificar si la actualizacion se guardo de manera correcta en la bd
    $this->assertDatabaseHas('todos', [
        'title' => 'comprar pan',
        'description' => 'ir a la panaderia y comprar pan',
        'done' => true
    ]);


})->group('updated-todo', 'todos');
