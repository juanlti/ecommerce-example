<div class="bg-red-200 w-full p-4"> {{-- Este es el contenedor padre --}}
    <flux:dropdown class="w-full">
        <flux:button icon:trailing="chevron-down" class="w-full">
            Options
        </flux:button>

        <flux:menu
            class="w-1/2 bg-white shadow-xl rounded-lg overflow-hidden overflow-y-auto max-h-[400px]"
            style="min-width: 0"
        >
            {{-- Imagen --}}
            <flux:menu.item class="p-0">
                <img src="{{$product->image}}" alt="{{$product->name}}" class="object-cover rounded-t-lg"/>
            </flux:menu.item>

            {{-- Título --}}
            <flux:menu.item class="px-4 py-2 border-b">
                <h5 class="text-lg font-semibold">{{$product->name}}</h5>
            </flux:menu.item>

            <flux:menu.separator/>

            {{-- Detalles --}}
            @foreach([
                'Category' => $product->category->name,
                'Color' => $product->color->name,
                'Size' => $product->size->name
            ] as $label => $value)
                <flux:menu.item class="px-4 py-2 flex justify-between border-b text-sm text-gray-600">
                    <span class="text-gray-500 font-medium">{{ $label }}</span>
                    <span>{{ $value }}</span>
                </flux:menu.item>
            @endforeach


            <flux:menu.item class="px-4 py-2 flex items-center gap-1 border-t">
                <div class="card-footer">
                    <span> valoracion</span>
                    <div class="d-flex justify-content-between">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{$product->reviews()->avg(('rating'), 1) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                        @endfor
                    </div>
                </div>
            </flux:menu.item>


        </flux:menu>
    </flux:dropdown>
</div>
