<div>
    <x-card-filter :title="$title">
        <flux:radio.group wire:model.live="filter.rating" label="Selecionar productos por su ranking de valoraciones">
            @foreach($options as $rating=>$text)
                    <flux:radio value="{{$rating}}" label="{{$text}}" />
            @endforeach
        </flux:radio.group>
    </x-card-filter>
</div>
