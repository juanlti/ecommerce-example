<?php
/*
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
*/

use App\Livewire\Todos\ConfirmTodoDeletion;
use App\Livewire\Todos\TodoList;
use App\Models\User;
use Livewire\Livewire;

// agrupacion de metodos --> todo-list

test('todo list component renders', function () {
    // primero debemos estar logeados, creamos un usuario con Livewire::actingAs
    Livewire::actingAs(User::factory()->create())
        ->test(TodoList::class)
        ->assertSee('No hay tareas a realizar');

    // segundo, en el metodo test(), indicamos el componente a testear
    //tercero, en el metodo  assertSee(), indicamos la informacion a validar, debe existir
})->group('todo-list', 'todos');

test('todo list component renders with todos', function () {
    //$user = User::factory()->create;
    $user = User::factory()->create([
        'name' => 'Test 50 ',
        'email' => 'test50@prueba.com',
    ]);
    $action = Livewire::actingAs($user);

    $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Ir a la panaderia y comprar pan',
        'done' => false
    ]);
    $action
        ->test(TodoList::class)
        ->assertSee('Comprar pan')
        ->assertSee('Ir a la panaderia y comprar pan');


})->group('todo-list', 'todos');


test('todo list pagination works', function () {
    $user = User::factory()->create([
        'name' => 'user test pagination ',
        'email' => 'pagination@prueba.com',
    ]);
    $action = Livewire::actingAs($user);
    $user->todos()->createMany(
        collect(range(1, 50))->map(fn($i) => [
            'title' => "Comprar pan {$i}"

        ])->toArray()
    );
    $action
        ->test(TodoList::class)
        ->assertSee('Comprar pan 1')
        ->assertSee('Comprar pan 10')
        ->assertDontSee('Comprar pan 15')
        ->call('nextPage')
        ->assertSee('Comprar pan 15')
        ->assertDontSee('Comprar pan 10')
        ->assertDontSee('Comprar pan 30')
        ->call('previousPage')
        ->assertSee('Comprar pan 10')
        ->assertDontSee('Comprar pan 15');

})->group('todo-list', 'todos');

test('todo list component toggles todo', function () {
    $user = User::factory()->create([
        'name' => 'user test toggles ',
        'email' => 'toggles@prueba.com',
    ]);

    $action = Livewire::actingAs($user);
    $todo = $user->todos()->create([
        'title' => 'Comprar pan',
        'description' => 'Ir a la panaderia y comprar pan',
        'done' => false,
    ]);
    $action
        ->test(TodoList::class)
        ->assertSee('Comprar pan')
        ->assertSee('Ir a la panaderia y comprar pan')
        ->assertSee('Marcar como completada')
        ->call('toggle', $todo)
        ->assertSee('Marcar como no completada');


})->group('todo-list', 'todos');

test('todo list component deletes todo ', function () {

    $user = User::factory()->create([
        'name' => 'Juan',
        'email' => 'delete@prueba.com'
    ]);
    $action = Livewire::actingAs($user);
    $todo = $user->todos()->create([
        'id' => 1500,
        'title' => 'Comprar pan',
        'description' => 'Ir a la panaderia y comprar pan',
        'done' => false,
    ]);

    // 1. Test UI - Usuario Juan ve la Tarea en  TodoList.
    $action
        ->test(TodoList::class)
        ->assertSee('Comprar pan')
        ->assertSee('Ir a la panaderia y comprar pan')
        ->call('preDelete', $todo)
        ->assertDispatched('open-modal', 'confirm-todo-deletion')
        /*
        // 2. Usuario confirma en el modal -> emite el evento
        $action
            ->test(ConfirmTodoDeletion::Class)
            ->call('delete')
            ->assertDispatched('delete-todo');

        // 3. TodoList reacciona al evento y elimina la tarea
        */

        // Simulacion que el otro componente (ConfirmTodoDeletion::class), emite el evento
        ->dispatch('delete-todo')
        ->assertRedirect(route('todos.index'));
    $this->assertDatabaseMissing('todos', [
        'id' => $todo->id,
    ]);


})->group('todo-list', 'todo');
