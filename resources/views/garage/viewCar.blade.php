<x-webapp-layout>

    <x-slot name="scriptjs">
        <script>
            function loadCar(select) {
                var selectedValue = select.value;
                if (selectedValue !== 'default') {
                    window.location.href = "/garage/car/" + selectedValue;
                }
            }
        </script>
    </x-slot>

    <x-slot name="header">
        {{ __('Garage') }}
    </x-slot>

    <x-panel>
        <div class="center">
            <select onchange="loadCar(this)">
                <option value="default">{{__('Select a car')}}</option>
                @foreach ($cars as $c)
                <option value="{{$c->id}}" {{ $car->id == $c->id ? "selected" : "" }} class="">{{$c->name}}</option>
                @endforeach
            </select>

            <x-input-label class="mt-5">{{__('Description')}}</x-input-label>
            <div>{{$car->desc}}</div>

            <x-input-label class="mt-5">{{__('Car license')}}</x-input-label>
            <div>{{$car->car_license}}</div>

            <x-input-label class="mt-5">{{__('Fuel type')}}</x-input-label>
            <div>{{$car->fuel_type}}</div>

            <x-input-label class="mt-5">{{__('Purchase date')}}</x-input-label>
            <div>{{$car->purchase_date}}</div>

            <x-input-label class="mt-5">{{__('First Purchase date')}}</x-input-label>
            <div>{{$car->first_purchase_date}}</div>

            <x-input-label class="mt-5 text-black">{{__('Last maintenance date')}}</x-input-label>
            <div></div>
       
        </div>
    </x-panel>

    <x-panel span="2">
        @if (count($events) > 0)
        {{__('Events')}}
        @endif
    </x-panel>

</x-webapp-layout>