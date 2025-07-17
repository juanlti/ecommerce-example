<x-card-filter :title="$title">
    <ul class="list-group list-group-flush">
        @foreach($models as $model)
            <div class="flex justify-items-center">


                <li wire:key="{{$alias}}-filter-{{$model->id}}" class="list-group-item">
                    <label
                        class="form-check-label"
                        for="{{$alias}}-filter-{{$model->id}}">

                        {{$model->name}}

                    </label>
                    <div class="badge bg-amber-400 rounded-2xl float-end">{{$model->products_count}}</div>
                    <input
                        class="form-check-input me-1"
                        type="checkbox"
                        value="{{$model->id}}"
                        id="{{$alias}}-filter-{{$model->id}}"
                        wire:model.live="selectedModels"
                    />
                </li>


            </div>
        @endforeach
        <!-- DEBUGEADOR DEL FRONTED --->
        @json($selectedModels)
    </ul>

</x-card-filter>
