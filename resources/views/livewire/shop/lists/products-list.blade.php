<div class="row">
    {{-- The Master doesn't talk, he acts. --}}

    @forelse($products as $product)

        <div class="col-end-3 mb-3">
            <x-product-card :product="$product"/>
        </div>
    @empty
        <div>No hay productos para mostrar</div>
    @endforelse

    <div class="col-12">
        {{$products->links()}}
    </div>
</div>
