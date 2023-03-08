<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ ucfirst(__('maintenance')) }} {{__('for')}} {{date("d/m/Y", strtotime($maintenance->maintenance_date )) }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-5">

        <div class="flex flex-row">  
                <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">ID: <strong>{{ $maintenance->id}}</strong></div>
                <div class="md:basis-1/2 sm:basis-1 text-gray-400 px-4 py-2">{{__('Modified at')}}: <strong>{{ $maintenance->created_at}}</strong></div> 
            </div>  

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">       
            
            <div class="flex flex-row">
                <div class="md:basis-1/2 sm:basis-1 px-4 py-5">
                    <strong> {{ ucfirst(__('details')) }}:</strong>
                    {{ $maintenance->details }}
                </div>
            </div>
            <div class="flex flex-row justify-space-around">
                <div class="md:basis-1/2 sm:basis-1 px-4 py-5">
                    <strong> {{ ucfirst(__('car')) }}:</strong>
                    {{ $car->name }}
                </div>
                <div class="md:basis-1/2 sm:basis-1 px-4 py-5">
                    <strong> {{ ucfirst(__('maintenance date')) }}:</strong>
                    {{date("d/m/Y", strtotime($maintenance->maintenance_date )) }}
                </div>
                <div class="md:basis-1/2 sm:basis-1 px-4 py-5">
                    <strong> {{ ucfirst(__('price')) }}:</strong>
                    {{ $maintenance->price }}€
                </div>
                <div class="md:basis-1/2 sm:basis-1 px-4 py-5">
                    <strong> {{ ucfirst(__('kilometers')) }}:</strong>
                    {{ $maintenance->kilometers }} Kms.
                </div>
            </div>

            <div class="flex flex-row">
                <!-- Actions -->
                <div class="px-4 py-5">
                    <a href="{{ route('maintenance.edit',$maintenance) }}" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('edit')) }}</a>
                    <form class="inline" action="{{ route('maintenance.destroy',$maintenance) }}" method="post">
                        @method("DELETE")
                        @csrf    
                        <button type="submit" class="mx-5 px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600 hover:text-red-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">{{ ucfirst(__('delete')) }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>