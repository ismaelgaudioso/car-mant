<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Maintenances') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container max-w-6xl mx-auto mt-2 mb-2">
            @if (session()->has('status'))
            <div class="p-3 rounded bg-green-500 text-green-100 my-2">
                {{ session('status') }}
            </div>
            @endif
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex justify-end m-2">
                <a href="{{ route('maintenance.create')}}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">{{ __('Add maintenance') }}</a>
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
                                        {{ __('car') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('details') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('maintenance type') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('maintenance date') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('price') }}
                                    </th>                                    
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('documents') }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        {{ __('Created at') }}
                                    </th>
                                    <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="2">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($maintenances as $maintenance)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6"> {{ $maintenance->id }} </td>
                                    <td class="py-4 px-6"> {{ $maintenance->car }} </td>
                                    <td class="py-4 px-6"> {{ substr($maintenance->details,0,20) }} </td>
                                    <td class="py-4 px-6"> {{ $maintenance->maintenance_type}} </td>
                                    <td class="py-4 px-6"> {{ date("d/m/Y", strtotime($maintenance->maintenance_date )) }} </td>
                                    <td class="py-4 px-6"> {{ $maintenance->price }} €</td>
                                    <td class="py-4 px-6"> </td>
                                    <td class="py-4 px-6 text-xs"> {{ date("d/m/Y H:m", strtotime($maintenance->created_at )) }} </td>
                                    <td class="py-4 px-6">
                                        <a href=" {{ route('maintenance.show',$maintenance) }} "> <i class="fas fa-light fa-eye text-green-500"></i> </a>
                                        <a href=" {{ route('maintenance.edit',$maintenance) }} "> <i class=" fas fa-light fa-pen-to-square text-blue-500"></i> </a>
                                        <a href=" {{ route('maintenance.destroy',$maintenance) }} "> <i class="fas fa-light fa-trash text-red-500"></i> </a>
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