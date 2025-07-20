<div>
    <flux:select wire:model.live="filter.perPage">
        <h3>opciones a selecionar</h3>
        @foreach($options as $option)
            <option value="{{$option}}">{{$option}}</option>

        @endforeach
    </flux:select>


</div>
