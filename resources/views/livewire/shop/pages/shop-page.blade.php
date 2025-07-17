<div class="p-5">
    <div class="flex flex-wrap">
        <!-- Sidebar Filters -->
        <div class="h-[90vh] overflow-auto w-full md:w-1/3 xl:w-1/4 2xl:w-1/6 p-4">
            <h2 class="text-lg font-semibold mb-4">Filtros del Sidebar</h2>
            <div class="space-y-6">



                <livewire:shop.filters.category-filter/>
            </div>
        </div>

        <!-- Products -->
        <div class="w-full md:w-2/3 xl:w-3/4 2xl:w-5/6 p-4 space-y-6 bg-yellow-50">
            <!-- Filtros superiores -->
            <div class="flex flex-wrap items-center justify-between gap-4">
                <flux:button variant="danger" iconLeading="refresh" wire:click="resetFilters">
                    Borrar Filtros
                </flux:button>

                <div class="flex flex-wrap items-center gap-4">
                    <livewire:shop.filters.per-page-filter />
                    <livewire:shop.filters.search-filter />
                </div>
            </div>

            <!-- Lista de productos -->
            <div class="space-y-6">
                <livewire:shop.lists.products-list />

                <!-- Card de producto (ejemplo) -->

                    {{-- Usás el dropdown aquí si querés detalle expandible --}}
                    <x-product-card :product="$product" />

            </div>
        </div>
    </div>
</div>
