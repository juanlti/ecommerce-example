<div class="p-5">
    <div class="flex flex-wrap">
        <!-- Sidebar Filters --->
        <div class="h-[90vh] overflow-auto bg-black text-white w-full md:w-1/3 xl:w-1/4 2xl:w-1/6">
            Filtros del Sidebar
            <div class="my-4">
                <div class="space-y-6">
                    <livewire:shop.filters.category-filter/>
                    <livewire:shop.filters.price-filter/>
                    <livewire:shop.filters.size-filter/>
                    <livewire:shop.filters.color-filter/>
                    <livewire:shop.filters.rating-filter/>
                </div>
            </div>
        </div>
        <!-- Products --->
        <div class="bg-yellow-500 w-full md:w-2/3 xl:w-3/4 2xl:w-5/6">
            <div class="p-4">
                <flux:button variant="danger" iconLeading="refresh" wire:click="resetFilters">
                    Borrar Filtros
                </flux:button>
            </div>
            <div class="col-auto">
                <livewire:shop.filters.per-page-filter/>
            </div>
            <div class="col">
                <livewire:shop.filters.search-filter/>
            </div>

            <div class="col-12">
                <livewire:shop.lists.products-list/>
            </div>
        </div>


    </div>
</div>
