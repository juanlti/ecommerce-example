<div class="w-full p-4">

            {{-- Tarjeta --}}
            <div class="rounded-lg">
                {{-- Imagen del producto --}}
                <img src="https://previews.123rf.com/images/myvector/myvector1606/myvector160600281/57852872-product-not-available-icon.jpg"
                     alt="{{ $product->name }}"
                     class="w-48 h-48 object-cover"/>


                {{-- Contenido --}}
                <div class="p-4">
                    {{-- Nombre del producto --}}
                    <h5 class="text-lg font-semibold text-gray-900 mb-4">{{ $product->name }}</h5>

                    {{-- Atributos estilo tabla --}}
                    <div class="text-sm text-gray-700 space-y-2">
                        <div class="flex justify-between border-t pt-2">
                            <span class="font-semibold">Categoría</span>
                            <span>{{ $product->category->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Color</span>
                            <span>{{ $product->color->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Tamaño</span>
                            <span>{{ $product->size->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Precio</span>
                            <span>{{ $product->price }} €</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Marca</span>
                            <span>{{ $product->brand->name }}</span>
                        </div>

                        {{-- Valoración --}}
                        @php
                            $avgRating = round($product->reviews()->avg('rating'));
                        @endphp
                        <div class="flex justify-between items-center pt-2 border-t">
                            <span class="font-semibold">Valoración</span>
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $avgRating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</div>
