<x-app-layout>

    <x-slot name="scriptjs">
        <script>
            function carsData() {
                return {
                    title: "My cars",
                    cars: [],
                    reload() {
                        this.cars = [];
                        this.init();
                    },

                    init() {
                        
                        let url = " {{ url('api/car') }}";

                        fetch(url)
                            .then(response => response.json())
                            .then(response => {
                                console.log('fetched', response);
                                this.cars = response;
                            });
                    }

                };
            }
        </script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="content">
                        <div class="h-full p-4 lg:p-8" x-data="carsData()" x-init="init()">

                            <div class="flex mt-4">
                                <template x-for="car in cars" :key="car.id">
                                    <div class="flex-1 border  border-gray-800 p-4 m-4 text-center">
                                        <div class="font-bold" x-text="car.name"></div>
                                        <div class="text-gray-400" x-text="car.car_license"></div>
                                    </div>
                                </template>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>