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
                @foreach ($cars as $car)
                <option value="{{$car->id}}">{{$car->name}}</option>
                @endforeach
            </select>
        </div>
    </x-panel>

    <x-panel span="2">

    </x-panel>

</x-webapp-layout>