<x-app-layout>

    <x-slot name="scriptjs">
        <script>
            function clickOnRow(id) {
                alert("hola " + id);
            }

        </script>
    </x-slot>

    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Cars') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container max-w-6xl mx-auto mt-2 mb-2">
            @if (session()->has('message'))
            <div class="p-3 rounded bg-green-500 text-green-100 my-2">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex justify-end m-2">
                <a href="{{ route('car.create')}}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">Add Car</a>
            </div>

            <div class="flex flex-col m-2">
                <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        ID</th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('name') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('description') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('Car license plate') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('documents') }}
                                    </th>                                   
                                    <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="2">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" x-data="">
                                @foreach ($cars as $car)
                                <tr x-data=" { carId: {{$car->id}} } " class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">
                                    <td @click="clickOnRow(carId)" class="py-4 px-6 cursor-pointer"> {{ $car->id }} </td>
                                    <td @click="clickOnRow(carId)" class="py-4 px-6 cursor-pointer"> {{ $car->name }} </td>
                                    <td @click="clickOnRow(carId)" class="py-4 px-6 cursor-pointer"> {{ substr($car->desc,0,15) }} </td>
                                    <td @click="clickOnRow(carId)" class="py-4 px-6 cursor-pointer"> {{ $car->car_license }} </td>
                                    <td class="py-4 px-6"> </td>
                                    <td class="py-4 px-6">
                                        <a href=" {{ route('car.show',$car) }} "> <i class="fas fa-light fa-eye text-green-500"></i> </a>
                                        <a href=" {{ route('car.edit',$car) }} "> <i class=" fas fa-light fa-pen-to-square text-blue-500"></i> </a>
                                        <a href=" {{ route('car.destroy',$car) }} "> <i class="fas fa-light fa-trash text-red-500"></i> </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>