<div>
    @forelse($todos as $todo)
        <div class="flex justify-between">
            <div>
                <h3 class="text-lg front-bold">{{$todo->title}}</h3>
                <p class="text-sm {{$todo->done? 'line-through':''}}">
                    {{$todo->description}}
                </p>
            </div>
            <div>
                <button
                    wire:click="toggle({{ $todo->id }})"
                    class="{{ $todo->done ? 'bg-red-500 hover:bg-red-700' : 'bg-green-500 hover:bg-green-700' }} text-white font-bold py-2 px-4 rounded"
                >
                    Marcar como {{ $todo->done ? 'no completada' : 'completada' }}
                </button>
                <button
                    wire:click="edit({{$todo}})"
                    class="{{ $todo->done ? 'bg-red-500 hover:bg-red-700' : 'bg-green-500 hover:bg-green-700' }} text-white font-bold py-2 px-4 rounded"

                >
                    Editar
                </button>

                <button
                    wire:click="preDelete({{ $todo->id }})"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                >
                    Eliminar

                </button>

            </div>

        </div>
        <hr class="my-4">
    @empty
        <p class="text-lg"> No hay tareas a realizar</p>
    @endforelse

    {{ $todos->links() }}
</div>
