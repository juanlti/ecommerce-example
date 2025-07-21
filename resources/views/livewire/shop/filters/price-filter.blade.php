<div>
    <flux:text class="text-base">{{$title}}</flux:text>
    <div>
        <flux:input.group>
            <flux:input type="number" placeholder="$10" wire:model.live.debounce1000="filter.price.min"/>
        </flux:input.group>
        <flux:input.group>
            <flux:input type="number" placeholder="$1000" wire:model.live.debounce1000="filter.price.max"/>
        </flux:input.group>
    </div>
</div>
